<?php

namespace Blog\Models;



class Article
{
    /**
     * @var int
     */
    private $idArticle;
    /**
     * @var string
     */
    private $title;
    /**
     * @var string
     */
    private $subtitle;
    /**
     * @var string
     */
    private $content;
    /**
     * @var datetime
     */
    private $releaseDate;

    /**
     * @var datetime
     */
    private $updateDate;
    /**
     * @var User
     */
    private $author;

    public function __construct($idArticle, $title, $subtitle, $content, $releaseDate, $updateDate, $user)
    {
        $this->idArticle = $idArticle;
        $this->title = $title;
        $this->subtitle = $subtitle;
        $this->content = $content;
        $this->releaseDate = new \DateTime($releaseDate);
        $this->updateDate = new \DateTime($updateDate);
        $this->author = $user;

    }

    /**
     * @return int
     */
    public function getIdArticle(): int
    {
        return $this->idArticle;
    }

    /**
     * @param int $idArticle
     */
    public function setIdArticle(int $idArticle)
    {
        $this->idArticle = $idArticle;
    }


    /**
     * @return string
     */
   public function getTitle()
   {
       return $this->title;
   }

    /**
     * @param $title
     */
   public function setTitle($title)
   {
       $this->title = $title;
   }

    /**
     * @return string
     */
    public function getSubtitle()

    {
        return $this->subtitle;
    }

    /**
     * @param $subtitle
     */

    public function setSubtitle($subtitle)
    {
        $this->subtitle = $subtitle;
    }

    /**
     * @return string
     */
    public function getContent()
    {
        return $this->content;
    }

    /**
     * @param $content
     */

    public function setContent($content)
    {
        $this->content = $content;
    }

    /**
     * @return datetime
     */
    public function getReleaseDate() :\DateTime

    {
        return $this->releaseDate;
    }

    /**
     * @param $releaseDate
     */

    public function setReleaseDate($releaseDate)

    {
        $this->releaseDate = $releaseDate;
    }

    /**
     * @return datetime
     */
    public function getUpdateDate() :\DateTime
    {
        return $this->updateDate;
    }

    /**
     * @param datetime $updateDate
     */
    public function setUpdateDate(datetime $updateDate)
    {
        $this->updateDate = $updateDate;
    }

    public function getAuthor()
    {
        return $this->author;
    }

    public function setAuthor($user)
    {
        $this->author = $user;
    }
}
?>