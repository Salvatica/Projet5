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
    private $author;
    /**
     * @var Article
     */
    private $article;

    public function __construct($content, $date, $author,$article)
    {
        $this->content = $content;
        $this->date = $date;
        $this->author = $author;
        $this->article = $article;
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
        return $this->author;
    }

    public function setAuthor($author)
    {
        $this->author = $author;
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
