<?php 
 
namespace App\Controller; 

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController; 
use Symfony\Component\Routing\Annotation\Route; 
use App\Entity\Langues; 
use Symfony\Component\HttpFoundation\Response; 

class Page4Controller extends AbstractController 
 { 
	 /** 
 	  * @Route("/page4", name="page4")
	  */ 
	 public function index(): Response 
 	 { 
 		 $repository = $this->getDoctrine()->getRepository(Langues::class); 
		 $categories = $repository->findAll(); 
		 return $this->render('Page4.html.twig', ['categories' => $categories]); 
 	 } 
 }