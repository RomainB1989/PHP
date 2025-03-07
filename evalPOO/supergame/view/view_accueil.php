<!-- VUE DE LA PAGE D'ACCUEIL -->
<?php
Class ViewHome{

    //ATTRIBUTE
    private?string $message = "";
    private?string $usersList = "";


    //CONSTRUCT

    //GETTER
    public function getMessage(): string{
        return $this->message;
    }

    public function getUsersList(): string{
        return $this->usersList;
    }

    //SETTER
    public function setMessage(string $newMessage):ViewHome {
        $this->message = $newMessage;
        return $this;
    }

    public function setUsersList(string $newUsersList):ViewHome{
        $this->usersList = $newUsersList;
        return $this;
    }


    //METHODE
    public function displayView():string{
        return '
        <main>
            <section>
                <form action="" method="post" style="border: solid 3px black; width: 20%; margin: 0 auto; padding: 10px 10px; margin: 10px 10px; display:flex; flex-direction:column;">
                    <h2 style="text-align:center;">Inscrivez vous !</h2>
                    <p>Votre Nom :</p>
                    <input type="text" name="pseudo"  required>
                    <p>Votre Adresse Email : </p>
                    <input type="email" name="email"  required>
                    <p>Votre Score : </p>
                    <input type="number" name="score"  required>
                    <p>Votre Mot de Passe : </p>
                    <input type="password" name="password"  required>
                    <br>
                    <input type="submit" value="Ajouter votre Compte" name="submit">
                </form>
            </section>
            <p style="text-align:center;">
                '.$this->getMessage().
            '</p>
            <section>
                <ul>
                    '.$this->getUsersList().'
                </ul>
            </section>
        </main>
        ';
    }
}


?>