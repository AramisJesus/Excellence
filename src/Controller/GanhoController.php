<?php

namespace App\Controller;

use App\Entity\Ganho;
use App\Form\GanhoType;
use App\Repository\GanhoRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/ganho')]
class GanhoController extends AbstractController
{
    #[Route('/', name: 'app_ganho_index', methods: ['GET'])]
    public function index(GanhoRepository $ganhoRepository): Response
    {
        return $this->render('ganho/index.html.twig', [
            'ganhos' => $ganhoRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_ganho_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $ganho = new Ganho();
        $form = $this->createForm(GanhoType::class, $ganho);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($ganho);
            $entityManager->flush();

            return $this->redirectToRoute('app_ganho_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('ganho/new.html.twig', [
            'ganho' => $ganho,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_ganho_show', methods: ['GET'])]
    public function show(Ganho $ganho): Response
    {
        return $this->render('ganho/show.html.twig', [
            'ganho' => $ganho,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_ganho_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Ganho $ganho, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(GanhoType::class, $ganho);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_ganho_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('ganho/edit.html.twig', [
            'ganho' => $ganho,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_ganho_delete', methods: ['POST'])]
    public function delete(Request $request, Ganho $ganho, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$ganho->getId(), $request->request->get('_token'))) {
            $entityManager->remove($ganho);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_ganho_index', [], Response::HTTP_SEE_OTHER);
    }
}
