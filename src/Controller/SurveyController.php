<?php

namespace App\Controller;

use App\Entity\Survey;
use App\Repository\SurveyAnswerRepository;
use App\Repository\SurveyRepository;
use Dompdf\Dompdf;
use Dompdf\Options;
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
        $questions = $survey->getSurveyAnswer()->map(fn($answer) => $answer->getQuestion());
        $ageCategory = $questions->first()->getAgeCategory();

        $template = match ($ageCategory) {
            0 => 'survey/show0.html.twig',
            1 => 'survey/show1.html.twig',
            2 => 'survey/show2.html.twig',
            3 => 'survey/show3.html.twig',
//            default => 'survey/show0html.twig',
        };

        return $this->render($template, [
            'survey' => $survey,
            'answers' => $answers,
        ]);
    }

    #[Route('/survey/{id}/export', name: 'survey.export', requirements: ['id' => '[0-9]+'])]
    public function export(Survey $survey, SurveyAnswerRepository $repository): Response
    {
        $answers = $repository->findBy(['survey' => $survey->getId()]);
        $questions = $survey->getSurveyAnswer()->map(fn($answer) => $answer->getQuestion());
        $ageCategory = $questions->first()->getAgeCategory();

        $template = match ($ageCategory) {
            0 => 'survey/export0.html.twig',
            1 => 'survey/export1.html.twig',
            2 => 'survey/export2.html.twig',
            3 => 'survey/export3.html.twig',
        };

        $html = $this->renderView($template, [
            'survey' => $survey,
            'answers' => $answers,
        ]);

        $options = new Options();
        $options->set('defaultFont', 'Arial');
        $dompdf = new Dompdf($options);
        $dompdf->loadHtml($html);
        $dompdf->setPaper('A4', 'portrait');
        $dompdf->render();

        $firstName = $survey->getPatient()->getFirstName();
        $lastName = $survey->getPatient()->getLastName();
        $surveyDate = $survey->getCreatedAt()->format('d-m-Y');

        return new Response($dompdf->output(), 200, [
            'Content-Type' => 'application/pdf',
            'Content-Disposition' => 'attachment; filename="profil_sensoriel_'.$firstName.'_'.$lastName.'_'.$surveyDate.'.pdf"',
        ]);
    }

}
