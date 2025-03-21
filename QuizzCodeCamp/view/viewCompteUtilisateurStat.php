<main>
    <h3>Bonjour <?= $_SESSION["firstname_user"]?> <?= $_SESSION["lastname_user"] ?> </h3>
        <div id="onglet">
            <div id="mesStats">
                    <p>Mes statistiques</p>
            </div>
            <div id="monCompte">
                <p>Mon compte</p>
            </div>
        </div>
        <div id="pageMesStats">
            
            <table>
                <tr>
                    <th colspan="4" id="mesResultats">Mes résultats</th>
                </tr>
                <tr>
                    <th>Date</th>
                    <th>Nom du quizz</th>
                    <th>Catégorie</th>
                    <th>Taux de réussite</th>
                </tr>
                <tr>
                    <td>01/01/2025</td>
                    <td>Quizz n°1</td>
                    <td>JS</td>
                    <td>2%</td>
                </tr>
                <tr>
                    <td>01/01/2025</td>
                    <td>Quizz n°1</td>
                    <td>JS</td>
                    <td>2%</td>
                </tr>
                <tr>
                    <td>01/01/2025</td>
                    <td>Quizz n°1</td>
                    <td>JS</td>
                    <td>2%</td>
                </tr>
                <tr>
                    <td>01/01/2025</td>
                    <td>Quizz n°1</td>
                    <td>JS</td>
                    <td>2%</td>
                </tr>
                <tr>
                    <td>01/01/2025</td>
                    <td>Quizz n°1</td>
                    <td>JS</td>
                    <td>2%</td>
                </tr>
            </table>
        </div>
        <div id="ongletMonCompte">
            <div id="pageMonCompte">
                <h3>Modifier mon compte</h3>
                <form action="" method="post" enctype="multipart/form-data">

                <div id="avatarSelector">
                    <label for="changeAvatar" class="custom-file">Changer d'avatar</label>
                    <input type="file" id="changeAvatar" name="avatar" accept="image/*">
                </div>

                <div id="avatarContainer">
                    <img id="avatarPreview" src="" alt="avatar" style="display: none; height: 200px; width: 200px">
                </div>

                    <input type="email" id="changeEmail" name="email" placeholder="Changer mon Email">
                    <p id="messageChangeEmail"></p>
                    <input type="password" id="changePassword" name="password" placeholder="Changer mon mot de passe">
                    <p id="messageChangePassword"></p>
                    <button type="submit" class="validButton">Confirmer les modifications</button>
                
                </form>

                    <div id="supprimerCompte">
                        <h3>Supprimer mon compte</h3>
                        <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Modi vel natus ut asperiores a</p>

                        <form action="" method="post">
                            <input type="email" id="validEmail" name="email" placeholder="Mon Email">
                            <button type="submit" class="validButton">Supprimer mon compte</button>
                        </form>
                    </div>
                
            </div>
        </div>
        
    </main>