<?php

namespace App\Controller;

use App\Entity\User;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Component\Routing\Attribute\Route;

class HomeController extends AbstractController
{
    #[Route("/", name: "home")]
    function index(Request $request): Response {
        return $this->render('home/index.html.twig');
    }

    #[Route("/newuser", name: "new.user")]
    function newUser(Request $request, EntityManagerInterface $entityManager): Response {
        $date = new \DateTimeImmutable('now');
        $user = new User();
        $user->setEmail('john@doe.com')
            ->setFirstName('John')
            ->setLastName('Doe')
            ->setUsername('user')
            ->setPassword('password')
            ->setSlug('slug')
            ->setCreatedAt($date)
            ->setRoles([]);

        $entityManager->persist($user);
        $entityManager->flush();
        return $this->render('home/index.html.twig');
    }
}
