<?php


namespace Blog\Controller;
use Blog\Models\ArticleManager;



class AdminArticleController
{
    private $articleManager;

    public function __construct()
    {
        $this->articleManager = new ArticleManager;


    }

    public function afficherArticles()
    {
        $articles = $this->articleManager->getAllArticles();
        if(is_null($articles))
        {
            require "view/404.view.php";
        }
        else
        {
            require "view/adminArticles.view.php";
        }

    }
}