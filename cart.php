
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Cart - Bantu Bakery</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif;
        }

        :root {
            --primary: #ff4757;
            --secondary: #2f3542;
            --accent: #ffa502;
            --light: #f1f2f6;
            --dark: #2f3542;
            --text: #2f3542;
            --background: #ffffff;
        }

        body {
            background-color: #f9f9f9;
            color: var(--text);
            line-height: 1.6;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 15px;
        }

        /* Header Styles */
        .header {
            background: linear-gradient(135deg, var(--secondary), #1a2530);
            color: white;
            padding: 15px 0;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }

        .header-content {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .logo {
            font-size: 28px;
            font-weight: bold;
            color: var(--primary);
        }

        .logo span {
            color: white;
        }

        .main-nav ul {
            display: flex;
            list-style: none;
        }

        .main-nav li {
            margin-left: 25px;
        }

        .main-nav a {
            color: white;
            text-decoration: none;
            font-weight: 500;
            padding: 5px 10px;
            border-radius: 4px;
            transition: all 0.3s;
        }

        .main-nav a:hover, .main-nav a.active {
            color: var(--primary);
        }

        /* Page Title */
        .page-title {
            text-align: center;
            margin: 40px 0;
            position: relative;
        }

        .page-title h2 {
            font-size: 36px;
            color: var(--secondary);
            display: inline-block;
            margin-bottom: 15px;
        }

        .page-title h2:after {
            content: '';
            display: block;
            width: 70px;
            height: 4px;
            background: var(--primary);
            margin: 10px auto;
            border-radius: 2px;
        }

        /* Cart Section */
        .cart-container {
            background: white;
            border-radius: 12px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
            padding: 30px;
            margin-bottom: 40px;
        }

        .cart-header {
            display: grid;
            grid-template-columns: 2fr 1fr 1fr 1fr 0.5fr;
            padding: 15px 0;
            border-bottom: 2px solid #eee;
            font-weight: bold;
        }

        .cart-item {
            display: grid;
            grid-template-columns: 2fr 1fr 1fr 1fr 0.5fr;
            padding: 20px 0;
            border-bottom: 1px solid #eee;
            align-items: center;
        }

        .cart-product {
            display: flex;
            align-items: center;
        }

        .cart-product img {
            width: 80px;
            height: 80px;
            object-fit: cover;
            border-radius: 8px;
            margin-right: 15px;
        }

        .cart-product-info h4 {
            margin-bottom: 5px;
            color: var(--secondary);
        }

        .cart-quantity {
            display: flex;
            align-items: center;
        }

        .quantity-btn {
            width: 30px;
            height: 30px;
            border-radius: 50%;
            background: var(--primary);
            color: white;
            border: none;
            font-size: 16px;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .quantity-input {
            width: 50px;
            height: 30px;
            text-align: center;
            font-size: 16px;
            border: 2px solid #ddd;
            border-radius: 5px;
            margin: 0 10px;
        }

        .cart-price {
            font-weight: bold;
            color: var(--primary);
        }

        .remove-btn {
            background: none;
            border: none;
            color: #ff4757;
            font-size: 18px;
            cursor: pointer;
            transition: color 0.3s;
        }

        .remove-btn:hover {
            color: #ff3742;
        }

        .cart-summary {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-top: 30px;
            padding-top: 20px;
            border-top: 2px solid #eee;
        }

        .cart-total {
            font-size: 24px;
            font-weight: bold;
        }

        .total-amount {
            color: var(--primary);
        }

        .checkout-btn {
            background: var(--primary);
            color: white;
            padding: 15px 30px;
            border-radius: 30px;
            text-decoration: none;
            font-weight: 500;
            transition: background 0.3s;
            border: none;
            cursor: pointer;
            font-size: 18px;
        }

        .checkout-btn:hover {
            background: #ff3742;
        }

        .empty-cart {
            text-align: center;
            padding: 60px 0;
        }

        .empty-cart i {
            font-size: 80px;
            color: #ddd;
            margin-bottom: 20px;
        }

        .empty-cart h3 {
            color: var(--secondary);
            margin-bottom: 15px;
        }

        .empty-cart p {
            color: #666;
            margin-bottom: 30px;
        }

        .continue-shopping {
            display: inline-block;
            background: var(--secondary);
            color: white;
            padding: 12px 25px;
            border-radius: 30px;
            text-decoration: none;
            font-weight: 500;
            transition: background 0.3s;
        }

        .continue-shopping:hover {
            background: #3d4856;
        }

        /* Footer Styles */
        .footer {
            background: var(--secondary);
            color: white;
            padding: 50px 0 20px;
            margin-top: 50px;
        }

        .footer-content {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 30px;
            margin-bottom: 30px;
        }

        .footer-section h3 {
            font-size: 20px;
            margin-bottom: 20px;
            position: relative;
            padding-bottom: 10px;
        }

        .footer-section h3:after {
            content: '';
            position: absolute;
            left: 0;
            bottom: 0;
            width: 50px;
            height: 3px;
            background: var(--primary);
        }

        .footer-links a {
            display: block;
            color: #ccc;
            margin-bottom: 10px;
            text-decoration: none;
            transition: color 0.3s;
        }

        .footer-links a:hover {
            color: var(--primary);
        }

        .footer-social {
            display: flex;
            gap: 15px;
            margin-top: 20px;
        }

        .footer-social a {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 40px;
            height: 40px;
            background: rgba(255, 255, 255, 0.1);
            border-radius: 50%;
            color: white;
            transition: background 0.3s;
        }

        .footer-social a:hover {
            background: var(--primary);
        }

        .footer-bottom {
            text-align: center;
            padding-top: 20px;
            border-top: 1px solid rgba(255, 255, 255, 0.1);
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .header-content {
                flex-direction: column;
                text-align: center;
            }

            .main-nav ul {
                margin-top: 15px;
                justify-content: center;
            }

            .main-nav li {
                margin: 0 10px;
            }

            .cart-header {
                display: none;
            }

            .cart-item {
                grid-template-columns: 1fr;
                gap: 15px;
                text-align: center;
                padding: 25px 0;
            }

            .cart-product {
                flex-direction: column;
                text-align: center;
            }

            .cart-product img {
                margin-right: 0;
                margin-bottom: 15px;
            }

            .cart-summary {
                flex-direction: column;
                gap: 20px;
            }

            .checkout-btn {
                width: 100%;
                text-align: center;
            }
        }
    </style>
</head>
<body>
    <!-- Header Section -->
    <header class="header">
        <div class="container">
            <div class="header-content">
                <div class="logo">BANTU<span>BAKERY</span></div>
                <nav class="main-nav">
                    <ul>
                        <li><a href="index.php">Home</a></li>
                        <li><a href="categories.php">Categories</a></li>
                        <li><a href="foods.php">Foods</a></li>
                        <li><a href="cart.php" class="active">Cart</a></li>
                        <li><a href="#">Contact</a></li>
                    </ul>
                </nav>
            </div>
        </div>
    </header>

    <!-- Page Title -->
    <section class="page-title">
        <div class="container">
            <h2>Your Shopping Cart</h2>
        </div>
    </section>

    <!-- Cart Section -->
    <section class="cart">
        <div class="container">
            <div class="cart-container">
                <div id="cart-content">
                    <!-- Cart items will be dynamically inserted here -->
                </div>
            </div>
        </div>
    </section>

    <!-- Footer Section -->
    <footer class="footer">
        <div class="container">
            <div class="footer-content">
                <div class="footer-section">
                    <h3>About Us</h3>
                    <p>Bantu Bakery is a premium food delivery service offering a wide variety of cuisines from the best restaurants in town.</p>
                </div>

                <div class="footer-section">
                    <h3>Quick Links</h3>
                    <div class="footer-links">
                        <a href="index.php">Home</a>
                        <a href="categories.php">Categories</a>
                        <a href="foods.php">Food Menu</a>
                        <a href="cart.php">Cart</a>
                        <a href="#">Order Tracking</a>
                    </div>
                </div>

                <div class="footer-section">
                    <h3>Contact Us</h3>
                    <p>123 Food Street, Taste City</p>
                    <p>Phone: 076 456-7890</p>
                    <p>Email: bantubakery.com</p>
                    <div class="footer-social">
                        <a href="#"><i class="fab fa-facebook-f"></i></a>
                        <a href="#"><i class="fab fa-twitter"></i></a>
                        <a href="#"><i class="fab fa-instagram"></i></a>
                        <a href="#"><i class="fab fa-pinterest"></i></a>
                    </div>
                </div>
            </div>

            <div class="footer-bottom">
                <p>&copy; 2025 Bantu Bakery. All rights reserved.</p>
            </div>
        </div>
    </footer>

    <script>
    document.addEventListener('DOMContentLoaded', function() {
        // Get cart from localStorage
        const cart = JSON.parse(localStorage.getItem('cart')) || [];
        const cartContent = document.getElementById('cart-content');
        
        // Render cart items
        function renderCart() {
            if (cart.length === 0) {
                cartContent.innerHTML = `
                    <div class="empty-cart">
                        <i class="fas fa-shopping-cart"></i>
                        <h3>Your cart is empty</h3>
                        <p>Looks like you haven't added any items to your cart yet.</p>
                        <a href="foods.php" class="continue-shopping">Continue Shopping</a>
                    </div>
                `;
                return;
            }
            
            let cartHTML = `
                <div class="cart-header">
                    <div>Product</div>
                    <div>Price</div>
                    <div>Quantity</div>
                    <div>Total</div>
                    <div></div>
                </div>
            `;
            
            let totalAmount = 0;
            
            cart.forEach(item => {
                const itemTotal = item.price * item.quantity;
                totalAmount += itemTotal;
                
                cartHTML += `
                    <div class="cart-item" data-id="${item.id}">
                        <div class="cart-product">
                            <img src="${item.image}" alt="${item.title}">
                            <div class="cart-product-info">
                                <h4>${item.title}</h4>
                            </div>
                        </div>
                        <div class="cart-price">R${item.price.toFixed(2)}</div>
                        <div class="cart-quantity">
                            <button class="quantity-btn" onclick="decreaseQuantity(${item.id})">-</button>
                            <input type="number" class="quantity-input" value="${item.quantity}" min="1" max="99" readonly>
                            <button class="quantity-btn" onclick="increaseQuantity(${item.id})">+</button>
                        </div>
                        <div class="cart-price">R${itemTotal.toFixed(2)}</div>
                        <div>
                            <button class="remove-btn" onclick="removeFromCart(${item.id})">
                                <i class="fas fa-trash"></i>
                            </button>
                        </div>
                    </div>
                `;
            });
            
            cartHTML += `
                <div class="cart-summary">
                    <div class="cart-total">
                        Total: <span class="total-amount">R${totalAmount.toFixed(2)}</span>
                    </div>
                    <button class="checkout-btn" onclick="checkout()">
                         <i class="fas fa-lock"></i> Proceed to Checkout
                    </button>
                </div>
            `;
            
            cartContent.innerHTML = cartHTML;
        }
        
        // Increase quantity
        window.increaseQuantity = function(id) {
            const item = cart.find(item => item.id === id);
            if (item && item.quantity < 99) {
                item.quantity++;
                localStorage.setItem('cart', JSON.stringify(cart));
                renderCart();
            }
        }
        
        // Decrease quantity
        window.decreaseQuantity = function(id) {
            const item = cart.find(item => item.id === id);
            if (item && item.quantity > 1) {
                item.quantity--;
                localStorage.setItem('cart', JSON.stringify(cart));
                renderCart();
            }
        }
        
        // Remove from cart
        window.removeFromCart = function(id) {
            const index = cart.findIndex(item => item.id === id);
            if (index !== -1) {
                cart.splice(index, 1);
                localStorage.setItem('cart', JSON.stringify(cart));
                renderCart();
                
                // Show notification
                showNotification('Item removed from cart');
            }
        }
        
        // Checkout - REDIRECT TO CHECKOUT.PHP
        window.checkout = function() {
            if (cart.length === 0) {
                alert('Your cart is empty. Add some items before checkout.');
                return;
            }
            
            // Redirect to checkout page
            window.location.href = 'checkout.php';
        }
        
        // Show notification
        function showNotification(message) {
            // Create notification element
            const notification = document.createElement('div');
            notification.style.position = 'fixed';
            notification.style.top = '20px';
            notification.style.right = '20px';
            notification.style.padding = '15px 20px';
            notification.style.background = 'var(--primary)';
            notification.style.color = 'white';
            notification.style.borderRadius = '8px';
            notification.style.boxShadow = '0 5px 15px rgba(0, 0, 0, 0.2)';
            notification.style.zIndex = '1000';
            notification.style.display = 'flex';
            notification.style.alignItems = 'center';
            notification.innerHTML = `
                <i class="fas fa-check-circle" style="margin-right: 10px;"></i>
                ${message}
            `;
            
            document.body.appendChild(notification);
            
            // Remove notification after 3 seconds
            setTimeout(() => {
                notification.style.opacity = '0';
                notification.style.transition = 'opacity 0.5s';
                setTimeout(() => {
                    document.body.removeChild(notification);
                }, 500);
            }, 3000);
        }
        
        // Initial render
        renderCart();
    });
</script>
</body>
</html>