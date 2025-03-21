<?php
session_start();
include "./utils/functions.php";
include "./model/model_user.php";

// Accès depuis n'importe quel site ou appareil (*)
header("Access-Control-Allow-Origin: *"); //autres valeurs domain, none

// Format des données envoyées
header("Content-Type: application/json; charset=UTF-8");

// Méthode autorisée, ici POST, mais ça peut être GET, PUT ou DELETE
header("Access-Control-Allow-Methods: POST");

// Durée de vie de la requête
header("Access-Control-Max-Age: 3600");

// Entêtes autorisées
header("Access-Control-Allow-Headers: Content-Type,Access-Control-Allow-Headers, Authorization, X-Requested-With");

//CONTROLE DE LA METHODE HTTP
if($_SERVER['REQUEST_METHOD'] != 'POST'){
    //code réponse HTTP
    http_response_code(405);

    //Envoie du message d'erreur
    echo json_encode(["message" => "Methode non autorisée. POST requis.", "code" => 405]);

    //arrêt du script
    return;
}


//Réception des données
$json = file_get_contents('php://input');

//Déchiffre le json en objet exploitable
$dataJson = json_decode($json);

//ATTENTION : $data est un objet => il faut accéder aux données grâce à la structure objet. Exemple : $data->email

//Maintenant on peut exploiter les données comme on veut
// Par exemple ici, on veut enregistrer un users, grâce à son nickname, son email et son password
// On crée notre algo de manière habituelle comme si on traitait un formulaire
//print_r($data);

//1) Vérifier les champs vides
if(empty($dataJson->email_user) || empty($dataJson->mdp_user)){
    //Revoie un message d'erreur
    http_response_code(400);
    $response = ["message" => "Données manquantes.", "code" => 400];
    echo json_encode($response);
    return;
}

//2) Vérifier le format du mail
if(!filter_var($dataJson->email_user, FILTER_VALIDATE_EMAIL)){
    //Revoie un message d'erreur
    http_response_code(400);
    $response = ["message" => "Email pas au bon format.", "code" => 400];
    echo json_encode($response);
    return;
}


//3) Nettoyage des données

$email = htmlentities(strip_tags(stripslashes(trim($dataJson->email_user))));
$password = htmlentities(strip_tags(stripslashes(trim($dataJson->mdp_user))));

$bdd = DBconnect();

try{
    //4.1) Recuperation BDD avec email formulaire
    $req=$bdd->prepare('SELECT id_user, firstname_user, lastname_user, email_user, password_user, id_role FROM users WHERE email_user = ? LIMIT 1');

    //4.2) Binding de Param
    $req->bindParam(1,$email, PDO::PARAM_STR);

    //4.3) Exécution de la requête
    $req->execute();

    //4.4)Récupération de la réponse de la BDD
    $data = $req->fetchAll(PDO::FETCH_ASSOC);


    //5.1) Vérification si $data n'est pas vide
    if(!empty($data)){
                    
        //5.2 Verifier correspondance mdp entré avec mdp BDD
            if(password_verify($password, $data[0]["password_user"])){
                
                $_SESSION['id_user'] = $data[0]['id_user'];
                $_SESSION['lastname_user'] = $data[0]['lastname_user'];
                $_SESSION['firstname_user'] = $data[0]['firstname_user'];
                $_SESSION['email_user'] = $data[0]['email_user'];
                $_SESSION['id_role'] = $data[0]['id_role'];
                

                //7) Envoie le message de confirmation
                http_response_code(200);
                echo json_encode(['message' => 'Connexion effectué avec Succès !', 'code' => 200, 'id_role' => $data[0]['id_role']]);

                //Arrêt du script
                return;
                // header('Location:controllerCompteUtilisateurStat.php');

            }else{
                http_response_code(409);
                echo json_encode(["message" => "Login et/ou Mot de Passe incorrect(s) !", "code" => 409]);
                return;
            }

        }else{
            http_response_code(409);
            echo json_encode(["message" => "Login et/ou Mot de Passe incorrect(s) !", "code" => 409]);
            return;
        }

    }catch(EXCEPTION $error){
    //Envoyer une réponse d'erreur 500
    http_response_code(500);
    echo json_encode(["message" => $error->getMessage(), "code" => 500]);
    return;
}
// $message = "";
// if(isset($_POST["envoyer"])){
//     //! 1er étape: vérifier les champs vides
//     if(isset($_POST["email"]) && !empty($_POST["email"]) && isset($_POST["password"]) && !empty($_POST["password"])){
//             //! 2eme étape: vérifier format
//             if(filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)){
//                 //! 3eme étape: nettoyer les données
//                 $email = nettoyage($_POST["email"]);
//                 $mdp = nettoyage($_POST["password"]);

//                 $bdd = DBconnect();

//                 $data = readUserBymail($bdd, $email);

//                 if(!empty($data)){
                    
//                     //! Verifier correspondance mdp entré avec mdp BDD
//                     if(password_verify($mdp, $data[0]["password_user"])){
                        
//                         $_SESSION['id_user'] = $data[0]['id_user'];
//                         $_SESSION['lastname_user'] = $data[0]['lastname_user'];
//                         $_SESSION['firstname_user'] = $data[0]['firstname_user'];
//                         $_SESSION['email_user'] = $data[0]['email_user'];
//                         $_SESSION['id_role'] = $data[0]['id_role'];
                        
//                         $message = "Connexion réussie";
//                         header('Location:controllerCompteUtilisateurStat.php');

//                     }else{
//                         $message = "Mot de passe non valide";
//                     }

//                 }else{
//                     $message = "Login et/ou Mot de Passe incorrect(s)";
//                 }

//             }else{   
//             $message = "Email non valide";
//             }
//     }else{
//         $message = "Remplir tous les champs obligatoires svp";
//     }
// }

// include "./view/header.php";
// include "./view/viewConnexionCompte.php";
// include "./view/footer.php";
?>