<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>QuizzCodeCamp - Création de compte</title>
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <!-- Css -->
    <link rel="stylesheet" href="./source/css/style.css">
</head>
<body>
    <header>
        <a href="./index.php" target="_self" id="indexLink">
            <div class="logo">
                <img src="./source/images/logo.png" alt="Logo QuizzCodeCamp" width="160px" height="160px">
                <h1><span class="red">Q</span>uizz<span class="green">C</span>odeCa<span class="blue">m</span>p</h1>
            </div>
        </a>
        <div class="search-container">
            <label for="search" class="search-label"><img src="./source/images/Loop-Icon.png" alt="Icon Loop" class="icon-search"></label>         
            <input type="text" placeholder="Recherchez..." class="search-input" size="40" id="search"> 
        </div>
        <div class="account">
            <img src="./source/images/Icon Compte.png" alt="Icon Compte" class="icon-account">
            <a href="#">
                <img src="./source/images/bar-chart-50.png" alt="icon-stats" width="80px" height="80px">
            </a>    
        </div>
        <div class="box-account">
            <a href="./controllerConnexionCompte.php" class="link">Se connecter</a>
            <a href="./controllerCreationCompte.php" class="link">Créer mon compte</a>
        </div>
    </header>