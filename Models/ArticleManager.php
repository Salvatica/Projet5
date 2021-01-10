<?php
namespace Blog\Models;

require_once "Model.php";
require_once "Article.php";




class ArticleManager extends Model
{
    const GET_ALL_ARTICLES_SQL_REQUEST = "SELECT * FROM articles";
    const GET_ONE_ARTICLE_BY_ID_SQL_REQUEST = "SELECT * FROM articles WHERE id_article = :id";


    /**
     * method that will search all lines of blog posts in the database and transforms them into a table of @see Article.
     * @return array|Article
     */
    public function getAllArticles()

    {
        $req = $this->getBdd()->prepare(self::GET_ALL_ARTICLES_SQL_REQUEST);//On utilise une constante
        $req->execute();
        $lignesBDD = $req->fetchALL(\PDO::FETCH_ASSOC);
        $req->closeCursor();
        $articles = [];


        foreach ($lignesBDD as $ligneBDD)
        {
            $articles[] = new Article(
                $ligneBDD['id_article'],
                $ligneBDD['title'],
                $ligneBDD['subtitle'],
                $ligneBDD['content'],
                $ligneBDD['release_date'],
                $ligneBDD['update_date']
            );
        }
        return $articles;

    }

    /**
     * method that looks for a database line and returns an instance of class @see Article
     * @param $id_article
     * @return Article
     */
    public function getOneArticle($id_article)

    {

        $req = $this->getBdd()->prepare('SELECT * FROM articles WHERE id_article = :id');
        $req->bindParam('id', $id_article, \PDO::PARAM_INT);
        $req->execute();
        $ligneBDD = $req->fetch();
        $req->closeCursor();
        $theArticle = new Article($ligneBDD['id_article'], $ligneBDD['title'], $ligneBDD['subtitle'], $ligneBDD['content'], $ligneBDD['release_date'], $ligneBDD['update_date']);
        return $theArticle;
    }


    public function ajoutArticleBd($title,$subtitle,$content)
    {
        $req = "INSERT INTO articles(title, subtitle, content,release_date, update_date) values (:title, :subtitle, :content, NOW(), NOW())";
        $stmt = $this->getBdd()->prepare($req);
        $stmt->bindValue("title", $title, \PDO::PARAM_STR);
        $stmt->bindValue("subtitle", $subtitle, \PDO::PARAM_STR);
        $stmt->bindValue("content", $content, \PDO::PARAM_STR);
        $resultat = $stmt->execute();
        $stmt->closeCursor();

    }
}
?>