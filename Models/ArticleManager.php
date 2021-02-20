<?php

namespace Blog\Models;


class ArticleManager extends Model
{
    const GET_ALL_ARTICLES_SQL_REQUEST = "SELECT * FROM articles ORDER BY release_date DESC";
    const GET_ONE_ARTICLE_BY_ID_SQL_REQUEST = "SELECT * FROM articles WHERE id_article = :id";

    private $userManager;


    public function __construct()
    {
        $this->userManager = new UserManager();

    }

    /**
     * method that will search all lines of blog posts in the database and transforms them into a table of @return array|Article
     * @see Article.
     */
    public function getAllArticles()

    {
        $req = $this->getBdd()->prepare(self::GET_ALL_ARTICLES_SQL_REQUEST);//On utilise une constante
        $req->execute();
        $lignesBDD = $req->fetchALL(\PDO::FETCH_ASSOC);
        $req->closeCursor();
        $articles = [];

        if (empty($lignesBDD)) {
            return null;

        }


        foreach ($lignesBDD as $ligneBDD) {
            $author = $this->userManager->getOneUser($ligneBDD['id_user']);

            $articles[] = new Article(
                $ligneBDD['id_article'],
                $ligneBDD['title'],
                $ligneBDD['subtitle'],
                $ligneBDD['content'],
                $ligneBDD['release_date'],
                $ligneBDD['update_date'],
                $author
            );
        }

        return $articles;

    }

    /**
     * method that looks for a database line and returns an instance of class @param $id_article
     * @return Article
     * @see Article
     */
    public function getOneArticle($id_article)

    {

        $req = $this->getBdd()->prepare('SELECT * FROM articles WHERE id_article = :id');
        $req->bindParam('id', $id_article, \PDO::PARAM_INT);
        $req->execute();
        $ligneBDD = $req->fetch();
        $req->closeCursor();
        if (empty($ligneBDD)) {
            return null;
        }

        $author = $this->userManager->getOneUser($ligneBDD['id_user']);


        $theArticle = new Article($ligneBDD['id_article'], $ligneBDD['title'], $ligneBDD['subtitle'], $ligneBDD['content'], $ligneBDD['release_date'], $ligneBDD['update_date'], $author);
        return $theArticle;
    }


    public function ajoutArticleBd($title, $subtitle, $content, $idUser)
    {
        $req = "INSERT INTO articles(title, subtitle, content,release_date, update_date, id_user) values (:title, :subtitle, :content, NOW(), NOW(), :id_user)";
        $stmt = $this->getBdd()->prepare($req);
        $stmt->bindValue("title", $title, \PDO::PARAM_STR);
        $stmt->bindValue("subtitle", $subtitle, \PDO::PARAM_STR);
        $stmt->bindValue("content", $content, \PDO::PARAM_STR);
        $stmt->bindValue("id_user", $idUser, \PDO::PARAM_INT);
        $resultat = $stmt->execute();
        $stmt->closeCursor();

    }

    public function suppressionArticleBd($article)
    {
        $idArticle = $article->getIdArticle();
        $req = "DELETE FROM articles WHERE id_article = :id_article";
        $stmt = $this->getBdd()->prepare($req);
        $stmt->bindValue(":id_article", $idArticle, \PDO::PARAM_INT);
        $resultat = $stmt->execute();
        $stmt->closeCursor();

    }

    public function modificationArticleBd($idArticle, $title, $subtitle, $content, $idUser)
    {
        $req = "UPDATE articles SET title = :title, subtitle = :subtitle, content = :content, update_date = NOW(), id_user = :id_user WHERE id_article = :id";
        $stmt = $this->getBdd()->prepare($req);
        $stmt->bindValue(":id", $idArticle, \PDO::PARAM_INT);
        $stmt->bindValue(":title", $title, \PDO::PARAM_STR);
        $stmt->bindValue(":subtitle", $subtitle, \PDO::PARAM_STR);
        $stmt->bindValue(":content", $content, \PDO::PARAM_STR);
        $stmt->bindValue("id_user", $idUser, \PDO::PARAM_INT);
        $resultat = $stmt->execute();
        $stmt->closeCursor();

    }

}
