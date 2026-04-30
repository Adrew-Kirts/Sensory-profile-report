<?php

namespace App\Controller;

use App\Entity\Patient;
use App\Entity\Survey;
use App\Entity\SurveyAnswer;
use App\Repository\PatientRepository;
use App\Repository\QuestionRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Security\Http\Attribute\IsGranted;

#[IsGranted('ROLE_USER')]
class QuestionController extends AbstractController
{
    #[Route('/question', name: 'app_question')]
    public function index(): Response
    {
        return $this->render('question/index.html.twig', [
            'controller_name' => 'QuestionController',
        ]);
    }

    #[Route('/question/{ageCategory}', name: 'question.indexByAge', requirements: ['ageCategory' => '[0-9]+'])]
    public function indexByAge(QuestionRepository $questionRepository, PatientRepository $patientRepository, int $ageCategory): Response
    {
        $questions = $questionRepository->findBy(['ageCategory' => $ageCategory]);
        $patients = $patientRepository->findBy(['user' => $this->getUser()]);
        return $this->render('question/show.html.twig', [
            'questions' => $questions,
            'patients' => $patients,
            'ageCategory' => $ageCategory,
        ]);
    }

    #[Route('/question/save/{ageCategory}', name: 'question.saveAnswers', methods: ['POST'], requirements: ['ageCategory' => '[0-9]+'])]
    public function saveAnswers(Request $request, QuestionRepository $questionRepository, EntityManagerInterface $entityManager, int $ageCategory): Response
    {
        $answers = $request->request->all('answers');
        $patientId = $request->request->get('patientId');

        $patient = $entityManager->getRepository(Patient::class)->find($patientId);
        if (!$patient instanceof Patient || $patient->getUser() !== $this->getUser()) {
            throw $this->createAccessDeniedException();
        }

        $survey = new Survey();
        $survey->setUser($this->getUser());
        $survey->setPatient($patient);

        foreach ($answers as $questionId => $answerValue) {
            $value = (int) $answerValue;
            if ($value < 0 || $value > 5) {
                continue;
            }
            $question = $questionRepository->find($questionId);
            if ($question === null) {
                continue;
            }
            $surveyAnswer = new SurveyAnswer();
            $surveyAnswer->setQuestion($question);
            $surveyAnswer->setSurvey($survey);
            $surveyAnswer->setAnswer($value);
            $entityManager->persist($surveyAnswer);
        }
        $entityManager->persist($survey);
        $entityManager->flush();

        $this->addFlash('success', 'Profil sensoriel bien enregistré');
        return $this->redirectToRoute('patient.index');
    }

    #[Route('/question/update/{answerId}', name: 'question.updateAnswer', methods: ['PATCH', 'POST'], requirements: ['answerId' => '[0-9]+'])]
    public function updateAnswer(Request $request, int $answerId, EntityManagerInterface $entityManager): Response
    {
        $answer = $entityManager->getRepository(SurveyAnswer::class)->find($answerId);
        if (!$answer instanceof SurveyAnswer) {
            throw $this->createNotFoundException('No answer found for id '.$answerId);
        }
        if ($answer->getSurvey()->getUser() !== $this->getUser()) {
            throw $this->createAccessDeniedException();
        }

        $newAnswer = $request->request->get('newAnswer');
        if ($newAnswer === null || $newAnswer === '' || !ctype_digit((string) $newAnswer)) {
            throw $this->createNotFoundException('Invalid answer value');
        }
        $value = (int) $newAnswer;
        if ($value < 0 || $value > 5) {
            throw $this->createNotFoundException('Invalid answer value');
        }
        $answer->setAnswer($value);
        $entityManager->flush();

        return $this->redirectToRoute('survey.show', ['id' => $answer->getSurvey()->getId()]);
    }
}
