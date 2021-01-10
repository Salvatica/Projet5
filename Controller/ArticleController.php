<?php

namespace Blog\Controller;

use Blog\Models\ArticleManager;

class ArticleController
{
    private$articleManager;

    public function __construct()
    {
        $this->articleManager = new ArticleManager;

    }

    public function afficherArticles()
    {
        $articles = $this->articleManager->getAllArticles();

        require "view/listeArticles.view.php";
    }

    public function afficherArticle($id)
    {
        $theArticle = $this->articleManager->getOneArticle($id);

        require "view/afficherArticle.view.php";
    }

    public function ajoutArticle()
    {
        require "view/ajoutArticle.view.php";
    }
    public function ajoutArticleValidation()
    {

        $this->articleManager->ajoutArticleBd($_POST['title'],$_POST['subtitle'],$_POST['content']);
        header('location:'.URL."articles");

    }

}
?>