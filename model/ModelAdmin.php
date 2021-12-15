<?php

class ModelAdmin
{
    public function __construct()
    {
        global $con;
        $userGate = new UserGateway();
    }

    public function connection($login, $mdp){
        if (Validation::validationLogin($login) != 1){
            //gérer erreur
        }
        if (Validation::validationMdp($mdp) != 1){
            //gérer erreur
        }

    }
}