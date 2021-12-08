<?php

class Controller
{


    function __construct()
    {
        global $dir,$vues, $action; //Pour utiliser les variables globales

        //Démarrage ou reprise d'une session
        session_start();

        //Initialisation du tableau d'erreur
        $dVueErreur = array();

        try {
            if(!empty($_REQUEST["action"])) {
                $action=$_REQUEST['action'];
            }

            switch ($action) {

                //aucune action
                case NULL:
                    $this->reinit();
                    break;

                case "logAdmin":
                    require($dir.$vues['logAdmin']);
                    break;

                case "admin":
                    if ($this->connexion()){
                        require($dir.$vues['admin']);
                    }
                    else require($dir.$vues['logAdmin']."?erreur=1");
                default:
                    $dVueErreur[] = "Unexpected Error";
                    require($dir.$vues['error']);
            }

        }catch (PDOException $e)
        {
            //Erreur BD
            $dVueErreur[] = "Unexpected Error";
            require($dir.$vues['error']);
        }
        catch (Exception $e2)
        {
            $dVueEreur[] =	"Erreur inattendue!!! ";
            require ($dir.$vues['error']);
        }




    }

    function reinit() {
        global $dir,$vues;

        require($dir.$vues['lobby']);
    }

    function connexion() :bool{
        session_start();
        if (isset($_POST['username']) && isset($_POST['password']) && isset($_POST['domain']))
        {

            $username = $_POST['username'];
            $pass = $_POST['password'];
            $dsn = $_POST['domain'];


            try {
                $con = new Connection($dsn,$username,$pass);
                $_SESSION['username'] = $username;
                $_SESSION['domain'] = $_POST['domain'];
                $_SESSION['password'] = $pass;
                return true;
            }catch (PDOException $e){
                return false;
            }



        }
}


}