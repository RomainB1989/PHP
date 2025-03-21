<?php

session_start();

session_destroy();

//redirection vers l'accueil
header('Location:index.php');

?>