<?php


namespace Blog\Controller;

use Blog\Models\CommentManager;


class AdminCommentController extends AbstractController
{
    private $commentManager;

    public function __construct()
    {
        $this->commentManager = new CommentManager;


    }

    public function afficherComments()
    {
        $this->checkRoleAdmin();

        $comments = $this->commentManager->getAllInvalidComments();
        if ($comments === null) {
            $this->needView("view/404.view.php", []);
        } else {

            $this->needView('view/adminComments.view.php', ['comments' => $comments]);
        }

    }

    public function suppressionComment($id)
    {
        $this->checkRoleAdmin();
        $this->checkCsrf();

        $theComment = $this->commentManager->getOneComment($id);
        if (empty($theComment)) {
            $this->redirigerVers("admin/listeComments");
        }
        $this->commentManager->suppressionCommentBd($theComment);

        $this->redirigerVers("admin/listeComments");
    }

    public function validationComment($id)
    {
        $this->checkRoleAdmin();

        $this->commentManager->validationCommentBd($id);
        $this->redirigerVers("admin/listeComments");
    }
}
