<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Explore Foods - Food Order System</title>
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
        
        /* Hero Section */
        .hero {
            background: linear-gradient(rgba(0, 0, 0, 0.7), rgba(0, 0, 0, 0.7)), url('https://images.unsplash.com/photo-1568254183919-78a4f43a2877?q=80&w=869&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D');
            background-size: cover;
            background-position: center;
            color: white;
            text-align: center;
            padding: 80px 20px;
            margin-bottom: 40px;
        }
        
        .hero h1 {
            font-size: 48px;
            margin-bottom: 20px;
            font-weight: 700;
        }
        
        .hero p {
            font-size: 20px;
            max-width: 700px;
            margin: 0 auto 30px;
        }
        
        /* Categories Section */
        .categories {
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
        
        .categories-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
            gap: 30px;
        }
        
        .category-card {
            background: white;
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s, box-shadow 0.3s;
        }
        
        .category-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 15px 30px rgba(0, 0, 0, 0.15);
        }
        
        .category-img {
            height: 200px;
            overflow: hidden;
            position: relative;
        }
        
        .category-img img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.5s;
        }
        
        .category-card:hover .category-img img {
            transform: scale(1.1);
        }
        
        .category-content {
            padding: 20px;
            text-align: center;
        }
        
        .category-content h3 {
            font-size: 22px;
            margin-bottom: 10px;
            color: var(--secondary);
        }
        
        .category-content p {
            color: #666;
            margin-bottom: 15px;
        }
        
        /* Enhanced Explore Button Styles */
        .category-foods {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            background: linear-gradient(135deg, var(--primary), #ff3742);
            color: white;
            padding: 12px 24px;
            border-radius: 30px;
            text-decoration: none;
            font-weight: 600;
            transition: all 0.3s ease;
            box-shadow: 0 4px 15px rgba(255, 71, 87, 0.3);
            position: relative;
            overflow: hidden;
        }
        
        .category-foods:before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
            transition: all 0.5s ease;
        }
        
        .category-foods:hover {
            transform: translateY(-3px);
            box-shadow: 0 8px 20px rgba(255, 71, 87, 0.4);
        }
        
        .category-foods:hover:before {
            left: 100%;
        }
        
        .category-foods i {
            margin-left: 8px;
            transition: transform 0.3s ease;
        }
        
        .category-foods:hover i {
            transform: translateX(4px);
        }
        
        .no-categories {
            grid-column: 1 / -1;
            text-align: center;
            padding: 40px;
            background: white;
            border-radius: 12px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
        }
        
        .no-categories i {
            font-size: 60px;
            color: #ddd;
            margin-bottom: 20px;
        }
        
        .no-categories h3 {
            color: var(--secondary);
            margin-bottom: 10px;
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
            
            .hero h1 {
                font-size: 36px;
            }
            
            .hero p {
                font-size: 18px;
            }
            
            .categories-grid {
                grid-template-columns: 1fr;
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
        
        .category-card {
            animation: fadeIn 0.5s ease-out;
        }
        
        .category-card:nth-child(1) { animation-delay: 0.1s; }
        .category-card:nth-child(2) { animation-delay: 0.2s; }
        .category-card:nth-child(3) { animation-delay: 0.3s; }
        .category-card:nth-child(4) { animation-delay: 0.4s; }
        .category-card:nth-child(5) { animation-delay: 0.5s; }
        .category-card:nth-child(6) { animation-delay: 0.6s; }
        
        /* Search Bar */
        .search-container {
            display: flex;
            justify-content: center;
            margin-bottom: 30px;
        }
        
        .search-box {
            display: flex;
            max-width: 500px;
            width: 100%;
        }
        
        .search-box input {
            flex: 1;
            padding: 12px 20px;
            border: 2px solid #ddd;
            border-radius: 30px 0 0 30px;
            font-size: 16px;
            outline: none;
        }
        
        .search-box button {
            padding: 12px 20px;
            background: var(--primary);
            color: white;
            border: none;
            border-radius: 0 30px 30px 0;
            cursor: pointer;
            transition: background 0.3s;
        }
        
        .search-box button:hover {
            background: #ff3742;
        }
    </style>
</head>
<body>
    <!-- Header Section -->
    <header class="header">
        <div class="container">
            <div class="header-content">
                <div class="logo">BANTU<span>bakery</span></div>
                <nav class="main-nav">
                    <ul>
                        <li><a href="index.php">Home</a></li>
                        <li><a href="#" class="active">Categories</a></li>
                        <li><a href="cart.php">Cart</a></li>
                        <li><a href="about.php">About</a></li>
                        <li><a href="contact.php">Contact</a></li>
                    </ul>
                </nav>
            </div>
        </div>
    </header>

    <!-- Hero Section -->
    <section class="hero">
        <div class="container">
            <h1>Discover Delicious Food</h1>
            <p>Explore our wide range of bakery categories and find your next favorite bread</p>
        </div>
    </section>

    <!-- Categories Section -->
    <section class="categories">
        <div class="container">
            <div class="section-title">
                <h2>Explore Bakery</h2>
            </div>
            
            <div class="search-container">
                <div class="search-box">
                    <input type="text" placeholder="Search for categories..." id="searchInput">
                    <button type="button"><i class="fas fa-search"></i></button>
                </div>
            </div>
            
            <div class="categories-grid" id="categoriesGrid">
                <!-- Categories will be dynamically inserted here -->
            </div>
        </div>
    </section>

    <!-- Footer Section -->
    <footer class="footer">
        <div class="container">
            <div class="footer-content">
                <div class="footer-section">
                    <h3>About Us</h3>
                    <p>BANTU BAKERY is a premium food delivery service offering a wide variety of cuisines from the best restaurants in town.</p>
                </div>
                
                <div class="footer-section">
                    <h3>Quick Links</h3>
                    <div class="footer-links">
                        <a href="index.php">Home</a>
                        <a href="#">Categories</a>
                        <a href="login.php">My Account</a>
                        <a href="tracking.php">Order Tracking</a>
                    </div>
                </div>
                
                <div class="footer-section">
                    <h3>Contact Us</h3>
                    <p>123 Food Street, Taste City</p>
                    <p>Phone: 078 456-7890</p>
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
    document.addEventListener('DOMContentLoaded', function() {
        // Sample categories data with PHP file links
        const categories = [
            {
                id: 1,
                title: "Bread and Rolls",
                image: "https://plus.unsplash.com/premium_photo-1675788938970-e2716f23b1f9?q=80&w=387&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D",
                description: "Delicious fresh bread",
                link: "Bread&Rolls.php"
            },
            {
                id: 2,
                title: "Cakes and Gateaux",
                image: "https://images.unsplash.com/photo-1583338917451-face2751d8d5?q=80&w=387&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D",
                description: "Fluffy yummy cakes",
                link: "Cakes&Gateaux.php"
            },
            {
                id: 3,
                title: "Sweet Treats",
                image: "https://images.unsplash.com/photo-1618411640026-24e40dcde1ab?w=500&auto=format&fit=crop&q=60&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxzZWFyY2h8N3x8c3dlZXQlMjB0cmVhdHN8ZW58MHx8MHx8fDA%3D",
                description: "Sweet tooth treats",
                link: "Sweet&Treats.php"
            },
            {
                id: 4,
                title: "Waffles and Flapjacks",
                image: "https://plus.unsplash.com/premium_photo-1725986663003-9c55755f892f?w=500&auto=format&fit=crop&q=60&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxzZWFyY2h8OXx8d2FmZmxlc3xlbnwwfHwwfHx8MA%3D%3D",
                description: "Fresh waffles",
                link: "Waffles.php"
            },
            {
                id: 5,
                title: "Croissants and Pastries",
                image: "https://plus.unsplash.com/premium_photo-1692809723031-98c72b1871c7?q=80&w=387&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D",
                description: "Flaky and buttery pastries",
                link: "Croissants.php"
            },
            {
                id: 6,
                title: "Beverages",
                image: "https://images.unsplash.com/photo-1544148103-0773bf10d330?ixlib=rb-4.0.3&auto=format&fit=crop&w=500&q=80",
                description: "Refreshing drinks and beverages",
                link: "beverages.php"
            }
        ];

        const categoriesGrid = document.getElementById('categoriesGrid');
        const searchInput = document.getElementById('searchInput');

        // Render categories
        function renderCategories(categoriesArray) {
            categoriesGrid.innerHTML = '';

            if (categoriesArray.length === 0) {
                categoriesGrid.innerHTML = `
                    <div class="no-categories">
                        <i class="fas fa-search"></i>
                        <h3>No categories found</h3>
                        <p>Try adjusting your search terms or browse all categories</p>
                    </div>
                `;
                return;
            }
            
            categoriesArray.forEach(category => {
                const categoryCard = document.createElement('div');
                categoryCard.className = 'category-card';

                categoryCard.innerHTML = `
                    <div class="category-img">
                        <img src="${category.image}" alt="${category.title}">
                    </div>
                    <div class="category-content">
                        <h3>${category.title}</h3>
                        <p>${category.description}</p>
                        <a href="${category.link}" class="category-foods">
                            Explore <i class="fas fa-arrow-right"></i>
                        </a>
                    </div>
                `;

                categoriesGrid.appendChild(categoryCard);
            });
        }

        // Filter categories based on search input
        function filterCategories() {
            const searchText = searchInput.value.toLowerCase();
            const filteredCategories = categories.filter(category =>
                category.title.toLowerCase().includes(searchText) ||
                category.description.toLowerCase().includes(searchText)
            );

            renderCategories(filteredCategories);
        }

        // Event listener for search input
        searchInput.addEventListener('input', filterCategories);

        // Initial render
        renderCategories(categories);

        // Add animation to category cards when they come into view
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

        // Observe category cards after they are rendered
        setTimeout(() => {
            document.querySelectorAll('.category-card').forEach(card => {
                card.style.opacity = '0';
                card.style.transform = 'translateY(20px)';
                card.style.transition = 'opacity 0.5s ease, transform 0.5s ease';
                observer.observe(card);
            });
        }, 100);
    });
    </script>
</body>
</html>