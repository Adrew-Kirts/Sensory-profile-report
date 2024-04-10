<?php

namespace App\Controller;

use App\Entity\Patient;
use App\Form\PatientType;
use App\Repository\PatientRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class PatientController extends AbstractController
{
    #[Route('/patients', name: 'patient.index')]
    public function index(PatientRepository $repository): Response
    {
        $patients = $repository->findAll();
        return $this->render('patient/index.html.twig', [
            'patients' => $patients,
            'controller_name' => 'PatientController',
        ]);
    }

    #[Route('/patient/{slug}-{id}', name: 'patient.show', requirements: ['slug' => '[a-zA-Z0-9-]+', 'id' => '[0-9]+'])]
    public function show(Patient $patient): Response
    {
        return $this->render('patient/show.html.twig', [
            'patient' => $patient,
        ]);
    }

    #[Route('/patients/create', name: 'patient.create')]
    public function create(Request $request, EntityManagerInterface $entityManager): Response
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
    }

    //Passing patient entity param to let sf *magically* find patient
    #[Route('/patient/{slug}-{id}/edit', name: 'patient.edit', requirements: ['slug' => '[a-zA-Z0-9-]+', 'id' => '[0-9]+'], methods: ['GET', 'POST'])]
    public function edit(Patient $patient, Request $request, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(PatientType::class, $patient);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($patient);
            $entityManager->flush();

            $this->addFlash('success', 'Patient mis à jour');
        }

        return $this->render('patient/edit.html.twig', [
            'patient' => $patient,
            'form' => $form
        ]);
    }

    //Using slug and id params to find patient
    #[Route('/patient/{slug}-{id}/delete', name: 'patient.delete', requirements: ['slug' => '[a-zA-Z0-9-]+', 'id' => '[0-9]+'], methods: ['DELETE'])]
    public function delete(string $slug, int $id, PatientRepository $repository, EntityManagerInterface $entityManager): Response
    {
        if ($patient = $repository->findOneBy(['slug' => $slug, 'id' =>$id]))
        {
            $entityManager->remove($patient);
            $entityManager->flush();
            $this->addFlash('success', 'Patient supprimé avec succès');
        }
        return $this->redirectToRoute('patient.index');
    }

    #[Route('/patients/search', name: 'patient.search')]
    public function search(PatientRepository $repository, Request $request): Response
    {
        $keyword = $request->query->get('keyword');
        if ($patients = $repository->findByKeyword($keyword)){
            return $this->render('patient/index.html.twig', [
                'patients' => $patients,
            ]);
        }
        $this->addFlash('error', 'Pas de patient avec ce nom');
        return $this->render('home/index.html.twig');
    }
}