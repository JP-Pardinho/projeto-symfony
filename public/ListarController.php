<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class ListarController extends AbstractController
{
    #[Route('/listar', name: 'app_listar')]
    public function index(): Response
    {
        return $this->render('listar/index.html.twig', [
            'controller_name' => 'ListarController',
        ]);
    }
}
