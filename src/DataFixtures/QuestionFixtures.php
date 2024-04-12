<?php

namespace App\DataFixtures;

use App\Entity\Question;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class QuestionFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {

        //0 - Questionnaire nourrisson 0-6M
        $questions = [
            [
                'questionNumber' => 1,
                'questionText' => 'reste silencieux et calme dans un milieu actif comparativement aux autres bébés',
            ],
            [
                'questionNumber' => 2,
                'questionText' => "n'est pas conscient des personnes qui entrent ou sortent d'une pièce",
            ],
            [
                'questionNumber' => 3,
                'questionText' => 'a besoin de la même routine afin de demeurer bien et calme',
            ],
            [
                'questionNumber' => 4,
                'questionText' => "agit d'une façon qui interfère avec l'horaire et les plans de la famille",
            ],
            [
                'questionNumber' => 5,
                'questionText' => "a besoin d'aide pour s'endormir",
            ],
            [
                'questionNumber' => 6,
                'questionText' => "est irritable comparativement aux autres bébés",
            ],
            [
                'questionNumber' => 7,
                'questionText' => 'dort plus que les autres bébés',
            ],

        ];

        foreach ($questions as $q){
            $question = new Question();
            $question->setQuestionNumber($q['questionNumber']);
            $question->setQuestionText($q['questionText']);
            $question->setAnswerOption(6);
            $question->setAgeCategory(0);
            $manager->persist($question);
        }
        $manager->flush();


        //1 - Questionnaire jeune enfant 7-35M


        //2 - Questionnaire enfant 3-14A


        //3 - Questionnaire compagnon scolaire 3-14A


        //4 - Questionnaire adult/ado 11-65+A


    }
}
