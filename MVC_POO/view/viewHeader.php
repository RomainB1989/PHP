<?php


    Class ViewHeader{
        public function displayView(){
            return
            '
                <!DOCTYPE html>
                <html lang="fr">
                <head>
                    <meta charset="UTF-8">
                    <meta name="viewport" content="width=device-width, initial-scale=1.0">
                    <title>MVC_POO-Extended</title>
                </head>
                <body>
                    <header>
                        <nav>
                            <a href="./controllerHome.php">Accueil</a>
                            <a href="./controllerCategory.php">Categories</a>
                        </nav>
                    </header>
            ';
        } 
    }


?>