<?php
//MODEL POUR LA TABLE JOUEURS
Class ManagerPlayer extends ModelPlayer{
    //ATTRIBUTE
   
    
    //CONSTRUCT
    
    
    //METHOD
    public function addPlayer(): string{
        $pseudo = $this->getPseudo();
        $email = $this->getEmail();
        $score = $this->getScore();
        $password = $this->getPassword();
        try {
            // Requête SQL pour sélectionner tous les utilisateurs
            //  1) méthode prepare()
            $req = $this->getBdd()->prepare("INSERT INTO players (pseudo, email, score, psswrd) VALUES (?,?,?,?)");
            //  2) compléter les ? avec un binding des paramètres
            $req->bindParam(1, $pseudo, PDO::PARAM_STR);
            $req->bindParam(2, $email, PDO::PARAM_STR);
            $req->bindParam(3, $score, PDO::PARAM_INT);
            $req->bindParam(4, $password, PDO::PARAM_STR);

            //  3) exécuter la requête avec execute()
            $req->execute();
            return "Ajout de l'utilisateur à la table users réussi !";
        } catch(PDOException $e) {
            return "Erreur de connexion à la base de données : " . $e->getMessage();
        }
    }

    public function getPlayers(){
        try {
            //echo "<p>Connexion réussie à la base de données Pour le check d'utilisateur !</p>";
            // Requête SQL pour sélectionner tous les utilisateurs
            $stmt = $this->getBdd()->prepare("SELECT pseudo, email, score, psswrd FROM players");
            $stmt->execute();

            $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $data;
        } catch(PDOException $e) {
            return "Erreur de connexion à la base de données : ". $e->getMessage();
        }
    }

    public function getPlayerByMail(){
        $email = $this->getEmail();
        try {
            //echo "<p>Connexion réussie à la base de données Pour le check d'utilisateur !</p>";
            // Requête SQL pour sélectionner tous les utilisateurs
            $stmt = $this->getBdd()->prepare("SELECT id, pseudo, email, psswrd FROM players WHERE ? = email LIMIT 1");
            $stmt->bindParam(1, $email, PDO::PARAM_STR);
            $stmt->execute();

            $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $data;
        } catch(PDOException $e) {
            echo "Erreur de connexion à la base de données : " . $e->getMessage();
        }
    }
}

?>