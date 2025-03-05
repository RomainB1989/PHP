<?php

    // session_start();

    // include "./utils/utils.php";
    // include "./model/modelCategory.php";
    // include "./view/viewHeader.php";
    // include "./view/viewCategory.php";
    // include "./view/viewFooter.php";
    // include "./controllerGeneric.php";

    class ControllerCategory extends ControllerGeneric{

        //ATRIBUTES
        private?ViewCategory $viewCategory;
        private ?ModelCategory $modelCategory;
        //CONSTRUCT
        public function __construct(?ViewCategory $newViewCategory, ?ModelCategory $newModelCategory, ?Viewheader $newViewHeader, ?ViewFooter $newViewFooter ){
            $this->viewCategory = $newViewCategory;
            $this->modelCategory = $newModelCategory;
            $this->setViewHeader( $newViewHeader );
            $this->setViewFooter( $newViewFooter );
        }

        //GETTER
        public function getViewCategory(): ?ViewCategory{
            return $this->viewCategory;
        }

        public function getModelCategory(): ?ModelCategory{
            return $this->modelCategory;
        }
        //SETTER
        public function setViewCategory($newViewCategory):ControllerCategory{
            $this->viewCategory = $newViewCategory;
            return $this;
        }

        public function setModelCategory(ModelCategory $newModelCategory):ControllerCategory{
            $this->modelCategory = $newModelCategory;
            return $this;
        }
        
        //METHODS
        public function addCategory():string{
            $message = "";

            if (!empty($_POST))
            {
                //verifie si submit du formulaire de creation de compte Utilisateur existe
                if(isset($_POST["submit"])){
                    //echo "<p>Le formulaire a été envoyé</p>";
                    //verifie si champs du formulaire de creation de compte ne sont pas vide
                    if(isset($_POST["name_category"])&& !empty($_POST["name_category"])){
                        //echo "<p>Visiblement vous voulez rajouter un Utilisateur.</p>";
                        // Verifier Format.
                            //echo "<p>Votre email a le bon format.</p>";
                            // Clean les Données.
                            // Password chiffrer
                            $this->getModelCategory()->setName(sanitize($_POST["name_category"]));
                            //Check si email exist en BDD
                            if(empty($this->getModelCategory()->getByName())){
                                $message = $this->getModelCategory()->add();
                            } else {
                                $message = "Cette Catégorie existe deja !";
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

        public function readCategories():string{
            $categoriesList = "";

            $listCategories = $this->getModelCategory()->getAll();
            //print_r($listCategories);
            //recuper code boucle foreach de li a mettre dans ul
            if(!empty($listCategories) && is_array($listCategories)){
                $categoriesList = "<h2>Mes Categorie : </h2>";
                foreach ($listCategories as $row){
                    $categoriesList = $categoriesList."<li>  ".$row["name"]."</li>";
                }
                //echo "<ul>".$categoriesList."</ul>";
            }else {
                $categoriesList ="Il n'y as pas de Catégories";
            }
            return $categoriesList;
        }

        public function render():void{
            $this->getViewCategory()->setMessage($this->AddCategory());
            $this->getViewCategory()->setCategoryList($this->readCategories());
            $this->getViewHeader()->setListLinks($this->modifyLinks());
            echo $this->getViewHeader()->displayView().$this->getViewCategory()->displayView().$this->getViewFooter()->displayView();
        }

    }

    //A mettre dans le routeur après
    // $category = new ControllerCategory(new ViewCategory(), new ModelCategory(), new ViewHeader(), new ViewFooter());
    // $category->render();

?>