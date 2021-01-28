<?php

use Blog\Controller\HomeController;
use Blog\Controller\ArticleController;
use Blog\Controller\CommentController;
use Blog\Controller\AdminArticleController;

// on défini l'url
define( "URL", str_replace( "index.php", "", (isset( $_SERVER['HTTPS'] ) ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[PHP_SELF]" ) );


include "vendor/autoload.php";


$page = filter_input( INPUT_GET, 'page' );

$commentController = new CommentController();

$articleController = new ArticleController();

$adminArticleController = new AdminArticleController();
try {

    if (is_null( $page ) || $page === "accueil")
    {
        (new HomeController())->accueil();
    }
    elseif ($page === "articles")
    {
        $articleController->afficherArticles();
    }
    elseif (preg_match( "#articles/(\d+)$#", $page, $matches ))
    {
        $articleController->afficherArticle( $matches[1] );
    }
    elseif (preg_match( "#articles/ajout$#", $page, $matches ))
    {
        $articleController->ajoutArticle();
    }
    elseif (preg_match( "#articles/suppression/(\d+)$#", $page, $matches ))
    {
        $articleController->suppressionArticle( $matches[1] );
    }
    elseif (preg_match( "#articles/modification/(\d+)$#", $page, $matches ))
    {
        $articleController->modificationArticle( $matches[1] );
    }
    elseif (preg_match( "#articles/ajoutvalidation$#", $page, $matches ))
    {
        $articleController->ajoutArticleValidation();
    }
    elseif(preg_match("#articles/modificationValidation$#",$page, $matches ))
    {
        $articleController->modificationArticleValidation();
    }
    elseif ($page === "connexion")
    {
        require "view/connexion.view.php";
    }
    elseif ($page === "register")
    {
        require "view/register.view.php";
    }
    elseif ($page === "admin/listeComments")
    {
        $commentController->afficherComments();
    }
    elseif ($page === "admin/listeArticles")
    {
        $adminArticleController->afficherArticles();
    }
    else
        {
        require "view/404.view.php";
        //throw new Exception("page introuvable");
        }

} catch (Exception $e) {
    echo $e->getMessage();
}
