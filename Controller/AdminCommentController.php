<?php


namespace Blog\Controller;
use Blog\Models\CommentManager;


class AdminCommentController
{
    private $commentManager;

    public function __construct()
    {
        $this->commentManager = new CommentManager;


    }

    public function afficherComments()
        {
        $comments = $this->commentManager->getAllInvalidComments();
        if (is_null($comments))
        {
            require "view/404.view.php";
        }
        else
            {
            require "view/adminComments.view.php";
            }

    }
    public function suppressionComment($id)
    {

        $theComment = $this->commentManager->getOneComment($id);
        if (empty( $theComment )) {
            header( 'location: '. URL ."admin/listeComments" );
        }
        $this->commentManager->suppressionCommentBd($theComment);
        header( 'location: '. URL ."admin/listeComments" );
    }

    public function validationComment($id)
    {
        $this->commentManager->validationCommentBd($id);
        header( 'location: '. URL ."admin/listeComments" );
    }
}
