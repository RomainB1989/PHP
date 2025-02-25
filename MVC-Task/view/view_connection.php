<main>
    <div style="display:flex; flex-direction:column; align-items: center;">
            <form action="" method="post" style="border: solid 3px black; width: 20%; margin: 0 auto; padding: 10px 10px; margin: 10px 10px; display:flex; flex-direction:column;">
                <h2 style="text-align:center;">Connectez vous !</h2>
                <p>Votre Adresse Email : </p>
                <input type="email" name="email"  required>
                <p>Votre Mot de Passe : </p>
                <input type="password" name="password"  required>
                <br>
                <input type="submit" value="Connectez-Vous" name="submitConnection">
            </form>
    </div>
    <p style="text-align:center;"><?= $message ?></p>
</main>