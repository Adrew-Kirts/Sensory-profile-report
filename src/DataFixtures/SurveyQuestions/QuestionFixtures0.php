<?php

namespace App\DataFixtures\SurveyQuestions;

use App\Entity\Question;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class QuestionFixtures0 extends Fixture
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
            [
                'questionNumber' => 8,
                'questionText' => "n'est attentif que lorsque je le touche (alors que son ouïe est fonctionnelle)",
            ],
            [
                'questionNumber' => 9,
                'questionText' => 'aime faire des bruits avec sa bouche (par exemple, faire des sons avec ses lèvres, fredonner)',
            ],
            [
                'questionNumber' => 10,
                'questionText' => "m'ignore lorsque je lui parle",
            ],
            [
                'questionNumber' => 11,
                'questionText' => 'est dérangé par des bruits quotidiens qui surviennent subitement',
            ],
            [
                'questionNumber' => 12,
                'questionText' => 'devient plus attentif et animé en présence de musique, de discussions ou de jouets sonores',
            ],
            [
                'questionNumber' => 13,
                'questionText' => 'manque de contact visuel avec moi durant les interactions de tous les jours',
            ],
            [
                'questionNumber' => 14,
                'questionText' => 'évite de regarder des jouets ou des visages',
            ],
            [
                'questionNumber' => 15,
                'questionText' => 'évite de regarder ou devient agité dans des milieux bruyants ou en présence de jouets bruyants',
            ],
            [
                'questionNumber' => 16,
                'questionText' => "cligne des yeux lorsque des objets ou des gens s'approchent de son visage",
            ],
            [
                'questionNumber' => 17,
                'questionText' => "devient angoissé lorsqu'on lui coupe les ongles",
            ],
            [
                'questionNumber' => 18,
                'questionText' => "doi être emmitouflé ou enveloppé pour se détendre",
            ],
            [
                'questionNumber' => 19,
                'questionText' => "est dérangé par des differences de textures (par exemple, sur le gazon, sur le tapis, sur les couvertures)",
            ],
            [
                'questionNumber' => 20,
                'questionText' => " aime les activités rythmiques (par exemple, se balancer, se bercer, se promener en auto)",
            ],
            [
                'questionNumber' => 21,
                'questionText' => "résiste lorsqu'on lui penche la tête en arrière durant le bain",
            ],
            [
                'questionNumber' => 22,
                'questionText' => "pleure ou est irritable face aux mouvements de tous les jours",
            ],
            [
                'questionNumber' => 23,
                'questionText' => "a besoin de plus de support à la tête quand il se fait prendre comparativement aux autres bébés",
            ],
            [
                'questionNumber' => 24,
                'questionText' => "a de la difficulté á bien fermer la bouche lors de l'allaitement ou lorsqu'il boit à la bouteille",
            ],
            [
                'questionNumber' => 25,
                'questionText' => "aime faire des mouvements ou des sons avec sa bouche",
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

    }
}
