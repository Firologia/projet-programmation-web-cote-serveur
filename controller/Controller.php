<?php

class Controller
{
    private $newsGateway;
    function __construct()
    {
        global $dir,$vues, $action, $con; //Pour utiliser les variables globales
        $newsGateway = new NewsGateway($con);
        $this->newsGateway = $newsGateway;
        //Démarrage ou reprise d'une session
        session_start();

        //Initialisation du tableau d'erreur
        $dVueErreur = array();

        try {
            if(!empty($_REQUEST["action"])) {
                $action=$_REQUEST['action'];
            }
            else session_destroy();

            switch ($action) {

                //aucune action
                case NULL:
                    $this->reinit();
                    break;

                case "reset":       //Lorsque qu'un admin se déconnecte
                    $this->reinit(); //Reinitialisation
                    session_destroy(); //destruction de la session
                    break;

                case "showCateg":
                    $tab_de_news = [];
                    if ($_POST['categ'] == "none"){ $this->Reinit();}
                    else {
                        $tab_de_news = $this->newsGateway->FindByCategory($_POST['categ']);
                        require($dir.$vues['lobby']);
                    }
                    break;

                case "logAdmin":
                    require($dir.$vues['logAdmin']);
                    break;

                case "admin":
                    if (empty($_SESSION['connected'])) $_SESSION['connected']=$this->connexion();

                    if ($_SESSION['connected']){
                        require($dir.$vues['admin']);
                    }
                    
                    break;

                case "addNews":
                    if ($_SESSION['connected']){
                        require($dir.$vues['addNews']);
                    }
                    else{
                        $dVueErreur[] = "Veuillez vous connecter pour aaccéder à cette page";
                        require($dir.$vues['error']);
                    }
                    break;

                case "delNews":
                    if ($_SESSION['connected']){
                        require($dir.$vues['delNews']);
                    }
                    break;


                case "deleteNews":
                    $adminController = new AdminController();
                    break;

                case "addingNews":
                    $adminController = new AdminController();
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
        $tab_de_news = [];
        $tab_de_news = $this->newsGateway->ShowAllNews();
        require($dir.$vues['lobby']);
    }

    function connexion() :bool{
        global $dir, $vues, $con;
        if (isset($_POST['username']) && isset($_POST['password']) && isset($_POST['domain']))
        {
            $modelAdmin = new ModelAdmin();
            $erreur = $modelAdmin->connexion($_POST['username'], $_POST['password']);
            if ($erreur == 1){
                $_REQUEST['erreur'] = 1;
                require($dir.$vues['logAdmin']);
            }
            if ($erreur == 2){
                $_REQUEST['erreur'] = 2;
                require($dir.$vues['logAdmin']);
            }
            if ($modelAdmin->isAdmin()) {
                if ($_POST['domain'] == 'home') {
                    $_SESSION['domain'] = "mysql:host=localhost;dbname=dbnews";
                } else if ($_POST['domain'] == 'iutClermont') {
                    $_SESSION['domain'] = "mysql:host=berlin.iut.local;dbname=dbjoartzet";
                } else return false;
                try {$userGate = new UserGateway($con);
                    return true;
                } catch (PDOException $e) { 
                    return false;
                }
            }

            }
        return false;
    }


}