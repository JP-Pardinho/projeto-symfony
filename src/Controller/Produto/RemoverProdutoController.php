<?php

namespace App\Controller\Produto;

use App\Entity\Produto;
use App\Repository\ProdutoRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class RemoverProdutoController extends AbstractController
{
    public function __construct(
        private ProdutoRepository $produtoRepository
    ) {
    }

    #[Route('/remover/produto/{produto}', name: 'remover_produto')]
    public function remover(?Produto $produto, ProdutoRepository $produtoRepository): Response
    {
        if (!$produto) {
            $this->addFlash('danger', 'Não foi possível encontrar o produto');
            return $this->redirectToRoute('listar_produtos');
        }

        $produtoRepository->remover($produto);

        return $this->redirectToRoute('listar_produtos');
    }
}
