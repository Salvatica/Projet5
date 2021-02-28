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
        if ($articles === null && $this->isAdmin()) {
            $this->redirigerVers('admin/listeArticles');
        }
        if ($articles === null) {

            $this->needView("view/404.view.php", []);
        } else {
            $this->needView("view/listeArticles.view.php", ['articles' => $articles]);
        }

    }

    public function afficherArticle($id)
    {
        $comments = $this->commentManager->getAllValidCommentsByArticleId($id);
        $theArticle = $this->articleManager->getOneArticle($id);

        if ($this->isPostMethod()) {
            $this->redirectIfNotConnected();

            if(!empty($this->post('comment')) && $this->post('comment') !== null){
                $this->commentManager->ajoutCommentBd($id, $this->session('user_id'), $this->post('comment'));
            }

            $this->redirigerVers("articles/$id");
        }
        if ($theArticle === null) {
            $this->needView("view/404.view.php", []);
        } else {
            $this->needView("view/afficherArticle.view.php", ['theArticle' => $theArticle, 'comments' => $comments]);
        }

    }



}
