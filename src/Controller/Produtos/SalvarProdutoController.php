<?php

namespace App\Controller\Produtos;

use App\Entity\Produto;
use App\Repository\ProdutoRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class SalvarProdutoController extends AbstractController
{
    public function __construct(
        private ProdutoRepository $produtoRepository
    ) {        
    }

    #[Route('/produto/cadastrar', name: 'cadastrar_produto_show', methods:'GET')]
    public function show(): Response
    {
        return $this->render('produto/cadastrarProduto.html.twig');
    }
        
    #[Route('/produto/cadastrar', name: 'cadastrar_produto_salvar', methods:'POST')]
    public function salvar(Request $request): Response
    {
        $nomeProduto = $request->request->get('nome');
        if (strlen($nomeProduto) > 50) {
            $this->addFlash('danger', 'Nome deve ter no máximo 50 caracteres!');
            return $this->redirect('cadastar_categoria_show');
        }

        $produtoExistente = $this->produtoRepository->findOneBy(['nome' => $nomeProduto]);
        if ($produtoExistente) {
            $produtoExistente->setNome($nomeProduto);
            
            $this->produtoRepository->salvar($produtoExistente);

            return $this->redirectToRoute('cadastrar_produto_show');
        }

        $produto = new Produto();
        $produto->setNome($nomeProduto);

        $this->produtoRepository->salvar($produto);

        return new Response();
    }
}
