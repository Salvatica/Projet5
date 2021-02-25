<?php


namespace Blog\Controller;

use Blog\Models\ArticleManager;


class AdminArticleController extends AbstractController
{
    private $articleManager;

    public function __construct()
    {
        $this->articleManager = new ArticleManager;

    }

    public function afficherArticles()
    {
        $this->checkRoleAdmin();

        $articles = $this->articleManager->getAllArticles();
        if ($articles === null) {
            $this->redirigerVers('articles/ajout');
        } else {

            $this->needView("view/adminArticles.view.php", ['articles' => $articles]);
        }

    }
}