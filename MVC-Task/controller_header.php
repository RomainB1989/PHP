<?php

    $linkNav = "";

    if(isset($_SESSION["id"]) && !empty($_SESSION["id"])){
        $linkNav = $linkNav."<a href='./controller_account.php' target='_self' style='padding:10px 10px;'>Mon Compte</a>";
        $linkNav = $linkNav."<a href='./controller_logout.php' target='_self' style='padding:10px 10px;'>Déconnexion</a>";
    } else {
        $linkNav = $linkNav."<a href='./controller_connexion.php' target='_self' style='padding:10px 10px;'>Connexion</a>";
    }

    include "./view/header.php";
?>