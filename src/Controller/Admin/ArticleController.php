<?php

namespace App\Controller\Admin;

use Symfony\Component\Routing\Attribute\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;

class ArticleController extends AbstractController
{
    #[Route('/article', 'article_index')]
    public function index(): Response
    {
        return $this->render('Admin/article/index.html.twig');
    }
}
