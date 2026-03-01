<?php
require 'config.php';

// Fetch categories
$categories = [];
try {
    $stmt = $pdo->query("SELECT * FROM categories");
    $categories = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    $error = "Failed to load categories: " . $e->getMessage();
}

// Fetch food items
$foodItems = [];
try {
    $stmt = $pdo->query("SELECT * FROM food_items WHERE is_available = 1");
    $foodItems = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    $error = "Failed to load menu items: " . $e->getMessage();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Your existing head content -->
</head>
<body>
    <!-- Your existing header and nav -->

    <section id="menu" class="container">
        <div class="section-title animate">
            <h2>Our Treasure Menu</h2>
        </div>
        
        <div class="menu">
            <?php foreach ($foodItems as $item): ?>
            <div class="menu-item animate delay-1">
                <div class="menu-item-img">
                    <img src="<?= htmlspecialchars($item['image'] ?? 'images/default-food.jpg') ?>" alt="<?= htmlspecialchars($item['item_name']) ?>">
                </div>
                <div class="menu-item-content">
                    <h3><?= htmlspecialchars($item['item_name']) ?></h3>
                    <p><?= htmlspecialchars($item['description']) ?></p>
                    <span class="price">$<?= number_format($item['price'], 2) ?></span>
                    
                    <?php 
                    // If the item has flavors/options, fetch them from the database
                    $flavors = [];
                    try {
                        $stmt = $pdo->prepare("SELECT * FROM item_flavors WHERE item_id = ?");
                        $stmt->execute([$item['item_id']]);
                        $flavors = $stmt->fetchAll(PDO::FETCH_ASSOC);
                    } catch (PDOException $e) {
                        // Handle error or leave flavors empty
                    }
                    
                    if (!empty($flavors)): ?>
                    <select class="flavor-select" data-item-id="<?= $item['item_id'] ?>">
                        <?php foreach ($flavors as $flavor): ?>
                        <option value="<?= $flavor['flavor_id'] ?>"><?= htmlspecialchars($flavor['flavor_name']) ?></option>
                        <?php endforeach; ?>
                    </select>
                    <?php endif; ?>
                    
                    <div class="item-controls">
                        <div class="quantity-controls">
                            <button class="quantity-btn" onclick="decrementCount(this)">-</button>
                            <span class="quantity">0</span>
                            <button class="quantity-btn" onclick="incrementCount(this)">+</button>
                        </div>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
        
        <!-- Your existing order section -->
    </section>

    <!-- Your existing scripts -->
    <script>
        // Update your JavaScript to handle the database-driven menu
        function updateOrder(menuItem) {
            const itemId = menuItem.dataset.itemId || menuItem.closest('[data-item-id]').dataset.itemId;
            const itemName = menuItem.querySelector('h3').textContent;
            const itemPrice = parseFloat(menuItem.querySelector('.price').textContent.replace('$', ''));
            const itemQuantity = parseInt(menuItem.querySelector('.quantity').textContent);
            const flavorSelect = menuItem.querySelector('.flavor-select');
            const itemFlavor = flavorSelect ? flavorSelect.options[flavorSelect.selectedIndex].text : '';
            const flavorId = flavorSelect ? flavorSelect.value : null;

            // Send this data to your PHP backend to manage the cart in session
            fetch('add_to_cart.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                },
                body: JSON.stringify({
                    item_id: itemId,
                    name: itemName,
                    flavor: itemFlavor,
                    flavor_id: flavorId,
                    price: itemPrice,
                    quantity: itemQuantity
                })
            })
            .then(response => response.json())
            .then(data => {
                renderOrder(data.cart);
            });
        }

        function renderOrder(cartItems) {
            const orderList = document.getElementById('orderList');
            const orderTotal = document.getElementById('orderTotal');

            if (!cartItems || cartItems.length === 0) {
                orderList.innerHTML = '<p class="empty-order">No items added yet. Start adding items to your order!</p>';
                orderTotal.style.display = 'none';
                return;
            }

            let html = '';
            let total = 0;

            cartItems.forEach(item => {
                const itemTotal = item.price * item.quantity;
                total += itemTotal;

                html += `
                    <div class="order-item">
                        <div class="order-item-name">
                            ${item.name}${item.flavor ? ` (${item.flavor})` : ''}
                        </div>
                        <div class="order-item-quantity">
                            ${item.quantity}
                        </div>
                        <div class="order-item-price">
                            $${itemTotal.toFixed(2)}
                        </div>
                    </div>
                `;
            });

            orderList.innerHTML = html;
            document.getElementById('totalAmount').textContent = `$${total.toFixed(2)}`;
            orderTotal.style.display = 'flex';
        }
    </script>
</body>
</html>