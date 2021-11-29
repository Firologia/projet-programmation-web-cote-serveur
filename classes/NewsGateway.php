<?php


require_once("News.php");
require_once("Connection.php");


class NewsGateway
{

    private $con;

    public function __construct($dsn, $user, $mdp)
    {

        $this->con = new Connection($dsn, $user, $mdp);

    }

    public function FindByCategory(string $category)
    {

        $query = 'SELECT * FROM NEWS WHERE category=:category';
        $this->con->executeQuery($query, array(
            ':category' => array($category, PDO::PARAM_STR),
        ));
        $results = $this->con->getResults();
        foreach ($results as $row) {
            $tab_de_news[] = new News($row['title'], $row['description'], $row['link'], $row['pubDate'], $row['category']);
        }
        return $tab_de_news;
    }

    public function InsertNews(string $title, string $description, string $link, string $guid, string $pubDate, string $category)
    {

        $query = 'INSERT INTO News VALUES(:title,:description,:link,:guid,:pubDate,:category)';
        $this->con->executeQuery($query, array(
            ':title' => array($title, PDO::PARAM_STR),
            ':description' => array($description, PDO::PARAM_STR),
            ':link' => array($link, PDO::PARAM_STR),
            ':guid' => array($guid, PDO::PARAM_STR),
            ':pubDate' => array($pubDate, PDO::PARAM_STR),
            ':category' => array($category, PDO::PARAM_STR),
        ));
    }

    public function DeleteNews(string $title)
    {

        $query = 'DELETE FROM News WHERE title=:title';
        $this->con->executeQuery($query, array(
            ':title' => array($title, PDO::PARAM_STR),
        ));
    }


}


?>