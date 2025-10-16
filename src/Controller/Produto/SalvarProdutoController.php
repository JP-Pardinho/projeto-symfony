<?php

namespace App\Controller\Produto;

use App\Entity\Produto;
use App\Repository\CategoriaRepository;
use App\Repository\ProdutoRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class SalvarProdutoController extends AbstractController
{
    public function __construct(
        private ProdutoRepository $produtoRepository,
        private CategoriaRepository $categoriaRepository
    ) {        
    }

    #[Route('/produto/cadastrar', name: 'cadastrar_produto_show', methods:'GET')]
    public function show(): Response
    {
        return $this->render('produto/cadastrarProduto.html.twig', [
            'categorias' => $this->categoriaRepository->findAll()]);
    }
        
    #[Route('/produto/cadastrar/', name: 'cadastrar_produto_salvar', methods:'POST')]
    public function salvar(Request $request): Response
    {
        $nomeProduto = $request->request->get('nome');

        if (strlen($nomeProduto) > 50) {
            $this->addFlash('danger', 'Nome deve ter no máximo 50 caracteres!');
            return $this->redirect('cadastar_categoria_show');
        }

        $produtoExistente = $this->produtoRepository->findOneBy(['nome' => $nomeProduto]);
        if ($produtoExistente) {
            $this->addFlash('danger', 'Já existe um produto cadastrado com esse nome!');
            return $this->redirectToRoute('listar_produtos');
        }

        $produto = new Produto();
        $produto->setNome($nomeProduto);
        $produto->setDescricao($request->request->get('descricao'));
        $produto->setCategoriaId($request->request->get('categoria_id'));
        $produto->setDataCadastro(new \DateTime());
        $produto->setQuantidadeInicial($request->request->get('quantidade'));
        $produto->setQuantidadeDisponivel($request->request->get('quantidade'));
        $produto->setValor($request->request->get('valor'));
        $produto->setUrl($request->request->get('url'));


        $this->produtoRepository->salvar($produto);

        return $this->redirectToRoute('listar_produtos');
    }
}
