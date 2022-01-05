<?php

class UserGateway
{

    private $con;

    public function __construct(Connection $con){
        $this->con = $con;
    }

    public function doContains(string $login, string $mdp): bool
    {
        $query = "SELECT * from User";
        $this->con->executeQuery($query,array());
        $results = $this->con->getResults();
        if (empty($results)){
            return FALSE;
        }
        else return TRUE;
    }

    public function insertAdmin(string $login, string $mdp){
        $query = 'INSERT INTO User VALUES(:login,:mdp,1';
        $this->con->executeQuery($query,array(
            ':login' => array($login, PDO::PARAM_STR),
            ':mdp' => array($mdp, PDO::PARAM_STR),

        ));
    } 

    


}