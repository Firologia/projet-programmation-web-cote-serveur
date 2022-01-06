<?php

class ModelAdmin
{
    private $userGate;
    private $user;

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
            return 0;

        }
        return 1;
    }

    public function isAdmin(): bool{
        if (isset($_SESSION['role']) && isset($_SESSION['login'])){
            return true;
        }
        if ($this->user->isAdmin()){
            return true;
        }
        return false;
    }

    public function deconnection(){
        $_SESSION = array();
        session_unset();
        session_destroy();
    }


}