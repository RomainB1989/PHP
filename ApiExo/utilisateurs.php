<?php
// Accès depuis n'importe quel site ou appareil (*)
header("Access-Control-Allow-Origin: *"); //autres valeurs domain, none

// Format des données envoyées
header("Content-Type: application/json; charset=UTF-8");

// Méthode autorisée, ici POST, mais ça peut être GET, PUT ou DELETE
header("Access-Control-Allow-Methods: GET");

// Durée de vie de la requête
header("Access-Control-Max-Age: 3600");

// Entêtes autorisées
header("Access-Control-Allow-Headers: Content-Type,Access-Control-Allow-Headers, Authorization, X-Requested-With");

//CONTROLE DE LA METHODE HTTP
if($_SERVER['REQUEST_METHOD'] != 'GET'){
    //code réponse HTTP
    http_response_code(405);

    //Envoie du message d'erreur
    echo json_encode(["message" => "Methode non autorisée. GET requis.", "code" => 405]);

    //arrêt du script
    return;
}

$bdd = new PDO('mysql:host=localhost;dbname=users','root','',array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));

    try{
        
        $req=$bdd->prepare('SELECT id, nickname, email, psswrd FROM users');
        $req->execute();
        $data = $req->fetchAll(PDO::FETCH_ASSOC);

        http_response_code(200);
        //Affichage du json (ce qui retourne la réponse au client)
        if(!empty($data)){
            $tab = ['message' => 'Recupération des Utilisateurs avec succès', 'code' => 200, 'users' => $data];
        }else{
            $tab = ['message' => 'Recupération des Utilisateurs avec succès', 'code' => 200, 'users' => "Pas D'Utilisateurs"];
        }
        $json = json_encode($tab);
        echo $json;
        //Arrêt du script
        return;

    }catch(EXCEPTION $error){
        //Envoyer une réponse d'erreur 500
        http_response_code(500);
        echo json_encode(["message" => $error->getMessage(), "code" => 500]);
        return;
    }

?>