<?php

Class ModelUser{
    //ATTRIBUTE
    private ?int $id;
    private ?string $nickname;
    
    private ?string $email;

    private ?string $password;

    private ?PDO $bdd;
    
    //CONSTRUCT
    public function __construct() {
        $this->setBdd(connect());
    }
    
    
    //GETTER
    public function getId(): ?int{
        return $this->id;
    }

    public function getNickname(): ?string{
        return $this->nickname;
    }

    public function getEmail(): ?string{
        return $this->email;
    }

    public function getPassword(): ?string{
        return $this->password;
    }

    public function getBdd(): ?PDO{
        return $this->bdd;
    }



    //SETTER
    
    public function setId(int $newId): ModelUser{
        $this->id = $newId;
        return $this;
    }

    public function setNickname(string $newNickname): ModelUser{
        $this->nickname = $newNickname;
        return $this;
    }

    public function setEmail(string $newEmail): ModelUser{
        $this->email = $newEmail;
        return $this;
    }

    public function setPassword(string $newPassword): ModelUser{
        $this->password = $newPassword;
        return $this;
    }

    public function setBdd(PDO $bdd): ModelUser{
        $this->bdd = $bdd;
        return $this;
    }

    
    //METHOD
    public function add(): string{
        $nickname = $this->getNickname();
        $email = $this->getEmail();
        $password = $this->getPassword();
        try {

            // echo "<p>Connexion réussie à la base de données !</p>";
            // Requête SQL pour sélectionner tous les utilisateurs
            //  1) méthode prepare()
            $req = $this->getBdd()->prepare("INSERT INTO users (nickname, email, psswrd) VALUES (?,?,?)");
            //  2) compléter les ? avec un binding des paramètres
            $req->bindParam(1, $nickname, PDO::PARAM_STR);
            $req->bindParam(2, $email, PDO::PARAM_STR);
            $req->bindParam(3, $password, PDO::PARAM_STR);

            //  3) exécuter la requête avec execute()
            $req->execute();
            return "Ajout de l'utilisateur à la table users réussi !";
        } catch(PDOException $e) {
            return "Erreur de connexion à la base de données : " . $e->getMessage();
        }
    }

    public function getAll(){
        try {
            //echo "<p>Connexion réussie à la base de données Pour le check d'utilisateur !</p>";
            // Requête SQL pour sélectionner tous les utilisateurs
            $stmt = $this->getBdd()->prepare("SELECT nickname, email, psswrd FROM users");
            $stmt->execute();

            $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $data;
        } catch(PDOException $e) {
            return "Erreur de connexion à la base de données : ". $e->getMessage();
        }
    }

    public function getByEmail(){
        $email = $this->getEmail();
        try {
            //echo "<p>Connexion réussie à la base de données Pour le check d'utilisateur !</p>";
            // Requête SQL pour sélectionner tous les utilisateurs
            $stmt = $this->getBdd()->prepare("SELECT id, nickname, email, psswrd FROM users WHERE ? = email LIMIT 1");
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