<?php

    class ModelCategory{

        //ATRIBUTES
        private ?int $id;
        private ?string $name;
        private ?PDO $bdd;
        
        //CONSTRUCT
        public function __construct() {
            $this->setBdd(connect());
        }
        //GETTER
        public function getId(): ?int{
            return $this->id;
        }

        public function getName(): ?string{
            return $this->name;
        }

        public function getBdd(): ?PDO{
            return $this->bdd;
        }

        //SETTER
        public function setId(?int $newId): ModelCategory{
            $this->id = $newId;
            return $this;
        }
        
        public function setName(?string $name): ModelCategory{
            $this->name = $name;
            return $this;
        }

        public function setBdd(?PDO $bdd): ModelCategory{
            $this->bdd = $bdd;
            return $this;
        }

        //METHODS

        public function add(): string{
            $name = $this->getName();
            try {
    
                // echo "<p>Connexion réussie à la base de données !</p>";
                // Requête SQL pour sélectionner tous les utilisateurs
                //  1) méthode prepare()
                $req = $this->getBdd()->prepare("INSERT INTO category (`name`) VALUES (?)");
                //  2) compléter les ? avec un binding des paramètres
                $req->bindParam(1, $name, PDO::PARAM_STR);
    
                //  3) exécuter la requête avec execute()
                $req->execute();
                return "Ajout de la Categorie à la table category réussi !";
            } catch(PDOException $e) {
                return "Erreur de connexion à la base de données : " . $e->getMessage();
            }
        }
    
        public function getAll(){
            try {
                //echo "<p>Connexion réussie à la base de données Pour le check d'utilisateur !</p>";
                // Requête SQL pour sélectionner tous les utilisateurs
                $stmt = $this->getBdd()->prepare("SELECT id, `name` FROM category");
                $stmt->execute();
    
                $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
                return $data;
            } catch(PDOException $e) {
                return "Erreur de connexion à la base de données : ". $e->getMessage();
            }
        }
    
        public function getByName(){
            $name = $this->getName();
            try {
                //echo "<p>Connexion réussie à la base de données Pour le check d'utilisateur !</p>";
                // Requête SQL pour sélectionner tous les utilisateurs
                $stmt = $this->getBdd()->prepare("SELECT id, `name` FROM category WHERE ? = `name` LIMIT 1");
                $stmt->bindParam(1, $name, PDO::PARAM_STR);
                $stmt->execute();
    
                $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
                return $data;
            } catch(PDOException $e) {
                echo "Erreur de connexion à la base de données : " . $e->getMessage();
            }
        }
    }



?>