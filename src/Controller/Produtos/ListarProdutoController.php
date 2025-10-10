<?php

namespace App\Controller\Produtos;

use App\Repository\ProdutoRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class ListarProdutoController extends AbstractController
{
    public function __construct(
        private ProdutoRepository $produtoRepository
    ) {
    }


    #[Route('/produtos', name: 'listar_produtos', methods:'GET')]
    public function show(): Response
    {
        return $this->render('produto/produtos.html.twig', [
            'produtos' => $this->produtoRepository->findAll(),
        ]);
    }
}
