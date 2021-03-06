<?php


require_once("News.php");
require_once("Connection.php");


class NewsGateway
{

    private $con;

    public function __construct(Connection $con)
    {

        $this->con = $con;

    }

    public function ShowAllNews():array
    {
        $tab_de_news = [];
        $query = 'SELECT * from news ORDER BY pubDate';
        $this->con->executeQuery($query,array());
        $results = $this->con->getResults();
        foreach ($results as $row){
            $tab_de_news[] = new News($row['title'], $row['description'], $row['link'], $row['guid'], $row['pubDate'], $row['category']);
        }
        $tab_de_news = array_reverse($tab_de_news, true);
        return $tab_de_news;
    }

    public function FindByCategory(string $category):array
    {
        $tab_de_news = [];
        $query = 'SELECT * FROM news WHERE category=:category';
        $this->con->executeQuery($query, array(
            ':category' => array($category, PDO::PARAM_STR),
        ));
        $results = $this->con->getResults();
        foreach ($results as $row) {
            $tab_de_news[] = new News($row['title'], $row['description'], $row['link'], $row['guid'] , $row['pubDate'], $row['category']);
        }
        return $tab_de_news;
    }

    /*
     * la fonction InsertNews permet l'insertion d'une nouvelle News.
     */

    public function InsertNews(string $title, string $description, string $link, string $guid, string $pubDate, string $category)
    {

        $query = 'INSERT INTO news VALUES(:title,:description,:link,:guid,:pubDate,:category)';
        $this->con->executeQuery($query, array(
            ':title' => array($title, PDO::PARAM_STR),
            ':description' => array($description, PDO::PARAM_STR),
            ':link' => array($link, PDO::PARAM_STR),
            ':guid' => array($guid, PDO::PARAM_STR),
            ':pubDate' => array($pubDate, PDO::PARAM_STR),
            ':category' => array($category, PDO::PARAM_STR),
        ));
    }

    public function DeleteNews(string $link)
    {

        $query = 'DELETE FROM news WHERE link=:link';
        $this->con->executeQuery($query, array(
            ':link' => array($link, PDO::PARAM_STR),
        ));
    }


}


?>