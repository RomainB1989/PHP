<?php

function insertCategory($conn, $name_category){
    try {
        // echo "<p>Connexion réussie à la base de données !</p>";
        // Requête SQL pour sélectionner tous les utilisateurs
        //  1) méthode prepare()
        $req = $conn->prepare("INSERT INTO categories (name_category) VALUES (?)");

        $req->bindParam(1, $name_category, PDO::PARAM_STR);

        //  3) exécuter la requête avec execute()
        $req->execute();
        return "Ajout de la categorie à la table categories réussi !";
    } catch(PDOException $e) {
        return "Erreur de connexion à la base de données : " . $e->getMessage();
    }
}

function isCategoryExist($conn, $name_category){
    try {
        //echo "<p>Connexion réussie à la base de données Pour le check d'utilisateur !</p>";
        // Requête SQL pour sélectionner tous les utilisateurs
        $stmt = $conn->prepare("SELECT id_category, name_category FROM categories WHERE ? = name_category LIMIT 1");
        $stmt->bindParam(1, $name_category, PDO::PARAM_STR);
        $stmt->execute();

        $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
        if(!empty($data)){
            return true;
        }
    } catch(PDOException $e) {
        echo "Erreur de connexion à la base de données : " . $e->getMessage();
    }
    return false;
}

function getCategories($conn){
    try {
        //echo "<p>Connexion réussie à la base de données Pour le check d'utilisateur !</p>";
        // Requête SQL pour sélectionner tous les utilisateurs
        $stmt = $conn->prepare("SELECT id_category, name_category FROM categories");
        $stmt->execute();

        $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
        if(!empty($data)){
            return $data;
        }
    } catch(PDOException $e) {
        return "Erreur de connexion à la base de données : " . $e->getMessage();
    }
}

function getIdCategory($conn, $name_category){
    echo "Name Category :  ".$name_category."<br>";
    try {
        //echo "<p>Connexion réussie à la base de données Pour le check d'utilisateur !</p>";
        // Requête SQL pour sélectionner tous les utilisateurs
        $stmt = $conn->prepare("SELECT id_category FROM categories WHERE ? = name_category");
        $stmt->bindParam(1, $name_category, PDO::PARAM_STR);
        $stmt->execute();

        $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
        // print_r($data);
        if(!empty($data)){
            return $data[0]["id_category"];
        }
    } catch(PDOException $e) {
        echo "Erreur de connexion à la base de données : " . $e->getMessage();
    }
}

function categoryList($bdd)
{
    $data = getCategories($bdd);
    $categoriesList = '';

    foreach ($data as $category) {
        $categoriesList = $categoriesList . "<option value=\"{$category['id_category']}\">{$category['name_category']}</option>";;
    }
    return $categoriesList;
}

?>