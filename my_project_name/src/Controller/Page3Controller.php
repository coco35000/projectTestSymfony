<?php 
 
namespace App\Controller; 

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController; 
use Symfony\Component\Routing\Annotation\Route; 
use App\Entity\Langues; 
use Symfony\Component\HttpFoundation\Response; 

class Page3Controller extends AbstractController 
 { 
	 /** 
 	  * @Route("/page3", name="page3")
	  */ 
	 public function index(): Response 
 	 { 
 		 $repository = $this->getDoctrine()->getRepository(Langues::class); 
		 $categories = $repository->findAll(); 
		 return $this->render('Page3.html.twig', ['categories' => $categories]); 
 	 } 
 }