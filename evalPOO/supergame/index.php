<?php
    //CONTROLER DE LA PAGE D'ACCUEIL
    include "./utils/utils.php";
    include "./model/modelPlayer.php";
    include "./model/managerPlayer.php";
    include "./view/header.php";
    include "./view/view_accueil.php"; 
    include "./view/footer.php";

    
    Class ControllerHome{

        //ATRIBUTES
        private ?ViewHeader $viewHeader = null;
        private ?ViewHome $viewHome = null;
        private ?ViewFooter $viewFooter = null;
        private ?ManagerPlayer $managerPlayer = null;
        //CONSTRUCT
        public function __construct(){
            $this->viewHome = new ViewHome();
            $this->managerPlayer = new ManagerPlayer();
            $this->viewHeader = new ViewHeader();
            $this->viewFooter = new ViewFooter();
        }

        //GETTER
        public function getViewHeader(): ?ViewHeader{
            return $this->viewHeader;
        }

        public function getViewHome(): ?ViewHome{
            return $this->viewHome;
        }

        public function getViewFooter(): ?ViewFooter{
            return $this->viewFooter;
        }

        public function getManagerPlayer(): ?ManagerPlayer{
            return $this->managerPlayer;
        }
        //SETTER
        public function setViewHeader($newViewHeader):ControllerHome{
            $this->viewHeader = $newViewHeader;
            return $this;
        }
        public function setViewHome($newViewHome):ControllerHome{
            $this->viewHome = $newViewHome;
            return $this;
        }
        public function setViewFooter($newViewFooter):ControllerHome{
            $this->viewFooter = $newViewFooter;
            return $this;
        }

        public function setManagerPlayer(ManagerPlayer $newManagerPlayer):ControllerHome{
            $this->managerPlayer = $newManagerPlayer;
            return $this;
        }

        //METHOD
        public function signUp():string{
            $message = "";
            if (!empty($_POST))
            {
                //verifie si submit du formulaire de creation de compte Utilisateur existe
                if(isset($_POST["submit"])){
                    //echo "<p>Le formulaire a été envoyé</p>";
                    //verifie si champs du formulaire de creation de compte ne sont pas vide
                    if(isset($_POST["pseudo"]) && isset($_POST["email"]) && isset($_POST["score"]) && isset($_POST["password"])
                    && !empty($_POST["pseudo"]) && !empty($_POST["email"]) && !empty($_POST["score"]) && !empty($_POST["password"])){
                        //echo "<p>Visiblement vous voulez rajouter un Utilisateur.</p>";
                        // Verifier Format.
                        if(filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)){
                            //echo "<p>Votre email a le bon format.</p>";
                            // Clean les Données.
                            // Password chiffrer
                            $this->getManagerPlayer()->setPseudo(sanitize($_POST["pseudo"]));
                            $this->getManagerPlayer()->setEmail(sanitize($_POST["email"]));
                            $this->getManagerPlayer()->setScore($_POST["score"]);
                            $this->getManagerPlayer()->setPassword(password_hash(sanitize($_POST["password"]), PASSWORD_BCRYPT));
                            //Check si email exist en BDD
                            if(empty($this->getManagerPlayer()->getPlayerByMail())){
                                $message = $this->getManagerPlayer()->addPlayer();
                            } else{
                                $message = "Cet Adresse Mail existe deja";
                            }
                        } else{
                            $message = "Veuillez saisir un email au bon format. Ex : ######@#####.##";
                        }   
                    }else {
                        $message = "Veuillez remplir les champs obligatoires !";
                    }
                }
            }else{
                $message = "";
            }
            return $message;
        }


        public function readUsers():string{
            $usersList = "";
            //recupere ManagerPlayer->getall();
            echo $this->getManagerPlayer()->getEmail();
            $listUsers = $this->getManagerPlayer()->getPlayers();
            //print_r($listUsers);
            //recuper code boucle foreach de li a mettre dans ul
            if(!empty($listUsers) && is_array($listUsers)){
                $usersList = "<h2>Mes Utilisateurs : </h2>";
                foreach ($listUsers as $row){
                    $usersList = $usersList."<li> Pseudo : ".$row["pseudo"]."<br> Email : ".$row["email"]."<br> Score : ".$row["score"]."</li>";
                }
                //echo "<ul>".$usersList."</ul>";
            }else {
                $usersList ="<p>Il n'y as pas d'utilisateurs</p>";
            }
            return $usersList;
        }

        public function render():void{
            $this->getViewHome()->setMessage($this->signUp());
            $this->getViewHome()->setUsersList($this->readUsers());
            echo $this->getViewHeader()->displayView().$this->getViewHome()->displayView().$this->getViewFooter()->displayView();
        }
    }

    //A mettre dans le routeur après
    $home = new ControllerHome();
    $home->render();
?>