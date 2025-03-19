//Fonction qui change dans le DOM le prix en le mulipliant par la quantité.
function modifyPricebyQuantity(quantity)   {
    //console.log("Quantité : " + quantity);
    
    // Récupérer l'élément avec la classe "price"
    const priceElement = document.querySelector(".price");
    // Récupérer le prix d'origine à partir de l'attribut data-price
    const originalPrice = parseFloat(priceElement.getAttribute("data-price"));
    // Calculer le nouveau prix
    const newPrice = (originalPrice * quantity).toFixed(2);
    // Mettre à jour le contenu de l'élément price
    priceElement.textContent = newPrice + " €";
}

//Fonction qui ajoute 1 à la Quantité
function incrementQuantity() {
    const input = document.getElementById('quantity');
    const max = parseInt(input.getAttribute('max'));
    const currentValue = parseInt(input.value);
    if (currentValue < max) {
        input.value = currentValue + 1;
    }
    modifyPricebyQuantity(input.value);
}

//Fonction qui enlève 1 à la Quantité
function decrementQuantity() {
    const input = document.getElementById('quantity');
    const currentValue = parseInt(input.value);
    if (currentValue > 1) {
        input.value = currentValue - 1;
    }
    modifyPricebyQuantity(input.value);
}


//Fonction qui communique avec l'api "api_add_basket" et lui envoie le produit à ajouté 
// avec une affichage différent suivant la réponse
async function addToBasket(productId, productName, quantity) {
    const basketContainerDesktop = document.querySelector('.panier');
    const basketContainerMobile = document.querySelector('.menu-basket');
    //console.log(`Produit ${productId} (${productName}) ajouté au panier, quantité : ${quantity}`);

    const productData = {
        "id_product": productId,
        "name_product": productName,
        "quantity": quantity
    };

    // Créer une requête POST pour ajouter le produit au panier
    try {
        const response = await fetch('controllers/api/api_add_basket.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json; charset=UTF-8',
            },
            body: JSON.stringify(productData), // Envoi des données sous forme JSON
        });

        const messageApi = document.querySelector("#messageApi");
        if (response.ok) {
            const result = await response.json();
            messageApi.style.color = 'green';
            messageApi.innerText = result["message"];
            //console.log(result); // Afficher le panier mis à jour dans la console
            updateDisplayBasket(basketContainerDesktop ,result["success"],productData);
            updateDisplayBasket(basketContainerMobile ,result["success"],productData);

        } else {
            const result = await response.json(); // Récupérer le message d'erreur
            messageApi.style.color = 'red';
            messageApi.innerText = result["message"]; // Afficher le message d'erreur directement
        }
    } catch (error) {
        const messageApi = document.querySelector("#messageApi");
        messageApi.style.color = 'red';
        messageApi.innerText = 'Erreur Api: ' + error.message; // Afficher le message d'erreur de l'exception
    }
}

function addProductToDisplayBasket(displayContainer, productData) {
    const basketContainer = displayContainer; // Sélecteur pour le conteneur du panier

    const newListItem = document.createElement('li');
    newListItem.id = productData.id_product; // Assurez-vous que l'ID est défini ici
    const newMinBasketDiv = document.createElement('div');
    newMinBasketDiv.className = 'min-basket';

    const newQuantityElement = document.createElement('p');
    newQuantityElement.classList.add("basket-product-quantity");
    newQuantityElement.textContent = productData.quantity;

    const newNameElement = document.createElement('p');
    newNameElement.classList.add("basket-product-name");
    newNameElement.textContent = productData.name_product;

    const newDeleteIcon = document.createElement('img');
    newDeleteIcon.src = '/adrar/Epinature/src/Images/Icon-Delete.png';
    newDeleteIcon.alt = 'Icon-Croix';
    newDeleteIcon.className = 'icon-Delete';
    newDeleteIcon.onclick = () => removeFromBasket(productData.id_product);

    // Ajouter les éléments au div
    newMinBasketDiv.appendChild(newQuantityElement);
    newMinBasketDiv.appendChild(newNameElement);
    newMinBasketDiv.appendChild(newDeleteIcon);

    // Ajouter le div au li
    newListItem.appendChild(newMinBasketDiv);

    // Ajouter le li au conteneur du panier
    basketContainer.appendChild(newListItem);
}

function updateQuantityDisplayBasket(displayContainer,productId, updateQuantity) {
    const basketContainer = displayContainer; // Sélecteur pour le conteneur du panier
    const items = basketContainer.querySelectorAll('li'); // Récupérer tous les éléments du panier
    console.log(items);

    items.forEach(item => {
        const divElement = item.querySelector('.min-basket');
        const quantityElement = divElement.querySelector('.basket-product-quantity'); // Récupérer l'élément de quantité
        //const nameElement = divElement.querySelector('.basket-product-name'); // Récupérer l'élément de nom

        // Vérifier si le produit correspond à l'ID
        if (item.getAttribute('id') == productId) { // Utilisez getAttribute pour récupérer l'ID
            console.log("Je modifie la quantité de mon produit dans UpdatequantityDisplay.");
            quantityElement.textContent = updateQuantity; // Mettre à jour la quantité
        }
    });
}

function updateDisplayBasket(displayContainer,successType, productData) {
    // Si la réponse de l'API indique un ajout
    if (successType === "add") {
        console.log("Je rajoute un produit dans le panier");
        addProductToDisplayBasket(displayContainer, productData);
    } 
    // Si la réponse de l'API indique un mise à jour d'une quantité
    if (successType === "update") {
        console.log("Je modifie un produit dans le panier");
        updateQuantityDisplayBasket(displayContainer, productData.id_product, productData.quantity);
    }
}

