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
use Symfony\Component\Security\Http\Attribute\IsGranted;

#[IsGranted('ROLE_USER')]
class PatientController extends AbstractController
{
    #[Route('/patients', name: 'patient.index')]
    public function index(PatientRepository $repository): Response
    {
        $patients = $repository->findBy(['user' => $this->getUser()]);
        return $this->render('patient/index.html.twig', [
            'patients' => $patients,
            'controller_name' => 'PatientController',
        ]);
    }

    #[Route('/patient/{slug}-{id}', name: 'patient.show', requirements: ['slug' => '[a-zA-Z0-9-]+', 'id' => '[0-9]+'])]
    public function show(Patient $patient): Response
    {
        $this->denyAccessUnlessOwner($patient);
        return $this->render('patient/show.html.twig', [
            'patient' => $patient,
        ]);
    }

    #[Route('/patients/create', name: 'patient.create')]
    public function create(Request $request, EntityManagerInterface $entityManager): Response
    {
        $patient = new Patient();
        $patient->setUser($this->getUser());
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

    #[Route('/patient/{slug}-{id}/edit', name: 'patient.edit', requirements: ['slug' => '[a-zA-Z0-9-]+', 'id' => '[0-9]+'], methods: ['GET', 'POST'])]
    public function edit(Patient $patient, Request $request, EntityManagerInterface $entityManager): Response
    {
        $this->denyAccessUnlessOwner($patient);
        $form = $this->createForm(PatientType::class, $patient);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($patient);
            $entityManager->flush();

            $this->addFlash('success', 'Patient mis à jour');
            return $this->redirectToRoute('patient.index');
        }

        return $this->render('patient/edit.html.twig', [
            'patient' => $patient,
            'form' => $form
        ]);
    }

    #[Route('/patient/{slug}-{id}/delete', name: 'patient.delete', requirements: ['slug' => '[a-zA-Z0-9-]+', 'id' => '[0-9]+'], methods: ['DELETE', 'POST'])]
    public function delete(Patient $patient, EntityManagerInterface $entityManager): Response
    {
        $this->denyAccessUnlessOwner($patient);
        $entityManager->remove($patient);
        $entityManager->flush();
        $this->addFlash('success', 'Patient supprimé avec succès');
        return $this->redirectToRoute('patient.index');
    }

    #[Route('/patients/search', name: 'patient.search')]
    public function search(PatientRepository $repository, Request $request): Response
    {
        $keyword = trim((string) $request->query->get('keyword', ''));
        if ($keyword === '') {
            return $this->redirectToRoute('home');
        }
        $patients = $repository->findByKeywordForUser($keyword, $this->getUser());
        if (count($patients) === 0) {
            $this->addFlash('error', 'Pas de patient avec ce nom');
            return $this->redirectToRoute('home');
        }
        return $this->render('patient/index.html.twig', [
            'patients' => $patients,
        ]);
    }

    private function denyAccessUnlessOwner(Patient $patient): void
    {
        if ($patient->getUser() !== $this->getUser()) {
            throw $this->createAccessDeniedException();
        }
    }
}
