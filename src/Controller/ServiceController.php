<?php

namespace App\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class ServiceController extends AbstractController
{
    #[Route('/service', name: 'app_service')]
    public function index(): Response
    {
        return $this->render('service/index.html.twig', [
            'controller_name' => 'ServiceController',
        ]);
    }

    #[Route('/serv/{name}', name: 'app_service')]
    public function test(String $name): Response
    {
        return $this->render('service/showService.html.twig', [
            'name' => $name,
        ]);

    }

    #[Route('/show/{name}', name: 'app_show')]
    public function showService(String $name): Response{
        return new Response(
            '<html><body>Service name: ' . htmlspecialchars($name) . '</body></html>'
        );
    }

    #[Route('/go_to_index', name: 'goToIndex')]
    public function goToIndex(): Response
    {
        return $this->redirectToRoute('test');
    }
}
