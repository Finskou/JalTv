<?php

namespace App\Controller;

use App\Entity\Task;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use App\Repository\ArticleRepository;
use App\Entity\Article;
use App\Form\Type\TaskType;

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
     * @Route("/blog/new", name="blog_create")
     */
    public function create(){

        $task = new Task();
        $task->setTitle('premier titre');
        $task->setContent('premier contenu');
        $task->setImage('première image');
        $task->setCreatedAt(new \Datetime());

        $form = $this->createForm(TaskType::class, $task);

        return $this->render('blog/create.html.twig', ['form' => $form->createView()]);
    }


    /**
     * @Route("/blog/{id}", name="blog_show")
     */
    public function show(Article $article){
        return $this->render('blog/show.html.twig', ['article' => $article ]);
    }



}
