<?php

class UserGateway
{

    private $con;


    public function __construct(Connection $con){
        $this->con = $con;
    }


    public function doContains(string $login, string $mdp): bool
    {
        $query = "SELECT * from User WHERE login=:login";
        $this->con->executeQuery($query,array(
            ':login' => array($login, PDO::PARAM_STR),
        ));
        $results = $this->con->getResults();

        if (count($results) != 1){
            return FALSE;
        }
        else {
                foreach ($results as $row){
                    if (password_verify($mdp, $row['mdp'])){
                        $user = new User($row['login'], $row['mdp'], $row['role']);
                    }
                    else return false;
                }
            $_SESSION['user'] = $user;
            return TRUE;
        }
    }

    /**
     * La fonction insertAdmin permet l'insertion d'un nouvelle Admin dans la BDD
     * @param string $login -> login of the admin
     * @param string $mdp -> password of the admin
     */

    public function insertAdmin(string $login, string $mdp){
        $query = 'INSERT INTO User VALUES(:login,:mdp,1)';
        $this->con->executeQuery($query,array(
            ':login' => array($login, PDO::PARAM_STR),
            ':mdp' => array($mdp, PDO::PARAM_STR),

        ));
    }

    /**
     * La fonction insertUser permet l'insretion d'un nouvelle utilisateur dans la BDD
     * @param string $login login of the user
     * @param string $password password of the user
     */
    public function insertUser(string $login, string $password, int $role){

        $password = password_hash($password,PASSWORD_DEFAULT);
        $query = 'INSERT INTO User VALUES(:login, :password, :AdminRole)';
        $this->con->executeQuery($query,array(
            ':login' => array($login, PDO::PARAM_STR),
            ':password' => array($password, PDO::PARAM_STR),
            ':AdminRole' => array($role, PDO::PARAM_INT),
        ));
    }

    


}