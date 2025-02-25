<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TP-Task</title>
</head>
<body>
    <header>
        <h1 style="text-align:center;">Ceci est le Tp-Task</h1>
        <nav style="display:flex; flex-direction:column; text-align:center; margin:20px 0px;">
            <a href="./controller_creation.php" target="_self" style="padding:10px 10px;">Créer un compte utilisateur</a>
            <a href="./controller_users.php" target="_self" style="padding:10px 10px;">Voir les Utilisateurs</a>
            <a href="./controller_createTask.php" target="_self" style="padding:10px 10px;">Ajouter une Tache</a>
            <a href="./controller_tasks.php" target="_self" style="padding:10px 10px;">Voir les taches à faire</a>
            <a href="./controller_create_category.php" target="_self" style="padding:10px 10px;">Ajouter une Catégorie</a>
            <br>
            <a href="./controller_creation.php" target="_self" style="padding:10px 10px;">Accueil</a>
            <?= $linkNav ?>
            
            <!-- <a href="./controller_account.php" target="_self" style="padding:10px 10px;">Mon Compte</a>
            <a href="./controller_connexion.php" target="_self" style="padding:10px 10px;">Connexion</a>
            <a href="./controller_logout.php" target="_self" style="padding:10px 10px;">Déconnexion</a> -->
        </nav>
    </header>