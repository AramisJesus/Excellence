<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    #[Route('/home', name: 'app_home')]
    public function index(): Response
    {
        return $this->render('home/index.html.twig', [
            'controller_name' => 'HomeController',
        ]);
    }

    #[Route('/ganho', name: 'app_ganho')]
    public function GanhoHome(): Response
    {
        return $this->render('ganho/index.html.twig', [
            'controller_name' => 'HomeController',
        ]);
    }

    #[Route('/despesa', name: 'app_despesa')]
    public function DespesaHome(): Response
    {
        return $this->render('despesa/index.html.twig', [
            'controller_name' => 'HomeController',
        ]);
    }

    #[Route('/cliente', name: 'app_cliente')]
    public function clienteHome(): Response
    {
        return $this->render('cliente/index.html.twig', [
            'controller_name' => 'HomeController',
        ]);
    }

    #[Route('/fornecedor', name: 'app_fornecedor')]
    public function FornecedorHome(): Response
    {
        return $this->render('fornecedor/index.html.twig', [
            'controller_name' => 'HomeController',
        ]);
    }

    #[Route('/categoria', name: 'app_categoria')]
    public function CategoriaHome(): Response
    {
        return $this->render('categoria/index.html.twig', [
            'controller_name' => 'HomeController',
        ]);
    }
}
