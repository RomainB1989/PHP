<?php
    include "./model/model_products.php";

    $styleLink = $scriptLink = "";
    
    $styleLink = '<link rel="stylesheet" href="./view/style/boutique.css">';
    // $scriptLink = '<script src="./view/script/boutique.js"></script>';

    // Récupération des produits
    $products = getAllProducts(connect());
    
    include "./view/view_header.php";
    include "./controllers/controller_nav.php";
    include "./view/view_boutique.php";
    include "./view/view_footer.php";
?> 