<?php

//echo $_SESSION["nickname"];

class ViewAccount{

    //ATTRIBUTE


    //CONSTRUCT

    //GETTER

    //SETTER

    //METHOD
    public function displayView():string{
        return '
        <main>
            <p style="text-align:center;">Bonjour '.$_SESSION["nickname"].' sur votre Espace Compte !!!</p>
            <p style="text-align:center;">Votre Email est : '.$_SESSION["email"].'.</p>
        </main>
        ';
    }
}


?>