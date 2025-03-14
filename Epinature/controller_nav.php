<?php

    $linkNav = "";

    if(isset($_SESSION["id"]) && !empty($_SESSION["id"])){
        $linkNav = $linkNav."<li><a href='./controller_account.php'>Mon Compte</a></li>";
        $linkNav = $linkNav."<li><a href='./controller_deconnexion.php'>Déconnexion</a></li>";
    } else {
        $linkNav = $linkNav."<li><a href='./controller_creation.php'>Créer un Compte</a></li>";
        $linkNav = $linkNav."<li><a href='./controller_connexion.php'>Connexion</a></li>";
    }

    include "./view/view_nav.php";
?>