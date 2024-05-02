<?php

namespace App\Controller;

use App\Entity\Survey;
use App\Repository\SurveyAnswerRepository;
use App\Repository\SurveyRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class SurveyController extends AbstractController
{
    #[Route('/survey', name: 'survey.index')]
    public function index(SurveyRepository $repository): Response
    {
        $surveys = $repository->findBy(['user' => $this->getUser()]);
        return $this->render('survey/index.html.twig', [
            'surveys' => $surveys,
            'controller_name' => 'SurveyController',
        ]);
    }

    #[Route('/survey/{id}', name: 'survey.show', requirements: ['id' => '[0-9]+'])]
    public function show(Survey $survey, SurveyAnswerRepository $repository): Response
    {
        $answers = $repository->findBy(['survey' => $survey->getId()]);
        return $this->render('survey/show.html.twig', [
            'survey' => $survey,
            'answers' => $answers,
        ]);
    }

}
