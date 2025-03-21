<?php
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
$data = json_decode($json);

//ATTENTION : $data est un objet => il faut accéder aux données grâce à la structure objet. Exemple : $data->email

//Maintenant on peut exploiter les données comme on veut
// Par exemple ici, on veut enregistrer un users, grâce à son nickname, son email et son password
// On crée notre algo de manière habituelle comme si on traitait un formulaire
//print_r($data);

//1) Vérifier les champs vides
if(empty($data->firstname_user) || empty($data->lastname_user) || empty($data->email_user) || empty($data->mdp_user)){
    //Revoie un message d'erreur
    http_response_code(400);
    $response = ["message" => "Données manquantes.", "code" => 400];
    echo json_encode($response);
    return;
}

//2) Vérifier le format du mail
if(!filter_var($data->email_user, FILTER_VALIDATE_EMAIL)){
    //Revoie un message d'erreur
    http_response_code(400);
    $response = ["message" => "Email pas au bon format.", "code" => 400];
    echo json_encode($response);
    return;
}


//3) Nettoyage des données
$firstname_user = htmlentities(strip_tags(stripslashes(trim($data->firstname_user))));
$lastname_user = htmlentities(strip_tags(stripslashes(trim($data->lastname_user))));
$email = htmlentities(strip_tags(stripslashes(trim($data->email_user))));
$password = htmlentities(strip_tags(stripslashes(trim($data->mdp_user))));
//$avatar = htmlentities(strip_tags(stripslashes(trim($data->avatar_user))));
$id_role = 1;
$avatar = "";

if(empty($avatar)){
$avatar = "./source/images/sonic-gollum.jpg";
}

//4) Hasher le mot de passe
$password = password_hash($password, PASSWORD_BCRYPT);

//5) Vérifier si l'email est disponible ou pas
//5.1) Création de l'objet de connexion
$bdd = DBconnect();

try{
    //5.2) Préparation de la requête SELECT
    $req=$bdd->prepare('SELECT firstname_user, lastname_user, email_user, id_role FROM users WHERE email_user = ?');

    //5.3) Binding de Param
    $req->bindParam(1,$email, PDO::PARAM_STR);

    //5.4) Exécution de la requête
    $req->execute();

    //5.5)Récupération de la réponse de la BDD
    $data = $req->fetchAll(PDO::FETCH_ASSOC);

    //5.6) Vérification si $data est vide
    if(!empty($data)){
        http_response_code(409);
        echo json_encode(["message" => "Email déjà utilisé", "code" => 409]);
        return;
    }

    //6) Enregistrer l'utilisateur
    //6.1) Préparation de la requête INSERT
    $req = $bdd->prepare('INSERT INTO users (firstname_user, lastname_user, email_user, password_user, avatar_user, id_role) VALUES (?,?,?,?,?,?)');

    //6.2) Binding de Param
    $req->bindParam(1,$firstname_user,PDO::PARAM_STR);
    $req->bindParam(2,$lastname_user,PDO::PARAM_STR);
    $req->bindParam(3,$email,PDO::PARAM_STR);
    $req->bindParam(4,$password,PDO::PARAM_STR);
    $req->bindParam(5,$avatar,PDO::PARAM_STR);
    $req->bindParam(6,$id_role,PDO::PARAM_INT);
    //6.3) Exécution de la réquête
    $req->execute();

    //6.4) Envoie le message de confirmation
    //Encoder le code réponse HTTP
    http_response_code(200);

    //Tableau associatif de ma réponse
    $tab = ['message' => 'Inscription effectué avec Succès !', 'code' => 200];

    //Chiffrer la réponse en json
    $json = json_encode($tab);

    //Affichage du json (ce qui retourne la réponse au client)
    echo $json;

    //Arrêt du script
    return;

}catch(EXCEPTION $error){
    //Envoyer une réponse d'erreur 500
    http_response_code(500);
    echo json_encode(["message" => $error->getMessage(), "code" => 500]);
    return;
}





// if(isset($_POST["inscriptionButton"])){
//     //! 1er étape: vérifier les champs vides
//     if(isset($_POST["name_user"]) && !empty($_POST["name_user"]) && isset($_POST["firstname_user"]) && !empty($_POST["firstname_user"]) && isset($_POST["email_user"]) && !empty($_POST["email_user"]) && isset($_POST["mdp_user"]) && !empty($_POST["mdp_user"])){
//             //! 2eme étape: vérifier format
//             if(filter_var($_POST["email_user"], FILTER_VALIDATE_EMAIL)){
//                 //! 3eme étape: nettoyer les données
//                 $nom = nettoyage($_POST["name_user"]);
//                 $prenom = nettoyage($_POST["firstname_user"]);
//                 $email = nettoyage($_POST["email_user"]);
//                 $mdp = nettoyage($_POST["mdp_user"]);
//                 $avatar = "";
//                 //chiffrage mdp
//                 $mdp = password_hash($mdp, PASSWORD_BCRYPT);

//                 $bdd = DBconnect();

//                 $message = userAdd($bdd, $nom, $prenom, $email, $mdp, $avatar);
//             }else{
//                 $message = "Email non valide";
//             }
//         }else{   
//             $message = "Remplir tous les champs obligatoires svp";
//         }
// } else {
//     $message = "Erreur lors de l'envoi du formulaire";
// }


// include "./view/header.php";
// include "./view/viewCreationCompte.php";
// include "./view/footer.php";
?>