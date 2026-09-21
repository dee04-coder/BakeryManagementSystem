<?php
// process-order.php

// DB Connection
$conn = mysqli_connect("localhost", "root", "", "food-order");

if (!$conn) {
    die("❌ Database connection failed: " . mysqli_connect_error());
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name    = mysqli_real_escape_string($conn, $_POST['name']);
    $email   = mysqli_real_escape_string($conn, $_POST['email']);
    $phone   = mysqli_real_escape_string($conn, $_POST['phone']);
    $address = mysqli_real_escape_string($conn, $_POST['address']);
    $payment = $_POST['payment_method'];
    $order_date = date("Y-m-d H:i:s");
    $status = "Ordered";
    $u_id = 0; // if you have users, replace with $_SESSION['user_id']

    // Decode cart JSON
    $cart = json_decode($_POST['cart_data'], true);
    $success = false;

    if (!empty($cart)) {
        foreach ($cart as $item) {
            $food  = mysqli_real_escape_string($conn, $item['title']);
            $price = floatval($item['price']);
            $qty   = intval($item['quantity']);
            $total = $price * $qty;

            $sql = "INSERT INTO tbl_order (food, price, qty, total, order_date, status, u_id) 
                    VALUES ('$food', $price, $qty, $total, '$order_date', '$status', $u_id)";
            mysqli_query($conn, $sql);
        }
        $success = true;
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Order Confirmation</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
  <style>
    body {
      font-family: 'Poppins', sans-serif;
      background: #f8f9fa;
      margin: 0;
      padding: 0;
    }
    .container {
      max-width: 700px;
      margin: 50px auto;
      background: #fff;
      border-radius: 12px;
      box-shadow: 0 5px 15px rgba(0,0,0,0.1);
      padding: 40px;
      text-align: center;
    }
    .success-icon {
      font-size: 70px;
      color: #2ed573;
      margin-bottom: 20px;
    }
    h2 {
      color: #2f3542;
      margin-bottom: 15px;
    }
    p {
      color: #57606f;
      font-size: 16px;
      margin: 8px 0;
    }
    .order-details {
      margin-top: 25px;
      text-align: left;
      padding: 20px;
      background: #f1f2f6;
      border-radius: 10px;
    }
    .btn {
      display: inline-block;
      margin-top: 30px;
      padding: 12px 25px;
      background: #ff4757;
      color: white;
      border-radius: 30px;
      font-size: 16px;
      text-decoration: none;
      transition: background 0.3s;
    }
    .btn:hover {
      background: #ff3742;
    }
  </style>
</head>
<body>
  <div class="container">
    <?php if ($success): ?>
      <div class="success-icon">
        <i class="fas fa-check-circle"></i>
      </div>
      <h2>Thank you for your order, <?= htmlspecialchars($name) ?>! 🎉</h2>
      <p>Your delicious food is on its way.</p>
      <div class="order-details">
        <p><strong>📅 Order Date:</strong> <?= $order_date ?></p>
        <p><strong>📍 Delivery Address:</strong> <?= htmlspecialchars($address) ?></p>
        <p><strong>☎ Phone:</strong> <?= htmlspecialchars($phone) ?></p>
        <p><strong>💳 Payment Method:</strong> <?= ucfirst($payment) ?></p>
      </div>
      <a href="categories.php" class="btn"><i class="fas fa-arrow-left"></i> Continue Shopping</a>
      <script>
        // clear cart in browser
        localStorage.removeItem('cart');
      </script>
    <?php else: ?>
      <h2>⚠ Something went wrong!</h2>
      <p>We couldn’t process your order. Please try again.</p>
      <a href="checkout.php" class="btn">Go Back</a>
    <?php endif; ?>
  </div>
</body>
</html>
