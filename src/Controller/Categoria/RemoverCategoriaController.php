<?php

namespace App\Controller\Categoria;

use App\Repository\CategoriaRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class RemoverCategoriaController extends AbstractController
{
    public function __construct(
        private CategoriaRepository $categoriaRepository
    ) {
    }

    #[Route('/categoria/remover', name: 'remover_categoria')]
    public function remover(Request $request): Response
    {
        $idCategoria = $request->request->get('id');

        $categoriaExistente = $this->categoriaRepository->findOneBy(['id' => $idCategoria]);

        if ($categoriaExistente) {
            $this->categoriaRepository->remover($categoriaExistente);
        } else {
            $this->addFlash('danger', "A categoria com o id \"{$idCategoria}\" não existe");
            return $this->redirect('cadastrar_categoria_show');
        }

        return $this->render('remover_categoria/index.html.twig', [
            'controller_name' => 'RemoverCategoriaController',
        ]);
    }
}
