<?php 
 
namespace App\Controller; 

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController; 
use Symfony\Component\Routing\Annotation\Route; 
use App\Entity\Langues; 
use Symfony\Component\HttpFoundation\Response; 

class Page6Controller extends AbstractController 
 { 
	 /** 
 	  * @Route("/page6", name="page6")
	  */ 
	 public function index(): Response 
 	 { 
 		 $repository = $this->getDoctrine()->getRepository(Langues::class); 
		 $categories = $repository->findAll(); 
		 return $this->render('Page6.html.twig', ['categories' => $categories]);
 	 } 
 }