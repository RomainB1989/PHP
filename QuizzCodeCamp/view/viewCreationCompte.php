
<main>
        <div id="containerInscription">
            <h3>Créer mon compte</h3>

            <form action="" method="post" id="inscriptionForm">
                <input type="text" id="firstName" name="firstname_user" minlength="2" placeholder="Prénom" required>
                <input type="text" id="lastName" name="name_user" minlength="2" placeholder="Nom" required>
                <input type="email" id="inscriptionEmail" name="email_user" placeholder="Email" required>
                <p id="messageMail"></p>
                <input type="password" id="inscriptionPassword" name="mdp_user" minlength="8" placeholder="Mot de passe" required>
                <p id="messagePassword"></p>
                <label for="photoInscription" class="custom-file">Choisissez votre avatar</label>
                <input type="file" id="photoInscription" accept=".png, .jpg" name="photo">
                <div id="previewContainer">
                    <img src="" alt="Votre photo" id="previewPhoto">
                </div>
                
                <p><?php echo $message; ?></p>
                <div id="containerInscriptionButton">
                    <button type="submit" name="inscriptionButton" value="valider" id="inscriptionButton">Valider le compte</button>
                </div>
            </form>
        </div>
    </main>