<?php


class News
{
    private $title;
    private $description;
    private $link;
    private $guid;
    private $pubDate;
    private $category;


    public function __construct(string $title, string $description, string $link, string $guid, string $pubDate, string $category)
    {

        $this->title = $title;
        $this->description = $description;
        $this->link = $link;
        $this->guid = $guid;
        $this->pubDate = $pubDate;
        $this->category = $category;
    }


    /**
     * @return string Returns the title of the News
     */
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * @return string Returns the Description of the News
     */
    public function getDescription(): string
    {
        return $this->description;
    }

    /**
     * @return string Returns the Link of the News
     */
    public function getLink(): string
    {
        return $this->link;
    }

    public function getGuid(): string
    {
        return $this->guid;
    }

    public function getPubDate(): string
    {
        return $this->pubDate;
    }

    public function getCategory(): string
    {
        return $this->category;
    }


}
?>