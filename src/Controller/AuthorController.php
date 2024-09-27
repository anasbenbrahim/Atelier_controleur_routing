<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class AuthorController extends AbstractController
{
    #[Route('/author', name: 'app_author')]
    public function index(): Response
    {
        return $this->render('author/index.html.twig', [
            'controller_name' => 'AuthorController',
        ]);
    }

    #[Route('/showauther/{name}', name: 'app_showAuthor')]
    public function showAuthor(String $name): Response
    {
        return $this->render('author/show.html.twig', [
            'name' => $name,
        ]);
    }

    
    #[Route('/authorsList', name: 'app_authorList')]
    public function listAuthors(): Response
    {
    $authors = [
        [
            'id' => 1,
            'picture' => '/images/victor.jpeg',
            'username' => 'Victor Hugo',
            'email' => 'victor.hugo@gmail.com',
            'nb_books' => 100,
        ],
        [
            'id' => 2,
            'picture' => '/images/william.jpeg',
            'username' => 'William Shakespeare',
            'email' => 'william.shakespeare@gmail.com',
            'nb_books' => 200,
        ],
        [
            'id' => 3,
            'picture' => '/images/taha.jpeg',
            'username' => 'Taha Hussein',
            'email' => 'taha.hussein@gmail.com',
            'nb_books' => 300,
        ],
    ];

    return $this->render('author/list.html.twig', [
        'authors' => $authors,
    ]);
    }


    #[Route("/author/{id}", name: "author_details")]
    public function authorDetails(int $id): Response
    {
        
        $authors = [
            1 => ['id' => 1, 'username' => 'Victor Hugo', 'picture' => '/images/victor.jpeg', 'email' => 'victor.hugo@gmail.com', 'nb_books' => 100],
            2 => ['id' => 2, 'username' => 'William Shakespeare', 'picture' => '/images/william.jpeg', 'email' => 'william.shakespeare@gmail.com', 'nb_books' => 200],
            3 => ['id' => 3, 'username' => 'Taha Hussein', 'picture' => '/images/taha.jpeg', 'email' => 'taha.hussein@gmail.com', 'nb_books' => 300],
        ];
    
        
        $author = $authors[$id] ?? null;
    
        
        return $this->render('author/showAuthor.html.twig', [
            'author' => $author,
        ]);
    }
    
 

}
