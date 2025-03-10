const apiFetch = async(url, body)=> { 
    try{
        const rawData = await fetch(url, body);
    
        if (!rawData.ok || rawData.status !== 200) {
            console.error("Erreur lors de la récupération des données : ", rawData.statusText);
            return;
        }

        const transformedData = await rawData.json();
        return(transformedData);
        // let para = document.createElement('p');
        // para.innerText = transformedData[0].title;
        // apiTest.append(para);
    }
    catch (error) {
        console.error("Erreur lors de l'appel à l'API : ", error);
    }
}

const answerArray = document.querySelectorAll(".answer");
const submit = document.querySelector("#submit");

function startQuizz(quizz){
    const resultQuizz = document.querySelector(".resultQuizz");
    const titleCommentary = document.querySelector(".commentary-title");
    const boxCommentary = document.querySelector(".commentary-box");
    const boxQuizz = document.querySelector(".box-quizz");
    
    let nbQuestion = getNbQuestions(quizz); //todo function getNbQuestions qui return nb questions in quizz.
    let nbValue = getNbValueMax(quizz) // todo function getNbValueMax qui retourne le score max que l'on peut avoir dans le quizz.
    let cptQuestion = 0;

    resultQuizz.style.display = "none";
    titleCommentary.style.display = "none";
    boxCommentary.style.display = "none";

    modifyInfos(cptQuestion, nbQuestion); //todo function modifyInfos qui modifie le DOM de la div 
    submit.addEventListener("click", function(){
        console.log("Appel de la fonction qui passe a la question suivante.");
    });
}

answerArray.forEach((answer) => {
    answer.addEventListener("click", function(){
        answer.classList.toggle("selected");
    });
});

//todo Penser a implémenter la selection que d'une answer soit une déselection des autres answers.
const url = new URL(window.location.href);
const params = url.searchParams;
const idQuizz = params.get("id");

const quizz = await apiFetch(`https://quizz.adrardev.fr/api/quizz/${idQuizz}`, {method:"GET"});
console.log(quizz);
startQuizz(quizz);



submit.addEventListener("click", function(){
    console.log("Appel de la fonction qui passe a la question suivante.");
});

//todo Créer fonction qui passe à la question suivante.