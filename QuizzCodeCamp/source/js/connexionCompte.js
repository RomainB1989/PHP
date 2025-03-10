//CONNEXION

const connexionMail = document.querySelector('#connexionEmail')
const connexionPassword = document.querySelector('#connexionPssword')

const regexMail = /^[a-z0-9._-]+@[a-z0-9._-]+\.[a-z]{2,6}$/;
const regexPassword = /^(?=.*[$&@!]).{8,}$/;

connexionMail.addEventListener('keyup', ()=>{
    if(regexMail.test(connexionMail.value)){
        connexionMail.style.border = 'green 3px solid'
    }else{
        connexionMail.style.border = 'red solid 3px'
    }
})