<?php


namespace App\Controller;

use App\Entity\Article;
use App\Repository\EcommerceRepository;
use Symfony\Component\HttpFoudation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;



class ArticlesController extends AbstractController
{
	/**
	* @Route("/articles")
	*/

	public function index()
	{

	$em = $this->container->get('doctrine')->getManager();	

	$repo = $em->getRepository('App\Entity\Ecommerce');
	

	$articles = $repo->findAll();

	

     return $this->render('articles/index.html.twig', compact('articles'));
	}

	/**
	* @Route("/articles/{id}")
	*/

	public function show($id){
		
		$em = $this->container->get('doctrine')->getManager();	

	$repo = $em->getRepository('App\Entity\Ecommerce');
	

	$articles = $repo->find($id);


		return $this->render('articles/show.html.twig', compact('articles'));

	}

	/**
	* @Route("/articles/{id}/edit")
	*/

	public function edit($id){
		$em = $this->container->get('doctrine')->getManager();	

	$repo = $em->getRepository('App\Entity\Ecommerce');
	

	$articles = $repo->find($id);


	$form = $this->createFormBuilder($articles)
	->add('name', TextType::class)
	->add('price', NumberType::class)
	->add('description', TextareaType::class, ['attr' =>['rows'=> 10]])
	->add('Submit', SubmitType::class)
	->getForm();


		return $this->render('articles/edit.html.twig',
		[ 'articles' =>$articles, 'form' => $form->createView()
		]);

	}
}




