<!DOCTYPE html>
<html lang="en">
<head>
    <!-- 42469988 DIMPHO MOKOENA -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bantu Bakery - Home</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        body {
            background-color: #f5f5f5;
            color: #333;
            line-height: 1.6;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
        }

        header {
            background: linear-gradient(to right, #ff7e5f, #feb47b);
            color: white;
            padding: 20px 0;
            text-align: center;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }

        .logo {
            font-size: 2rem;
            font-weight: bold;
        }

        .menu {
            display: flex;
            justify-content: center;
            list-style: none;
            margin-top: 15px;
        }

        .menu li {
            margin: 0 15px;
        }

        .menu a {
            color: white;
            text-decoration: none;
            font-weight: 500;
            transition: all 0.3s ease;
        }

        .menu a:hover {
            color: #ffd700;
        }

        .food-search {
            background: linear-gradient(rgba(0, 0, 0, 0.7), rgba(0, 0, 0, 0.7)), url('https://images.unsplash.com/photo-1515182629504-727d7753751f?q=80&w=436&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D');
            background-size: cover;
            background-position: center;
            padding: 80px 0;
            text-align: center;
            color: white;
        }

        .search-form {
            display: flex;
            justify-content: center;
            margin-top: 20px;
        }

        .search-input {
            padding: 15px 20px;
            width: 100%;
            max-width: 500px;
            border: none;
            border-radius: 50px 0 0 50px;
            font-size: 1rem;
            outline: none;
        }

        .search-btn {
            padding: 0 25px;
            background: linear-gradient(to right, #ff7e5f, #feb47b);
            color: white;
            border: none;
            border-radius: 0 50px 50px 0;
            cursor: pointer;
            font-weight: 600;
            transition: all 0.3s ease;
        }

        .search-btn:hover {
            background: linear-gradient(to right, #feb47b, #ff7e5f);
        }

        .order-message {
            text-align: center;
            padding: 15px;
            margin: 20px 0;
            border-radius: 5px;
            font-weight: 500;
        }

        .success {
            background: #d4edda;
            color: #155724;
        }

        .error {
            background: #f8d7da;
            color: #721c24;
        }

        .categories {
            padding: 50px 0;
        }

        .section-title {
            text-align: center;
            margin-bottom: 40px;
            color: #ff7e5f;
            position: relative;
            padding-bottom: 15px;
        }

        .section-title::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 50%;
            transform: translateX(-50%);
            width: 100px;
            height: 3px;
            background: linear-gradient(to right, #ff7e5f, #feb47b);
        }

        .categories-container {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 30px;
        }

        .category-box {
            position: relative;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease;
            height: 250px;
        }

        .category-box:hover {
            transform: translateY(-10px);
        }

        .category-box img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.5s ease;
        }

        .category-box:hover img {
            transform: scale(1.1);
        }

        .category-title {
            position: absolute;
            bottom: 0;
            left: 0;
            width: 100%;
            background: linear-gradient(transparent, rgba(0, 0, 0, 0.7));
            color: white;
            padding: 20px;
            text-align: center;
            font-size: 1.5rem;
            font-weight: 600;
        }

        .food-menu {
            padding: 50px 0;
        }

        .food-menu-container {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
            gap: 30px;
        }

        .food-menu-box {
            background: white;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease;
        }

        .food-menu-box:hover {
            transform: translateY(-10px);
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
            transition: transform 0.5s ease;
        }

        .food-menu-box:hover .food-menu-img img {
            transform: scale(1.1);
        }

        .food-menu-desc {
            padding: 20px;
        }

        .food-menu-desc h4 {
            font-size: 1.4rem;
            margin-bottom: 10px;
            color: #333;
        }

        .food-price {
            color: #ff7e5f;
            font-weight: 600;
            font-size: 1.2rem;
            margin-bottom: 10px;
        }

        .food-detail {
            color: #666;
            margin-bottom: 15px;
            display: -webkit-box;
            -webkit-line-clamp: 3;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }

        .btn {
            display: inline-block;
            background: linear-gradient(to right, #ff7e5f, #feb47b);
            color: white;
            padding: 10px 20px;
            border-radius: 50px;
            text-decoration: none;
            font-weight: 600;
            transition: all 0.3s ease;
        }

        .btn:hover {
            box-shadow: 0 4px 15px rgba(255, 126, 95, 0.4);
            transform: translateY(-2px);
        }

        .see-all {
            text-align: center;
            margin-top: 40px;
        }

        .see-all a {
            color: #ff7e5f;
            text-decoration: none;
            font-weight: 600;
            font-size: 1.1rem;
            transition: all 0.3s ease;
        }

        .see-all a:hover {
            color: #feb47b;
            text-decoration: underline;
        }

        .clearfix {
            clear: both;
        }

        footer {
            background: #333;
            color: white;
            text-align: center;
            padding: 30px 0;
            margin-top: 50px;
        }

        .footer-content {
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .social-icons {
            margin: 20px 0;
        }

        .social-icons a {
            color: white;
            margin: 0 10px;
            font-size: 1.5rem;
            transition: color 0.3s ease;
        }

        .social-icons a:hover {
            color: #ff7e5f;
        }

        @media (max-width: 768px) {
            .menu {
                flex-direction: column;
                align-items: center;
            }
            
            .menu li {
                margin: 5px 0;
            }
            
            .search-form {
                flex-direction: column;
                align-items: center;
            }
            
            .search-input {
                border-radius: 50px;
                margin-bottom: 10px;
                max-width: 100%;
            }
            
            .search-btn {
                border-radius: 50px;
                padding: 15px;
                width: 100%;
                max-width: 200px;
            }
            
            .categories-container,
            .food-menu-container {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>
<body>
    <header>
        <div class="container">
            <div class="logo">Bantu Bakery</div>
            <ul class="menu">
                 <li><a href="index.php" class="active">Home</a></li>
                <li><a href="login.php">Login</a></li>
                <li><a href="categories.php">Menu</a></li>
                <li><a href="cart.php">Cart</a></li>
                <li><a href="Alogin.php">Admin</a></li>
                
                
            </ul>
        </div>
    </header>

    <section class="food-search">
        <div class="container">
            <h2>Find Your Favorite Food</h2>
            <form class="search-form" id="searchForm">
                <input type="search" class="search-input" id="searchInput" placeholder="Search for Food.." required>
                <button type="submit" class="search-btn">Search</button>
            </form>
        </div>
    </section>

    <div id="orderMessage" class="order-message" style="display: none;"></div>

    <section class="categories">
        <div class="container">
            <h2 class="section-title">Explore Foods</h2>

            <div id="categoriesContainer" class="categories-container">
                <!-- Categories will be dynamically inserted here -->
            </div>

            <div class="clearfix"></div>
        </div>
    </section>

    <section class="food-menu">
        <div class="container">
            <h2 class="section-title">Featured Foods</h2>

            <div id="foodMenuContainer" class="food-menu-container">
                <!-- Featured food items will be dynamically inserted here -->
            </div>

            <div class="clearfix"></div>

            
        </div>
    </section>

    <footer>
        <div class="container">
            <div class="footer-content">
                <p>© 2025 Bantu Bakery. All rights reserved.</p>
                <div class="social-icons">
                    <a href="#"><i class="fab fa-facebook"></i></a>
                    <a href="#"><i class="fab fa-twitter"></i></a>
                    <a href="#"><i class="fab fa-instagram"></i></a>
                    <a href="#"><i class="fab fa-linkedin"></i></a>
                </div>
            </div>
        </div>
    </footer>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Check if there's an order message to display
            const urlParams = new URLSearchParams(window.location.search);
            const orderStatus = urlParams.get('order');
            
            if (orderStatus === 'success') {
                const orderMessage = document.getElementById('orderMessage');
                orderMessage.textContent = 'Your order was placed successfully!';
                orderMessage.classList.add('success');
                orderMessage.style.display = 'block';
                
                // Remove the parameter from URL without reloading
                setTimeout(() => {
                    window.history.replaceState({}, document.title, window.location.pathname);
                }, 3000);
            }

            // Sample data - in a real application, this would come from a server
            const categoriesData = [
                {
                    id: 1,
                    title: "Bread and Rolls",
                    image: "https://plus.unsplash.com/premium_photo-1675788938970-e2716f23b1f9?q=80&w=387&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D",
                    active: "Yes",
                    featured: "Yes"
                },
                {
                    id: 2,
                    title: "Cakes and Gateaux",
                    image: "https://images.unsplash.com/photo-1583338917451-face2751d8d5?q=80&w=387&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D",
                    active: "Yes",
                    featured: "Yes"
                },
                {
                    id: 3,
                    title: "Sweet treats",
                    image: "https://images.unsplash.com/photo-1618411640026-24e40dcde1ab?w=500&auto=format&fit=crop&q=60&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxzZWFyY2h8N3x8c3dlZXQlMjB0cmVhdHN8ZW58MHx8MHx8fDA%3D",
                    active: "Yes",
                    featured: "Yes"
                }

            ];

            const foodData = [
                {
                    id: 1,
                    title: "Sourdough Bread",
                    price: 49.99,
                    description: "Our fresh sourdough bread is made with stoneground wheat flour",
                    image: "https://plus.unsplash.com/premium_photo-1664640733898-d5c3f71f44e1?q=80&w=387&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D",
                    active: "Yes",
                    featured: "Yes"
                },
                {
                    id: 2,
                    title: "Chocolate Cake",
                    price: 189.99,
                    description: "100% pure beef patty with cheese, onion, pickles and ketchup. A classic favorite.",
                    image: "https://images.unsplash.com/photo-1602351447937-745cb720612f?q=80&w=386&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D",
                    active: "Yes",
                    featured: "Yes"
                },
                {
                    id: 3,
                    title: "Macaroons",
                    price: 99.99,
                    description: "Assorted flavour macaroons",
                    image: "https://images.unsplash.com/photo-1528919460073-af8ef5efad10?q=80&w=949&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D",
                    active: "Yes",
                    featured: "Yes"
                },
                {
                    id: 4,
                    title: "Stacked waffles",
                    price: 39.99,
                    description: "Fresh golden brown waffles",
                    image: "https://images.unsplash.com/photo-1647210391533-5fe30109e94a?q=80&w=435&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D",
                    active: "Yes",
                    featured: "Yes"
                },
                {
                    id: 5,
                    title: "Croissants and pastries",
                    price: 39.99,
                    description: "Freshly oven baked croissant",
                    image: "https://plus.unsplash.com/premium_photo-1692809723031-98c72b1871c7?q=80&w=387&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D",
                    active: "Yes",
                    featured: "Yes"
                },
                {
                    id: 6,
                    title: "Orange Juice",
                    price: 19.99,
                    description: "Delicious sqeezed orange juice",
                    image: "https://images.unsplash.com/photo-1600271886742-f049cd451bba?q=80&w=387&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D",
                    active: "Yes",
                    featured: "Yes"
                }
            ];

            const categoriesContainer = document.getElementById('categoriesContainer');
            const foodMenuContainer = document.getElementById('foodMenuContainer');
            const searchForm = document.getElementById('searchForm');
            const searchInput = document.getElementById('searchInput');

            // Display categories
            function displayCategories() {
                categoriesContainer.innerHTML = '';
                
                const activeCategories = categoriesData.filter(category => 
                    category.active === "Yes" && category.featured === "Yes"
                );
                
                if (activeCategories.length === 0) {
                    categoriesContainer.innerHTML = `
                        <div class="error">
                            <i class="fas fa-exclamation-circle"></i>
                            <p>No categories available.</p>
                        </div>
                    `;
                    return;
                }

                activeCategories.forEach(category => {
                    const categoryElement = document.createElement('a');
                    categoryElement.href = `category-foods.php?category_id=${category.id}`;
                    categoryElement.innerHTML = `
                        <div class="category-box">
                            <img src="${category.image}" alt="${category.title}">
                            <div class="category-title">${category.title}</div>
                        </div>
                    `;
                    categoriesContainer.appendChild(categoryElement);
                });
            }

            // Display featured food items
            function displayFeaturedFoods() {
                foodMenuContainer.innerHTML = '';
                
                const featuredFoods = foodData.filter(food => 
                    food.active === "Yes" && food.featured === "Yes"
                );
                
                if (featuredFoods.length === 0) {
                    foodMenuContainer.innerHTML = `
                        <div class="error">
                            <i class="fas fa-exclamation-circle"></i>
                            <p>No featured foods available.</p>
                        </div>
                    `;
                    return;
                }

                featuredFoods.forEach(food => {
                    const foodItemElement = document.createElement('div');
                    foodItemElement.className = 'food-menu-box';
                    foodItemElement.innerHTML = `
                        <div class="food-menu-img">
                            <img src="${food.image}" alt="R{food.title}">
                        </div>
                        <div class="food-menu-desc">
                            <h4>${food.title}</h4>
                            <p class="food-price">${food.price.toFixed(2)}</p>
                            <p class="food-detail">${food.description}</p>
                            <br>
                            <a href="#" class="btn">Explore</a>
                        </div>
                    `;
                    foodMenuContainer.appendChild(foodItemElement);
                });
            }

            // Search functionality
            searchForm.addEventListener('submit', function(e) {
                e.preventDefault();
                
                const searchTerm = searchInput.value.trim();
                
                if (searchTerm) {
                    // Redirect to search results page
                    window.location.href = `food-search.php?q=${encodeURIComponent(searchTerm)}`;
                }
            });

            // Initial display
            displayCategories();
            displayFeaturedFoods();
        });
    </script>
</body>
</html>