<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FoodExpress - Logout</title>
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
            min-height: 100vh;
            display: flex;
            flex-direction: column;
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

        .logout-section {
            flex: 1;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 40px 0;
        }

        .logout-container {
            background: white;
            border-radius: 10px;
            box-shadow: 0 5px 25px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 500px;
            padding: 40px;
            text-align: center;
        }

        .logout-icon {
            font-size: 4rem;
            color: #ff7e5f;
            margin-bottom: 20px;
        }

        .logout-header {
            margin-bottom: 20px;
        }

        .logout-header h2 {
            color: #ff7e5f;
            margin-bottom: 10px;
        }

        .logout-header p {
            color: #666;
            font-size: 1.1rem;
        }

        .logout-actions {
            display: flex;
            justify-content: center;
            gap: 15px;
            margin-top: 30px;
        }

        .btn {
            display: inline-block;
            padding: 12px 25px;
            border-radius: 50px;
            text-decoration: none;
            font-weight: 600;
            transition: all 0.3s ease;
            cursor: pointer;
            border: none;
            font-size: 1rem;
        }

        .btn-primary {
            background: linear-gradient(to right, #ff7e5f, #feb47b);
            color: white;
        }

        .btn-primary:hover {
            box-shadow: 0 4px 15px rgba(255, 126, 95, 0.4);
            transform: translateY(-2px);
        }

        .btn-secondary {
            background: #f1f1f1;
            color: #333;
        }

        .btn-secondary:hover {
            background: #e1e1e1;
            transform: translateY(-2px);
        }

        .countdown {
            margin-top: 20px;
            color: #666;
            font-size: 0.9rem;
        }

        footer {
            background: #333;
            color: white;
            text-align: center;
            padding: 30px 0;
            margin-top: auto;
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
            
            .logout-container {
                padding: 30px 20px;
                margin: 0 15px;
            }
            
            .logout-actions {
                flex-direction: column;
            }
            
            .btn {
                width: 100%;
                text-align: center;
            }
        }
    </style>
</head>
<body>
    <header>
        <div class="container">
            <div class="logo">FoodExpress</div>
            <ul class="menu">
                <li><a href="index.html">Home</a></li>
                <li><a href="menu.html">Menu</a></li>
                <li><a href="cart.html">Cart</a></li>
                <li><a href="login.html">Login</a></li>
            </ul>
        </div>
    </header>

    <section class="logout-section">
        <div class="container">
            <div class="logout-container">
                <div class="logout-icon">
                    <i class="fas fa-sign-out-alt"></i>
                </div>
                
                <div class="logout-header">
                    <h2>You have been logged out</h2>
                    <p>Thank you for using FoodExpress. You have successfully logged out of your account.</p>
                </div>

                <div class="logout-actions">
                    <a href="login.html" class="btn btn-primary">Login Again</a>
                    <a href="index.html" class="btn btn-secondary">Return to Homepage</a>
                </div>

                <div class="countdown" id="countdown">
                    Redirecting to login page in <span id="countdown-number">5</span> seconds...
                </div>
            </div>
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
            // Clear user data from localStorage (simulating session destruction)
            localStorage.removeItem('loggedIn');
            localStorage.removeItem('username');
            localStorage.removeItem('u_id');
            
            // Start countdown for redirect
            let countdown = 5;
            const countdownElement = document.getElementById('countdown-number');
            const countdownContainer = document.getElementById('countdown');
            
            const countdownInterval = setInterval(function() {
                countdown--;
                countdownElement.textContent = countdown;
                
                if (countdown <= 0) {
                    clearInterval(countdownInterval);
                    window.location.href = 'login.html';
                }
            }, 1000);
            
            // Allow user to cancel the automatic redirect
            countdownContainer.addEventListener('click', function() {
                clearInterval(countdownInterval);
                countdownContainer.innerHTML = 'Automatic redirect cancelled.';
            });
        });
    </script>
</body>
</html>