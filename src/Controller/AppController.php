<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class AppController extends AbstractController
{
    #[Route(path: '/app', name: 'app_app')]
    public function __invoke()
    {
        return $this->render('index.html.twig');
    }
}
