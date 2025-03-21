<?php

function userAdd($bdd, $nom, $prenom, $email, $mdp, $avatar){
    $id_role = 1;
    if(empty($avatar)){
    $avatar = "./source/images/sonic-gollum.jpg";
    }
    try{
                        
        //! verif du mail déjà existant
        $req = $bdd->prepare("SELECT email_user FROM users WHERE email_user = ? LIMIT 1");

        $req->bindParam(1, $email, PDO::PARAM_STR);

        $req->execute();

        $utilisateur = $req->fetch(PDO::FETCH_ASSOC);

        if(empty($utilisateur)){
        //! envoi des données sur BDD
        $req = $bdd->prepare("INSERT INTO users (`lastname_user`, `firstname_user`, `email_user`, `password_user`, id_role, avatar_user) VALUES (?,?,?,?,?,?)");

        $req->bindParam(1, $nom, PDO::PARAM_STR);

        $req->bindParam(2, $prenom, PDO::PARAM_STR);

        $req->bindParam(3, $email, PDO::PARAM_STR);

        $req->bindParam(4, $mdp, PDO::PARAM_STR);

        $req->bindParam(5, $id_role, PDO::PARAM_INT);

        $req->bindParam(6, $avatar, PDO::PARAM_STR);


        $req->execute();

        return "Inscription de $prenom $nom réussi.";

        }else{
            return "Email déjà utilisé";
        }

    }catch(EXCEPTION $error){
        return $error->getMessage();
    }
}


function readUserBymail($bdd, $email){

    try {
        $req = $bdd->prepare("SELECT id_user, lastname_user, firstname_user, email_user, password_user FROM users WHERE email_user =? LIMIT 1");

        $req->bindParam(1, $email, PDO::PARAM_STR);

        $req->execute();

        $data = $req->fetchAll();

        return $data;
}
catch(Exception $error) {
    return $error->getMessage();
}
}

?>