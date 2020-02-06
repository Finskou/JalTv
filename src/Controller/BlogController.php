<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Article;
use Symfony\Component\HttpFoundation\Request;

class BlogController extends AbstractController
{
    /**
     * @Route("/blog", name="blog")
     */
    public function index()
    {
        $repo=$this->getDoctrine()->getRepository(Article::class);

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
     * @Route("/blog/new", name="blog_create")
     */
    public function create(Request $request){
        return $this->render('blog/create.html.twig', [
            'title' => "Création d'un article"
        ]);

        if($request->request->count() > 0){
            $article = new Article();
            $article->setTitle($request->request->get('title'))->setContent($request->request->get('content'))->setImage($request->request->get('image'));
            return $article;
        }
    }


    /**
     * @Route("/blog/{id}", name="blog_show")
     */
    public function show($id){
        $repo = $this->getDoctrine()->getRepository(Article::class);

        $article=$repo->find($id);
        
        return $this->render('blog/show.html.twig', ['article' => $article ]);
    }



}
