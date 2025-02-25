<?php
    session_start();
    $account = "";

    if(isset($_SESSION["id"]) && !empty($_SESSION["id"])){
        $nom = $_SESSION["firstname"];
        $prénom = $_SESSION["name"];
        $email = $_SESSION["email"];

        $account = "Bonjour ".$prénom." ".$nom.", votre email est : ".$email." et vous etes connecté ^^.";
    } else {
        header("Location:controller_creation.php");
        $account = "Pas d'utilisateur connecté.";
    }

    include "./controller_header.php";
    include "./view/view_account.php";
    include "./view/footer.php";

?>
