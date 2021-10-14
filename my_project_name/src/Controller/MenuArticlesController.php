<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;

class MenuArticlesController extends AbstractController
{
    public function index(): Response
    {
        return $this->render('menuArticles_cms.html.twig');
    }
}
