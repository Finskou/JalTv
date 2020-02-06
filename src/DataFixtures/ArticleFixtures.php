<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use App\Entity\Article;

class ArticleFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        //afficher les articles 1 à 1
        for($i = 1; $i<=10 ; $i++){
            $article = new Article();
            $article->setTitle("Titre de l'article $i")
            ->setContent("Contenu de l'article n $i")
            ->setImage("https://via.placeholder.com/150")
            ->setCreatedAt(new \DateTime());

        $manager->persist($article);

        }

        $manager->flush();
    }
}
