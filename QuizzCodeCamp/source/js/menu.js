
//Menu connexion
const iconAccount = document.querySelector(".icon-account");
const boxAccount = document.querySelector(".box-account");

iconAccount.addEventListener('click', function() {
    boxAccount.classList.toggle('active');
});


//Search bar
const searchBar = document.querySelector('.search-container');

searchBar.addEventListener("input", searchFilter);


function searchFilter() {
    const cards = document.querySelectorAll('.quiz-card');
    
    if (searchBar.value != "") {
        for (let card of cards) {
            let title = card.querySelector('.quiz-card__title').textContent.toLocaleLowerCase();
            let filterValue = searchBar.value.toLocaleLowerCase();
            if(!title.includes(filterValue)){
                card.style.display = "none";
            } else {
                card.style.display = "block";
            }
        }
    } else {
        for (let card of cards) {
            card.style.display = "block";
        }
    }
}

