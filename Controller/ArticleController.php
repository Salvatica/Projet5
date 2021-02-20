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

            $this->commentManager->ajoutCommentBd($id, $this->session('user_id'), $this->post('comment'));
            $this->redirigerVers("articles/$id");
        }
        if ($theArticle === null) {
            $this->needView("view/404.view.php", []);
        } else {
            $this->needView("view/afficherArticle.view.php", ['theArticle' => $theArticle, 'comments' => $comments]);
        }

    }

    public function ajoutArticle()
    {
        $this->checkRoleAdmin();
        $this->needView("view/ajoutArticle.view.php", []);
    }

    public function ajoutArticleValidation()
    {
        $this->checkRoleAdmin();
        $this->checkCsrf();

        $this->articleManager->ajoutArticleBd($this->post('title'), $this->post('subtitle'), $this->post('content'), $this->session('user_id'));
        $this->redirigerVers("articles");

    }

    public function suppressionArticle($id)
    {
        $this->checkRoleAdmin();
        $this->checkCsrf();

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
        $this->checkCsrf();

        $theArticle = $this->articleManager->getOneArticle($id);
        $this->needView("view/modifierArticle.view.php", ['theArticle' => $theArticle]);

    }

    public function modificationArticleValidation()
    {
        $this->checkRoleAdmin();
        $this->checkCsrf();

        $this->articleManager->modificationArticleBd($this->post('id_article'), $this->post('title'), $this->post('subtitle'), $this->post('content'), $this->post('id_user'));
        $this->redirigerVers("articles");
    }


}
