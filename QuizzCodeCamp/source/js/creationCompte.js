//FORMULAIRE INSCRIPTION
const firstName = document.querySelector('#firstName')
const lastName = document.querySelector('#lastName')
const email = document.querySelector('#inscriptionEmail');
const password = document.querySelector('#inscriptionPassword');
const messageMail = document.querySelector('#messageMail');
const messagePassword = document.querySelector('#messagePassword');
const form = document.querySelector('#inscriptionForm')

const regexNom = /^[A-Za-zÀ-ÿ\- ]{2,}$/;
const regexMail = /^[a-z0-9._-]+@[a-z0-9._-]+\.[a-z]{2,6}$/;
const regexPassword = /^(?=.*[$&@!]).{7,}$/;

firstName.addEventListener('keyup', ()=>{
    if(regexNom.test(firstName.value)){
        firstName.style.border = 'solid 3px green'
    }else{
        firstName.style.border = 'solid 3px red'
    }
})
lastName.addEventListener('keyup', ()=>{
    if(regexNom.test(lastName.value)){
        lastName.style.border = 'solid 3px green'
    }else{
        lastName.style.border = 'solid 3px red'
    }
})

email.addEventListener('keyup', ()=>{
    
    if(regexMail.test(email.value)){
        email.style.border = 'solid 3px green'
        messageMail.style.display = 'none'
    } else{
        email.style.border = 'solid 3px red'
        messageMail.innerText = 'Email non valide'
        messageMail.style.color = 'red'
    }
})

password.addEventListener('keyup', () =>{

    if(regexPassword.test(password.value)){
        password.style.border = 'solid 3px green'
        messagePassword.style.display = 'none'
    }else{
        password.style.border = 'solid 3px red'
        messagePassword.innerText = 'Le mot de passe doit contenir au moins 8 caractères et un caractère spécial ($, &, @, ! )'
        messagePassword.style.color = 'red'
    }
})

form.addEventListener('submit', (e) =>{
    if(
        !regexNom.test(firstName.value) ||
        !regexNom.test(lastName.value) ||
        !regexMail.test(email.value) ||
        !regexPassword.test(password.value)
    ){
        e.preventDefault();
        alert("Veuillez compléter correctement le formulaire")
    }
})

//Prévisualisation de la photo

document.getElementById("photoInscription").addEventListener("change", function(event) {
    const file = event.target.files[0];
    const preview = document.getElementById("previewPhoto");
    const previewContainer = document.getElementById("previewContainer");

    if (file) {
        preview.src = URL.createObjectURL(file);
        preview.style.display = "block";
    } else {
        preview.style.display = "none"; // Cache l'image si aucun fichier n'est sélectionné
    }
});