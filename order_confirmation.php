<?php
require 'config.php';
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}


if (!isset($_GET['order_id'])) {
    header("Location: index.php");
    exit();
}

$orderId = $_GET['order_id'];
$userId = $_SESSION['user_id'];

try {
    // Get order details
    $stmt = $pdo->prepare("SELECT * FROM orders WHERE order_id = ? AND user_id = ?");
    $stmt->execute([$orderId, $userId]);
    $order = $stmt->fetch();
    
    if (!$order) {
        header("Location: index.php");
        exit();
    }
    
    // Get order items
    $stmt = $pdo->prepare("
        SELECT oi.*, fi.item_name 
        FROM order_items oi
        JOIN food_items fi ON oi.item_id = fi.item_id
        WHERE oi.order_id = ?
    ");
    $stmt->execute([$orderId]);
    $items = $stmt->fetchAll();
    
} catch (PDOException $e) {
    die("Failed to load order details: " . $e->getMessage());
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Your existing head content -->
    <title>Order Confirmation - PIRATES.in</title>
</head>
<body>
    <!-- Your existing header and nav -->

    <section class="container">
        <div class="section-title">
            <h2>Order Confirmation</h2>
        </div>
        
        <div class="order-confirmation">
            <div class="confirmation-message">
                <i class="fas fa-check-circle"></i>
                <h3>Thank you for your order!</h3>
                <p>Your order #<?= $orderId ?> has been received and is being prepared.</p>
            </div>
            
            <div class="order-details">
                <h4>Order Summary</h4>
                <div class="order-info">
                    <p><strong>Order Number:</strong> #<?= $orderId ?></p>
                    <p><strong>Order Date:</strong> <?= date('F j, Y, g:i a', strtotime($order['order_date'])) ?></p>
                    <p><strong>Delivery Address:</strong> <?= htmlspecialchars($order['delivery_address']) ?></p>
                    <p><strong>Payment Method:</strong> <?= htmlspecialchars($order['payment_method']) ?></p>
                    <p><strong>Status:</strong> <?= ucfirst($order['status']) ?></p>
                </div>
                
                <h4>Order Items</h4>
                <div class="order-items-list">
                    <?php foreach ($items as $item): ?>
                    <div class="order-item">
                        <div class="item-name"><?= htmlspecialchars($item['item_name']) ?></div>
                        <div class="item-quantity"><?= $item['quantity'] ?> ×</div>
                        <div class="item-price">$<?= number_format($item['price'], 2) ?></div>
                        <div class="item-total">$<?= number_format($item['price'] * $item['quantity'], 2) ?></div>
                    </div>
                    <?php endforeach; ?>
                </div>
                
                <div class="order-total">
                    <div class="total-label">Total:</div>
                    <div class="total-amount">$<?= number_format($order['total_amount'], 2) ?></div>
                </div>
            </div>
            
            <div class="order-actions">
                <a href="index.php" class="btn btn-primary">Back to Home</a>
                <a href="contact.php" class="btn btn-secondary">Contact Us</a>
            </div>
        </div>
    </section>

    <!-- Your existing footer -->
</body>
</html>