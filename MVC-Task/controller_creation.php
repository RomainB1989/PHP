<?php
    session_start();

    include "./model/model_users.php";
    include "./utils/functions.php";

    $message = "";

    $message = subscribeUser($message);

    function subscribeUser($message){
        if (!empty($_POST))
        {
            //verifie si submit du formulaire de creation de compte Utilisateur existe
            if(isset($_POST["submit"])){
                //echo "<p>Le formulaire a été envoyé</p>";
                //verifie si champs du formulaire de creation de compte ne sont pas vide
                if(isset($_POST["lastname"]) && isset($_POST["firstname"]) && isset($_POST["email"]) && isset($_POST["password"]) && isset($_POST["password2"])
                && !empty($_POST["lastname"]) && !empty($_POST["firstname"]) && !empty($_POST["email"]) && !empty($_POST["password"]) && !empty($_POST["password2"])){
                    //echo "<p>Visiblement vous voulez rajouter un Utilisateur.</p>";
                    // Verifier Format.
                    if(filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)){
                        //echo "<p>Votre email a le bon format.</p>";
                        // Clean les Données.
                        // Password chiffrer
                        $firstname = cleanInput($_POST["firstname"]);
                        $lastname = cleanInput($_POST["lastname"]);
                        $email = cleanInput($_POST["email"]);
                        // Check si les deux champs password ont la meme valeur.
                        if(strcmp(cleanInput($_POST["password"]), cleanInput($_POST["password2"])) == 0){
                            // Check si l'utilisateur n'existe pas deja.
                            if(!isUserExist(connectBdd(),$email)){

                                //Appel de la fonction qui ajoute un Utilisateur.
                                //echo "<p>Votre compte à été rajouté :<br>Nom : $firstname<br>Prénom : $lastname<br>Email : $email</p>";
                                $message = insertUser(connectBdd(), $firstname,$lastname, $email, password_hash($_POST["password"], PASSWORD_DEFAULT));
                            } else {
                                $message = "<p>Un compte associé à cette adresse mail éxiste deja.";
                            }
                        } else {
                            $message = "<p>Veuillez vérifier que vos deux champs mot de passe ont le meme password.";
                        }
                    } else{
                        $message = "<p>Veuillez saisir un email au bon format. Ex : ######@#####.##</p>";
                    }   
                }else {
                    $message = "<p>Veuillez remplir les champs obligatoires !</p>";
                }
            }
        }
        return $message;
    }


    include "./controller_header.php";
    include "./view/view_creation.php";
    include "./view/footer.php";

?>