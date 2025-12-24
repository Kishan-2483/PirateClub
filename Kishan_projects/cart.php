<?php
require 'config.php';
session_start();

header('Content-Type: application/json');

if (!isset($_SESSION['user_id'])) {
    echo json_encode(['error' => 'Not logged in']);
    exit();
}

$input = json_decode(file_get_contents('php://input'), true);

// Start or get the cart from session
if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
}

$cart = &$_SESSION['cart'];

// Find if item already exists in cart
$existingIndex = null;
foreach ($cart as $index => $item) {
    if ($item['id'] == $input['item_id'] && 
        (!isset($input['flavor_id']) || $item['flavor_id'] == $input['flavor_id'])) {
        $existingIndex = $index;
        break;
    }
}

if ($input['quantity'] > 0) {
    $cartItem = [
        'id' => $input['item_id'],
        'name' => $input['name'],
        'flavor' => $input['flavor'] ?? null,
        'flavor_id' => $input['flavor_id'] ?? null,
        'price' => $input['price'],
        'quantity' => $input['quantity']
    ];

    if ($existingIndex !== null) {
        $cart[$existingIndex] = $cartItem;
    } else {
        $cart[] = $cartItem;
    }
} elseif ($existingIndex !== null) {
    array_splice($cart, $existingIndex, 1);
}

echo json_encode(['success' => true, 'cart' => $cart]);
?>