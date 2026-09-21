
   <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FoodExpress - Menu</title>
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
            background: linear-gradient(rgba(0, 0, 0, 0.7), rgba(0, 0, 0, 0.7)), url('https://images.unsplash.com/photo-1504674900247-0877df9cc836?ixlib=rb-4.0.3&auto=format&fit=crop&w=1350&q=80');
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

        .food-menu {
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

        .error {
            text-align: center;
            padding: 20px;
            background: #ffebee;
            color: #d32f2f;
            border-radius: 5px;
            margin: 20px 0;
            grid-column: 1 / -1;
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
                <li><a href="index.php">Home</a></li>
                <li><a href="cart.php">Cart</a></li>
                <li><a href="login.php">Login</a></li>
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

    <section class="food-menu">
        <div class="container">
            <h2 class="section-title">Food Menu</h2>

            <div id="foodMenuContainer" class="food-menu-container">
                <!-- Food items will be dynamically inserted here -->
            </div>

            <div class="clearfix"></div>
        </div>
    </section>

    <footer>
        <div class="container">
            <div class="footer-content">
                <p>© 2023 FoodExpress. All rights reserved.</p>
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
            // Sample food data - in a real application, this would come from a server
            const foodData = [
                {
                    id: 1,
                    title: "Chicken Burger",
                    price: 5.99,
                    description: "Juicy grilled chicken patty with fresh lettuce and our special sauce. Served with crispy fries.",
                    image: "https://images.unsplash.com/photo-1571091655789-405eb7a3a3a8?ixlib=rb-4.0.3&auto=format&fit=crop&w=1352&q=80",
                    active: "Yes"
                },
                {
                    id: 2,
                    title: "Beef Burger",
                    price: 6.99,
                    description: "100% pure beef patty with cheese, onion, pickles and ketchup. A classic favorite.",
                    image: "https://images.unsplash.com/photo-1550317138-10000687a72b?ixlib=rb-4.0.3&auto=format&fit=crop&w=1400&q=80",
                    active: "Yes"
                },
                {
                    id: 3,
                    title: "Veggie Burger",
                    price: 5.49,
                    description: "Delicious plant-based patty with fresh vegetables and vegan mayo. A healthy choice.",
                    image: "https://images.unsplash.com/photo-1596662951482-0c4ba74a6df6?ixlib=rb-4.0.3&auto=format&fit=crop&w=1350&q=80",
                    active: "Yes"
                },
                {
                    id: 4,
                    title: "BBQ Burger",
                    price: 7.49,
                    description: "Smoky flavored burger with BBQ sauce, onion rings and bacon. For the ultimate BBQ lover.",
                    image: "https://images.unsplash.com/photo-1561758033-d89a9ad46330?ixlib=rb-4.0.3&auto=format&fit=crop&w=1350&q=80",
                    active: "Yes"
                },
                {
                    id: 5,
                    title: "Double Cheese Burger",
                    price: 8.99,
                    description: "Two beef patties with double cheese, lettuce and special sauce. Double the goodness.",
                    image: "https://images.unsplash.com/photo-1586816001966-79b736744398?ixlib=rb-4.0.3&auto=format&fit=crop&w=1350&q=80",
                    active: "Yes"
                },
                {
                    id: 6,
                    title: "Mushroom Swiss Burger",
                    price: 7.99,
                    description: "Beef patty topped with sautéed mushrooms and Swiss cheese. A gourmet experience.",
                    image: "https://images.unsplash.com/photo-1551782450-a2132b4ba21d?ixlib=rb-4.0.3&auto=format&fit=crop&w=1350&q=80",
                    active: "Yes"
                },
                {
                    id: 7,
                    title: "Spicy Chicken Burger",
                    price: 6.49,
                    description: "Crispy chicken patty with spicy mayo, jalapeños and lettuce. For those who like it hot.",
                    image: "https://images.unsplash.com/photo-1606755962773-d324e0a13086?ixlib=rb-4.0.3&auto=format&fit=crop&w=1350&q=80",
                    active: "Yes"
                },
                {
                    id: 8,
                    title: "Fish Burger",
                    price: 6.99,
                    description: "Crispy fish fillet with tartar sauce and fresh lettuce. A seafood delight.",
                    image: "https://images.unsplash.com/photo-1559715745-e1b33a271c8f?ixlib=rb-4.0.3&auto=format&fit=crop&w=1350&q=80",
                    active: "No"  // This item is inactive and should not show
                }
            ];

            const foodMenuContainer = document.getElementById('foodMenuContainer');
            const searchForm = document.getElementById('searchForm');
            const searchInput = document.getElementById('searchInput');

            // Display all active food items
            function displayFoodItems(foodsToShow = null) {
                foodMenuContainer.innerHTML = '';
                
                const foods = foodsToShow || foodData.filter(food => food.active === "Yes");
                
                if (foods.length === 0) {
                    foodMenuContainer.innerHTML = `
                        <div class="error">
                            <i class="fas fa-exclamation-circle"></i>
                            <p>No food found. Please try another search.</p>
                        </div>
                    `;
                    return;
                }

                foods.forEach(food => {
                    const foodItemElement = document.createElement('div');
                    foodItemElement.className = 'food-menu-box';
                    foodItemElement.innerHTML = `
                        <div class="food-menu-img">
                            <img src="${food.image}" alt="${food.title}">
                        </div>
                        <div class="food-menu-desc">
                            <h4>${food.title}</h4>
                            <p class="food-price">$${food.price.toFixed(2)}</p>
                            <p class="food-detail">${food.description}</p>
                            <br>
                            <a href="order.html?food_id=${food.id}" class="btn">Order Now</a>
                        </div>
                    `;
                    foodMenuContainer.appendChild(foodItemElement);
                });
            }

            // Search functionality
            searchForm.addEventListener('submit', function(e) {
                e.preventDefault();
                
                const searchTerm = searchInput.value.trim().toLowerCase();
                
                if (searchTerm) {
                    const filteredFoods = foodData.filter(food => 
                        (food.title.toLowerCase().includes(searchTerm) || 
                         food.description.toLowerCase().includes(searchTerm)) &&
                        food.active === "Yes"
                    );
                    
                    displayFoodItems(filteredFoods);
                    
                    // Update page title with search term
                    document.querySelector('.section-title').textContent = `Search Results for "${searchTerm}"`;
                } else {
                    // If search is empty, show all active foods
                    displayFoodItems();
                    document.querySelector('.section-title').textContent = 'Food Menu';
                }
            });

            // Initial display of active foods
            displayFoodItems();
        });
    </script>
</body>
</html>