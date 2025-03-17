<?php
?>
    <main id="boutique">
        <h1>Notre Boutique</h1>
        <h2>Découvrez nos produits</h2>
        <hr />
        
        <section class="products-grid">
            <?php foreach($products as $product): ?>
                <article class="product-card">
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