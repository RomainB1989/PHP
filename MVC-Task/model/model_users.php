<?php


    function insertUser($conn, $firstname, $lastname, $email, $password){
        try {
            // echo "<p>Connexion réussie à la base de données !</p>";
            // Requête SQL pour sélectionner tous les utilisateurs
            //  1) méthode prepare()
            $req = $conn->prepare("INSERT INTO users (name_user, firstname_user, email_user, mdp_user) VALUES (?,?,?,?)");
            //  2) compléter les ? avec un binding des paramètres
            $req->bindParam(1, $lastname, PDO::PARAM_STR);
            $req->bindParam(2, $firstname, PDO::PARAM_STR);
            $req->bindParam(3, $email, PDO::PARAM_STR);
            $req->bindParam(4, $password, PDO::PARAM_STR);

            //  3) exécuter la requête avec execute()
            $req->execute();
            return "Ajout de l'utilisateur à la table users réussi !";
        } catch(PDOException $e) {
            return "Erreur de connexion à la base de données : " . $e->getMessage();
        }
    }

    function isUserExist($conn, $email){
        try {
            //echo "<p>Connexion réussie à la base de données Pour le check d'utilisateur !</p>";
            // Requête SQL pour sélectionner tous les utilisateurs
            $stmt = $conn->prepare("SELECT email_user FROM users WHERE ? = email_user LIMIT 1");
            $stmt->bindParam(1, $email, PDO::PARAM_STR);
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

    function showUsers($conn){
        try {
            //echo "<p>Connexion réussie à la base de données Pour le check d'utilisateur !</p>";
            // Requête SQL pour sélectionner tous les utilisateurs
            $stmt = $conn->prepare("SELECT name_user, firstname_user, email_user FROM users");
            $stmt->execute();

            $data = $stmt->fetchAll();
            return $data;
        } catch(PDOException $e) {
            return "Erreur de connexion à la base de données : ". $e->getMessage();
        }
    }

    function getUserByEmail($conn, $email){
        try {
            //echo "<p>Connexion réussie à la base de données Pour le check d'utilisateur !</p>";
            // Requête SQL pour sélectionner tous les utilisateurs
            $stmt = $conn->prepare("SELECT id_user, name_user, firstname_user, email_user, mdp_user FROM users WHERE ? = email_user LIMIT 1");
            $stmt->bindParam(1, $email, PDO::PARAM_STR);
            $stmt->execute();

            $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $data;
        } catch(PDOException $e) {
            echo "Erreur de connexion à la base de données : " . $e->getMessage();
        }
    }
?>