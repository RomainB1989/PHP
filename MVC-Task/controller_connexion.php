<?php

    session_start();
    

    include "./utils/functions.php";
    include "./model/model_users.php";

    $message = "";

    $message = connectUser($message);
    if(isset($_SESSION["id"]) && !empty($_SESSION["id"])){
        header("Location:controller_account.php");
    }

    function connectUser($message){
        if (!empty($_POST)){
            //verifie si submit du formulaire de creation de compte Utilisateur existe
            if(isset($_POST["submitConnection"])){
                //echo "<p>Le formulaire a été envoyé</p>";
                //verifie si champs du formulaire de creation de compte ne sont pas vide
                if(isset($_POST["email"]) && isset($_POST["password"])
                && !empty($_POST["email"]) && !empty($_POST["password"])){
                    echo "<p>Visiblement vous voulez connecter un Utilisateur.</p>";
                    // Verifier Format.
                    if(filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)){
                        echo "<p>Votre email a le bon format.</p>";
                        // Clean les Données.
                        $email = cleanInput($_POST["email"]);
                        $password = cleanInput($_POST["password"]);
                        $user = getUserByEmail(connectBdd(),$email);
                        //print_r($user);

                        if(!empty($user)){
                            if(password_verify($password, $user[0]["mdp_user"])){
                                $_SESSION["id"] = $user[0]["id_user"];
                                $_SESSION["name"] = $user[0]["name_user"];
                                $_SESSION["firstname"] = $user[0]["firstname_user"];
                                $_SESSION["email"] = $user[0]["email_user"];
                                //echo "<p>".$_SESSION["name"]."</p>";
                                header("Location:controller_account.php");
                            } else{
                                $message = "Login et/ou Mot de Passe incorrect(s)";
                            }
                        } else{
                            $message =  "Login et/ou Mot de Passe incorrect(s)";
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
    include "./view/view_connection.php";
    include "./view/footer.php";
?>


