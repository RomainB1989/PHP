function incrementQuantity() {
    const input = document.getElementById('quantity');
    const max = parseInt(input.getAttribute('max'));
    const currentValue = parseInt(input.value);
    if (currentValue < max) {
        input.value = currentValue + 1;
    }
}

function decrementQuantity() {
    const input = document.getElementById('quantity');
    const currentValue = parseInt(input.value);
    if (currentValue > 1) {
        input.value = currentValue - 1;
    }
}

function addToCart(productId) {
    const quantity = document.getElementById('quantity').value;
    // Ici, vous pouvez ajouter la logique pour gérer l'ajout au panier
    console.log(`Produit ${productId} ajouté au panier, quantité : ${quantity}`);
} 