<?php


namespace Blog\Controller;

use Blog\Models\ArticleManager;


class AdminArticleController extends AbstractController
{
    private $articleManager;

    public function __construct()
    {
        $this->articleManager = new ArticleManager;

    }

    public function afficherArticles()
    {
        $this->checkRoleAdmin();

        $articles = $this->articleManager->getAllArticles();
        if (is_null($articles)) {
            $this->redirigerVers('articles/ajout');
        } else {
            require "view/adminArticles.view.php";
        }

    }
}