<?php

namespace App\DataFixtures\SurveyQuestions;

use App\Entity\Question;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class QuestionFixtures1 extends Fixture
{
    public function load(ObjectManager $manager): void
    {

        //1 - Questionnaire jeune enfant 7-35M
        $questions = [
            [
                'questionNumber' => 1,
                'questionText' => "a besoin d'une routine pour demeurer bien et calme",
            ],
            [
                'questionNumber' => 2,
                'questionText' => "agit d'une façon qui interfère avec l'horaire et les plans de la famille",
            ],
            [
                'questionNumber' => 3,
                'questionText' => 'évite de jouer avec les autres enfants',
            ],
            [
                'questionNumber' => 4,
                'questionText' => "prend plus de temps à répondre aux questions ou actions que d'autres enfants du même âge",
            ],
            [
                'questionNumber' => 5,
                'questionText' => "se retire des situations",
            ],
            [
                'questionNumber' => 6,
                'questionText' => "a des habitudes de sommeil imprévisibles",
            ],
            [
                'questionNumber' => 7,
                'questionText' => "a des habitudes alimentaires imprévisibles",
            ],
            [
                'questionNumber' => 8,
                'questionText' => "se réveille facilement",
            ],
            [
                'questionNumber' => 9,
                'questionText' => "manque de contact visuel avec moi durant les interactions de tous les jours",
            ],
            [
                'questionNumber' => 10,
                'questionText' => "devient anxieux dans de nouvelles situations",
            ],
            [
                'questionNumber' => 11,
                'questionText' => "n'est attentif que si je parle fort",
            ],
            [
                'questionNumber' => 12,
                'questionText' => "n'est attentif que lorsque je le toucher (alors que son ouïe est fonctionnelle)",
            ],
            [
                'questionNumber' => 13,
                'questionText' => "sursaute facilement aux sons par rapport aux enfants du même âge (par exemple chien qui aboie, enfants qui crient)",
            ],
            [
                'questionNumber' => 14,
                'questionText' => 'est distrait dans un milieu bruyant',
            ],
            [
                'questionNumber' => 15,
                'questionText' => 'ignore les sons, incluant ma voix',
            ],
            [
                'questionNumber' => 16,
                'questionText' => "devient boulversé ou essaie de se retirer de milieux bruyants",
            ],
            [
                'questionNumber' => 17,
                'questionText' => "prend beaucoup de temps avant de répondre à l'appel de son nom",
            ],
            [
                'questionNumber' => 18,
                'questionText' => "aime regarder les objets qui bougent ou qui tournent (par exemple, ventilateurs de plafond, jouets avec des roues)",
            ],
            [
                'questionNumber' => 19,
                'questionText' => "aime regarder les objets brillants",
            ],
            [
                'questionNumber' => 20,
                'questionText' => "est attiré par les écrans de télévision ou d'ordinateur comportant des illustrations à mouvements rapides et à couleurs vives",
            ],
            [
                'questionNumber' => 21,
                'questionText' => "sursaute aux lumières fortes ou imprévisibles (par exemple,en se déplaçant de l'intérieur à l'extérieur)",
            ],
            [
                'questionNumber' => 22,
                'questionText' => "est dérangé par des lumières fortes (par exemple, se cache de la lumière du soleil traversant la fenêtre de la voiture)",
            ],
            [
                'questionNumber' => 23,
                'questionText' => "est plus dérangé par des lumières fortes que les autres enfants du même âge",
            ],
            [
                'questionNumber' => 24,
                'questionText' => "repousse les jouets aux couleurs vives",
            ],
            [
                'questionNumber' => 25,
                'questionText' => "ne se reconnaît pas dans le miroir",
            ],
            [
                'questionNumber' => 26,
                'questionText' => "devient angoissé lorsqu'on lui coupe les ongles",
            ],
            [
                'questionNumber' => 27,
                'questionText' => "résiste à être cajolé",
            ],
            [
                'questionNumber' => 28,
                'questionText' => "est dérangé lorsqu'il se déplace entre des endroits ayant des températures très différentes (par exemple, plus froid, plus chaud)",
            ],
            [
                'questionNumber' => 29,
                'questionText' => "évite d'être en contqct qvec des surfaces rugueuses, froides ou collants (par exemple, tapis, comptoirs) ",
            ],
            [
                'questionNumber' => 30,
                'questionText' => "se heurte contre des objets, n'apercevant pas les obstacles ou les gens devant lui",
            ],
            [
                'questionNumber' => 31,
                'questionText' => "tire sur ses vêtements ou résiste à mettre ses vêtements",
            ],
            [
                'questionNumber' => 32,
                'questionText' => "aime faire des éclaboussures dans le bain ou la piscine",
            ],
            [
                'questionNumber' => 33,
                'questionText' => "devient contrarié lorsque ses vêtements, ses mains ou son visage sont sales",
            ],
            [
                'questionNumber' => 34,
                'questionText' => "devient anxieux quand il marche ou rampe sur certaines surfces (par exemple, gazon, sable, tapis, carreaux de céramique)",
            ],
            [
                'questionNumber' => 35,
                'questionText' => "se retire suite à un toucher inattendu",
            ],
            [
                'questionNumber' => 36,
                'questionText' => "aime les activités physiques (par exemple, sauter sur place, être tenu haut dqns les airs)",
            ],
            [
                'questionNumber' => 37,
                'questionText' => "aime les activités rythmiques (par exemple, se balancer, se bercer, se promener en auto)",
            ],
            [
                'questionNumber' => 38,
                'questionText' => "prend des risques en bougeant ou en grimpant",
            ],
            [
                'questionNumber' => 39,
                'questionText' => "devient contrarié lorsqu'on le place sur le dos (par exemple, pour changer sa couche)",
            ],
            [
                'questionNumber' => 40,
                'questionText' => "semble prédisposé aux accidents ou semble maladroit",
            ],
            [
                'questionNumber' => 41,
                'questionText' => "devient irritable lorsqu'on le déplace (par exemple, lorsqu'on le promène, lorsqu'il est pris par une autre personne)",
            ],
            [
                'questionNumber' => 42,
                'questionText' => "montre une aversion claire pour presque tous les aliments",
            ],
            [
                'questionNumber' => 43,
                'questionText' => "bave",
            ],
            [
                'questionNumber' => 44,
                'questionText' => "préfère une certaine texture d'aliments (par exemple, moelleux, croquant)",
            ],
            [
                'questionNumber' => 45,
                'questionText' => "aime boire pour se calmer",
            ],
            [
                'questionNumber' => 46,
                'questionText' => "s'étouffe avec de la nourriture ou des liquides",
            ],
            [
                'questionNumber' => 47,
                'questionText' => "retient la nourriture dans ses joues avant d'avaler",
            ],
            [
                'questionNumber' => 48,
                'questionText' => "a de la difficulté à s'habituer aux aliments solides",
            ],
            [
                'questionNumber' => 49,
                'questionText' => "fait des crises de colère",
            ],
            [
                'questionNumber' => 50,
                'questionText' => "est 'collant'",
            ],
            [
                'questionNumber' => 51,
                'questionText' => "ne reste calme que lorsqu'il se fait prendre",
            ],
            [
                'questionNumber' => 52,
                'questionText' => "est difficile ou irritable",
            ],
            [
                'questionNumber' => 53,
                'questionText' => "est dérangé par les nouveaux milieux/environnements",
            ],
            [
                'questionNumber' => 54,
                'questionText' => "devient tellement boulversé dans les nouveaux milieux/environnements qu'il est difficile de le calmer",
            ],
        ];

        foreach ($questions as $q) {
            $question = new Question();
            $question->setQuestionNumber($q['questionNumber']);
            $question->setQuestionText($q['questionText']);
            $question->setAnswerOption(6);
            $question->setAgeCategory(1);
            $manager->persist($question);
        }
        $manager->flush();

    }
}
