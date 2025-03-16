<?php

    // Initialisation de la variable
    $linkNav = "";

    // Vérification de la session
    if(isset($_SESSION["id"]) && !empty($_SESSION["id"])){
        $linkNav .= "<li><a href='/adrar/Epinature/account'>Mon Compte</a></li>";
        $linkNav .= "<li><a href='/adrar/Epinature/deconnexion'>Déconnexion</a></li>";
    } else {
        $linkNav .= "<li><a href='/adrar/Epinature/creation'>Créer un Compte</a></li>";
        $linkNav .= "<li><a href='/adrar/Epinature/connexion'>Connexion</a></li>";
    }

    // On inclut la vue après avoir défini la variable
    require_once "./view/view_nav.php";
?>