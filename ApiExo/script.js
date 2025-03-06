const form = document.querySelector('form');
const nickname = document.querySelector('input[name="nickname"]');
const email = document.querySelector('input[name="email"]');
const password = document.querySelector('input[name="password"]');
const paraph=document.querySelector('p');

form.addEventListener("submit", event => {
    event.preventDefault();

    //L'objet de donnée à envoyer à l'API
    let data = {
        "nickname" : nickname.value,
        "email" : email.value,
        "password" : password.value
    }
    
    fetch('http://localhost/Demo/API/inscription.php',{
        //Methode HTTP demandé par la route
        method:"POST",
        //Transformation en JSON de l'objet de donné
        body: JSON.stringify(data)
    })
        .then(response => response.json())
        .then(data => {
            console.log(data);
            paraph.innerText = data["message"];
        })
})