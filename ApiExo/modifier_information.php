<?php
// Accès depuis n'importe quel site ou appareil (*)
header("Access-Control-Allow-Origin: *"); //autres valeurs domain, none

// Format des données envoyées
header("Content-Type: application/json; charset=UTF-8");

// Méthode autorisée, ici POST, mais ça peut être GET, PUT ou DELETE
header("Access-Control-Allow-Methods: PUT");

// Durée de vie de la requête
header("Access-Control-Max-Age: 3600");

// Entêtes autorisées
header("Access-Control-Allow-Headers: Content-Type,Access-Control-Allow-Headers, Authorization, X-Requested-With");

//CONTROLE DE LA METHODE HTTP
if($_SERVER['REQUEST_METHOD'] != 'PUT'){
    //code réponse HTTP
    http_response_code(405);

    //Envoie du message d'erreur
    echo json_encode(["message" => "Methode non autorisée. PUT requis.", "code" => 405]);

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
//1) Vérifier les champs vides
if(empty($data->id) || empty($data->nickname) || empty($data->email) || empty($data->password)){
    //Revoie un message d'erreur
    http_response_code(400);
    $response = ["message" => "Données manquantes.", "code" => 400];
    echo json_encode($response);
    return;
}

//2) Vérifier le format du mail
if(!filter_var($data->email, FILTER_VALIDATE_EMAIL)){
    //Revoie un message d'erreur
    http_response_code(400);
    $response = ["message" => "Email pas au bon format.", "code" => 400];
    echo json_encode($response);
    return;
}

//2Bis) Vérifier le format de l'id
if(!filter_var($data->id, FILTER_VALIDATE_INT)){
    //Revoie un message d'erreur
    http_response_code(400);
    $response = ["message" => "Id pas au bon format.", "code" => 400];
    echo json_encode($response);
    return;
}

//3) Nettoyage des données

//$id = htmlentities(strip_tags(stripslashes(trim($data->id))));

$id = $data->id;

$nickname = htmlentities(strip_tags(stripslashes(trim($data->nickname))));

$email = htmlentities(strip_tags(stripslashes(trim($data->email))));

$password = htmlentities(strip_tags(stripslashes(trim($data->password))));

//4) Hasher le mot de passe
$password = password_hash($password, PASSWORD_BCRYPT);

//5) Vérifier si l'email est disponible ou pas
//5.1) Création de l'objet de connexion
$bdd = new PDO('mysql:host=localhost;dbname=users','root','',array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));

try{
    

    //6) Modifier Info l'utilisateur
    //6.1) Préparation de la requête UPDATE
    $req = $bdd->prepare("UPDATE users SET nickname = ? , email = ? , psswrd = ? WHERE id = ?" );

    //6.2) Binding de Param
    $req->bindParam(1,$nickname,PDO::PARAM_STR);
    $req->bindParam(2,$email,PDO::PARAM_STR);
    $req->bindParam(3,$password,PDO::PARAM_STR);
    $req->bindParam(4,$id,PDO::PARAM_INT);

    //6.3) Exécution de la réquête
    $req->execute();

    //6.4) Envoie le message de confirmation
    //Encoder le code réponse HTTP
    http_response_code(200);

    //Tableau associatif de ma réponse
    $tab = ['message' => 'Modification d\'information effectué avec Succès !', 'code' => 200];

    //Chiffrer la réponse en json
    $json = json_encode($tab);

    //Affichage du json (ce qui retourne la réponse au client)
    echo $json;

    //echo gettype($id);

    //Arrêt du script
    return;

}catch(EXCEPTION $error){
    //Envoyer une réponse d'erreur 500
    http_response_code(500);
    echo json_encode(["message" => $error->getMessage(), "code" => 500]);
    return;
}
