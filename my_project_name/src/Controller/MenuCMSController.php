<?php

namespace App\Controller;

use App\Entity\Langues;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;

class MenuCMSController extends AbstractController
{
    public function index(): Response
    {
        $repository = $this->getDoctrine()->getRepository(Langues::class);
        $categories = $repository->findAll();

        return $this->render('menu_cms.html.twig', ['categories' => $categories]);
    }
}
