<main id="quizz">
        <div class="box-quizz">
            <div class="question-count">Question 1 / 20</div>
            <p class="question">Combien de fois Jean mange en moyenne par jour ses crotte de nez ?</p>
            <div class="box-answer">
                <div class="answer" id="answer-1"><span class="id-answer">A</span>Deux Fois par Jour.</div>
                <div class="answer" id="answer-2"><span class="id-answer">B</span>Cinq Fois par Jour.</div>
                <div class="answer" id="answer-3"><span class="id-answer">C</span>Dix Fois par Jour.</div>
                <div class="answer" id="answer-4"><span class="id-answer">D</span>Jamais !</div>
            </div>
            <input type="submit" id="submit" value="Valider">
        </div>
        <div class="resultQuizz">
            <p class="message-result">Vous avez répondu juste à 5 questions sur 20.</p>
            <div class="stats-quizz">
                <div class="stat">
                    <div class="circle">20%</div>
                    <p>Taux de reussite :</p>
                </div>
                <div class="stat">
                    <div class="circle">74%</div>
                    <p>Moyenne des Joueurs :</p>
                </div>
            </div>
            <p class="message-compare">Oups... Vous ferez mieux au prochain Quiz !</p>
            <input type="submit" id="reload" value="Recommençez le Quizz">
        </div>
        <h2 class="commentary-title">Commentaires :</h2>
        <div class="commentary-box">
            <div class="add-comment-box">
                <img src="./source/images/sonic-gollum.jpg" alt="" class="img-user" width="50px" height="auto">
                <div>
                    <div class="add-comment">
                        <p class="pseudo">DeadSpaguettis</p> 
                        <p class="date-message">Il y a une heure</p>
                    </div>
                    <textarea name="commentary" id="commentary" placeholder="Ajouter votre commentaire..."></textarea>
                    <div class="option-comment">
                        <input type="submit" value="Annuler" id="delete">
                        <input type="submit" value="Ajouter un Commentaire" id="confirm">
                    </div>
                </div>
            </div>
            <div class="read-comment">

            </div>
        </div>
    </main>