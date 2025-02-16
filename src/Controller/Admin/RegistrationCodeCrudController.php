<?php

namespace App\Controller\Admin;

use App\Entity\RegistrationCode;
use EasyCorp\Bundle\EasyAdminBundle\Config\Action;
use EasyCorp\Bundle\EasyAdminBundle\Config\Actions;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\BooleanField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateTimeField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use EasyCorp\Bundle\EasyAdminBundle\Router\AdminUrlGenerator;
use Doctrine\ORM\EntityManagerInterface;

class RegistrationCodeCrudController extends AbstractCrudController
{
    private $adminUrlGenerator;

    public function __construct(AdminUrlGenerator $adminUrlGenerator)
    {
        $this->adminUrlGenerator = $adminUrlGenerator;
    }

    public static function getEntityFqcn(): string
    {
        return RegistrationCode::class;
    }

    public function configureActions(Actions $actions): Actions
    {
        $generateCode = Action::new('generateCode', 'Generate New Code', 'fa fa-plus')
            ->createAsGlobalAction()
            ->linkToCrudAction('generateNewCode')
            ->addCssClass('btn btn-primary');

        return $actions
            ->add(Crud::PAGE_INDEX, $generateCode)
            ->disable(Action::NEW);
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')->hideOnForm(),
            TextField::new('code')->setFormTypeOption('disabled', true),
            BooleanField::new('isUsed'),
            DateTimeField::new('createdAt')->hideOnForm(),
            DateTimeField::new('usedAt')->hideOnForm(),
            AssociationField::new('usedBy')->hideOnForm(),
        ];
    }

    #[Route('/admin/generate-code', name: 'admin_generate_code')]
    public function generateNewCode(EntityManagerInterface $entityManager): Response
    {
        $registrationCode = new RegistrationCode();
        $registrationCode->setCode($this->generateUniqueCode());

        $entityManager->persist($registrationCode);
        $entityManager->flush();

        $this->addFlash('success', 'New registration code generated: ' . $registrationCode->getCode());

        return $this->redirect($this->adminUrlGenerator
            ->setController(self::class)
            ->setAction(Action::INDEX)
            ->generateUrl());
    }

    private function generateUniqueCode(): string
    {
        return strtoupper(bin2hex(random_bytes(4))); // 8 character hex code
    }
}