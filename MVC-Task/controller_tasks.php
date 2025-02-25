<?php
    include "./model/model_tasks.php";
    include "./utils/functions.php";

    $listTasks = showTasks(connectBdd());

    if(!empty($listTasks)){
        $message = "<ul><h2>Mes Taches à Faire : </h2>";
            foreach ($listTasks as $row){
                $message = $message. "<li>  Nom de Tache : " . $row["name_task"] . "<br>Contenu de Tache : " . $row["content_task"] . "<br>Date : " . $row["date_task"] . "</li><br>";
            }
        $message = $message. "</ul>";
    }else {
        $message = "<p>Il n'y as pas de Taches, tu pas allez jouer à la Console</p>";
    }

    include "./controller_header.php";
    include "./view/view_tasks.php";
    include "./view/footer.php";

?>