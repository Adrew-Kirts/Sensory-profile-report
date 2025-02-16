<?php

namespace App\Controller\Admin;

use App\Entity\User;
use App\Entity\Survey;
use App\Entity\Patient;
use App\Entity\Question;
use App\Entity\SurveyAnswer;
use App\Entity\RegistrationCode;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use EasyCorp\Bundle\EasyAdminBundle\Router\AdminUrlGenerator;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Attribute\IsGranted;

#[IsGranted('ROLE_ADMIN')]
class DashboardController extends AbstractDashboardController
{
    private $adminUrlGenerator;

    public function __construct(AdminUrlGenerator $adminUrlGenerator)
    {
        $this->adminUrlGenerator = $adminUrlGenerator;
    }

    #[Route('/admin', name: 'admin')]
    public function index(): Response
    {
        $url = $this->adminUrlGenerator
            ->setController(RegistrationCodeCrudController::class)
            ->generateUrl();

        return $this->redirect($url);
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('Sensory Profile Admin');
    }

    public function configureMenuItems(): iterable
    {
        yield MenuItem::linkToDashboard('Dashboard', 'fa fa-home');

        yield MenuItem::section('Users & Access');
        yield MenuItem::linkToCrud('Users', 'fas fa-users', User::class);
        yield MenuItem::linkToCrud('Registration Codes', 'fas fa-key', RegistrationCode::class);

        yield MenuItem::section('Patients');
        yield MenuItem::linkToCrud('Patients', 'fas fa-user-injured', Patient::class);

        yield MenuItem::section('Surveys');
        yield MenuItem::linkToCrud('Surveys', 'fas fa-file-alt', Survey::class);
        yield MenuItem::linkToCrud('Questions', 'fas fa-question', Question::class);
        yield MenuItem::linkToCrud('Answers', 'fas fa-pen', SurveyAnswer::class);
    }
}