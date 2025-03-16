<?php
    session_start();
    session_destroy();

    //redirection sur page1
    header("Location: /adrar/Epinature/accueil");
    exit();
?>