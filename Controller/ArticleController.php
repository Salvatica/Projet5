<?php

namespace Blog\Controller;

use Blog\Models\ArticleManager;
use Blog\Models\CommentManager;

class ArticleController extends AbstractController
{
    private $articleManager;
    private $commentManager;

    public function __construct()
    {
        $this->articleManager = new ArticleManager;
        $this->commentManager = new CommentManager;

    }

    public function afficherArticles()
    {
        $articles = $this->articleManager->getAllArticles();
        if ($articles ===null) {
            require "view/404.view.php";
        } else {
            require "view/listeArticles.view.php";
        }

    }

    public function afficherArticle($id)
    {
        $comments = $this->commentManager->getAllValidCommentsByArticleId($id);
        $theArticle = $this->articleManager->getOneArticle($id);

        if ($_POST) {
            $this->redirectIfNotConnected();

            $this->commentManager->ajoutCommentBd($id, $_SESSION['user_id'], $_POST["comment"]);
            $this->redirigerVers("articles/$id");
        }
        if ($theArticle ===null) {
            require "view/404.view.php";
        } else {
            require "view/afficherArticle.view.php";
        }

    }

    public function ajoutArticle()
    {
        $this->checkRoleAdmin();
        require "view/ajoutArticle.view.php";
    }

    public function ajoutArticleValidation()
    {
        $this->checkRoleAdmin();

        $this->articleManager->ajoutArticleBd($_POST['title'], $_POST['subtitle'], $_POST['content'], $_SESSION['user_id']);
        $this->redirigerVers("articles");

    }

    public function suppressionArticle($id)
    {
        $this->checkRoleAdmin();


        $theArticle = $this->articleManager->getOneArticle($id);
        if (empty($theArticle)) {

            $this->redirigerVers("articles");
        }

        $this->articleManager->suppressionArticleBd($theArticle);

        $this->redirigerVers("articles");
    }

    public function modificationArticle($id)
    {
        $this->checkRoleAdmin();

        $theArticle = $this->articleManager->getOneArticle($id);
        require "view/modifierArticle.view.php";

    }

    public function modificationArticleValidation()
    {
        $this->checkRoleAdmin();

        $this->articleManager->modificationArticleBd($_POST['id_article'], $_POST['title'], $_POST['subtitle'], $_POST['content'], $_POST['id_user']);
        $this->redirigerVers("articles");
    }


}
