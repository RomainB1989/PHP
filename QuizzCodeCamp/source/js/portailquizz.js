const question = document.querySelector('.deroulant');
const divquestion = document.querySelector('.menuD');
const flecheHaut = document.querySelector('.flecheHaut');
const flecheBas = document.querySelector('.flecheBas');

divquestion.style.display = 'none';
flecheHaut.style.display = 'none';
question.addEventListener('click', function(event) {
    event.preventDefault();
    if ( divquestion.style.display == 'none'){
    divquestion.style.display = 'block';
    flecheBas.style.display = 'none';
    flecheHaut.style.display = 'block';
    }
    else {
        divquestion.style.display = 'none';
        flecheBas.style.display = 'block';
        flecheHaut.style.display = 'none';
    }
});