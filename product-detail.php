<?php
session_start();

// Database connection (replace with your actual connection details)
$host = 'localhost';
$user = 'root';
$password = '';
$database = 'food-order';
$conn = mysqli_connect($host, $user, $password, $database);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Check if food_id is set
$food_id = isset($_GET['food_id']) ? intval($_GET['food_id']) : 0;

if ($food_id > 0) {
    // Get food details from database
    $sql = "SELECT * FROM tbl_food WHERE id = $food_id";
    $res = mysqli_query($conn, $sql);
    
    // Check if food exists
    if ($res && mysqli_num_rows($res) == 1) {
        $row = mysqli_fetch_assoc($res);
        $title = $row['title'];
        $price = $row['price'];
        $image_name = $row['image_name'];
        $description = $row['description'];
    } else {
        // Food not found, redirect to homepage
        header('Location: index.php');
        exit();
    }
} else {
    // Redirect to homepage if no food_id provided
    header('Location: index.php');
    exit();
}

// Handle Add to Cart functionality
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['add_to_cart'])) {
    $quantity = isset($_POST['quantity']) ? intval($_POST['quantity']) : 1;
    
    // Initialize cart if not exists
    if (!isset($_SESSION['cart'])) {
        $_SESSION['cart'] = array();
    }
    
    // Check if item already in cart
    $item_exists = false;
    foreach ($_SESSION['cart'] as &$item) {
        if ($item['food_id'] == $food_id) {
            $item['quantity'] += $quantity;
            $item_exists = true;
            break;
        }
    }
    
    // If item not in cart, add it
    if (!$item_exists) {
        $_SESSION['cart'][] = array(
            'food_id' => $food_id,
            'food_name' => $title,
            'food_price' => $price,
            'quantity' => $quantity,
            'image_name' => $image_name
        );
    }
    
    // Set success message
    $_SESSION['cart_message'] = "Item added to cart successfully!";
    
    // Redirect to prevent form resubmission
    header("Location: product-detail.php?food_id=$food_id");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo htmlspecialchars($title); ?> | Bantu Bakery</title>
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

        /* Order Container */
        .order-container {
            max-width: 1000px;
            margin: 40px auto;
            padding: 20px;
            background: white;
            border-radius: 12px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
        }

        .order-header {
            text-align: center;
            margin-bottom: 30px;
        }

        .order-content {
            display: flex;
            flex-wrap: wrap;
            gap: 30px;
        }

        .order-image {
            flex: 1;
            min-width: 300px;
        }

        .order-image img {
            width: 100%;
            border-radius: 12px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
        }

        .order-details {
            flex: 1;
            min-width: 300px;
        }

        .order-title {
            font-size: 28px;
            color: var(--secondary);
            margin-bottom: 15px;
        }

        .order-price {
            font-size: 24px;
            color: var(--primary);
            font-weight: bold;
            margin-bottom: 20px;
        }

        .order-description {
            color: #666;
            margin-bottom: 30px;
            line-height: 1.6;
        }

        .quantity-controls {
            display: flex;
            align-items: center;
            margin-bottom: 30px;
            gap: 15px;
        }

        .quantity-btn {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background: var(--primary);
            color: white;
            border: none;
            font-size: 18px;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .quantity-input {
            width: 70px;
            height: 40px;
            text-align: center;
            font-size: 18px;
            border: 2px solid #ddd;
            border-radius: 8px;
        }

        .order-actions {
            display: flex;
            gap: 15px;
            flex-wrap: wrap;
        }

        .btn-primary {
            display: inline-block;
            background: var(--primary);
            color: white;
            padding: 12px 25px;
            border-radius: 30px;
            text-decoration: none;
            font-weight: 500;
            transition: background 0.3s;
            text-align: center;
            border: none;
            cursor: pointer;
        }

        .btn-primary:hover {
            background: #ff3742;
        }

        .btn-secondary {
            display: inline-block;
            background: var(--secondary);
            color: white;
            padding: 12px 25px;
            border-radius: 30px;
            text-decoration: none;
            font-weight: 500;
            transition: background 0.3s;
            text-align: center;
        }

        .btn-secondary:hover {
            background: #3d4856;
        }

        .message {
            padding: 15px;
            margin: 20px 0;
            border-radius: 8px;
            text-align: center;
        }

        .success {
            background-color: #d4edda;
            color: #155724;
            border: 1px solid #c3e6cb;
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

        @media (max-width: 768px) {
            .order-content {
                flex-direction: column;
            }
            
            .order-actions {
                flex-direction: column;
            }
            
            .btn-primary, .btn-secondary {
                width: 100%;
            }
            
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
                        <li><a href="cart.php">Cart</a></li>
                        <li><a href="#">Contact</a></li>
                    </ul>
                </nav>
            </div>
        </div>
    </header>

    <!-- Product Detail Section -->
    <section class="food-order">
        <div class="container">
            <div class="order-container">
                <div class="order-header">
                    <h2>Product Details</h2>
                </div>
                
                <!-- Success Message -->
                <?php if (isset($_SESSION['cart_message'])): ?>
                    <div class="message success">
                        <?php 
                        echo $_SESSION['cart_message']; 
                        unset($_SESSION['cart_message']);
                        ?>
                    </div>
                <?php endif; ?>
                
                <div class="order-content">
                    <div class="order-image">
                        <?php if (!empty($image_name)): ?>
                            <img src="images/food/<?php echo htmlspecialchars($image_name); ?>" alt="<?php echo htmlspecialchars($title); ?>">
                        <?php else: ?>
                            <div class="error">Image not available.</div>
                        <?php endif; ?>
                    </div>
                    
                    <div class="order-details">
                        <h3 class="order-title"><?php echo htmlspecialchars($title); ?></h3>
                        <p class="order-price">R<?php echo number_format($price, 2); ?></p>
                        <p class="order-description"><?php echo htmlspecialchars($description); ?></p>
                        
                        <form action="" method="POST">
                            <input type="hidden" name="food_id" value="<?php echo $food_id; ?>">
                            
                            <div class="quantity-controls">
                                <label for="quantity">Quantity:</label>
                                <button type="button" class="quantity-btn" onclick="decreaseQuantity()">-</button>
                                <input type="number" id="quantity" name="quantity" class="quantity-input" value="1" min="1" max="99">
                                <button type="button" class="quantity-btn" onclick="increaseQuantity()">+</button>
                            </div>
                            
                            <div class="order-actions">
                                <button type="submit" name="add_to_cart" class="btn-primary">
                                    <i class="fas fa-shopping-cart"></i> Add to Cart
                                </button>
                                <a href="foods.php" class="btn-secondary">
                                    <i class="fas fa-arrow-left"></i> Continue Shopping
                                </a>
                            </div>
                        </form>
                    </div>
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
                        <a href="#">My Account</a>
                        <a href="#">Order Tracking</a>
                    </div>
                </div>

                <div class="footer-section">
                    <h3>Contact Us</h3>
                    <p>123 Food Street, Taste City</p>
                    <p>Phone: (123) 456-7890</p>
                    <p>Email: info@bantubakery.com</p>
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
        function increaseQuantity() {
            const quantityInput = document.getElementById('quantity');
            let quantity = parseInt(quantityInput.value);
            if(quantity < 99) {
                quantityInput.value = quantity + 1;
            }
        }
        
        function decreaseQuantity() {
            const quantityInput = document.getElementById('quantity');
            let quantity = parseInt(quantityInput.value);
            if(quantity > 1) {
                quantityInput.value = quantity - 1;
            }
        }
    </script>
</body>
</html>