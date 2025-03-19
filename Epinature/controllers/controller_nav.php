<?php

    // Initialisation de la variable
    $linkNav = $listBasket = "";

    // Vérification de la session
    if(isset($_SESSION["id_user"]) && !empty($_SESSION["id_user"])){
        $linkNav .= "<li><a href='/adrar/Epinature/account'>Mon Compte</a></li>";
        $linkNav .= "<li><a href='/adrar/Epinature/deconnexion'>Déconnexion</a></li>";
    } else {
        $linkNav .= "<li><a href='/adrar/Epinature/creation'>Créer un Compte</a></li>";
        $linkNav .= "<li><a href='/adrar/Epinature/connexion'>Connexion</a></li>";
    }

    // Vérifiez si le panier existe et n'est pas vide
    if (isset($_SESSION["basket"]) && !empty($_SESSION["basket"])) {
        $listBasket = ""; // Initialiser la variable pour stocker les éléments de la liste

        // Boucle sur chaque produit dans le panier
        foreach ($_SESSION["basket"] as $newproduct) {
            // Récupérer les informations du produit
            $quantity = $newproduct['quantity'];
            $name = $newproduct['name_product'];
            //$name = htmlspecialchars($newproduct['name_product'], ENT_QUOTES, 'UTF-8'); // Échapper les caractères spéciaux
            $id_product = $newproduct['id_product']; // ID du produit

            // Construire l'élément <li> pour chaque produit
            $listBasket .= "<li id='{$id_product}'>
                                <div class='min-basket'>
                                    <p class='basket-product-quantity' >{$quantity}</p>
                                    <p class='basket-product-name'  >{$name}</p>
                                    <img src='/adrar/Epinature/src/Images/Icon-Delete.png' alt='Icon-Croix' class='icon-Delete' onclick='removeFromBasket({$id_product})'>
                                </div>
                            </li>";
        }
    } else {
        $listBasket = "<li><div class='min-basket'>Le Panier est vide.</div></li>";
    }
    // On inclut la vue après avoir défini la variable
    require_once "./view/view_nav.php";
?>