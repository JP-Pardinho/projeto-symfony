<?php

namespace App\Controller\Categoria;

use App\Entity\Categoria;
use App\Repository\CategoriaRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class EditarCategoriaController extends AbstractController
{
    public function __construct(
        private CategoriaRepository $categoriaRepository
    ) {
    }

    #[Route('/editar/categoria/{categoria}', name: 'editar_categoria_show', methods:['GET'])]
    public function show(Categoria $categoria): Response 
    {
        if (!$categoria) {
            $this->addFlash('danger', 'Não foi possível encontrar a categoria');
            return $this->redirectToRoute('listar_categorias');
        }
        
        return $this->render('categoria/editarCategoria.html.twig', ['categoria' => $categoria]);
    }

    #[Route('/editar/categoria/{categoria}', name: 'editar_categoria_salvar', methods:['POST'])]
    public function editar(Categoria $categoria, Request $request, CategoriaRepository $categoriaRepository): Response
    {   
        if (!$categoria){
            $this->addFlash('danger',"Não foi possível encontrar a categoria");
            return $this->redirectToRoute('listar_categorias');
        }

        $categoria->setNome($request->get('nome'));
        
        $categoriaRepository->salvar($categoria);

        return $this->redirectToRoute('listar_categorias');
    }
}
