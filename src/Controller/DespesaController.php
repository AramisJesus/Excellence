<?php

namespace App\Controller;

use App\Entity\Despesa;
use App\Form\DespesaType;
use App\Repository\DespesaRepository;
use App\Repository\FornecedorRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/despesa')]
class DespesaController extends AbstractController
{
    #[Route('/', name: 'app_despesa_index', methods: ['GET'])]
    public function index(DespesaRepository $despesaRepository): Response
    {
        return $this->render('despesa/index.html.twig', [
            'despesas' => $despesaRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_despesa_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $despesa = new Despesa();
        $form = $this->createForm(DespesaType::class, $despesa);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($despesa);
            $entityManager->flush();

            return $this->redirectToRoute('app_despesa_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('despesa/new.html.twig', [
            'despesa' => $despesa,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_despesa_show', methods: ['GET'])]
    public function show(Despesa $despesa): Response
    {
        return $this->render('despesa/show.html.twig', [
            'despesa' => $despesa,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_despesa_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Despesa $despesa, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(DespesaType::class, $despesa);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_despesa_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('despesa/edit.html.twig', [
            'despesa' => $despesa,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_despesa_delete', methods: ['POST'])]
    public function delete(Request $request, Despesa $despesa, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$despesa->getId(), $request->request->get('_token'))) {
            $entityManager->remove($despesa);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_despesa_index', [], Response::HTTP_SEE_OTHER);
    }

   
}
