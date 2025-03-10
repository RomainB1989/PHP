// const apiFetch = async(url, method)=> { 
//     try{
//         const rawData = await fetch(url, {method: method});
    
//         if (!rawData.ok || rawData.status !== 200) {
//             console.error("Erreur lors de la récupération des données : ", rawData.statusText);
//             return;
//         }

//         const transformedData = await rawData.json();
//         return(transformedData);
//         // let para = document.createElement('p');
//         // para.innerText = transformedData[0].title;
//         // apiTest.append(para);
//     }
//     catch (error) {
//         console.error("Erreur lors de l'appel à l'API : ", error);
//     }
// }



// let arrayQuestion =  await apiFetch('https://quizz.adrardev.fr/api/question/all', "GET");
// let listUsers = await apiFetch('https://quizz.adrardev.fr/api/users', "GET");
// let listCategories = await apiFetch('https://quizz.adrardev.fr/api/category/all', "GET");
// console.log(arrayQuestion);
// console.log(listUsers);
// console.log(listCategories);


async function yo() {
    const rawData = await fetch('https://quizz.adrardev.fr/api/question/all');
    const transformedData = await rawData.json();
    console.log(transformedData);

    console.log(transformedData[19].title);


    transformedData.forEach(element => {
        console.log(element.title);
    });

}