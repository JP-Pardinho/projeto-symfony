<?php

namespace App\Controller\Produtos;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class RemoverProdutoController extends AbstractController
{
    #[Route('/remover/produto', name: 'app_remover_produto')]
    public function index(): Response
    {
        return $this->render('remover_produto/index.html.twig', [
            'controller_name' => 'RemoverProdutoController',
        ]);
    }
}
