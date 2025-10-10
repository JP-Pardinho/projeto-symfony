<?php

namespace App\Controller\Usuario;

use App\Entity\Usuario;
use App\Repository\UsuarioRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class CadastrarUsuarioController extends AbstractController
{
    public function __construct(
        private UsuarioRepository $usuarioRepository
    ) {
    }

    #[Route('/usuario/cadastrar', name: 'cadastrar_usuario', methods: 'GET')]
    public function show(): Response
    {
        return $this->render('usuario/cadastrarUsuario.html.twig');
    }

    #[Route('/usuario/salvar', name: 'cadastrar_usuario_salvar', methods: 'POST')]
    public function salvar(Request $request): Response
    {
        $emailUsuario = $request->request->get('email');

        if (empty($emailUsuario) || strlen($emailUsuario) > 100) {
            $this->addFlash('danger', "O email é obrigatório, e o email tem que ter no máximo 100 caracteres!");
            return $this->redirectToRoute('cadastrar_usuario');
        }

        $usuarioExistente = $this->usuarioRepository->findBy(['email' => $emailUsuario]);
        if ($usuarioExistente) {
            $this->addFlash('danger', "O email '{$emailUsuario}' já está em uso!");
            return $this->redirectToRoute('cadastrar_usuario');
        }

        $usuario = new Usuario();
        $usuario->setEmail($emailUsuario);

        $this->usuarioRepository->salvar($usuario);
        
        return new Response();
    }
}
