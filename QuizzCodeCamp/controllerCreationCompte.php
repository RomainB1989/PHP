<link rel="stylesheet" href="./source/css/creationCompte.css">
<?php
include "./utils/functions.php";
include "./model/model_user.php";

$message = "";


if(isset($_POST["inscriptionButton"])){
    //! 1er étape: vérifier les champs vides
    if(isset($_POST["name_user"]) && !empty($_POST["name_user"]) && isset($_POST["firstname_user"]) && !empty($_POST["firstname_user"]) && isset($_POST["email_user"]) && !empty($_POST["email_user"]) && isset($_POST["mdp_user"]) && !empty($_POST["mdp_user"])){
            //! 2eme étape: vérifier format
            if(filter_var($_POST["email_user"], FILTER_VALIDATE_EMAIL)){
                //! 3eme étape: nettoyer les données
                $nom = nettoyage($_POST["name_user"]);
                $prenom = nettoyage($_POST["firstname_user"]);
                $email = nettoyage($_POST["email_user"]);
                $mdp = nettoyage($_POST["mdp_user"]);
                $avatar = "";

                // if(isset($_FILES['photoInscription']) &&$_FILES['avatar']['error'] == 0){
                //     $allowed_types = ['image/jpeg', 'image/png'];
                //     $fileType = mime_content_type($_FILES['avatar']['tmp_name']);
                //     if(in_array($fileType, $allowed_types)){
                //         $upload_dir = './source/images/avatars/';
                //         if(!is_dir($upload_dir)){
                //             mkdir($upload_dir, 0777, true);
                //         }
                //         $avatar_name = basename($_FILES['avatar']['name']);
                //         $avatar_path = $upload_dir . $avatar_name;

                //         if(move_uploaded_file($_FILES['avatar']['tmp_name'], $avatar_path)){
                //             $avatar = $avatar_path;
                //         }else{
                //             $message = "Erreur lors de l'upload de l'avatar";
                //         }
                //     } else{
                //         $message = "Type de fichier non autorisé";
                // }
            
                //chiffrage mdp
                $mdp = password_hash($mdp, PASSWORD_BCRYPT);

                $bdd = DBconnect();

                $message = userAdd($bdd, $nom, $prenom, $email, $mdp, $avatar);
            }else{
                $message = "Email non valide";
            }
        }else{   
            $message = "Remplir tous les champs obligatoires svp";
        }
} else {
    $message = "Erreur lors de l'envoi du formulaire";
}


include "./view/header.php";
include "./view/viewCreationCompte.php";
include "./view/footer.php";
?>