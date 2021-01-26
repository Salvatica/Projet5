<?php
namespace Blog\Models;



class CommentManager extends Model
{

    const GET_ALL_COMMENTS_SQL_REQUEST = "SELECT * FROM comments";
    const GET_ONE_COMMENT_BY_ID_SQL_REQUEST = "SELECT content FROM comments WHERE id_comment = :id";

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
        $req = $this->getBdd()->prepare(self::GET_ALL_COMMENTS_SQL_REQUEST);//On utilise une constante
        $req->execute();
        $lignesBDD = $req->fetchALL(\PDO::FETCH_ASSOC);
        $req->closeCursor();
        $comments = [];

        foreach ($lignesBDD as $ligneBDD)
        {
            //$author = $this->userManager->getOneUser($ligneBDD['id_user']);

            $theComment = new Comment(
                $ligneBDD['id_comment'],
                $ligneBDD['content'],
                $ligneBDD['date'],
                $ligneBDD['id_user'],
                $this->articleManager->getOneArticle(intval($ligneBDD['id_article']))
            );


            $comments[] = $theComment;
        }


        return $comments;

    }
    public function getAllCommentsByArticleId($idArticle)
    {
        $req = $this->getBdd()->prepare( "SELECT * FROM comments WHERE id_article = :idArticle" );//On utilise une constante
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
                $ligneBDD['date'],
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

        $req = $this->getBdd()->prepare('SELECT content FROM comments WHERE id_comment = :id');
        $req->bindParam('idComment', $id_comment, \PDO::PARAM_INT);
        $req->execute();
        $ligneBDD = $req->fetch();
        $req->closeCursor();
        if(empty($ligneBDD)){
            return null;
        }
        $author = $this->userManager->getOneUser($ligneBDD['id_user']);

        $theComment = new Comment($ligneBDD['idComment'], $ligneBDD['content'], $author,$ligneBDD['date'], $ligneBDD['idArticle']);
        return $theComment;
    }


    public function ajoutCommentBd($idArticle,$idUser,$content)
    {
        $req = "INSERT INTO comments(id_article,id_user, content) values (:idArticle,:idUser, :content)";
        $stmt = $this->getBdd()->prepare($req);
        $stmt->bindValue("idUser", $idUser, \PDO::PARAM_INT);
        $stmt->bindValue("content", $content, \PDO::PARAM_STR);
        $stmt->bindValue("idArticle", $idArticle, \PDO::PARAM_INT);
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
    public function modificationCommentBd ($idComment, $content)
    {
        $req = "UPDATE comments SET content = :content WHERE id_comment = :id";
        $stmt = $this->getBdd()->prepare($req);
        $stmt->bindValue(":id", $idComment, \PDO::PARAM_INT);
        $stmt->bindValue(":content", $content,\PDO::PARAM_STR);
        var_dump($req);
        $resultat = $stmt->execute();
        $stmt->closeCursor();

    }

}