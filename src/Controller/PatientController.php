<?php

namespace App\Controller;

use App\Entity\Patient;
use App\Form\PatientType;
use App\Repository\PatientRepository;
use DateTime;
use DateTimeImmutable;
use Doctrine\ORM\EntityManagerInterface;
use http\Message\Body;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use function Symfony\Component\Clock\now;

class PatientController extends AbstractController
{

//    #[Route ('/patient/new', name: 'patient.new')]
//    public function create(Request $request, Body $body)
//    {
//
//    }

    #[Route('/patient/{slug}/edit', name: 'patient.edit')]
    public function edit(Patient $patient, Request $request, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(PatientType::class, $patient);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($patient);
            $entityManager->flush();

            $this->addFlash('success', 'Patient updated successfully');
        }

        return $this->render('patient/edit.html.twig', [
            'patient' => $patient,
            'form' => $form
        ]);
    }


    #[Route('/patients/search/{keyword}', name: 'patient.search')]
    public function search(PatientRepository $repository, string $keyword): Response
    {
        $patients = $repository->findByKeyword($keyword);
        return $this->render('patient/index.html.twig', [
            'patients' => $patients,
        ]);
    }


    #[Route('/patients', name: 'patient.index')]
    public function index(PatientRepository $repository): Response
    {
        $patients = $repository->findAll();
        return $this->render('patient/index.html.twig', [
            'patients' => $patients,
            'controller_name' => 'PatientController',
        ]);
    }

    #[Route('/patient/{slug}', name: 'patient.show', requirements: ['slug' => '[a-zA-Z0-9-]+'])]
    public function show(PatientRepository $repository, string $slug): Response
    {
        $patient = $repository->findOneBy(['slug' => $slug]);
        return $this->render('patient/show.html.twig', [
            'patient' => $patient,
        ]);
    }

    #[Route('/patients/create', name: 'patient.create')]
    public function create(PatientRepository $repository, Request $request, EntityManagerInterface $entityManager): Response
    {
        $patient = new Patient();
        $form = $this->createForm(PatientType::class, $patient);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($patient);
            $entityManager->flush();
            $this->addFlash('success', 'La fiche patient a bien été créée');
            return $this->redirectToRoute('patient.index');
            }
        return $this->render('patient/create.html.twig', [
            'form' => $form
        ]);

//        $patient->setSlug('DH489FG57')
//            ->setFirstName('Eva')
//            ->setLastName('Green')
//            ->setBirthdate(new \DateTime('2006-04-05'))
//            ->setCreatedAt(new \DateTimeImmutable());
//
//        $entityManager->persist($patient);
//        $entityManager->flush();
//
//        $patients = $repository->findAll();
//
//        return $this->render('patient/index.html.twig', [
//           'patients' => $patients
//        ]);

    }
}
