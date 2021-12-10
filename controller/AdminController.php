<?php

class AdminController
{
    private $model;
    function __construct()
    {
        global $dir, $vues, $action, $con;
        $this->model = new NewsGateway($con);


        try {

            if (!empty($_REQUEST['action'])){
                $action = $_REQUEST['action'];
            }

            switch ($action){

                case NULL:
                    session_destroy();
                    require("index.php");
                    break;

                case "deleteNews":
                    if ($this->deleteNews()){
                        $_REQUEST['erreur']=0;
                        require($dir.$vues['delNews']);
                    }
                    else{
                        $_REQUEST['erreur']=1;
                        require($dir.$vues['delNews']);
                    }
                    break;

                case "addingNews":
                    $this->addNews();
                    require($dir.$vues['addNews']);
                    break;

                default:
                    $dVueErreur[] = "Error 404";
                    require($dir.$vues['error']);
                    break;




            }
        }catch(PDOException $e)
        {
            //Erreur BD
            $dVueErreur[] = "Unexpected Error";
            require($dir.$vues['error']);
        }
    }

    function deleteNews():bool{
        try{
            $this->model->DeleteNews($_POST['link']);
            return true;
        }catch(PDOException $e){
            return false;
        }
        return false;
    }

    function addNews(){
        $this->model->InsertNews($_POST['title'], $_POST['description'], $_POST['link'], $_POST['link'],  $_POST['pubDate'], $_POST['category']);

    }

}