<?php
require 'config.php';
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $userId = $_SESSION['user_id'];
    $deliveryAddress = $_POST['delivery_address'];
    $contactPhone = $_POST['contact_phone'];
    $paymentMethod = $_POST['payment_method'];
    $specialInstructions = $_POST['special_instructions'];
    
    // Get cart items from session
    $cartItems = $_SESSION['cart'] ?? [];
    
    if (empty($cartItems)) {
        header("Location: menu.php?error=emptycart");
        exit();
    }
    
    // Calculate total amount
    $totalAmount = 0;
    foreach ($cartItems as $item) {
        $totalAmount += $item['price'] * $item['quantity'];
    }
    
    try {
        $pdo->beginTransaction();
        
        // Insert order
        $stmt = $pdo->prepare("INSERT INTO orders (user_id, delivery_address, contact_phone, total_amount, payment_method, special_instructions) 
                              VALUES (?, ?, ?, ?, ?, ?)");
        $stmt->execute([$userId, $deliveryAddress, $contactPhone, $totalAmount, $paymentMethod, $specialInstructions]);
        $orderId = $pdo->lastInsertId();
        
        // Insert order items
        $stmt = $pdo->prepare("INSERT INTO order_items (order_id, item_id, quantity, price) 
                              VALUES (?, ?, ?, ?)");
        
        foreach ($cartItems as $item) {
            $stmt->execute([$orderId, $item['id'], $item['quantity'], $item['price']]);
        }
        
        $pdo->commit();
        
        // Clear cart
        unset($_SESSION['cart']);
        
        // Redirect to order confirmation
        header("Location: order_confirmation.php?order_id=$orderId");
        exit();
        
    } catch (PDOException $e) {
        $pdo->rollBack();
        header("Location: checkout.php?error=orderfailed");
        exit();
    }
}
?>