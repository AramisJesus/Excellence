<?php

namespace App\Controller;

use App\Entity\Fornecedor;
use App\Form\FornecedorType;
use App\Repository\FornecedorRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/fornecedor')]
class FornecedorController extends AbstractController
{
    #[Route('/', name: 'app_fornecedor_index', methods: ['GET'])]
    public function index(FornecedorRepository $fornecedorRepository): Response
    {
        return $this->render('fornecedor/index.html.twig', [
            'fornecedors' => $fornecedorRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_fornecedor_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $fornecedor = new Fornecedor();
        $form = $this->createForm(FornecedorType::class, $fornecedor);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($fornecedor);
            $entityManager->flush();

            return $this->redirectToRoute('app_fornecedor_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('fornecedor/new.html.twig', [
            'fornecedor' => $fornecedor,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_fornecedor_show', methods: ['GET'])]
    public function show(Fornecedor $fornecedor): Response
    {
        return $this->render('fornecedor/show.html.twig', [
            'fornecedor' => $fornecedor,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_fornecedor_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Fornecedor $fornecedor, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(FornecedorType::class, $fornecedor);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_fornecedor_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('fornecedor/edit.html.twig', [
            'fornecedor' => $fornecedor,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_fornecedor_delete', methods: ['POST'])]
    public function delete(Request $request, Fornecedor $fornecedor, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$fornecedor->getId(), $request->request->get('_token'))) {
            $entityManager->remove($fornecedor);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_fornecedor_index', [], Response::HTTP_SEE_OTHER);
    }
}
