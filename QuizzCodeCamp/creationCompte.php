<?php


    // if (isset($_SESSION["id_user"])) {
    //     echo "<style>.link {
    //         display: none;
    //     }</style>";
        
    // }else{
    //     echo "<style>.linkCo {
    //         display: none;
    //     }</style>";
    // }
?>

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
    <link rel="stylesheet" href="./source/css/creationCompte.css">
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
            <a href="./connexionCompte.php" class="link">Se connecter</a>
            <a href="./creationCompte.php" class="link">Créer mon compte</a>
            <a href="./controllerCompteUtilisateurStat.php" class="linkCo">Mon compte</a>
            <a href="./deco.php" class="linkCo">Se déconnecter</a>
        </div>
    </header>
    <main>
        <div id="containerInscription">
            <h3>Créer mon compte</h3>

            <form action="" method="post" id="inscriptionForm">
                <input type="text" id="firstName" name="firstname_user" minlength="2" placeholder="Prénom" required>
                <input type="text" id="lastName" name="lastname_user" minlength="2" placeholder="Nom" required>
                <input type="email" id="inscriptionEmail" name="email_user" placeholder="Email" required>
                <p id="messageMail"></p>
                <input type="password" id="inscriptionPassword" name="mdp_user" minlength="8" placeholder="Mot de passe" required>
                <p id="messagePassword"></p>
                <label for="photoInscription" class="custom-file">Choisissez votre avatar</label>
                <input type="file" id="photoInscription" accept=".png, .jpg, .gif" name="photo">
                <div id="previewContainer">
                    <img src="" alt="Votre photo" id="previewPhoto">
                </div>
                <p id="messageApi"></p>
                <div id="containerInscriptionButton">
                    <button type="submit" value="valider" id="inscriptionButton" name="submitSubscribe">Valider le compte</button>
                </div>
            </form>
        </div>
    </main>
    <footer>
        <p><a href="./index.html" target="_self" class="link"><span class="red">Q</span>uizz<span class="green">C</span>odeCa<span class="blue">m</span>p</a> <span class="corporate">©</span> 2025 by TheHatefulThree.</p>
    </footer>
    <script src="./source/js/menu.js"></script>
    <script src="./source/js/creationCompte.js"></script>
    <script src="./source/js/apiSubscribe.js"></script>
</body>
</html>