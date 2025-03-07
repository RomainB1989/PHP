<?php
//Fonction de nettoyage de données
function sanitize($data){
    return htmlentities(strip_tags(stripslashes(trim($data))));
}

//Fonction de création de l'objet de connexion PDO
//TODO : configurer correctement les paramètres du constructeur
function connect(){
    $servername = "localhost";
    $username = "root"; // Nom d'utilisateur par défaut de XAMPP
    $dbPassword = ""; // Mot de passe par défaut de XAMPP (vide)
    $dbname = "supergame";

// "<p>Votre compte à été rajouté :<br><br>Nom : $firstname<br>Prénom : $lastname<br>Email : $email</p>";
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $dbPassword, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
    return $conn;
}

?>