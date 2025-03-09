<?php

$styleLink = $scriptLink = "";

$styleLink = '<link rel="stylesheet" href="./view/style/presentation.css">';
$scriptLink = '<script src="./view/script/slideshow.js"></script>';


include "./view/view_header.php";
include "./controller_nav.php";
include "./view/view_presentation.php";
include "./view/view_footer.php";

?>