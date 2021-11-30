<?php

    require_once("../classes/Connection.php");
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
            header('Location: vue/dbManagement.php');
        }catch (PDOException $e){
            header('Location: logAdmin.php?erreur=1'); //user of password false
        }



    }

?>