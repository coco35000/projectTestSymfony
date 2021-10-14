<?php

namespace App\Controller;

use App\Entity\Langues;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;

class IndexController extends AbstractController
{
    public function index(): Response
    {
        $repository = $this->getDoctrine()->getRepository(Langues::class);
        $categories = $repository->findAll();

        return $this->render('index.html.twig', ['categories' => $categories]);
    }
}
