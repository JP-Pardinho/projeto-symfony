<?php

namespace App\Controller\Produto;

use App\Entity\Categoria;
use App\Entity\Produto;
use App\Repository\CategoriaRepository;
use App\Repository\ProdutoRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class ListarProdutoController extends AbstractController
{
    public function __construct(
        private ProdutoRepository $produtoRepository,
        private CategoriaRepository $categoriaRepository
    ) {
    }


    #[Route('/produtos', name: 'listar_produtos', methods:'GET')]
    public function show(): Response
    {
        $produtos = $this->produtoRepository->findAll();
        $categorias = $this->categoriaRepository->findAll();

        $categoriaMap = [];
        
        foreach ($categorias as $categoria) {
            $categoriaMap[$categoria->getId()] = $categoria->getNome();
        }


        return $this->render('produto/produtos.html.twig', [
            'produtos' => $produtos,
            'categoriaMap' => $categoriaMap
        ]);
    }
}
