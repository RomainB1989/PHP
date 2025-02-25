<?php

    session_start();

    include "./model/model_tasks.php";
    include "./model/model_category.php";
    include "./utils/functions.php";
    
    $message = $categorie = "";

    $message = createTask($message);
    // $listUsers = showUsers(connectBdd());

    $categorie = categoryList(connectBdd());

    function createTask($message){
        if (!empty($_POST))
        {
            //verifie si submit du formulaire de creation de compte Utilisateur existe
            if(isset($_POST["submit"])){
                //echo "<p>Le formulaire a été envoyé</p>";
                //verifie si champs du formulaire de creation de compte ne sont pas vide
                if(isset($_POST["name_task"]) && isset($_POST["content_task"]) && isset($_POST["date_task"]) && isset($_POST["name_category"])
                && !empty($_POST["name_task"]) && !empty($_POST["content_task"]) && !empty($_POST["date_task"]) && !empty($_POST["name_category"])){
                    //echo "<p>Visiblement vous voulez rajouter un Utilisateur.</p>";
                    // Verifier Format.
                    // Clean les Données.
                    // Password chiffrer
                    $name_task = cleanInput($_POST["name_task"]);
                    $content_task = cleanInput($_POST["content_task"]);
                    $date_task = cleanInput($_POST['date_task']);
                    $id_category = cleanInput($_POST["name_category"]);
                    
                    if(isset($_SESSION["id"]) && !empty($_SESSION["id"])){
                        $id_user = $_SESSION["id"];
                    }
                    //$category = cleanInput(getIdCategory($_POST["id_category"]));
                    // Check si la tache n'existe pas deja.
                    if(!isTaskExist(connectBdd(),$name_task)){
                        //Appel de la fonction qui ajoute un Utilisateur.
                        //echo "<p>Votre compte à été rajouté :<br>Nom : $firstname<br>Prénom : $lastname<br>Email : $email</p>";
                        $message = insertTask(connectBdd(), $name_task,$content_task, $date_task, $id_category, $id_user);
                    } else {
                        $message = "<p>Ce Nom de tache existe deja.";
                    }
                }else {
                    $message = "<p>Veuillez remplir les champs obligatoires !</p>";
                }
            }
        }
        return $message;
    }


    include "./controller_header.php";
    include "./view/view_insert_task.php";
    include "./view/footer.php";

?>