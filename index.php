<?php
use Blog\Controller\ArticleController;
// on défini l'url
define("URL",str_replace("index.php","",(isset($_SERVER['HTTPS']) ? "https" : "http"). "://$_SERVER[HTTP_HOST]$_SERVER[PHP_SELF]"));




include "vendor/autoload.php";


/**
 remplacé par le controller (psr-4)

function my_autoloader($class) {

    $class = str_replace("Blog\\","", $class);
    $class = str_replace("\\","/", $class);

    require_once $class.".php";


}
spl_autoload_register('my_autoloader');
*/

$articleController = new ArticleController();
try {

    if (empty( $_GET['page'] ))
    {
        require "view/accueil.view.php";
    } else
        {
            $url = explode( "/", filter_var( $_GET['page'] ), FILTER_SANITIZE_URL ); // on fait exploser l'url et on sécurise avec "filter sanitize" ce qui permet de faire une route

            switch ($url[0])
                {
                    case "accueil" :
                        require "view/accueil.view.php";
                        break;

                    case "articles" :


                        if (empty( $url[1] )) {

                            $articleController->afficherArticles();
                        } else {
                            if(preg_match('/^[0-9]$/', $url[1]))
                            {
                                $articleController->afficherArticle( $url[1] );

                            }

                            elseif ($url[1] === "a")
                            {
                                $articleController->ajoutArticle();
                            }
                            elseif ($url[1] === "av")
                            {
                               $articleController->ajoutArticleValidation();
                            }

                        }
                        break;
                    case "connexion" :
                        require "view/connexion.view.php";
                        break;
                    case "contact" :
                        require "view/contact.view.php";
                        break;
                }
        }
}
catch(Exception $e)
{
    echo $e->getMessage();
}
?>