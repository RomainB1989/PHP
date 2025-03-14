<?php


?>

<nav class="menu">
        <ul class="menu-desktop">       <!-- Menu Deroulant en Version Desktop et Tablette -->
            <li>
                <a href="./controller_accueil.php" target="_self">Accueil</a>
            </li>
            <li class="deroulant">
                <a href="#">Nous Découvrir !</a>
                <ul class="sous-menu">
                    <li><a href="./controller_presentation.php">Présentation</a></li>
                    <li><a href="./controller_ou-nous-trouver.php">Ou Nous Trouver ?</a></li>
                    <li><a href="./controller_contact.php">Nous Contacter !</a></li>
                    <li><a href="./controller_partenaires.php">Nos Partenaires</a></li>
                </ul>
            </li>
            <li>
                <a href="./controller_gazette.php" target="_self">La Gazette du Boulanger</a>
            </li>
            <li class="deroulant">
                <a href="./controller_boutique.php">Nos Produits</a>
                <!-- <ul class="sous-menu">
                    <li><a href="#">Nos Pains</a></li>
                    <li><a href="#">Nos Douceurs</a></li>
                    <li><a href="#">Anciens Produits</a></li>
                </ul> -->
            </li>
            <li class="deroulant">
                <a href="#">Mon Compte</a>
                <ul class="sous-menu">
                    <!-- <li><a href="./controller_creation.php">Créer un Compte</a></li> -->
                    <!-- <li><a href="./controller_connection.php">Connexion</a></li> -->
                    <?= $linkNav ?>
                </ul>
            </li>
            <li class="deroulant">
                <a href="#">Mon Panier</a> 
                <ul class="panier"> <!-- Menu Deroulant en Version Desktop et Tablette -->
                    <li>
                        <div class="min-panier">
                            <p>2</p>
                            <p>Boule de Campagne</p>
                            <img src="./src/Images/Icon-Delete.png" alt="Icon-Croix">
                        </div>
                    </li>
                    <li>
                        <div class="min-panier">
                            <p>1</p>
                            <p>Troué</p>
                            <img src="./src/Images/Icon-Delete.png" alt="Icon-Croix">
                        </div>
                    </li>
            </ul>
            </li>
        </ul>
        
        <ul class="menu-mobile">   <!-- Menu Deroulant en Version Mobile -->
            <li class="icon-menu">
                <img src="./src/Images/Icon-Menu-Basket.png" width="auto" height="40px" alt="Icon Panier"  id="icon-basket">
            </li>
            <li class="icon-menu" id="icon-account">
                <a href="./controller_connection.php">
                    <img src="./src/Images/Icon-Account.png" width="auto" height="40px" alt="Icon Compte">
                </a>
            </li>
            <li class="icon-menu">
                <img src="./src/Images/Icon-Menu-Burger.png" width="auto" height="40px" alt="Icon Menu Burger" id="icon-burger">
            </li>
            <ul class="basket">
                    <li>
                        <div class="min-basket">
                            <p>2</p>
                            <p>Boule de Campagne</p>
                            <img src="./src/Images/Icon-Delete.png" alt="Icon-Croix" class="icon-Delete">
                        </div>
                    </li>
                    <li>
                        <div class="min-basket">
                            <p>1</p>
                            <p>Le Troué</p>
                            <img src="./src/Images/Icon-Delete.png" alt="Icon-Croix" class="icon-Delete">
                        </div>
                    </li>
            </ul>
            <ul class="menu-burger">
                <li><a href="./controller_presentation.php">Présentation</a></li>
                <li><a href="./controller_ou-nous-trouver.php">Ou Nous Trouver ?</a></li>
                <li><a href="./controller_contact.php">Nous Contacter !</a></li>
                <li><a href="./controller_partenaires.php">Nos Partenaires</a></li>
                <li><a href="./controller_boutique.php">Nos Produits</a></li>
                <li><a href="./controller_gazette.php">La Gazette du Boulanger</a></li>
            </ul>
        </ul>
    </nav>