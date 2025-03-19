function filterProductsByCategory(value) {
    // Récupérer tous les articles de produits
    const products = document.querySelectorAll('.product-card');

    // Parcourir chaque produit
    products.forEach(product => {
        // Récupérer l'ID de la catégorie du produit dans l'attribut data
        const productCategory = product.getAttribute('data-category');

        // Vérifier si la catégorie du produit correspond à la valeur sélectionnée
        if (value === "" || productCategory === value) {
            product.style.display = "block"; // Afficher le produit
        } else {
            product.style.display = "none"; // Cacher le produit
        }
    });
}