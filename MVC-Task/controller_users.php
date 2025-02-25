<?php
    session_start();
    
    include "./model/model_users.php";
    include "./utils/functions.php";

    $listUsers = showUsers(connectBdd());

    if(!empty($listUsers)){
        $message = "<ul><h2>Mes Utilisateurs : </h2>";
        foreach ($listUsers as $row){
            $message = $message."<li>  Prénom: " . $row["name_user"] . "<br>Nom: " . $row["firstname_user"] . "<br>Email: " . $row["email_user"] . "</li><br>";
        }
         $message = $message."</ul>";
    }else {
        $message = "<p>Il n'y as pas d'utilisateurs</p>";
    }
    

    include "./controller_header.php";
    include "./view/view_users.php";
    include "./view/footer.php";

?>