<?php

function nettoyage($data){
    return htmlentities(strip_tags(stripslashes(trim($data))));
};

function DBconnect(){
    $bdd = new PDO("mysql:host=localhost;dbname=quizz", "root", "", array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
    return $bdd;
}

?>