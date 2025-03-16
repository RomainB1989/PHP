<?php
?>
    <main id="connectAccount">
        <div class="formulary" id="formConnect">
            <h3>CONNECTEZ VOUS</h3>
            <form id="connect" method="POST" action="">
                <p><span>*</span> = Information requise</p>
                <p>Vous n'avez pas de compte ? <a href="/adrar/Epinature/creation">Créer un compte</a></p>
                <div>
                    <label for="emailConnect">Adresse Mail : <span>*</span></label>
                    <input type="email" name="email" id="emailConnect" placeholder="Ex: adresse@test.fr" pattern="^[a-z0-9._-]+@[a-z0-9._-]+\.[a-z]{2,6}$" required>
                </div>
                <div>
                    <label for="passwordConnect">Mot de Passe : <span>*</span></label>
                    <input type="password" name="password" id="passwordConnect" placeholder="Entre 10 et 30 caractères" required>
                </div>
                <div>
                    <input type="submit" value="CONNEXION" class="link" name="submitConnection"/>
                </div>
            </form>
            <p><?= $message ?></p>
        </div>
    </main> 