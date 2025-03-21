<link rel="stylesheet" href="./source/css/connexionCompte.css">
<?php
session_start();
include "./utils/functions.php";
include "./model/model_user.php";
$message = "";
if(isset($_POST["envoyer"])){
    //! 1er étape: vérifier les champs vides
    if(isset($_POST["email"]) && !empty($_POST["email"]) && isset($_POST["password"]) && !empty($_POST["password"])){
            //! 2eme étape: vérifier format
            if(filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)){
                //! 3eme étape: nettoyer les données
                $email = nettoyage($_POST["email"]);
                $mdp = nettoyage($_POST["password"]);

                $bdd = DBconnect();

                $data = readUserBymail($bdd, $email);

                if(!empty($data)){
                    
                    //! Verifier correspondance mdp entré avec mdp BDD
                    if(password_verify($mdp, $data[0]["password_user"])){
                        
                        $_SESSION['id_user'] = $data[0]['id_user'];
                        $_SESSION['lastname_user'] = $data[0]['lastname_user'];
                        $_SESSION['firstname_user'] = $data[0]['firstname_user'];
                        $_SESSION['email_user'] = $data[0]['email_user'];
                        $_SESSION['id_role'] = $data[0]['id_role'];
                        
                        $message = "Connexion réussie";
                        
                        if($data[0]['id_role'] == 2){
                            header('Location:controllerAdmin.php');
                        }else{
                            header('Location:controllerCompteUtilisateurStat.php');
                        }

                    }else{
                        $message = "Mot de passe non valide";
                    }

                }else{
                    $message = "Login et/ou Mot de Passe incorrect(s)";
                }

            }else{   
            $message = "Email non valide";
            }
    }else{
        $message = "Remplir tous les champs obligatoires svp";
    }
}

include "./view/header.php";
include "./view/viewConnexionCompte.php";
include "./view/footer.php";
?>