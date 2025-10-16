<?php

namespace App\Controller\Produto;

use App\Entity\Categoria;
use App\Entity\Produto;
use App\Repository\CategoriaRepository;
use App\Repository\ProdutoRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class EditarProdutoController extends AbstractController
{
    public function __construct(
        private ProdutoRepository $produtoRepository,
        private CategoriaRepository $categoriaRepository
    ) {
    }

    #[Route('/editar/produto/{produto}', name: 'editar_produto_show', methods:['GET'])]
    public function show(Produto $produto): Response
    {
        if (!$produto) {
            $this->addFlash('danger', 'Não foi possível encontrar o produto');
            return $this->redirectToRoute('listar_produtos');
        }

        return $this->render('produto/editarProduto.html.twig', ['produto' => $produto, 'categorias' => $this->categoriaRepository->findAll()]);
    }

        #[Route('/editar/produto/{produto}', name: 'editar_produto_salvar', methods:['POST'])]
        public function editar(Produto $produto, Request $request): Response
        {
            
            if (!$produto) {
                $this->addFlash('danger', 'Não foi possível editar produto');
                return $this->redirectToRoute('listar_produtos');
            }

            $produto->setNome($request->get('nome'));
            $produto->setCategoriaId($request->request->get('categoria_id'));

            $this->produtoRepository->salvar($produto);

            return $this->redirectToRoute('listar_produtos');
        }

    #[Route('/produto/{produto}/adicionar', name: 'adicionar_produto', methods:['POST'])]
    public function adicionar(Produto $produto, Request $request): Response
    {
        if (!$produto) {
            $this->addFlash('danger', 'Não foi possível editar produto');
            return $this->redirectToRoute('listar_produtos');
        }

        $quantidadeAtual = $produto->getQuantidadeDisponivel();
        $produto->setQuantidadeDisponivel($quantidadeAtual + 1);

        $this->produtoRepository->salvar($produto);

        return $this->redirectToRoute('listar_produtos');
    }

    #[Route('/produto/{produto}/vender', name: 'vender_produto', methods:['POST'])]
    public function vender(Produto $produto, Request $request): Response
    {
        if (!$produto) {
            $this->addFlash('danger', 'Não foi possível editar produto');
            return $this->redirectToRoute('listar_produtos');
        }

        $quantidadeAtual = $produto->getQuantidadeDisponivel();
        
        if ($quantidadeAtual > 0) {
            $produto->setQuantidadeDisponivel($quantidadeAtual - 1);
            $this->produtoRepository->salvar($produto);
        } else {
            $this->addFlash('danger', 'Não é possível vender um produto sem estoque');
        }

        return $this->redirectToRoute('listar_produtos');
    }
}
