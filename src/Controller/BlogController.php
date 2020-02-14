<?php

namespace App\Controller;

use App\Entity\Article;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use App\Repository\ArticleRepository;



class BlogController extends AbstractController
{
    /**
     * @Route("/blog", name="blog")
     */
    public function index(ArticleRepository $repo)
    {
        $articles = $repo->findAll();

        return $this->render('blog/index.html.twig', [
            'controller_name' => 'BlogController', 'articles' => $articles
        ]);
    }

    /**
     * @Route("/", name="home")
     */
    public function home(){
        return $this->render('blog/home.html.twig', [
            'title' => 'Titre à Définir pour Jaalal', 
        ]);
    }

    /**
     * @Route("/security/login", name="login")
     */
    public function login() {
        return $this->render('security/login.html.twig');
    }

    /**
     * @Route("/blog/new", name="blog_create")
     */
    public function create(Request $request){

        $art = new Article();
        $form = $this->createFormBuilder($art)
                    ->add('title', TextType::class)
                    ->add('content', TextareaType::class)
                    ->add('image', FileType::class)
                    ->add('save', SubmitType::class)
                    ->getForm();
       

        if ($form->isSubmitted() && $form->isValid()) {
            $art = $form->getData();
            $art->persist($art);
            $art->flush();
            //enregistrer l'entité avec doctrine
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($art);
            $entityManager->flush();

            return $this->redirectToRoute('blog_create');
        }

        return $this->render('blog/create.html.twig', [
            'form' => $form->createView()
            ]);
    }


    /**
     * @Route("/blog/{id}", name="blog_show")
     */
    public function show($id){
        $article = $this->getDoctrine()
                        ->getRepository(Article::class)
                        ->find($id);
        if (!$article) {
            throw $this->createNotFoundException(
                'No article found for id ' .$id
            );
        }
        
        return $this->render('blog/show.html.twig', ['article' => $article ]);
    }



}
