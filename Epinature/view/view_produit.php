<?php
// Assurez-vous que la variable $product est bien définie
if (!isset($product)) {
    echo "<p>Produit non trouvé.</p>";
    exit();
}
?>
    <main id="produit">
        <div class="product-container">
            <div class="product-image">
                <img src="<?= $product['url_image'] ?>" 
                     alt="<?= $product['name_image'] ?>" 
                     class="responsive">
            </div>
            
            <div class="product-details">
                <div class="product-header">
                    <h1><?= $product['name_product'] ?></h1>
                    <p class="category"><?= $product['name_category'] ?></p>
                </div>

                <div class="product-info">
                    <p class="resume"><?= $product['resume'] ?></p>
                    <p class="description"><?= $product['description'] ?></p>
                    
                    <div class="ingredients">
                        <h2>Ingrédients : </h2>
                        <p><?= $product['ingredients'] ?></p>
                    </div>

                    <div class="purchase-info">
                        
                        <div class="box-price">
                            <div class="quantity-selector">
                                <button onclick="decrementQuantity()" class="quantity-btn">-</button>
                                <input type="number" id="quantity" value="1" min="1" max="<?= $product['stock_number'] ?>">
                                <button onclick="incrementQuantity()" class="quantity-btn">+</button>
                            </div>
    
                            <p class="price" data-price="<?= $product['price'] ?>">
                                <?= number_format($product['price'], 2, ',', ' ') ?> €
                            </p>
                        </div>
                        
                        <p id="messageApi"></p>

                        <button type="button" onclick="addToBasket(<?= $product['product_id'] ?>, 
                        '<?= htmlspecialchars($product['name_product'], ENT_QUOTES, 'UTF-8' ) ?>
                        ', document.getElementById('quantity').value)" class="add-to-cart">
                            Ajouter au panier
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </main>