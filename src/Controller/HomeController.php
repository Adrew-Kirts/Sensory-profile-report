<?php

namespace App\Controller;

use App\Entity\User;
use App\Repository\PatientRepository;
use App\Repository\SurveyRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class HomeController extends AbstractController
{
    #[Route('/', name: 'home')]
    public function index(PatientRepository $patientRepository, SurveyRepository $surveyRepository): Response
    {
        $user = $this->getUser();

        if (!$user instanceof User) {
            return $this->render('home/index.html.twig', [
                'isAuthenticated' => false,
            ]);
        }

        $patientCount = $patientRepository->count(['user' => $user]);
        $surveyCount = $surveyRepository->count(['user' => $user]);
        $recentSurveys = $surveyRepository->findRecentForUser($user, 5);
        $patientsNoSurvey = $patientRepository->findWithoutSurveyForUser($user, 5);

        return $this->render('home/index.html.twig', [
            'isAuthenticated' => true,
            'firstName' => $user->getFirstName(),
            'patientCount' => $patientCount,
            'surveyCount' => $surveyCount,
            'recentSurveys' => $recentSurveys,
            'patientsNoSurvey' => $patientsNoSurvey,
        ]);
    }
}
