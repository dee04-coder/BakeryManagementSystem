<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Category Foods - Food Order System</title>
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
            position: sticky;
            top: 0;
            z-index: 100;
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
            display: flex;
            align-items: center;
        }

        .main-nav a:hover, .main-nav a.active {
            color: var(--primary);
        }

        .cart-count {
            background: var(--primary);
            color: white;
            border-radius: 50%;
            width: 20px;
            height: 20px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 12px;
            margin-left: 5px;
        }

        /* Food Search Section */
        .food-search {
            background: linear-gradient(rgba(0, 0, 0, 0.7), rgba(0, 0, 0, 0.7)), url('https://images.unsplash.com/photo-1504674900247-0877df9cc836?ixlib=rb-4.0.3&auto=format&fit=crop&w=1350&q=80');
            background-size: cover;
            background-position: center;
            color: white;
            text-align: center;
            padding: 60px 20px;
            margin-bottom: 40px;
        }

        .food-search h2 {
            font-size: 36px;
            margin-bottom: 20px;
            font-weight: 700;
        }

        .food-search h2 a {
            color: var(--accent);
            text-decoration: none;
        }

        .food-search h2 a:hover {
            text-decoration: underline;
        }

        /* Food Menu Section */
        .food-menu {
            padding: 50px 0;
        }

        .section-title {
            text-align: center;
            margin-bottom: 50px;
            position: relative;
        }

        .section-title h2 {
            font-size: 36px;
            color: var(--secondary);
            display: inline-block;
            margin-bottom: 15px;
        }

        .section-title h2:after {
            content: '';
            display: block;
            width: 70px;
            height: 4px;
            background: var(--primary);
            margin: 10px auto;
            border-radius: 2px;
        }

        .food-menu-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
            gap: 30px;
        }

        .food-menu-box {
            background: white;
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s, box-shadow 0.3s;
            display: flex;
            flex-direction: column;
        }

        .food-menu-box:hover {
            transform: translateY(-10px);
            box-shadow: 0 15px 30px rgba(0, 0, 0, 0.15);
        }

        .food-menu-img {
            height: 200px;
            overflow: hidden;
            position: relative;
        }

        .food-menu-img img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.5s;
        }

        .food-menu-box:hover .food-menu-img img {
            transform: scale(1.1);
        }

        .food-menu-desc {
            padding: 20px;
            flex-grow: 1;
            display: flex;
            flex-direction: column;
        }

        .food-menu-desc h4 {
            font-size: 22px;
            margin-bottom: 10px;
            color: var(--secondary);
        }

        .food-price {
            font-size: 20px;
            font-weight: 700;
            color: var(--primary);
            margin-bottom: 10px;
        }

        .food-detail {
            color: #666;
            margin-bottom: 20px;
            flex-grow: 1;
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

        .no-food {
            grid-column: 1 / -1;
            text-align: center;
            padding: 40px;
            background: white;
            border-radius: 12px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
        }

        .no-food i {
            font-size: 60px;
            color: #ddd;
            margin-bottom: 20px;
        }

        .no-food h3 {
            color: var(--secondary);
            margin-bottom: 10px;
        }

        /* Filter Section */
        .filter-section {
            background: white;
            padding: 20px;
            border-radius: 12px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
            margin-bottom: 30px;
        }

        .filter-title {
            font-size: 18px;
            margin-bottom: 15px;
            color: var(--secondary);
        }

        .filter-options {
            display: flex;
            flex-wrap: wrap;
            gap: 15px;
        }

        .filter-option {
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .filter-option input[type="checkbox"] {
            width: 18px;
            height: 18px;
        }

        .filter-option label {
            cursor: pointer;
        }

        .price-range {
            display: flex;
            align-items: center;
            gap: 10px;
            margin-top: 10px;
        }

        .price-range input {
            padding: 8px 12px;
            border: 1px solid #ddd;
            border-radius: 4px;
            width: 100px;
        }

        /* Quantity Controls */
        .quantity-controls {
            display: flex;
            align-items: center;
            margin-bottom: 15px;
            gap: 10px;
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
        }

        /* Notification */
        .notification {
            position: fixed;
            top: 20px;
            right: 20px;
            padding: 15px 20px;
            background: var(--primary);
            color: white;
            border-radius: 8px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
            z-index: 1000;
            display: flex;
            align-items: center;
            transform: translateX(100%);
            opacity: 0;
            transition: transform 0.3s, opacity 0.3s;
        }

        .notification.show {
            transform: translateX(0);
            opacity: 1;
        }

        .notification i {
            margin-right: 10px;
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
                flex-wrap: wrap;
            }

            .main-nav li {
                margin: 5px 10px;
            }

            .food-search h2 {
                font-size: 28px;
            }

            .food-menu-grid {
                grid-template-columns: 1fr;
            }

            .filter-options {
                flex-direction: column;
                align-items: flex-start;
            }
        }

        /* Animation */
        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(20px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .food-menu-box {
            animation: fadeIn 0.5s ease-out;
        }

        .food-menu-box:nth-child(1) {
            animation-delay: 0.1s;
        }

        .food-menu-box:nth-child(2) {
            animation-delay: 0.2s;
        }

        .food-menu-box:nth-child(3) {
            animation-delay: 0.3s;
        }

        .food-menu-box:nth-child(4) {
            animation-delay: 0.4s;
        }

        .food-menu-box:nth-child(5) {
            animation-delay: 0.5s;
        }

        .food-menu-box:nth-child(6) {
            animation-delay: 0.6s;
        }

        /* Badge for featured items */
        .featured-badge {
            position: absolute;
            top: 10px;
            right: 10px;
            background: var(--accent);
            color: white;
            padding: 5px 10px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: 600;
        }
    </style>
</head>
<body>
    <!-- Notification -->
    <div class="notification" id="notification">
        <i class="fas fa-check-circle"></i>
        <span id="notification-text">Item added to cart!</span>
    </div>

    <!-- Header Section -->
    <header class="header">
        <div class="container">
            <div class="header-content">
                <div class="logo">BANTU<span>BAKERY</span></div>
                <nav class="main-nav">
                    <ul>
                        <li><a href="index.php">Home</a></li>
                        <li><a href="categories.php">Categories</a></li>
                        <li><a href="foods.php" class="active">Foods</a></li>
                        <li><a href="cart.php">Cart <span class="cart-count" id="cart-count">0</span></a></li>
                        <li><a href="#">Contact</a></li>
                    </ul>
                </nav>
            </div>
        </div>
    </header>

    <!-- Food Search Section -->
    <section class="food-search">
        <div class="container">
            <h2>Foods on <a href="#">"<span id="category-title">Sweet Treats</span>"</a></h2>
        </div>
    </section>

    <!-- Food Menu Section -->
    <section class="food-menu">
        <div class="container">
            <div class="section-title">
                <h2>Food Menu</h2>
            </div>

            <!-- Filter Section -->
            <div class="filter-section">
                <h3 class="filter-title">Filter Options</h3>
                <div class="filter-options">
                    <div class="filter-option">
                        <input type="checkbox" id="featured" name="featured">
                        <label for="featured">Featured Items</label>
                    </div>
                    <div class="filter-option">
                        <input type="checkbox" id="vegetarian" name="vegetarian">
                        <label for="vegetarian">Vegetarian</label>
                    </div>
                    <div class="filter-option">
                        <input type="checkbox" id="spicy" name="spicy">
                        <label for="spicy">spicy</label>
                    </div>
                    <div class="price-range">
                        <span>Price Range:</span>
                        <input type="number" id="min-price" placeholder="Min" min="0">
                        <span>-</span>
                        <input type="number" id="max-price" placeholder="Max" min="0">
                    </div>
                </div>
            </div>

            <div class="food-menu-grid" id="foodMenuGrid">
                <!-- Food items will be dynamically inserted here -->
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
                        
                    </div>
                </div>

                <div class="footer-section">
                    <h3>Contact Us</h3>
                    <p>123 Food Street, Taste City</p>
                    <p>Phone: (123) 456-7890</p>
                    <p>Email: info@foodexpress.com</p>
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
        document.addEventListener('DOMContentLoaded', function () {
            // Initialize cart if not exists
            if (!localStorage.getItem('cart')) {
                localStorage.setItem('cart', JSON.stringify([]));
            }
            
            // Update cart count
            updateCartCount();
            
            // Get category from URL parameters (simulating PHP $_GET)
            const urlParams = new URLSearchParams(window.location.search);
            const categoryId = urlParams.get('category_id') || '1';

            // Sample category data
            const categories = {
                1: "Bread and Rolls",
                2: "Cakes and Gateaux",
                3: "Croissants and Puff pastries",
                4: "Sweet Treats",
                5: "Waffles and Flapjacks",
                6: "Beverages"
            };

            // Set category title
            const categoryTitle = document.getElementById('category-title');
            categoryTitle.textContent = categories[categoryId] || "Foods";

            // Sample food data
            const foods = [
                {
                    id: 7,
                    title: "Tray of cupcakes",
                    price: 59.99,
                    description: "Our fresh delicious cupcakes",
                    image: "https://images.unsplash.com/photo-1618411640026-24e40dcde1ab?q=80&w=871&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D",
                    category_id: 1,
                    featured: true,
                    vegetarian: false,
                    spicy: false
                 },
               {
                     id: 8,
                     title: "Brownies",
                     price: 49.99,
                     description: "Our fresh chocs",
                     image: "https://plus.unsplash.com/premium_photo-1663840175543-6eb0f4a25401?q=80&w=387&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D",
                     category_id: 1,
                     featured: true,
                     vegetarian: false,
                    spicy: false
               },
                 {
                    id: 9,
                    title: "Macaroons",
                    price: 69.99,
                    description: "6 Fresh sweet macaroons",
                    image: "https://images.unsplash.com/photo-1635712388945-710b32b68679?q=80&w=874&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D",
                    category_id: 1,
                    featured: false,
                    vegetarian: true,
                    spicy: false
                },
                {
                    id: 10,
                    title: "Chocolate chip cookies",
                    price: 39.99,
                    description: "Freshly made soft cookies",
                    image: "https://images.unsplash.com/photo-1673551490160-3f2e712b9373?q=80&w=464&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D",
                    category_id: 1,
                    featured: true,
                    vegetarian: false,
                    spicy: false
                },
                {
                    id: 11,
                    title: "cupcakes",
                    price: 49.99,
                    description: "Fluffy cupcakes",
                    image: "https://images.unsplash.com/photo-1602578101453-78587cd2b2fa?q=80&w=467&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D",
                    category_id: 1,
                    featured: false,
                    vegetarian: false,
                    spicy: false
                },
                {
                    id: 12,
                    title: "Pretzels and cookies",
                    price: 59.99,
                    description: "Sweet and filled with raisins",
                    image: "https://plus.unsplash.com/premium_photo-1673716790112-623554c4301f?q=80&w=387&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D",
                    category_id: 1,
                    featured: false,
                    vegetarian: false,
                    spicy: false
                }
            ];

            const foodMenuGrid = document.getElementById('foodMenuGrid');
            const featuredFilter = document.getElementById('featured');
            const vegetarianFilter = document.getElementById('vegetarian');
            const spicyFilter = document.getElementById('spicy');
            const minPriceFilter = document.getElementById('min-price');
            const maxPriceFilter = document.getElementById('max-price');

            // Filter foods by category
            let filteredFoods = foods.filter(food => food.category_id == categoryId);

            // Render food items
            function renderFoods(foodsArray) {
                foodMenuGrid.innerHTML = '';

                if (foodsArray.length === 0) {
                    foodMenuGrid.innerHTML = `
                            <div class="no-food">
                                <i class="fas fa-utensils"></i>
                                <h3>No food items found</h3>
                                <p>Try adjusting your filters or check back later for new items</p>
                            </div>
                        `;
                    return;
                }

                foodsArray.forEach(food => {
                    const foodBox = document.createElement('div');
                    foodBox.className = 'food-menu-box';

                    foodBox.innerHTML = `
                            <div class="food-menu-img">
                                <img src="${food.image}" alt="${food.title}">
                                ${food.featured ? '<span class="featured-badge">Featured</span>' : ''}
                            </div>
                            <div class="food-menu-desc">
                                <h4>${food.title}</h4>
                                <p class="food-price">R${food.price.toFixed(2)}</p>
                                <p class="food-detail">${food.description}</p>
                                <div class="quantity-controls">
                                    <button class="quantity-btn" onclick="decreaseQuantity(${food.id})">-</button>
                                    <input type="number" id="quantity-${food.id}" class="quantity-input" value="1" min="1" max="99">
                                    <button class="quantity-btn" onclick="increaseQuantity(${food.id})">+</button>
                                </div>
                                <button class="btn-primary" onclick="addToCart(${food.id}, '${food.title.replace(/'/g, "\\'")}', ${food.price}, '${food.image}')">
                                    Add to Cart
                                </button>
                            </div>
                        `;

                    foodMenuGrid.appendChild(foodBox);
                });
            }

            // Apply filters
            function applyFilters() {
                let result = [...filteredFoods];

                // Featured filter
                if (featuredFilter.checked) {
                    result = result.filter(food => food.featured);
                }

                // Vegetarian filter
                if (vegetarianFilter.checked) {
                    result = result.filter(food => food.vegetarian);
                }

                // Spicy filter
                if (spicyFilter.checked) {
                    result = result.filter(food => food.spicy);
                }

                // Price range filter
                const minPrice = parseFloat(minPriceFilter.value) || 0;
                const maxPrice = parseFloat(maxPriceFilter.value) || Number.MAX_VALUE;

                result = result.filter(food => food.price >= minPrice && food.price <= maxPrice);

                renderFoods(result);
            }

            // Event listeners for filters
            featuredFilter.addEventListener('change', applyFilters);
            vegetarianFilter.addEventListener('change', applyFilters);
            spicyFilter.addEventListener('change', applyFilters);
            minPriceFilter.addEventListener('input', applyFilters);
            maxPriceFilter.addEventListener('input', applyFilters);

            // Initial render
            renderFoods(filteredFoods);

            // Add animation to food boxes when they come into view
            const observerOptions = {
                root: null,
                rootMargin: '0px',
                threshold: 0.1
            };

            const observer = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        entry.target.style.opacity = '1';
                        entry.target.style.transform = 'translateY(0)';
                    }
                });
            }, observerOptions);

            // Observe food boxes after they are rendered
            setTimeout(() => {
                document.querySelectorAll('.food-menu-box').forEach(box => {
                    box.style.opacity = '0';
                    box.style.transform = 'translateY(20px)';
                    box.style.transition = 'opacity 0.5s ease, transform 0.5s ease';
                    observer.observe(box);
                });
            }, 100);
        });

        // Quantity control functions
        function increaseQuantity(foodId) {
            const quantityInput = document.getElementById(`quantity-${foodId}`);
            let quantity = parseInt(quantityInput.value);
            if(quantity < 99) {
                quantityInput.value = quantity + 1;
            }
        }

        function decreaseQuantity(foodId) {
            const quantityInput = document.getElementById(`quantity-${foodId}`);
            let quantity = parseInt(quantityInput.value);
            if(quantity > 1) {
                quantityInput.value = quantity - 1;
            }
        }

        // Add to Cart function
        function addToCart(foodId, foodTitle, foodPrice, foodImage) {
            const quantity = parseInt(document.getElementById(`quantity-${foodId}`).value);
            
            // Get current cart
            const cart = JSON.parse(localStorage.getItem('cart')) || [];
            
            // Check if item already in cart
            const existingItemIndex = cart.findIndex(item => item.id === foodId);
            
            if (existingItemIndex !== -1) {
                // Update quantity if item exists
                cart[existingItemIndex].quantity += quantity;
            } else {
                // Add new item to cart
                cart.push({
                    id: foodId,
                    title: foodTitle,
                    price: foodPrice,
                    image: foodImage,
                    quantity: quantity
                });
            }
            
            // Save updated cart
            localStorage.setItem('cart', JSON.stringify(cart));
            
            // Update cart count
            updateCartCount();
            
            // Show notification
            showNotification(`${foodTitle} added to cart!`);
        }

        // Update cart count
        function updateCartCount() {
            const cart = JSON.parse(localStorage.getItem('cart')) || [];
            const totalItems = cart.reduce((total, item) => total + item.quantity, 0);
            document.getElementById('cart-count').textContent = totalItems;
        }

        // Show notification
        function showNotification(message) {
            const notification = document.getElementById('notification');
            const notificationText = document.getElementById('notification-text');
            
            notificationText.textContent = message;
            notification.classList.add('show');
            
            // Hide notification after 3 seconds
            setTimeout(() => {
                notification.classList.remove('show');
            }, 3000);
        }
    </script>
</body>
</html>