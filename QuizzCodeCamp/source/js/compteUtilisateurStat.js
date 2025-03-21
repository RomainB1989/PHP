const changeAvatar= document.querySelector("#changeAvatar")

changeAvatar.addEventListener("change", function(event) {
    const file = event.target.files[0];
    if (file) {
        const reader = new FileReader();
        reader.onload = function(e) {
            const avatarPreview = document.getElementById("avatarPreview");
            avatarPreview.src = e.target.result;
            avatarPreview.style.display = "block";
        };
        reader.readAsDataURL(file);
    }
});

const changeEmail =document.querySelector('#changeEmail')
const changePassword =document.querySelector('#changePassword')
const messageChangeEmail =document.querySelector('#messageChangeEmail')
const messageChangePassword =document.querySelector('#messageChangePassword')


const regexMailCompte = /^[a-z0-9._-]+@[a-z0-9._-]+\.[a-z]{2,6}$/;
const regexPasswordCompte = /^(?=.*[$&@!]).{8,}$/;

changeEmail.addEventListener('keyup', ()=>{
    if(regexMailCompte.test(changeEmail.value)){
        changeEmail.style.border = 'green solid 2px'
        messageChangeEmail.innerText = 'Email valide'
        messageChangeEmail.style.color = '#0EBF14'
    }else{
        changeEmail.style.border = 'red solid 2px'
        messageChangeEmail.innerText = 'Email non valide'
        messageChangeEmail.style.color ='#F42A2A'
    }
})

changePassword.addEventListener('keyup', ()=>{
    if(regexPasswordCompte.test(changePassword.value)){
        changePassword.style.border = 'green solid 2px'
        messageChangePassword.innerText = 'Le mot de passe est valide'
        messageChangePassword.style.color = '#0EBF14'        
    }else{
        changePassword.style.border = 'red solid 2px'
        messageChangePassword.innerText = 'Le mot de passe doit contenir au moins 8 caractères et un caractère spécial ($, &, @, ! )'
        messageChangePassword.style.color = '#F42A2A'
    }
})

const ongletMonCompte = document.querySelector('#ongletMonCompte')
const pageMesStats = document.querySelector('#pageMesStats')
const mesStats = document.querySelector('#mesStats')
const monCompte = document.querySelector('#monCompte')

monCompte.addEventListener('click', () =>{
    ongletMonCompte.style.display = 'block';
    pageMesStats.style.display = 'none';
    monCompte.style.opacity = '1'
    monCompte.style.borderBottom = 'none'
    monCompte.style.transform ='translateY(0px)'

    mesStats.style.borderBottom = '2px solid black'
    mesStats.style.opacity = '0.8'
    mesStats.style.transform = 'translateY(-12px)'
    

})
mesStats.addEventListener('click', () =>{
    ongletMonCompte.style.display = 'none'
    pageMesStats.style.display = 'block'
    pageMesStats.style.margin = 'auto'
    mesStats.style.opacity = '1'
    mesStats.style.borderBottom = 'none'
    mesStats.style.transform = 'translateY(0px)'

    monCompte.style.borderBottom = '2px solid black'
    monCompte.style.opacity = '0.8'
    monCompte.style.transform ='translateY(-12px)'

})