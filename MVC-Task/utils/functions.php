<?php
    function cleanInput($data) {
            $data = htmlentities($data);
            $data = strip_tags($data);
            $data = trim($data);
            $data = stripslashes($data);
            return $data;
        }

    function connectBdd(){
        $servername = "localhost";
        $username = "root"; // Nom d'utilisateur par défaut de XAMPP
        $dbPassword = ""; // Mot de passe par défaut de XAMPP (vide)
        $dbname = "task";

    // "<p>Votre compte à été rajouté :<br><br>Nom : $firstname<br>Prénom : $lastname<br>Email : $email</p>";
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $dbPassword, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
        return $conn;
    }

?>