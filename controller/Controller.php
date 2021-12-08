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


}