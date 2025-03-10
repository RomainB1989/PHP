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

const select = document.querySelector("#select-category");
const quizzList = document.querySelector(".quizzList");

let arrayQuestion =  await apiFetch("https://quizz.adrardev.fr/api/question/all",{method:"GET"});
let listUsers = await apiFetch("https://quizz.adrardev.fr/api/users", {method:"GET"});
let listCategories = await apiFetch("https://quizz.adrardev.fr/api/category/all", {method:"GET"});
console.log(arrayQuestion);
console.log(listUsers);
console.log(listCategories);

let arrayQuizz = await apiFetch("https://quizz.adrardev.fr/api/quizzs/all", {method:"GET"});

listCategories.forEach(element => {
   const option = document.createElement("option");
   option.value = element.title;
   option.innerText = element.title;
   select.appendChild(option);
});



/**
 * Description placeholder
 *
 * @param {*} element 
 */
function createCardQuizz(element){
    console.log(element.id);
    const quizzBox = document.createElement("div");
    quizzBox.style.display = "block";
    quizzBox.setAttribute("class", "quizz");
    
    const titleQuizz = document.createElement("h3");
    titleQuizz.innerText = element.title;
    quizzBox.appendChild(titleQuizz);
    
    const description = document.createElement("p");
    description.innerText = element.description;
    quizzBox.appendChild(description);
    
    const listCategory = document.createElement("ul");
    listCategory.innerText = "Catégories :";
    listCategory.style.marginRight = "10px";
    element.categories.forEach(categories => {
        const nameCategory = document.createElement("li");
        nameCategory.innerText = categories.title;
        listCategory.appendChild(nameCategory);
    });
    quizzBox.appendChild(listCategory);
    
    const link = document.createElement("a");
    link.innerText = "Jouer au Quizz !";
    
    let url = new URL(`/quizz.html?id=${element.id}`, window.location.origin);
    console.log(window.location.origin);

    link.setAttribute("href", url);
    link.style.textDecoration = "none";
    quizzBox.appendChild(link);
    
    quizzList.appendChild(quizzBox);
}

function changeStateQuizz(quizz){
    if(quizz.style.display == "block"){
        quizz.style.display = "none";
    }else{
        quizz.style.display = "block";
    }
}



arrayQuizz.forEach(element => {
    createCardQuizz(element);
});

function checkCategory(quizz){
    const listCategories = quizz.querySelectorAll("li");
    let checkValid = false;

    listCategories.forEach(categories => {
        if(categories.innerText == select.value){
            checkValid = true;
        }
    });
    return checkValid;
}

//event changement catégorie
select.addEventListener("change", function(){
    const tableQuizz = document.querySelectorAll(".quizz");

    tableQuizz.forEach(quizz => {
        if(select.value == "Toute" || select.value == "Catégories"){
            quizz.style.display = "block";
        }
        else if(checkCategory(quizz)){
            quizz.style.display = "block";
        } else {
            quizz.style.display = "none";
        }
    });
});

