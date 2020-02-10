<?php

namespace App\Controller;

use App\Entity\Task;
use App\Entity\Article;
use App\Form\Type\TaskType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use App\Repository\ArticleRepository;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\HttpFoundation\File\Exception\FileException;


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
    public function create(Request $request){

        $task = new Task();
        $form = $this->createForm(TaskType::class, $task);
       

        if ($form->isSubmitted() && $form->isValid()) {
            $task = $form->getData();
            $task->persist($task);
            $task->flush();
            //enregistrer l'entité avec doctrine
            // $entityManager = $this->getDoctrine()->getManager();
            // $entityManager->persist($task);
            // $entityManager->flush();

            return $this->redirectToRoute('blog_create');
        }

        return $this->render('blog/create.html.twig', [
            'form' => $form->createView()
            ]);
    }


    /**
     * @Route("/blog/{id}", name="blog_show")
     */
    public function show(Article $article){
        return $this->render('blog/show.html.twig', ['article' => $article ]);
    }



}
