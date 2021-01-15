<?php

use Blog\Controller\HomeController;
use Blog\Controller\ArticleController;

// on défini l'url
define( "URL", str_replace( "index.php", "", (isset( $_SERVER['HTTPS'] ) ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[PHP_SELF]" ) );


include "vendor/autoload.php";


$page = filter_input( INPUT_GET, 'page' );

$articleController = new ArticleController();
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
    elseif (preg_match( "#articles/a$#", $page, $matches ))
    {
        $articleController->ajoutArticle();
    }
    elseif (preg_match( "#articles/s/(\d+)$#", $page, $matches ))
    {
        $articleController->suppressionArticle( $matches[1] );
    }
    elseif (preg_match( "#articles/m/(\d+)$#", $page, $matches ))
    {
        $articleController->modificationArticle( $matches[1] );
    }
    elseif (preg_match( "#articles/av$#", $page, $matches ))
    {
        $articleController->ajoutArticleValidation();
    }
    elseif(preg_match("#articles/mv$#",$page, $matches ))
    {
        $articleController->modificationArticleValidation();
    }
    else
        {
        require "view/404.view.php";
        //throw new Exception("page introuvable");
        }

} catch (Exception $e) {
    echo $e->getMessage();
}
