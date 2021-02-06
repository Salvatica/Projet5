<?php
namespace Blog\Models;



class CommentManager extends Model
{

    const GET_ALL_COMMENTS_SQL_REQUEST = "SELECT * FROM comments";
    const GET_ONE_COMMENT_BY_ID_SQL_REQUEST = "SELECT comment FROM comments WHERE id_comment = :id";

    private $userManager;
    private $articleManager;

    public function __construct(){
        $this->userManager = new UserManager();
        $this->articleManager = new ArticleManager();
    }

    /**
     * method that will search all lines of blog posts in the database and transforms them into a table of @see Comment.
     * @return array|Comment
     */
    public function getAllComments()

    {
        $req = $this->getBdd()->prepare(self::GET_ALL_COMMENTS_SQL_REQUEST);
        $req->execute();
        $lignesBDD = $req->fetchALL(\PDO::FETCH_ASSOC);
        $req->closeCursor();
        $comments = [];

        foreach ($lignesBDD as $ligneBDD)
        {


            $theComment = new Comment(
                $ligneBDD['id_comment'],
                $ligneBDD['content'],
                $ligneBDD['release_date'],
                $ligneBDD['id_user'],
                $this->articleManager->getOneArticle(intval($ligneBDD['id_article']))
            );


            $comments[] = $theComment;
        }


        return $comments;

    }
    public function getAllValidCommentsByArticleId($idArticle)
    {
        $req = $this->getBdd()->prepare( "SELECT * FROM comments WHERE id_article = :idArticle AND is_valid=true " );//On utilise une constante
        $req->bindParam( 'idArticle', $idArticle, \PDO::PARAM_INT );
        $req->execute();
        $lignesBDD = $req->fetchALL( \PDO::FETCH_ASSOC );
        $req->closeCursor();
        $comments = [];

        foreach ($lignesBDD as $ligneBDD) {
            $author = $this->userManager->getOneUser( $ligneBDD['id_user'] );

            $comments[] = new Comment(
                $ligneBDD['id_comment'],
                $ligneBDD['content'],
                $ligneBDD['release_date'],
                $ligneBDD['id_user'],
                $ligneBDD['id_article']
            );
        }
        return $comments;
    }

    Public function getAllInvalidComments()
    {
        $req = $this->getBdd()->prepare("SELECT * FROM comments WHERE is_valid=false");
        $req->execute();
        $lignesBDD = $req->fetchAll(\PDO::FETCH_ASSOC);
        $req->closeCursor();
        $comments = [];

        foreach ($lignesBDD as $ligneBDD) {
            $author = $this->userManager->getOneUser( $ligneBDD['id_user'] );

            $comments[] = new Comment(
                $ligneBDD['id_comment'],
                $ligneBDD['content'],
                $ligneBDD['release_date'],
                $ligneBDD['id_user'],
                $ligneBDD['id_article']
            );
        }
        return $comments;

    }
    /**
     * method that looks for a database line and returns an instance of class @see Comment
     * @param $id_comment
     * @return Comment
     */
    public function getOneComment($id_comment)

    {

        $req = $this->getBdd()->prepare('SELECT * FROM comments WHERE id_comment = :id');
        $req->bindParam('id', $id_comment, \PDO::PARAM_INT);
        $req->execute();
        $ligneBDD = $req->fetch();
        $req->closeCursor();
        if(empty($ligneBDD)){
            return null;
        }
        $author = $this->userManager->getOneUser($ligneBDD['id_user']);

        $theComment = new Comment($ligneBDD['id_comment'], $ligneBDD['content'], $ligneBDD['release_date'], $author, $ligneBDD['id_article']);
        return $theComment;
    }


    public function ajoutCommentBd($idArticle,$idUser,$content)
    {
        var_dump( $idArticle, $idUser, $content);
        $req = "INSERT INTO comments (id_article,id_user, content, release_date, is_valid) values (:id_article,:id_user, :content, NOW(), false)";
        $stmt = $this->getBdd()->prepare($req);
        $stmt->bindValue("id_article", $idArticle, \PDO::PARAM_INT);
        $stmt->bindValue("id_user", $idUser, \PDO::PARAM_INT);
        $stmt->bindValue("content", $content, \PDO::PARAM_STR);

        $resultat = $stmt->execute();
        $stmt->closeCursor();

    }

    public function suppressionCommentBd($comment)
    {
        $idComment = $comment->getIdComment();
        $req = "DELETE FROM comments WHERE id_comment = :id_comment";
        $stmt = $this->getBdd()->prepare($req);
        $stmt ->bindValue(":id_comment", $idComment, \PDO::PARAM_INT);
        $resultat = $stmt->execute();
        $stmt->closeCursor();

    }
    public function validationCommentBd($idComment)
    {
        $req = "UPDATE comments SET is_valid=true WHERE id_comment = :id";
        $stmt = $this->getBdd()->prepare($req);
        $stmt->bindValue(":id", $idComment, \PDO::PARAM_INT);
        $stmt->execute();
        $stmt->closeCursor();

    }

}