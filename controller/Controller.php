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

                case "reset":       //Lorsque qu'un admin se déconnecte
                    $this->reinit(); //Reinitialisation
                    session_destroy(); //destruction de la session
                    break;

                case "logAdmin":
                    require($dir.$vues['logAdmin']);
                    break;

                case "admin":
                    if ($_SESSION['connected']==false || empty($_SESSION['connected'])) $_SESSION['connected']=$this->connexion();
                    if ($_SESSION['connected']){
                        require($dir.$vues['admin']);
                    }
                    else{
                        $_REQUEST['erreur']=1;
                        require($dir.$vues['logAdmin']);
                    }
                    break;

                case "addNews":
                    if ($_SESSION['connected']){
                        require($dir.$vues['addNews']);
                    }
                    break;

                case "delNews":
                    if ($_SESSION['connected']){
                        require($dir.$vues['delNews']);
                    }
                    break;
                default:
                    $dVueErreur[] = "Error 404";
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
        if (isset($_POST['username']) && isset($_POST['password']) && isset($_POST['domain']))
        {

            $username = $_POST['username'];
            $pass = $_POST['password'];
            if ($_POST['domain'] == 'home'){
                $dsn="mysql:host=localhost;dbname=dbnews";
            }
            else if ($_POST['domain'] == 'iutClermont'){
                $dsn="mysql:host=berlin.iut.local;dbname=dbjoartzet";
            }
            else return false;


            try {
                $con = new Connection($dsn,$username,$pass);
                $_SESSION['username'] = $username;
                $_SESSION['domain'] = $dsn;
                $_SESSION['password'] = $pass;
                return true;
            }catch (PDOException $e){
                return false;
            }



        }
        return false;
}


}