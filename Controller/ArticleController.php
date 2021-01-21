<?php

namespace Blog\Controller;

use Blog\Models\Article;
use Blog\Models\ArticleManager;
use Blog\Models\CommentManager;

class ArticleController
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
        if(is_null($articles))
            {
                require "view/404.view.php";
            }
        else
            {
                require "view/listeArticles.view.php";
            }

    }

    public function afficherArticle($id)
    {
        $comments = $this->commentManager->getAllComments();
        $theArticle = $this->articleManager->getOneArticle($id);
        if($_POST) {
            // TODO replqce 1 by logged user
            $this->commentManager->ajoutCommentBd($id,1,$_POST["comment"]);
            header("location:".URL."articles/$id");
        }
        if(is_null($theArticle))
            {
                require "view/404.view.php";
            }

        else
            {
                require "view/afficherArticle.view.php";
            }

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

    public function suppressionArticle($id)
    {
        $theArticle = $this->articleManager->getOneArticle($id);
        if(empty($theArticle)){
            header('location: '. URL . "articles");
        }

        $this->articleManager->suppressionArticleBd($theArticle);
        header('location: '. URL . "articles");

    }

    public function modificationArticle($id)
{
    $theArticle = $this->articleManager->getOneArticle($id);
    require "view/modifierArticle.view.php";

}
    public function modificationArticleValidation()
    {
        $this->articleManager->modificationArticleBd($_POST['id_article'], $_POST['title'],$_POST['subtitle'],$_POST['content']);
        header('location:'. URL . "articles");
    }

}
?>