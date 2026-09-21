<?php
// checkout.php
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Checkout - Bantu Bakery</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
  <style>
    body {
      font-family: 'Poppins', sans-serif;
      background: #f8f9fa;
      margin: 0;
      padding: 0;
    }

    .container {
      max-width: 800px;
      margin: 50px auto;
      background: #fff;
      border-radius: 12px;
      box-shadow: 0 5px 15px rgba(0,0,0,0.1);
      padding: 30px;
    }

    h2 {
      text-align: center;
      margin-bottom: 20px;
      color: #2f3542;
    }

    form label {
      display: block;
      margin: 15px 0 5px;
      font-weight: 500;
    }

    form input, form textarea, form select {
      width: 100%;
      padding: 12px;
      border: 1px solid #ddd;
      border-radius: 8px;
      font-size: 16px;
    }

    .payment-options {
      margin: 15px 0;
    }

    .payment-options label {
      display: block;
      margin-bottom: 10px;
    }

    .btn-submit {
      width: 100%;
      padding: 15px;
      background: #ff4757;
      border: none;
      color: white;
      font-size: 18px;
      border-radius: 30px;
      cursor: pointer;
      margin-top: 20px;
    }

    .btn-submit:hover {
      background: #ff3742;
    }

    .card-fields {
      display: none;
      margin-top: 15px;
    }
  </style>
</head>
<body>
  <div class="container">
    <h2><i class="fas fa-lock"></i> Secure Checkout</h2>
    <form method="POST" action="process-order.php">
      <!-- Hidden cart data -->
      <input type="hidden" name="cart_data" id="cart-data">

      <label for="name">Full Name</label>
      <input type="text" name="name" id="name" required>

      <label for="email">Email Address</label>
      <input type="email" name="email" id="email" required>

      <label for="phone">Phone Number</label>
      <input type="text" name="phone" id="phone" required>

      <label for="address">Delivery Address</label>
      <textarea name="address" id="address" rows="4" required></textarea>

      <h3>Payment Method</h3>
      <div class="payment-options">
        <label>
          <input type="radio" name="payment_method" value="cash" checked onclick="toggleCard(false)"> Cash on Delivery
        </label>
        <label>
          <input type="radio" name="payment_method" value="card" onclick="toggleCard(true)"> Card Payment
        </label>
      </div>

      <!-- Card fields (only show if card selected) -->
      <div class="card-fields" id="card-fields">
        <label for="card_number">Card Number</label>
        <input type="text" name="card_number" id="card_number" placeholder="1234 5678 9012 3456">

        <label for="expiry">Expiry Date</label>
        <input type="text" name="expiry" id="expiry" placeholder="MM/YY">

        <label for="cvv">CVV</label>
        <input type="text" name="cvv" id="cvv" placeholder="123">
      </div>

      <button type="submit" class="btn-submit">Place Order</button>
    </form>
  </div>

  <script>
    // Attach cart from localStorage before submit
    document.querySelector("form").addEventListener("submit", function() {
      const cart = JSON.parse(localStorage.getItem('cart')) || [];
      document.getElementById("cart-data").value = JSON.stringify(cart);
    });

    // Toggle card fields
    function toggleCard(show) {
      document.getElementById("card-fields").style.display = show ? "block" : "none";
    }
  </script>
</body>
</html>
