<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\RegistrationFormType;
use App\Security\AppAuthenticator;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Bundle\SecurityBundle\Security;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use App\Entity\RegistrationCode;

class RegistrationController extends AbstractController
{

    private EntityManagerInterface $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    #[Route('/register', name: 'app.register')]
    public function register(Request $request, Security $security, EntityManagerInterface $entityManager): Response
    {
        $user = new User();
        $form = $this->createForm(RegistrationFormType::class, $user);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $registrationCode = $form->get('registrationCode')->getData();
            $code = $this->entityManager->getRepository(RegistrationCode::class)->findOneBy(['code' => $registrationCode, 'isUsed' => false]);

            if (!$code) {
                $this->addFlash('error', 'Code invalide ou déjà utilisé');
                return $this->redirectToRoute('app.register');
            }
//            $user->setRoles(['ROLE_USER']);
            $user->setRegistrationCode($code);
            $code->setIsUsed(true);
            $code->setUsedBy($user);
            $code->setUsedAt(new \DateTimeImmutable());

            $entityManager->persist($user);
            $entityManager->persist($code);
            $entityManager->flush();

            $this->addFlash('success', 'Votre compte a été créé avec succès !');
            return $security->login($user, AppAuthenticator::class, 'main');
        }

        return $this->render('registration/register.html.twig', [
            'registrationForm' => $form,
        ]);
    }
}
