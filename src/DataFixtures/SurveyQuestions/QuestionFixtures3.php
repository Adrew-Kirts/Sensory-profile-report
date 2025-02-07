<?php

namespace App\DataFixtures\SurveyQuestions;

use App\Entity\Question;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class QuestionFixtures3 extends Fixture
{
    public function load(ObjectManager $manager)
    {
        // 3 Questionnaire Ado / adulte
        $questions = [
            [
                'questionNumber' => 1,
                'questionText' => "Je quitte ou je me déplace vers un autre rayon lorsqu'il y a une odeur forte dans un magasin (p. ex., des produits de bain, des bougies, des parfums).",
            ],
            [
                'questionNumber' => 2,
                'questionText' => "J'ajoute des épices à ma nourriture",
            ],
            [
                'questionNumber' => 3,
                'questionText' => "Je ne sens pas les odeurs  que les autre personnes disent sentir",
            ],
            [
                'questionNumber' => 4,
                'questionText' => "J'aime être près de personnes qui portent du parfum ou de l'eau de Cologne",
            ],
            [
                'questionNumber' => 5,
                'questionText' => "Je ne mange que de la nourriture qui m'est familière",
            ],
            [
                'questionNumber' => 6,
                'questionText' => "De nombreux aliments me semblent fades (c,-à-d., la nourriture n'a pas beaucoup de saqveur ou n'a pas de goût)",
            ],
            [
                'questionNumber' => 7,
                'questionText' => "Je n'aime pas les bonbons à la menthe ou les friandises qui ont goût fort (p. ex., les friandises à la cannelle ou les friandises sures)",
            ],
            [
                'questionNumber' => 8,
                'questionText' => "Je m'approche des fleurs pour les sentir lorsque je les vois",
            ],
            [
                'questionNumber' => 9,
                'questionText' => "J'ai peur des hauteurs",
            ],
            [
                'questionNumber' => 10,
                'questionText' => "J'aime la sensation de mouvement (p. ex., danser, courir)",
            ],
            [
                'questionNumber' => 11,
                'questionText' => "J'évite les ascenseurs et/ou les escaliers roulants parce que je n'aime pas le mouvement",
            ],
            [
                'questionNumber' => 12,
                'questionText' => "JJe trébuche ou je me cogne contre des objets",
            ],
            [
                'questionNumber' => 13,
                'questionText' => "Je n'aime pas le mouvement qu'implique un voyage en voiture",
            ],
            [
                'questionNumber' => 14,
                'questionText' => "Je choisis de pratiquer des activités physisiques",
            ],
            [
                'questionNumber' => 15,
                'questionText' => "Mon équilibre est instable lorsque je monte ou descends des escaliers (p. ex., je trébuche, je perds mon équilibre ou je dois tenir la rampe",
            ],
            [
                'questionNumber' => 16,
                'questionText' => "J'ai des étourdissements facilement (p. ex., après m'être penché, m'être levé trop rapidement,)",
            ],
            [
                'questionNumber' => 17,
                'questionText' => "J'aime aller à des endroits où les lumières sont fortes et les couleurs sont vives.",
            ],
            [
                'questionNumber' => 18,
                'questionText' => "Je garde les rideaux fermés durant la journée quand je suis à la maison",
            ],
            [
                'questionNumber' => 19,
                'questionText' => "J'aime porter des vêtements de colorés",
            ],
            [
                'questionNumber' => 20,
                'questionText' => "Je deviens frustré lorsque j'essaie de trouver quelque chose dans un tiroir encombré ou une chambre en désordre",
            ],
            [
                'questionNumber' => 21,
                'questionText' => "Je ne remarque pas les pancartes indiquant les rues, les édifices ou les salles lorsque je me rends à un nouvel qendroit",
            ],
            [
                'questionNumber' => 22,
                'questionText' => "Je suis dérangé par les images visuelles qui sont instables ou qui bougent rapidement au cinéma ou à la télévision",
            ],
            [
                'questionNumber' => 23,
                'questionText' => "Je ne remarque pas lorsqu'une personne entre dans la pièce",
            ],
            [
                'questionNumber' => 24,
                'questionText' => "Je choisis de magasiner dans les petits magasins car je suis incorfortable dans les grands magasins",
            ],
            [
                'questionNumber' => 25,
                'questionText' => "Je suis dérangé quand je vois beaucoup de mouvement autour de moi (p. ex., dans un centre commercial, une parade, un carnaval)",
            ],
            [
                'questionNumber' => 26,
                'questionText' => "Je limite les distractions quand je travaille (p. ex., je ferme la porte, j'éteins la télévision)",
            ],
            [
                'questionNumber' => 27,
                'questionText' => "Je n'aime pas qu'on me frotte le dos",
            ],
            [
                'questionNumber' => 28,
                'questionText' => "J'aime la sensation de me faire couper les cheveux",
            ],
            [
                'questionNumber' => 29,
                'questionText' => "J'évite les activités qui salissent mes mains ou je porte des gants lors de ces activités",
            ],
            [
                'questionNumber' => 30,
                'questionText' => "Je touche les autres lorsque je parle (p. ex., je place la main sur l'épaule ou je leur serre la main)",
            ],
            [
                'questionNumber' => 31,
                'questionText' => "Je suis dérangé par la sensation dans ma bouche lorsque je me réveille le matin",
            ],
            [
                'questionNumber' => 32,
                'questionText' => "J'aime me promener nu-pieds",
            ],
            [
                'questionNumber' => 33,
                'questionText' => "Je ne suis pas à l'aise à porter vertaines étoffes (p. ex., la laine, la soie, le velours côtelé, les étiquettes de vêtements)",
            ],
            [
                'questionNumber' => 34,
                'questionText' => "Je n'aime pas certaines textures d'aliments (p. ex., la pelure des pêches, la compote de pomme, le fromage cottage, le beure d'arachide croquant)",
            ],
            [
                'questionNumber' => 35,
                'questionText' => "Je m'éloigne lorque les autres sont trop près de moi",
            ],
            [
                'questionNumber' => 36,
                'questionText' => "Je ne remarque pas lorsque mon visage ou mes mains sont sales",
            ],
            [
                'questionNumber' => 37,
                'questionText' => "J'ai des égratinures ou des bleus sur la peau sans savoir comment je les ai eus",
            ],
            [
                'questionNumber' => 38,
                'questionText' => "J'évite les files d'attente ou d'être debout près d'autres personnes car je n'aime pas être trop près des autres",
            ],
            [
                'questionNumber' => 39,
                'questionText' => "Je ne remarque pas lorsque quelqu'un me touche le bras ou le dos",
            ],
            [
                'questionNumber' => 40,
                'questionText' => "J'effectue deux tâches ou plus à la fois",
            ],
            [
                'questionNumber' => 41,
                'questionText' => "Je mets plus de temps que les autres à me réveiller le matin",
            ],
            [
                'questionNumber' => 42,
                'questionText' => "Je fais des choses à l'improviste (c.-à-d., sans préparation à l'avance)",
            ],
            [
                'questionNumber' => 43,
                'questionText' => "Je trouve le temps de m'éloigner de ma vie surchargée pour consacrer du temps à être seul",
            ],
            [
                'questionNumber' => 44,
                'questionText' => "Je semble être plus lent que les autres quand j'essaie d'effectuer une activité ou une tâche",
            ],
            [
                'questionNumber' => 45,
                'questionText' => "Je ne comprends pas les blagues aussi vite que les autres",
            ],
            [
                'questionNumber' => 46,
                'questionText' => "Je me tiens éloigné des foules",
            ],
            [
                'questionNumber' => 47,
                'questionText' => "Je trouve des activités ou je présente devant les autres (p. ex., musique, théâtre, dart oratoire et répondre aux questions en classe)",
            ],
            [
                'questionNumber' => 48,
                'questionText' => "Il m'est difficile de me concentrer, pour une longue période de temps, en classe ou lors d'une réunion",
            ],
            [
                'questionNumber' => 49,
                'questionText' => "J'évite les situations où des choses inattendues peuvent se produire (p. ex., aller dans un endroit inconnu ou être avec des personnes inconnues)",
            ],
            [
                'questionNumber' => 50,
                'questionText' => "Je fredonne, sifflz, chante ou fais d'autres bruits",
            ],
            [
                'questionNumber' => 51,
                'questionText' => "Je sursaute facilement quand j'entends des bruits soudains ou intense (p. ex., un aspirateur, un chien qui aboie, un téléphone qui sonne)",
            ],
            [
                'questionNumber' => 52,
                'questionText' => "J'ai de la difficulté à suivre ce que disent les gens quand ils parlent vite ou à propos de sujets qui ne me sonts pas familiers",
            ],
            [
                'questionNumber' => 53,
                'questionText' => "Je quitte la pièce quand d'autres regardent la télévision ou je leur demande de baisser le volume",
            ],
            [
                'questionNumber' => 54,
                'questionText' => "Je suis distrait lorsqu'il y a beaucoup de bruit autour de moi",
            ],
            [
                'questionNumber' => 55,
                'questionText' => "Je ne remarque pas lorsqu'on appelle mon nom",
            ],
            [
                'questionNumber' => 56,
                'questionText' => "J'utilise des stratégies pour étouffer le bruit (p. ex., fermer la porte, couvrir mes oreilles, porter des bouchons d'oreilles)",
            ],
            [
                'questionNumber' => 57,
                'questionText' => "J'évite les lieux bruyants",
            ],
            [
                'questionNumber' => 58,
                'questionText' => "J'aime assister aux événements où il y a beaucoup de musique",
            ],
            [
                'questionNumber' => 59,
                'questionText' => "Je dois demander aux gens de répéter des choses",
            ],
            [
                'questionNumber' => 60,
                'questionText' => "Je trouve difficile de travailler avec des bruits de fond (p. ex., un ventilateur, une radio)",
            ]
        ];

        foreach ($questions as $q) {
            $question = new Question();
            $question->setQuestionNumber($q['questionNumber']);
            $question->setQuestionText($q['questionText']);
            $question->setAnswerOption(5);
            $question->setAgeCategory(3);
            $manager->persist($question);
        }
        $manager->flush();
    }
}