<?php


    Class ViewHeader{
        private ?string $listLinks = "";

        public function getListLinks(): string{
            return $this->listLinks;
        }

        public function setListLinks(string $newListLinks): ViewHeader{
            $this->listLinks = $newListLinks;
            return $this;
        }

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
                    <header style="background-color: blue; height: 100px; text-align: center; color: white;">
                        <nav>
                            <a style="color: white;"  href="/adrar/POO/MVC_POO/Accueil">Accueil</a>
                            <a style="color: white;"  href="/adrar/POO/MVC_POO/Category">Categories</a>
                            '.$this->getListLinks().'
                        </nav>
                    </header>
            ';
        } 
    }


?>