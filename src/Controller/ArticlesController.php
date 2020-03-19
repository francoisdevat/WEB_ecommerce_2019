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
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;
use Doctrine\ORM\EntityManagerInterface;
use App\Entity\Ecommerce;

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
	* @Route("/articles/{id}/edit", methods={"GET", "PATCH"})
	*/

	public function edit($id, Request $request, EntityManagerInterface $em)
	{
		$em = $this->container->get('doctrine')->getManager();	

	$repo = $em->getRepository('App\Entity\Ecommerce');
	

	$articles = $repo->find($id);
	$form = $this->createFormBuilder($articles, ['method' =>'PATCH'])
	->add('name', TextType::class)
	->add('price', NumberType::class)
	->add('description', TextareaType::class, ['attr' =>['rows'=> 10]])
	->add('Submit', SubmitType::class)
	->getForm();


	$form->handleRequest($request);

	if ( $form->isSubmitted() && $form->isValid()){
		$em->flush();
		$this->addFlash('success', 'Article modifié avec succès :)');

		return $this->redirect('/articles');
	}
	
		return $this->render('articles/edit.html.twig',[
		 'articles' =>$articles,
		  'form' => $form->createView()
		]);

	}


/**
	* @Route("/create", methods={"GET", "POST"})
	*/
	public function create(Request $request, EntityManagerInterface $em )
	{

	$articles = new Ecommerce;

	$form = $this->createFormBuilder($articles)
	->add('name', TextType::class)
	->add('price', NumberType::class)
	->add('description', TextareaType::class, ['attr' =>['rows'=> 10]])
	
	->add('image_file')
	->add('Submit', SubmitType::class)
	->getForm();


	$form->handleRequest($request);

	if ( $form->isSubmitted() && $form->isValid()){
		$em->persist($articles);
		$em->flush();

		return $this->redirect('/articles');
	}
	
		return $this->render('articles/create.html.twig',[
		  'form' => $form->createView()
		]);
	}

	/**
	* @Route("/articles/{id}/achat")
	*/

	public function achat($id){
		
		$em = $this->container->get('doctrine')->getManager();	

	$repo = $em->getRepository('App\Entity\Ecommerce');
	$articles = $repo->find($id);


		return $this->render('articles/achat.html.twig', compact('articles'));

	}




	



}




