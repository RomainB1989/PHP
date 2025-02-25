<?php
    session_start();

    include "./model/model_category.php";
    include "./utils/functions.php";

    $message = "";

    $message = createCategory($message);

    function createCategory($message){
        if (!empty($_POST))
        {
            //verifie si submit du formulaire de creation de compte Utilisateur existe
            if(isset($_POST["submit"])){
                //echo "<p>Le formulaire a été envoyé</p>";
                //verifie si champs du formulaire de creation de compte ne sont pas vide
                if(isset($_POST["name_category"]) && !empty($_POST["name_category"])){
                    //echo "<p>Visiblement vous voulez rajouter un Utilisateur.</p>";
                    // Verifier Format.
                    // Clean les Données.
                    // Password chiffrer
                    $name_category = cleanInput($_POST["name_category"]);
                    //$category = cleanInput(getIdCategory($_POST["id_category"]));
                    // Check si la tache n'existe pas deja.
                    if(!isCategoryExist(connectBdd(),$name_category)){
                        //Appel de la fonction qui ajoute un Utilisateur.
                        //echo "<p>Votre compte à été rajouté :<br>Nom : $firstname<br>Prénom : $lastname<br>Email : $email</p>";
                        $message = insertCategory(connectBdd(), $name_category);
                    } else {
                        $message = "<p>Ce Nom de Catégorie existe deja.";
                    }
                }else {
                    $message = "<p>Veuillez remplir les champs obligatoires !</p>";
                }
            }
        }
        return $message;
    }


    include "./controller_header.php";
    include "./view/view_insert_category.php";
    include "./view/footer.php";

?>