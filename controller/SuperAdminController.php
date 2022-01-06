<?php

class SuperAdminController
{
    private $model;

    function __construct()
    {

        global $dir, $vues, $action, $con, $user;

        $this->model = new UserGateway($con);

        try {

            if (!empty($_REQUEST['action'])){
                $action = $_REQUEST['action'];
            }

            switch ($action){

                case "addingAdmin" :
                    if ($this->addAdmin()){
                        require($dir.$vues['admin']);
                    }
                    else {
                        require($dir.$vues['error']);
                    }
                    break;
            }

        }
        catch (PDOException $e){


        }
    }

    function addAdmin() :bool{

        $login = $_POST['logNewAdmin'];
        $password = $_POST['passNewAdmin'];
        $role = (int) $_POST['roleNewAdmin'];

        var_dump($login);
        var_dump($password);
        var_dump($role);
        if (Validation::validationLogin($login) != 1){
            return false;
        }
        if (Validation::validationMdp($password) != 1){
            return false;
        }

        $this->model->insertUser($login, $password, $role);
        return true;

    }
}