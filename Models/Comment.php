<?php
namespace Blog\Models;

class Comment
{
    /**
     * @var string
     */
    private $content;
    /**
     * @var dateTime
     */
    private $date;
    /**
     * @var User
     */
    private $user;
    /**
     * @var Article
     */
    private $article;
    private $idComment;

    public function __construct($idComment,$content, $date, $user,$article)
    {
        $this->idComment=$idComment;
        $this->content = $content;
        $this->date = $date;
        $this->user = $user;
        $this->article = $article;
    }
    public function getIdComment()
    {
        return $this->idComment;
    }

    public function setIdComment($idComment)
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

    public function getDate()
    {
        return $this->date;
    }

        public function setDate($date)
    {
        $this->date = $date;
    }

    public function getAuthor()
    {
        return $this->user;
    }

    public function setAuthor($user)
    {
        $this->user = $user;
    }

    public function getArticle()
    {
        return $this->article;
    }

    public function setArticle($article)
    {
        $this->article = $article;
    }
}
