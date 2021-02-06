<?php


namespace Blog\Models;

require_once "Model.php";
require_once "Comment.php";


class CommentAdmin extends Model
{

    const GET_ALL_COMMENTS_SQL_REQUEST = "SELECT * FROM comments";
    const GET_ONE_COMMENT_BY_ID_SQL_REQUEST = "SELECT comment FROM comments WHERE id_comment = :id";

    private $userManager;

    public function __construct()
    {
        $this->userManager = new UserManager();
    }

    /**
     * method that will search all lines of blog posts in the database and transforms them into a table of @return array|Comment
     * @see Comment.
     */
    public function getAllComments()

    {
        $req = $this->getBdd()->prepare( self::GET_ALL_COMMENTS_SQL_REQUEST );
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
}
