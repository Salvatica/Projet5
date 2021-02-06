<?php

use Blog\Controller\HomeController;
use Blog\Controller\ArticleController;
use Blog\Controller\CommentController;
use Blog\Controller\AdminArticleController;
use Blog\Controller\AdminCommentController;
use Blog\Controller\SecurityController;

// on défini l'url
define( "URL", str_replace( "index.php", "", (isset( $_SERVER['HTTPS'] ) ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[PHP_SELF]" ) );


include "vendor/autoload.php";


$page = filter_input( INPUT_GET, 'page' );


$articleController = new ArticleController();

$adminArticleController = new AdminArticleController();

$adminCommentController = new AdminCommentController();

$securityController = new SecurityController();

try {

    if (is_null( $page ) || $page === "accueil")
    {
        (new HomeController())->accueil();
    }
    elseif ($page === "articles")
    {
        $articleController->afficherArticles();
    }
    elseif ($page === "admin/listeArticles")
    {
        $adminArticleController->afficherArticles();
    }
    elseif (preg_match( "#articles/(\d+)$#", $page, $matches ))
    {
        $articleController->afficherArticle( $matches[1] );
    }
    elseif (preg_match( "#articles/ajout$#", $page, $matches ))
    {
        $articleController->ajoutArticle();
    }
    elseif (preg_match( "#articles/ajoutvalidation$#", $page, $matches ))
    {
        $articleController->ajoutArticleValidation();
    }
    elseif (preg_match( "#articles/suppression/(\d+)$#", $page, $matches ))
    {
        $articleController->suppressionArticle( $matches[1] );
    }
    elseif (preg_match( "#articles/modification/(\d+)$#", $page, $matches ))
    {
        $articleController->modificationArticle( $matches[1] );
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
        $securityController->afficherRegisterForm();
    }
    elseif ($page === "login")
    {
        $securityController->afficherLoginForm();
    }

    elseif ($page === "admin/listeComments")
    {
        $adminCommentController->afficherComments();
    }
    elseif (preg_match( "#comments/validation/(\d+)$#", $page, $matches ))
    {
        $adminCommentController->validationComment($matches[1]);
    }

    elseif (preg_match( "#comments/suppression/(\d+)$#", $page, $matches ))
    {
        $adminCommentController->suppressionComment($matches[1]);
    }


    else
        {
        require "view/404.view.php";
        //throw new Exception("page introuvable");
        }

} catch (Exception $e) {
    echo $e->getMessage();
}
