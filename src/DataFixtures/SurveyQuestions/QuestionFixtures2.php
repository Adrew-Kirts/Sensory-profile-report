<?php

namespace App\DataFixtures\SurveyQuestions;

use App\Entity\Question;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class QuestionFixtures2 extends Fixture
{
    public function load(ObjectManager $manager): void
    {

        //2 - Questionnaire enfant 3A - 14A11M
        $questions = [
            [
                'questionNumber' => 1,
                'questionText' => "réagit fortement aux bruits soudains  ou intenses (par exemple, sirènes, chien qui aboie, séchoir à cheveux)",
            ],
            [
                'questionNumber' => 2,
                'questionText' => "couvre ses oreilles avec ses mains pour se protéger du bruit",
            ],
            [
                'questionNumber' => 3,
                'questionText' => "a de la difficulté à accomplir des tâches lorsqu'il y a de la musique ou que la télévision est allumée",
            ],
            [
                'questionNumber' => 4,
                'questionText' => "est distrait dans un milieu bruyant",
            ],
            [
                'questionNumber' => 5,
                'questionText' => "ne peut pas travailler avec un bruit de fond (par exemple, ventilateur, réfrigérateur)",
            ],
            [
                'questionNumber' => 6,
                'questionText' => "fait la sourde oreille ou semble m'ignorer",
            ],
            [
                'questionNumber' => 7,
                'questionText' => "semble ne pas entendre lorsque je l'appelle par son prénom (alors que son ouïe est fonctionnelle)",
            ],
            [
                'questionNumber' => 8,
                'questionText' => "aime des bruits étranges ou fait du(des) bruit(s) par plaisir",
            ],
            [
                'questionNumber' => 9,
                'questionText' => "préfère jouer ou travailler dans l'obscurité",
            ],
            [
                'questionNumber' => 10,
                'questionText' => "préfère les vêtements aux couleurs et motifs vifs",
            ],
            [
                'questionNumber' => 11,
                'questionText' => "aime regarder les détails visuels des objets",
            ],
            [
                'questionNumber' => 12,
                'questionText' => "a besoin d'aide pour trouver des objets qui sont évidents pour d'autres",
            ],
            [
                'questionNumber' => 13,
                'questionText' => "est plus dérangé par des lumières fortes que d'autres enfants du même âge",
            ],
            [
                'questionNumber' => 14,
                'questionText' => 'regarde les gens se déplacer dans la pièce',
            ],
            [
                'questionNumber' => 15,
                'questionText' => 'est dérangé par les lumières fortes (par exemple, se cache de la lumière du soleil traversant la fenêtre de la voiture)',
            ],
            [
                'questionNumber' => 16,
                'questionText' => "exprime de l'angoisse lors des soins personnels (par exemple, se débat ou pleure lorsqu'on lui coupe les cheveux ou les ongles, qu'on lui lave le visage)",
            ],
            [
                'questionNumber' => 17,
                'questionText' => "devient irrité par ses souliers ou ses chaussettes",
            ],
            [
                'questionNumber' => 18,
                'questionText' => "réagit de façon émotionnelle ou agressive au toucher",
            ],
            [
                'questionNumber' => 19,
                'questionText' => "devient anxieux lorsqu'il est près des autres (par exemple, dans une file d'attente)",
            ],
            [
                'questionNumber' => 20,
                'questionText' => "frotte ou gratte une partie de son corps qui a été touchée",
            ],
            [
                'questionNumber' => 21,
                'questionText' => "touche les personnes ou les objets au point d'agacer les autres",
            ],
            [
                'questionNumber' => 22,
                'questionText' => "démontre un besoin de toucher des jouets, des surfaces ou des textures (par exemple, veut toucher à tout)",
            ],
            [
                'questionNumber' => 23,
                'questionText' => "semble peu conscient de la douleur",
            ],
            [
                'questionNumber' => 24,
                'questionText' => "semble peu conscient des changements de température",
            ],
            [
                'questionNumber' => 25,
                'questionText' => "touche les personnes et les objets plus fréquemment que d'autres enfants du même âge",
            ],
            [
                'questionNumber' => 26,
                'questionText' => "ne semble pas remarquer lorsque son visage ou ses mains sont sales",
            ],
            [
                'questionNumber' => 27,
                'questionText' => "recherche le mouvement au point que cela interfère avec les activités quotidiennes (par exemple, ne peut pas rester assis, gigote)",
            ],
            [
                'questionNumber' => 28,
                'questionText' => "se berce sur sa chaise, lorsque assis au sol ou en se tenant debout",
            ],
            [
                'questionNumber' => 29,
                'questionText' => "hésite à monter ou descendre des bordures de trottoir ou des escaliers (par exemple, est prudent, s'arrête avant de se déplacer)",
            ],
            [
                'questionNumber' => 30,
                'questionText' => "devient excité durant une tâche avec mouvement",
            ],
            [
                'questionNumber' => 31,
                'questionText' => "prend des risques en bougeant ou en grimpant, compromettant ainsi sa sécurité personnelle",
            ],
            [
                'questionNumber' => 32,
                'questionText' => "recherche des occasions de tomber, sans prêter attention à sa sécurité personnelle (par exemple, tombe intentionnellement)",
            ],
            [
                'questionNumber' => 33,
                'questionText' => "perd l'équilibre soudainement en marchant sur une surface inégale",
            ],
            [
                'questionNumber' => 34,
                'questionText' => "se heurte contre des objets, n'apercevant pas les obstacles ou les gens devant lui",
            ],
            [
                'questionNumber' => 35,
                'questionText' => "se déplace de façon figée avec raideur",
            ],
            [
                'questionNumber' => 36,
                'questionText' => "se fatigue facilement, surtout s'il est debout ou s'il maintient une position corporelle particulière",
            ],
            [
                'questionNumber' => 37,
                'questionText' => "semble avoir des muscles faibles",
            ],
            [
                'questionNumber' => 38,
                'questionText' => "s'appuie pour se supporter (par exemple, tient sa tête dans ses mains, s'accote contre un mur)",
            ],
            [
                'questionNumber' => 39,
                'questionText' => "s'agrippe aux objets, aux murs ou aux rampes plus que d'autres enfants du même âge",
            ],
            [
                'questionNumber' => 40,
                'questionText' => "marche lourdement, comme si ses pieds étaient pesants",
            ],
            [
                'questionNumber' => 41,
                'questionText' => "se colle aux meubles ou aux personnes",
            ],
            [
                'questionNumber' => 42,
                'questionText' => "a besoin de couvertures épaisses/lourdes pour dormir",
            ],
            [
                'questionNumber' => 43,
                'questionText' => "s'étouffe facilement avec certaines textures d'aliments ou ustensils dans la bouche",
            ],
            [
                'questionNumber' => 44,
                'questionText' => "évite certains goûts et odeurs de nourriture qui font partie de l'alimentation normale d'un enfant",
            ],
            [
                'questionNumber' => 45,
                'questionText' => "ne mange que des aliments d'un certain goût (par exemple, sucré, salé)",
            ],
            [
                'questionNumber' => 46,
                'questionText' => "se limite à certaines textures d'aliments",
            ],
            [
                'questionNumber' => 47,
                'questionText' => "est un mangeur sélectif, particulièrement en ce qui a trait à la texture des aliments",
            ],
            [
                'questionNumber' => 48,
                'questionText' => "sent des objets non comestibles",
            ],
            [
                'questionNumber' => 49,
                'questionText' => "démontre de fortes préférences pour certains goûts",
            ],
            [
                'questionNumber' => 50,
                'questionText' => "désire ardemment certains aliments, goûts ou odeurs",
            ],
            [
                'questionNumber' => 51,
                'questionText' => "^porte des objets à la bouche (par exemple, crayons, mains)",
            ],
            [
                'questionNumber' => 52,
                'questionText' => "mord sa langue ou ses lèvres plus que d'autres enfants du même âge",
            ],
            [
                'questionNumber' => 53,
                'questionText' => "semble prédisposé aux accidents",
            ],
            [
                'questionNumber' => 54,
                'questionText' => "se dépêche/ne s'applique pas à colorier, écrire ou dessiner",
            ],
            [
                'questionNumber' => 55,
                'questionText' => "prend des risques excessifs (par exemple, grimpe haut dans un arbe, saute des meubles hauts), compromettant ainsi sa sécurité personnelle",
            ],
            [
                'questionNumber' => 56,
                'questionText' => "semble plus actif que des enfants du même âge",
            ],
            [
                'questionNumber' => 57,
                'questionText' => "fait les choses de façon peu productive (par exemple, perd du temps, se déplace lentement)",
            ],
            [
                'questionNumber' => 58,
                'questionText' => "peut être têtu et peu coopératif",
            ],
            [
                'questionNumber' => 59,
                'questionText' => "fait des crises de colère",
            ],
            [
                'questionNumber' => 60,
                'questionText' => "semble prendre plaisir à tomber",
            ],
            [
                'questionNumber' => 61,
                'questionText' => "évite le contact visuel avec moi ou avec d'autres personnes",
            ],
            [
                'questionNumber' => 62,
                'questionText' => "semble avoir une faible estime de soi-même (par exemple, difficulté à s'aimer)",
            ],
            [
                'questionNumber' => 63,
                'questionText' => "a besoin d'encouragement pour effectuer une tâche difficile",
            ],
            [
                'questionNumber' => 64,
                'questionText' => "est sensible aux critiques",
            ],
            [
                'questionNumber' => 65,
                'questionText' => "a des peurs prévisibles et clairement identifiées",
            ],
            [
                'questionNumber' => 66,
                'questionText' => "semble avoir de la difficulté à s'aimer (pauvre estime de soi)",
            ],
            [
                'questionNumber' => 67,
                'questionText' => "est trop sérieux",
            ],
            [
                'questionNumber' => 68,
                'questionText' => "exprime ses émotions avec excès lorsqu'il est incapable d'accomplir une tâche",
            ],
            [
                'questionNumber' => 69,
                'questionText' => "a de la difficulté à interpréter le langage corporel ou les expressions faciales",
            ],
            [
                'questionNumber' => 70,
                'questionText' => "se frustre facilement",
            ],
            [
                'questionNumber' => 71,
                'questionText' => "a des peurs qui interfèrent avec les routines quotidiennes",
            ],
            [
                'questionNumber' => 72,
                'questionText' => "est bouleversé par des changements dans ses plans, routines ou attentes",
            ],
            [
                'questionNumber' => 73,
                'questionText' => "a besoin de plus de protection que les autres enfants du même âge (par exemple, est sans défense physiquement ou émotionnellement)",
            ],
            [
                'questionNumber' => 74,
                'questionText' => "a de la difficulté à participer ou à interagir en contexte de groupe par rapport aux autres enfants du même âge",
            ],
            [
                'questionNumber' => 75,
                'questionText' => "a de la difficulté à se faire des amis, à les garder",
            ],
            [
                'questionNumber' => 76,
                'questionText' => "manque de contact visuel avec moi durant les interactions de tous les jours",
            ],
            [
                'questionNumber' => 77,
                'questionText' => "a de la difficulté à être attentif",
            ],
            [
                'questionNumber' => 78,
                'questionText' => "détourne son regqrd de ses tâches pour regarder tout ce qui se passe dans la pièce",
            ],
            [
                'questionNumber' => 79,
                'questionText' => "ne semble pas conscient de ce qui se passe dans un environnement actif (par exemple, inconscient de l'activité)",
            ],
            [
                'questionNumber' => 80,
                'questionText' => "fixe intensément les objets",
            ],
            [
                'questionNumber' => 81,
                'questionText' => "fixe intensément les gens",
            ],
            [
                'questionNumber' => 82,
                'questionText' => "observe chaque personne qui se déplace dans la pièce",
            ],
            [
                'questionNumber' => 83,
                'questionText' => "passe d'une activité à une autre au point d'interférer avec ses activités",
            ],
            [
                'questionNumber' => 84,
                'questionText' => "se perd facilement",
            ],
            [
                'questionNumber' => 85,
                'questionText' => "a de la difficulté à trouver des objets dans un endroit encombré (par exemple, des souliers dans une chambre en désordre, un crayon dans un tiroir de 'bric-à-brac')",
            ],
            [
                'questionNumber' => 86,
                'questionText' => "ne semble pas remarquer lorsque les gens entrent dans la pièce",
            ]
        ];

        foreach ($questions as $q) {
            $question = new Question();
            $question->setQuestionNumber($q['questionNumber']);
            $question->setQuestionText($q['questionText']);
            $question->setAnswerOption(6);
            $question->setAgeCategory(2);
            $manager->persist($question);
        }
        $manager->flush();

    }
}
