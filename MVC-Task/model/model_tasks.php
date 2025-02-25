<?php

function insertTask($conn, $name_task, $content_task, $date_task, $id_category, $id_user){
    try {
        // echo "<p>Connexion réussie à la base de données !</p>";
        // Requête SQL pour sélectionner tous les utilisateurs
        //  1) méthode prepare()
        $req = $conn->prepare("INSERT INTO tasks (name_task, content_task, date_task, id_category, id_user) VALUES (?,?,?,?,?)");
        //  2) compléter les ? avec un binding des paramètres
        $req->bindParam(1, $name_task, PDO::PARAM_STR);
        $req->bindParam(2, $content_task, PDO::PARAM_STR);
        $req->bindParam(3, $date_task, PDO::PARAM_STR);
        $req->bindParam(4, $id_category, PDO::PARAM_INT);
        $req->bindParam(5, $id_user, PDO::PARAM_INT);
        // $req->bindParam(4, $id_category, PDO::PARAM_INT);
        // $req->bindParam(5, $id_user, PDO::PARAM_INT);

        //  3) exécuter la requête avec execute()
        $req->execute();
        return "Ajout de la tache à la table task réussi !";
    } catch(PDOException $e) {
        return "Erreur de connexion à la base de données : " . $e->getMessage();
    }
}

function isTaskExist($conn, $task){
    try {
        //echo "<p>Connexion réussie à la base de données Pour le check d'utilisateur !</p>";
        // Requête SQL pour sélectionner tous les utilisateurs
        $stmt = $conn->prepare("SELECT name_task FROM tasks WHERE ? = name_task LIMIT 1");
        $stmt->bindParam(1, $task, PDO::PARAM_STR);
        $stmt->execute();

        $data = $stmt->fetchAll();
        if(!empty($data)){
            return true;
        }
    } catch(PDOException $e) {
        echo "Erreur de connexion à la base de données : " . $e->getMessage();
    }
    return false;
}

function showTasks($conn){
    try {
        //echo "<p>Connexion réussie à la base de données Pour le check d'utilisateur !</p>";
        // Requête SQL pour sélectionner tous les utilisateurs
        $stmt = $conn->prepare("SELECT name_task, content_task, date_task FROM tasks");
        $stmt->execute();

        $data = $stmt->fetchAll();
        if(!empty($data)){
            return $data;
        }
    } catch(PDOException $e) {
        return "Erreur de connexion à la base de données : " . $e->getMessage();
    }
}

?>