<?php

session_start();

include "./utils/utils.php";
include "./view/viewHeader.php";
include "./view/viewFooter.php";
include "./controller/controllerGeneric.php";


//print_r($_SERVER]);

//Recuperer URL entré par User
$url = parse_url($_SERVER['REQUEST_URI']);
// print_r($url);

// Ternaire qui interieur de l'url pour récupérer le path (Ce qui se trouve apres le nom de domaine)
$path = $url["path"] ?? "/";

// Comparer le path obtenu avec les routes mises en place
switch ($path){
    case '/adrar/POO/MVC_POO/Accueil':
        include "./model/modelUser.php";
        include "./view/viewHome.php";
        include "./controller/controllerHome.php";
        $home = new ControllerHome(new ViewHome(), new ModelUser(), new ViewHeader(), new ViewFooter());
        $home->render();
        break;

    case '/adrar/POO/MVC_POO/Category':
        include "./model/modelCategory.php";
        include "./view/viewCategory.php";
        include "./controller/controllerCategory.php";
        $category = new ControllerCategory(new ViewCategory(), new ModelCategory(), new ViewHeader(), new ViewFooter());
        $category->render();
        break;
    
    case '/adrar/POO/MVC_POO/Account':
        include "./view/viewAccount.php";
        include "./controller/controllerAccount.php";
        $account = new ControllerAccount(new ViewAccount(), new ViewHeader(), new ViewFooter());
        $account->render();
        break;
    
    case '/adrar/POO/MVC_POO/Deconnexion':
        include "./controller/controllerLogOut.php";
        break;
}


?>