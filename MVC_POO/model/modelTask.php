<?php

    class ModelTask{

        private ?int $id;
        private ?string $task;
        private?string $description;
        private ?string $date;
        private ?int $id_user;
        private ?int $id_category;
        private ?PDO $bdd;

        public function __construct() {
            $this->setBdd(connect());
        }

        public function getId(): ?int{
            return $this->id;
        }

        public function setId(?int $newId): ModelTask{
            $this->id = $newId;
            return $this;
        }

        public function getTask(): ?string{
            return $this->task;
        }

        public function setTask(?string $newTask): ModelTask{
            $this->task = $newTask;
            return $this;
        }

        public function getDescription(): ?string{
            return $this->description;
        }

        public function setDescription(?string $newDescription): ModelTask{
            $this->description = $newDescription;
            return $this;
        }

        public function getDate(): ?string{
            return $this->date;
        }

        public function setDate(?string $newDate): ModelTask{
            $this->date = $newDate;
            return $this;
        }

        public function getIdUser(): ?int{
            return $this->id_user;
        }

        public function setIdUser(?int $idUser): ModelTask{
            $this->id_user = $idUser;
            return $this;
        }

        public function getIdCategory(): ?int{
            return $this->id_category;
        }

        public function setIdCategory(?int $newIdCategory): ModelTask{
            $this->id_category = $newIdCategory;
            return $this;
        }

        public function getBdd(): ?PDO{
            return $this->bdd;
        }

        public function setBdd(?PDO $newBdd): ModelTask{
            $this->bdd = $newBdd;
            return $this;
        }


        //METHODS
        public function add():string{
            $message = "";

            $task = $this->getTask();
            $description = $this->getDescription();
            $date = $this->getDate();
            $idUser = $this->getIdUser();
            $idCategory = $this->getIdCategory();

            try {

                // echo "<p>Connexion réussie à la base de données !</p>";
                //  1) méthode prepare()
                $req = $this->getBdd()->prepare("INSERT INTO task (task, `description`, date_task, id_user, id_category) VALUES (?,?,?,?,?)");
                //  2) compléter les ? avec un binding des paramètres
                $req->bindParam(1, $task, PDO::PARAM_STR);
                $req->bindParam(2, $description, PDO::PARAM_STR);
                $req->bindParam(3, $date, PDO::PARAM_STR);
                $req->bindParam(4, $idUser, PDO::PARAM_INT);
                $req->bindParam(5, $idCategory, PDO::PARAM_INT);

                //  3) exécuter la requête avec execute()
                $req->execute();
                $message = "Ajout de la tache à la table task réussi !";
            } catch(PDOException $e) {
                $message =  "Erreur de connexion à la base de données : " . $e->getMessage();
            }
            return $message;
        }

        public function getAll():array|string{
            try {
                // Requête SQL pour sélectionner toutes les taches
                $stmt = $this->getBdd()->prepare("SELECT id, task, `description`, date_task, id_user, id_category FROM task");
                $stmt->execute();
    
                $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
                return $data;
            } catch(PDOException $e) {
                return "Erreur de connexion à la base de données : ". $e->getMessage();
            }
        }
        //todo Faire getById()
        public function getById(): array|string{
            $id = $this->getId();
            try {
                //echo "<p>Connexion réussie à la base de données Pour le check d'utilisateur !</p>";
                // Requête SQL pour sélectionner tous les utilisateurs
                $stmt = $this->getBdd()->prepare("SELECT id, task, `description`, date_task, id_user, id_category FROM task WHERE ? = id LIMIT 1");
                $stmt->bindParam(1, $id, PDO::PARAM_STR);
                $stmt->execute();
    
                $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
                return $data;
            } catch(PDOException $e) {
                return "Erreur de connexion à la base de données : " . $e->getMessage();
            }
        }





    }




?>