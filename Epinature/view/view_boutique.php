<?php
?>
    <main id="boutique">
        <h1>Notre Boutique</h1>
        <h2>Découvrez nos produits</h2>
        <hr />
        
        <!-- Ajout du menu déroulant pour les catégories -->
        <label for="category-select">Sélectionnez une catégorie :</label>
        <select id="category-select" onchange="filterProductsByCategory(this.value)">
            <option value="">Toutes les catégories</option>
            <?php foreach($listCategories as $category): ?>
                <option value="<?= $category['id_category'] ?>"><?= $category['name_category'] ?></option>
            <?php endforeach; ?>
        </select>
        
        <section class="products-grid">
            <?php foreach($products as $product): ?>
                <article class="product-card" data-category="<?= $product['id_category'] ?>"><!-- data-* attribut utilisé pour stocker l'id_category qui nous servira pour le filtrage -->
                    <div class="product-image">
                        <img src="<?= $product['url_image'] ?>" alt="<?= $product['name_image'] ?>" class="responsive">
                    </div>
                    <div class="product-info">
                        <h3><?= $product['name_product'] ?></h3>
                        <p class="product-resume"><?= $product['resume'] ?></p>
                        <p class="product-price"><?= number_format($product['price'], 2, ',', ' ') ?> €</p>
                        <button type="button" onclick="window.location.href='/adrar/Epinature/produit?id=<?= $product['product_id'] ?>';" class="btn-primary">Voir le produit</button>
                    </div>
                </article>
            <?php endforeach; ?>
        </section>
    </main> 