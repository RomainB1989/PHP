<?php
?>
    <main id="createConnect">
        <div class="formulary" id="formCreate">
            <h3>REJOIGNEZ NOUS</h3>
            <form id="create" method="POST" action="./controller_connection.php">
                <p><span>*</span> = Information requise</p>
                <div>
                    <label for="nom">Nom : <span>*</span></label>
                    <input type="text" name="nom" id="nom" placeholder="Ex: Jean" pattern="^[A-Za-z]{1,20}$" required>
                </div>
                <div>
                    <label for="prenom">Prénom : <span>*</span></label>
                    <input type="text" name="prenom" id="prenom" placeholder="Ex: Bouing" pattern="^[A-Za-z]{1,20}$" required>
                </div>
                <div>
                    <label for="email">Adresse Mail : <span>*</span></label>
                    <input type="email" name="email" id="email" placeholder="Ex: adresse@test.fr" pattern="[a-z0-9._-]+@[a-z0-9._-]+\.[a-z]{2,6}" required>
                </div>
                <div>
                    <label for="tel">Numéro de Téléphone :</label>
                    <input type="tel" name="tel" id="tel" placeholder="Ex: 0678546215" pattern="^\+?[0]{1}[0-9]{9}$">
                </div>
                <div>
                    <label for="passwordCreate">Mot de Passe : <span>*</span></label>
                    <input type="password" name="passwordCreate" id="passwordCreate" placeholder="Entre 10 et 30 caractères" required>
                </div>
                <div>
                    <label for="createConfirm">Confirmer Mot de Passe : <span>*</span></label>
                    <input type="password" name="passwordCreateConfirm" id="createConfirm" placeholder="Entre 10 et 30 caractères" required>
                </div>
                <div>
                    <label for="acceptCgu">Acceptez vous les Conditions Générales d'Utilisations : <span>*</span></label>
                    <input type="checkbox" name="accept" id="acceptCgu" required>
                </div>
                <div>
                    <input type="submit" value="CREER VOTRE COMPTE" class="link" />
                </div>
            </form>
        </div>

        <div class="formulary" id="formConnect">
            <h3>CONNECTEZ VOUS</h3>
            <form id="connect" method="POST" action="./controller_connection.php">
                <p><span>*</span> = Information requise</p>
                <div>
                    <label for="emailConnect">Adresse Mail : <span>*</span></label>
                    <input type="email" name="email" id="emailConnect" placeholder="Ex: adresse@test.fr" pattern="^[a-z0-9._-]+@[a-z0-9._-]+\.[a-z]{2,6}$" required>
                </div>
                <div>
                    <label for="passwordConnect">Mot de Passe : <span>*</span></label>
                    <input type="password" name="passwordConnect" id="passwordConnect" placeholder="Entre 10 et 30 caractères" required>
                </div>
                <div>
                    <label for="connectConfirm">Confirmer Mot de Passe : <span>*</span></label>
                    <input type="password" name="passwordConnectConfirm" id="connectConfirm" placeholder="Entre 10 et 30 caractères" required>
                </div>
                <div>
                    <input type="submit" value="CONNEXION" class="link" />
                </div>
            </form>
        </div>
    </main> 