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

            $this->redirigerVers("admin/listeArticles");
        }

        $this->articleManager->suppressionArticleBd($theArticle);

        $this->redirigerVers("admin/listeArticles");
    }

    public function modificationArticle($id)
    {
        $this->checkRoleAdmin();
        $theArticle = $this->articleManager->getOneArticle($id);
        $this->needView("view/modifierArticle.view.php", ['theArticle' => $theArticle]);
    }

    public function modificationArticleValidation()
    {
        $this->checkRoleAdmin();
        $this->checkCsrf();

        $this->articleManager->modificationArticleBd($this->post('id_article'), $this->post('title'), $this->post('subtitle'), $this->post('content'), $this->session('user_id'));
        $this->redirigerVers("articles");
    }

}