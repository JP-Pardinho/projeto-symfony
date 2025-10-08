<?php

namespace App\Controller\Categoria;

use App\Repository\CategoriaRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class CadastrarCategoriaController extends AbstractController
{
    public function __construct(
        private CategoriaRepository $categoriaRepository
    ) {  
    }

    #[Route('/categorias/cadastrar', name: 'cadastrar_categoria_show', methods:'GET')]
    public function show(): Response
    {
        return $this->render('app/categoria/cadastrarCategoria.html.twig');
    }

    
}
