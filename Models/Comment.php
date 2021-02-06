<?php
namespace Blog\Models;

use DateTime;

class Comment
{
    /**
     * @var int
     */
    private $idComment;
    /**
     * @var string
     */
    private $content;
    /**
     * @var dateTime
     */
    private $releaseDate;
    /**
     * @var User
     */
    private $author;
    /**
     * @var Article
     */
    private $article;
    /**
     * @var boolean
     */
    private $isValid;



    public function __construct($idComment,$content, $releaseDate, $user,$article)
    {
        $this->idComment=$idComment;
        $this->content = $content;
        $this->releaseDate = new \DateTime($releaseDate);
        $this->author = $user;
        $this->article = $article;

    }
    public function getIdComment()
    {
        return $this->idComment;
    }

    public function setIdComment(int $idComment)
    {
        $this->idComment = $idComment;
    }
    public function getContent()
    {
        return $this->content;
    }

    public function setContent($content)
    {
        $this->content = $content;
    }

    public function getReleaseDate():\DateTime
    {
        return $this->releaseDate;
    }

        public function setReleaseDate($releaseDate)
    {
        $this->releaseDate = $releaseDate;
    }

    public function getAuthor()
    {
        return $this->author;
    }

    public function setAuthor($user)
    {
        $this->author = $user;
    }

    public function getArticle()
    {
        return $this->article;
    }

    public function setArticle($article)
    {
        $this->article = $article;
    }

    /**
     * @return bool
     */
    public function isValid(): bool
    {
        return $this->isValid;
    }

    /**
     * @param bool $isValid
     */
    public function setIsValid(bool $isValid)
    {
        $this->isValid = $isValid;
    }

}
