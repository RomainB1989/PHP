<main>
        <div id="containerConnexion">
            <h3>Se connecter</h3>
            <form action="" method="post" id="connexionForm">
                <input type="email"  name="email" id="connexionEmail" placeholder="Email" required>
                <input type="password" name="password" id="connexionPassword" placeholder="Mot de passe" required>
                <a href="#">J'ai oublié mon mot de passe</a>
                <p><?php echo $message; ?></p>
                <div id="containerConnexionButton">
                    <button type="submit" value="envoyer" id="connexionButton" name="envoyer">Accès à mon compte</button>
                </div>
                <p>Je n'ai pas de compte? <a href="./controllerCreationCompte.php"> Je clique ici</a></p>
            </form>
        </div>
</main>