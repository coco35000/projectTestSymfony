<?php 
 
namespace App\Controller; 

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController; 
use Symfony\Component\Routing\Annotation\Route; 
use App\Entity\Langues; 
use Symfony\Component\HttpFoundation\Response; 

class Page5Controller extends AbstractController 
 { 
	 /** 
 	  * @Route("/page5", name="page5")
	  */ 
	 public function index(): Response 
 	 { 
 		 $repository = $this->getDoctrine()->getRepository(Langues::class); 
		 $categories = $repository->findAll(); 
		 return $this->render('Page5.html.twig', ['categories' => $categories]);
 	 } 
 }