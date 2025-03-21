<?php
// function taskAdd($bdd, $nom, $contenue, $date){
//     try{

//         //! envoi des données sur BDD
//         $req = $bdd->prepare("INSERT INTO tasks (`name_task`, `content_task`, `date_task`) VALUES (?,?,?)");

//         $req->bindParam(1, $nom, PDO::PARAM_STR);

//         $req->bindParam(2, $contenue, PDO::PARAM_STR);

//         $req->bindParam(3, $date, PDO::PARAM_STR);

//         $req->execute();

//         return "Tâche $nom enregistrée";

//     }catch(EXCEPTION $error){
//         return $error->getMessage();
//     }
// }

function quizzAll($bdd){
    $quizzList = "";
    
    try{
        //!préparer le SELECT
        $req = $bdd->prepare("SELECT title_quizz, description_quizz, img_quizz FROM quizz");

        //!execution de la requete
        $req->execute();

        //!récupérer données BDD
        $data = $req->fetchAll();

        foreach($data as $quizz){
            $quizzList = $quizzList."<li class='quizz'>  <a href=''> <img src='./source/images/{$quizz['img_quizz']}' alt='{$quizz['img_quizz']}'> <h2 class='titleQ'>{$quizz['title_quizz']}</h2> <p class='descriptionQuizz'>{$quizz['description_quizz']}</p> </a> </li>";
        }

        return $quizzList;

    }catch(EXCEPTION $error){
        return $error->getMessage();
    }
}

?>