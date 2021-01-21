<?php

namespace Blog\Controller;

use Blog\Models\Article;
use Blog\Models\ArticleManager;
use Blog\Models\CommentManager;
use Blog\Models\Comment;

class CommentController
{
    private $commentManager;

    public function __construct()
    {
        $this->commentManager = new CommentManager;
    }

/*    public function afficherComments()
    {
        $comments = $this->CommentManager->getAllComments();
        if (is_null( $comments )) {
            require "view/404.view.php";
        } else {
            require "view/listeComments.view.php";
        }
    }*/
/*        public function afficherComment($id)
        {
            $theComment = $this->CommentManager->getOneComment($id);
            if(is_null($theComment))
            {
                require "view/404.view.php";
            }
            else
            {
                require "view/listeComments.view.php";
            }
        }*/

        public function ajoutComment()
        {
            require "view/ajoutComment.view.php";
        }

       public function supressionComment($id)
       {
           $theContent = $this->ContentController->getOneContent( $id );
           if (empty( $theContent )) {
               header( 'location: ' . URL . "articles" );
           }
       }

       public function modificationComment($id)
       {
           $theContent = $this->ContentManager->getOneContent($id);
           require "view/modifierComment.view.php";
       }
}

