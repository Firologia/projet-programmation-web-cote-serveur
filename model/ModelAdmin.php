<?php

class ModelAdmin
{
    private $userGate;

    public function __construct()
    {
        global $con, $user, $pass;
        $this->userGate = new UserGateway($con);
    }

    public function connexion($login, $mdp): int
    {
        if (Validation::validationLogin($login) != 1) {
            return 1;
        }
        if (Validation::validationMdp($mdp) != 1) {
            return 1;
        }


        if ($this->userGate->doContains($login, $mdp)) {
            $_SESSION['role'] = 'admin';
            $_SESSION['login'] = 'login';
            $_SESSION['username'] = $login; 

        } else{
            return 2;
        }
        return 0;
    }

    public function isAdmin(): bool{
        if (isset($_SESSION['role']) && isset($_SESSION['login'])){
            return true;
        }
        else return false;
    }

    public function deconnection(){
        $_SESSION = array();
        session_unset();
        session_destroy();
    }


}