<?php

namespace App\Controller;

use App\Repository\QuestionRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class QuestionController extends AbstractController
{
    #[Route('/question', name: 'app_question')]
    public function index(): Response
    {
        return $this->render('question/index.html.twig', [
            'controller_name' => 'QuestionController',
        ]);
    }

    #[Route('/question/{ageCategory}', name: 'question.indexByAge')]
    public function indexByAge(QuestionRepository $repository, int $ageCategory): Response
    {
        $questions = $repository->findBy(['ageCategory' => $ageCategory]);
        return $this->render('question/show.html.twig', [
            'questions' => $questions,
            'ageCategory' => $ageCategory
        ]);
    }
}
