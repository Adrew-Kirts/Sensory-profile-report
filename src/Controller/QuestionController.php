<?php

namespace App\Controller;

use App\Entity\Patient;
use App\Entity\Question;
use App\Entity\Survey;
use App\Entity\SurveyAnswer;
use App\Repository\PatientRepository;
use App\Repository\QuestionRepository;
use App\Repository\UserRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
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
    public function indexByAge(QuestionRepository $questionRepository, PatientRepository $patientRepository, int $ageCategory, ): Response
    {
        $questions = $questionRepository->findBy(['ageCategory' => $ageCategory]);
        $patients = $patientRepository->findBy(['user'=> $this->getUser()]);
        return $this->render('question/show.html.twig', [
            'questions' => $questions,
            'patients' => $patients,
            'ageCategory' => $ageCategory
        ]);
    }

    #[Route('/question/save/{ageCategory}', name: 'question.saveAnswers', methods: ['POST'])]
    public function saveAnswers(Request $request, QuestionRepository $questionRepository, EntityManagerInterface $entityManager, int $ageCategory): Response
    {
        $answers = $request->request->all('answers');

        $patientId = $request->request->get('patientId');

        $survey = new Survey();
        $survey->setUser($this->getUser());
        $patient = $entityManager->getRepository(Patient::class)->find($patientId);
        $survey->setPatient($patient);

        foreach ($answers as $questionId => $answerValue) {
            $question = $questionRepository->find($questionId);
            $surveyAnswer = new SurveyAnswer();
            $surveyAnswer->setQuestion($question);
            $surveyAnswer->setSurvey($survey);
            $surveyAnswer->setAnswer($answerValue);
            $entityManager->persist($surveyAnswer);
        }
        $entityManager->persist($survey);
        $entityManager->flush();

        $this->addFlash('success', 'Profil sensoriel bien enregistré');
        return $this->redirectToRoute('patient.index');
    }

    #[Route('/question/update/{answerId}', name: 'question.updateAnswer', methods: ['PATCH'])]
    public function updateAnswer(Request $request, $answerId, EntityManagerInterface $entityManager): Response
    {
        $answer = $entityManager->getRepository(SurveyAnswer::class)->find($answerId);

        if (!$answer) {
            throw $this->createNotFoundException('No answer found for id '.$answerId);
        }

        $newAnswer = $request->request->get('newAnswer');
        $answer->setAnswer($newAnswer);
        $entityManager->flush();

        return $this->redirectToRoute('survey.show', ['id' => $answer->getSurvey()->getId()]);
    }

}
