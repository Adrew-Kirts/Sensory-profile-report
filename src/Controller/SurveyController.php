<?php

namespace App\Controller;


use App\Repository\SurveyRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class SurveyController extends AbstractController
{
    #[Route('/survey', name: 'survey.index')]
    public function index(SurveyRepository $repository): Response
    {
        return $this->render('survey/index.html.twig', [
            'controller_name' => 'SurveyController',
        ]);
    }

}
