<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;

class MenuAddCMSController extends AbstractController
{
    public function index(): Response
    {
        return $this->render('menuAdd_cms.html.twig');
    }
}
