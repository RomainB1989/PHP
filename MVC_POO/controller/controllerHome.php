<?php
    // session_start();

    // include "./utils/utils.php";
    // include "./model/modelUser.php";
    // include "./view/viewHeader.php";
    // include "./view/viewHome.php";
    // include "./view/viewFooter.php";
    // include "./controllerGeneric.php";

    Class ControllerHome extends ControllerGeneric{

        //ATRIBUTES
        private?ViewHome $viewHome;
        private ?ModelUser $modelUser;
        //CONSTRUCT
        public function __construct(?ViewHome $newViewHome, ?ModelUser $newModelUser, ?Viewheader $newViewHeader, ?ViewFooter $newViewFooter){
            $this->viewHome = $newViewHome;
            $this->modelUser = $newModelUser;
            $this->setViewHeader($newViewHeader);
            $this->setViewFooter($newViewFooter);
        }

        //GETTER
        public function getViewHome(): ?ViewHome{
            return $this->viewHome;
        }

        public function getModelUser(): ?ModelUser{
            return $this->modelUser;
        }
        //SETTER
        public function setViewHome($newViewHome):ControllerHome{
            $this->viewHome = $newViewHome;
            return $this;
        }

        public function setModelUser(ModelUser $newModelUser):ControllerHome{
            $this->modelUser = $newModelUser;
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
                    if(isset($_POST["nickname"]) && isset($_POST["email"]) && isset($_POST["password"])
                    && !empty($_POST["nickname"]) && !empty($_POST["email"]) && !empty($_POST["password"])){
                        //echo "<p>Visiblement vous voulez rajouter un Utilisateur.</p>";
                        // Verifier Format.
                        if(filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)){
                            //echo "<p>Votre email a le bon format.</p>";
                            // Clean les Données.
                            // Password chiffrer
                            $this->getModelUser()->setNickname(sanitize($_POST["nickname"]));
                            $this->getModelUser()->setEmail(sanitize($_POST["email"]));
                            $this->getModelUser()->setPassword(password_hash(sanitize($_POST["password"]), PASSWORD_BCRYPT));
                            //Check si email exist en BDD
                            if(empty($this->getModelUser()->getByEmail())){
                                $message = $this->getModelUser()->add();
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

        public function signIn():string{
            $messageConnexion = "";

            if (!empty($_POST)){
                //verifie si submit du formulaire de connexion Utilisateur existe
                if(isset($_POST["submitConnexion"])){
                    //echo "<p>Le formulaire a été envoyé</p>";
                    //verifie si champs du formulaire de connexion Utilisateur ne sont pas vide
                    if(isset($_POST["nickname"]) && isset($_POST["email"]) && isset($_POST["password"])
                    && !empty($_POST["nickname"]) && !empty($_POST["email"]) && !empty($_POST["password"])){
                        //echo "<p>Visiblement vous voulez connecter un Utilisateur.</p>";
                        // Verifier Format.
                        if(filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)){
                            //echo "<p>Votre email a le bon format.</p>";
                            // Clean les Données.
                            $this->getModelUser()->setNickname(sanitize($_POST["nickname"]));
                            $this->getModelUser()->setEmail(sanitize($_POST["email"]));
                            $this->getModelUser()->setPassword(sanitize($_POST["password"]));
                            $user = $this->getModelUser()->getByEmail();
                            //print_r($user);
                            if(!empty($user)){
                                if(strcmp($this->getModelUser()->getNickname(), $user[0]["nickname"]) == 0 && password_verify($this->getModelUser()->getPassword(), $user[0]["psswrd"])){
                                    $_SESSION["id"] = $user[0]["id"];
                                    $_SESSION["nickname"] = $user[0]["nickname"];
                                    $_SESSION["email"] = $user[0]["email"];
                                    //echo "<p>Session : ".$_SESSION["nickname"]."  Email : ".$_SESSION["email"]."</p>";
                                    header("Location:/adrar/POO/MVC_POO/Account");
                                } else{
                                    $messageConnexion = "Login et/ou Mot de Passe incorrect(s)";
                                }
                            } else{
                                $messageConnexion =  "Login et/ou Mot de Passe incorrect(s)";
                            }
                        } else{
                            $messageConnexion = "<p>Veuillez saisir un email au bon format. Ex : ######@#####.##</p>";
                        }   
                    }else {
                        $messageConnexion = "<p>Veuillez remplir les champs obligatoires !</p>";
                    }
                }
            }
        return $messageConnexion;
        }

        public function readUsers():string{
            $usersList = "";
            //recupere ModelUser->getall();
            $listUsers = $this->getModelUser()->getAll();
            //print_r($listUsers);
            //recuper code boucle foreach de li a mettre dans ul
            if(!empty($listUsers) && is_array($listUsers)){
                $usersList = "<h2>Mes Utilisateurs : </h2>";
                foreach ($listUsers as $row){
                    $usersList = $usersList."<li> Nickname : ".$row["nickname"]."  Email : ".$row["email"]."</li>";
                }
                //echo "<ul>".$usersList."</ul>";
                return $usersList;
            }else {
                $usersList ="<p>Il n'y as pas d'utilisateurs</p>";
            }
            return $usersList;
        }

        public function render():void{
            $this->getViewHome()->setMessage($this->signUp());
            $this->getViewHome()->setMessageConnection($this->signIn());
            $this->getViewHome()->setUsersList($this->readUsers());
            $this->getViewHeader()->setListLinks($this->modifyLinks());

            echo $this->getViewHeader()->displayView().$this->getViewHome()->displayView().$this->getViewFooter()->displayView();
        }
    }

    //A mettre dans le routeur après
    // $home = new ControllerHome(new ViewHome(), new ModelUser(), new ViewHeader(), new ViewFooter());
    // $home->render();
?>