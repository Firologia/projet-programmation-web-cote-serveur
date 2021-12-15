<?php

class ModelAdmin
{
    public function __construct()
    {
        global $con;
        $userGate = new UserGateway();
    }

    public function connexion($login, $mdp): int
    {
        if (Validation::validationLogin($login) != 1) {
            return 1;
        }
        if (Validation::validationMdp($mdp) != 1) {
            return 1;
        }

        $loginDB = $this->userGate->getLogin($login);
        $mdpDb = $this->userGate->getMdp($login);

        if (($login == $loginDB) && password_verify($mdp, $mdpDb)) {
            $_SESSION['role'] = 'admin';
            $_SESSION['login'] = 'login';
        } else{
            return 2;
        }
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