<?php


    echo '    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="index.php?action=admin">Administration</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="index.php?action=addNews">Add News</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="index.php?action=delNews">Delete News</a>
                    </li>
                    <li class="nav-item "> 
                        
                    </li>
                </ul>
                <div class="d-flex">
                    <a class="btn btn-primary btn-sm" href="index.php?action=reset" >Deconnexion</a>
                </div>
            </div>
        </div>
    </nav>';



if (isset($_GET['deconnexion'])) {
    if ($_GET['deconnexion'] == true) {
        session_unset();
        header("location:../../view/lobby.php");
    }
}


?>
