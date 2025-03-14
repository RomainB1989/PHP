<?php

    $styleLink = $scriptLink = "";

    $styleLink = '<link rel="stylesheet" href="./view/style/cguv.css">';
    // $scriptLink = '<script src=".view/script/accueil.js"></script>';

    include "./view/view_header.php";
    include "./controller_nav.php";
    include "./view/view_cguv.php";
    include "./view/view_footer.php";
?>