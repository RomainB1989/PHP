<?php
?>
    <main id="createAccount">
        <div class="formulary" id="formUpdate">
            <h3>MES INFORMATIONS PERSONNELLES</h3>
            <form id="update" method="POST" action="">
                <p><span>*</span> = Information requise</p>
                <div>
                    <label for="lastname">Nom : <span>*</span></label>
                    <input type="text" name="lastname" id="lastname" value="<?= $_SESSION['lastname'] ?>" pattern="^[A-Za-z]{1,20}$" required>
                </div>
                <div>
                    <label for="firstname">Prénom : <span>*</span></label>
                    <input type="text" name="firstname" id="firstname" value="<?= $_SESSION['firstname'] ?>" pattern="^[A-Za-z]{1,20}$" required>
                </div>
                <div>
                    <label for="email">Adresse Mail : <span>*</span></label>
                    <input type="email" name="email" id="email" value="<?= $_SESSION['email'] ?>" pattern="[a-z0-9._-]+@[a-z0-9._-]+\.[a-z]{2,6}" required>
                </div>
                <div>
                    <label for="phone">Numéro de Téléphone :</label>
                    <input type="tel" name="phone" id="phone" value="<?= $_SESSION['phone'] ?>" pattern="^\+?[0]{1}[0-9]{9}$">
                </div>
                <div>
                    <label for="passwordUpdate">Nouveau Mot de Passe : (Optionnel)</label>
                    <input type="password" name="passwordUpdate" id="passwordUpdate" placeholder="Entre 10 et 30 caractères">
                </div>
                <div>
                    <label for="updateConfirm">Confirmer Nouveau Mot de Passe :</label>
                    <input type="password" name="passwordUpdateConfirm" id="updateConfirm" placeholder="Entre 10 et 30 caractères">
                </div>
                <div>
                    <input type="submit" value="METTRE À JOUR" class="link" name="submitUpdate"/>
                </div>
            </form>
            <p><?= $message ?></p>
        </div>
    </main> 