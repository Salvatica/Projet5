<?php


namespace Blog\Models;


class articleAdmin

{
    private $ArticleManager;
    private $CommentManager;
    public function __construct()
    {
        $this->ArticleManager = new ArticleManager;
        $this->CommentManager = new CommentManager;

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
            require "view/listeArticles.view.php";
        }

    }
}