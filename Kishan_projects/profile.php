<?php
require 'config.php';
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

$userId = $_SESSION['user_id'];

// Get user details
try {
    $stmt = $pdo->prepare("SELECT * FROM users WHERE user_id = ?");
    $stmt->execute([$userId]);
    $user = $stmt->fetch();
    
    if (!$user) {
        session_destroy();
        header("Location: login.php");
        exit();
    }
    
    // Get user's order history
    $stmt = $pdo->prepare("
        SELECT o.*, 
               (SELECT COUNT(*) FROM order_items WHERE order_id = o.order_id) AS item_count
        FROM orders o
        WHERE o.user_id = ?
        ORDER BY o.order_date DESC
        LIMIT 10
    ");
    $stmt->execute([$userId]);
    $orders = $stmt->fetchAll();
    
} catch (PDOException $e) {
    die("Failed to load profile: " . $e->getMessage());
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Handle profile updates
    $username = $_POST['username'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];
    
    try {
        $stmt = $pdo->prepare("UPDATE users SET username = ?, email = ?, phone = ?, address = ? WHERE user_id = ?");
        $stmt->execute([$username, $email, $phone, $address, $userId]);
        
        $_SESSION['username'] = $username;
        $_SESSION['email'] = $email;
        
        $success = "Profile updated successfully!";
    } catch (PDOException $e) {
        $error = "Failed to update profile: " . $e->getMessage();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Your existing head content -->
    <title>My Profile - PIRATES.in</title>
</head>
<body>
    <!-- Your existing header and nav -->

    <section class="container">
        <div class="section-title">
            <h2>My Profile</h2>
        </div>
        
        <?php if (isset($error)): ?>
        <div class="alert alert-danger"><?= htmlspecialchars($error) ?></div>
        <?php endif; ?>
        
        <?php if (isset($success)): ?>
        <div class="alert alert-success"><?= htmlspecialchars($success) ?></div>
        <?php endif; ?>
        
        <div class="profile-content">
            <div class="profile-form">
                <form method="POST">
                    <div class="form-group">
                        <label for="username">Username</label>
                        <input type="text" id="username" name="username" class="form-control" 
                               value="<?= htmlspecialchars($user['username']) ?>" required>
                    </div>
                    
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" id="email" name="email" class="form-control" 
                               value="<?= htmlspecialchars($user['email']) ?>" required>
                    </div>
                    
                    <div class="form-group">
                        <label for="phone">Phone</label>
                        <input type="tel" id="phone" name="phone" class="form-control" 
                               value="<?= htmlspecialchars($user['phone']) ?>" required>
                    </div>
                    
                    <div class="form-group">
                        <label for="address">Address</label>
                        <textarea id="address" name="address" class="form-control" 
                                  required><?= htmlspecialchars($user['address']) ?></textarea>
                    </div>
                    
                    <button type="submit" class="btn btn-primary">Update Profile</button>
                </form>
            </div>
            
            <div class="order-history">
                <h3>Recent Orders</h3>
                
                <?php if (empty($orders)): ?>
                <p>You haven't placed any orders yet.</p>
                <?php else: ?>
                <div class="orders-list">
                    <?php foreach ($orders as $order): ?>
                    <div class="order-card">
                        <div class="order-header">
                            <span class="order-id">Order #<?= $order['order_id'] ?></span>
                            <span class="order-date"><?= date('M j, Y', strtotime($order['order_date'])) ?></span>
                            <span class="order-status"><?= ucfirst($order['status']) ?></span>
                        </div>
                        
                        <div class="order-details">
                            <div class="order-items"><?= $order['item_count'] ?> item(s)</div>
                            <div class="order-total">$<?= number_format($order['total_amount'], 2) ?></div>
                        </div>
                        
                        <a href="order_details.php?order_id=<?= $order['order_id'] ?>" class="btn btn-sm btn-secondary">
                            View Details
                        </a>
                    </div>
                    <?php endforeach; ?>
                </div>
                <?php endif; ?>
            </div>
        </div>
    </section>

    <!-- Your existing footer -->
</body>
</html>