<?php

namespace App\Controller\Categoria;

use App\Entity\Categoria;
use App\Repository\CategoriaRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class SalvarCategoriaController extends AbstractController
{
    public function __construct(
        private CategoriaRepository $categoriaRepository
    ) {
    }

    #[Route('/cadastrar/categoria', name: 'cadastrar_categoria_show', methods:'GET')]
    public function show(): Response
    {
        return $this->render('categoria/cadastrarCategoria.html.twig');
    }

    #[Route('categoria/cadastrar', name:'cadastrar_categoria_salvar', methods:'POST')]
    public function salvar(Request $request): Response
    {
        $nomeCategoria = $request->request->get('nome');
        if (strlen($nomeCategoria) > 50) {
            $this->addFlash('danger', 'Nome deve ter no máximo 50 caracteres!');
            return $this->redirect('cadastrar_categoria_show');
        }

        $categoriaExistente = $this->categoriaRepository->findOneBy(['nome' => $nomeCategoria]);
        if ($categoriaExistente) {
            $categoriaExistente->setNome($nomeCategoria);

            $this->categoriaRepository->salvar($categoriaExistente);

            return $this->redirectToRoute('cadastrar_categoria_show');
        }

        $categoria = new Categoria();
        $categoria->setNome($nomeCategoria);

        $this->categoriaRepository->salvar($categoria);

        return $this->redirectToRoute('listar_categorias');
    }
}
