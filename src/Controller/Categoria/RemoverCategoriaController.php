<?php

namespace App\Controller\Categoria;

use App\Entity\Categoria;
use App\Repository\CategoriaRepository;
use App\Repository\ProdutoRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;


final class RemoverCategoriaController extends AbstractController
{
    public function __construct(
        private CategoriaRepository $categoriaRepository,
        private ProdutoRepository $produtoRepository
    ) {
    }

    #[Route('/remover/categoria/{categoria}', name: 'remover_categoria', methods:['GET'])]
    public function remover(?Categoria $categoria, Request $request, CategoriaRepository $categoriaRepository, ProdutoRepository $produtoRepository): Response
    {
        if (!$categoria){
            $this->addFlash('danger','Não foi possível encontrar a categoria');
            return $this->redirectToRoute('listar_categorias');
        }

        $produtosVinculados = $produtoRepository->count(['categoriaId' => $categoria->getId('id')]);

        if ($produtosVinculados > 0) {
            $this->addFlash('danger', 'Não é possível remover essa categoria, pois ela está vinculada a um ou mais produtos!');
            return $this->redirectToRoute('listar_categorias');
        }

        $categoriaRepository->remover($categoria);

        return $this->redirectToRoute('listar_categorias');
    }
}
