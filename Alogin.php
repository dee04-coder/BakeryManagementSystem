<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login - Food Order System</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        
        :root {
            --primary: #3498db;
            --secondary: #2c3e50;
            --success: #2ecc71;
            --danger: #e74c3c;
            --warning: #f39c12;
            --light: #ecf0f1;
            --dark: #2c3e50;
            --gray: #7f8c8d;
        }
        
        body {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            color: #333;
            line-height: 1.6;
        }
        
        .login-container {
            display: flex;
            width: 900px;
            height: 500px;
            background: white;
            border-radius: 15px;
            overflow: hidden;
            box-shadow: 0 15px 30px rgba(0, 0, 0, 0.2);
        }
        
        .image-section {
            flex: 1;
            background: linear-gradient(135deg, var(--secondary), #1a2530);
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 30px;
            position: relative;
        }
        
        .image-section img {
            width: 100%;
            height: auto;
            border-radius: 10px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.3);
        }
        
        .image-section::after {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: linear-gradient(to bottom, rgba(0,0,0,0.1), rgba(0,0,0,0.5));
        }
        
        .form-section {
            flex: 1;
            padding: 40px;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }
        
        .logo {
            text-align: center;
            margin-bottom: 30px;
        }
        
        .logo h1 {
            color: var(--secondary);
            font-size: 28px;
            font-weight: 700;
        }
        
        .logo span {
            color: var(--primary);
        }
        
        .text-center {
            text-align: center;
            margin-bottom: 30px;
            color: var(--secondary);
            font-size: 24px;
            font-weight: 600;
        }
        
        .notification {
            padding: 12px;
            margin-bottom: 20px;
            border-radius: 6px;
            font-weight: 500;
            text-align: center;
        }
        
        .success {
            background-color: #d4edda;
            color: #155724;
            border: 1px solid #c3e6cb;
        }
        
        .error {
            background-color: #f8d7da;
            color: #721c24;
            border: 1px solid #f5c6cb;
        }
        
        .login-form {
            width: 100%;
        }
        
        .form-group {
            margin-bottom: 25px;
            position: relative;
        }
        
        .form-group label {
            display: block;
            margin-bottom: 8px;
            font-weight: 600;
            color: var(--dark);
        }
        
        .input-with-icon {
            position: relative;
        }
        
        .input-with-icon i {
            position: absolute;
            left: 15px;
            top: 50%;
            transform: translateY(-50%);
            color: var(--gray);
        }
        
        .input-with-icon input {
            width: 100%;
            padding: 15px 15px 15px 45px;
            border: 2px solid #e1e5eb;
            border-radius: 8px;
            font-size: 16px;
            transition: all 0.3s;
        }
        
        .input-with-icon input:focus {
            border-color: var(--primary);
            outline: none;
            box-shadow: 0 0 0 3px rgba(52, 152, 219, 0.2);
        }
        
        .btn-primary {
            width: 100%;
            padding: 15px;
            background: linear-gradient(to right, var(--primary), #2980b9);
            color: white;
            border: none;
            border-radius: 8px;
            font-size: 18px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s;
        }
        
        .btn-primary:hover {
            background: linear-gradient(to right, #2980b9, #2573a7);
            transform: translateY(-2px);
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }
        
        .additional-links {
            text-align: center;
            margin-top: 20px;
        }
        
        .additional-links a {
            color: var(--primary);
            text-decoration: none;
            font-weight: 500;
            transition: color 0.3s;
        }
        
        .additional-links a:hover {
            color: var(--secondary);
            text-decoration: underline;
        }
        
        /* Responsive Design */
        @media (max-width: 900px) {
            .login-container {
                flex-direction: column;
                width: 90%;
                height: auto;
            }
            
            .image-section {
                display: none;
            }
            
            .form-section {
                padding: 30px;
            }
        }
        
        @media (max-width: 480px) {
            .form-section {
                padding: 20px;
            }
            
            .text-center {
                font-size: 20px;
            }
            
            .input-with-icon input {
                padding: 12px 12px 12px 40px;
            }
            
            .btn-primary {
                padding: 12px;
            }
        }
        
        .password-toggle {
            position: absolute;
            right: 15px;
            top: 50%;
            transform: translateY(-50%);
            cursor: pointer;
            color: var(--gray);
        }
    </style>
</head>
<body>
    <div class="login-container">
        <div class="image-section">
            <img src="data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='400' height='300' viewBox='0 0 400 300'%3E%3Crect width='400' height='300' fill='%232c3e50'/%3E%3Cpath d='M200 120 L250 180 L150 180 Z' fill='%233498db'/%3E%3Ccircle cx='200' cy='100' r='30' fill='%23e74c3c'/%3E%3Crect x='130' y='200' width='140' height='40' rx='10' fill='%232ecc71'/%3E%3Ctext x='200' y='225' text-anchor='middle' fill='white' font-family='sans-serif' font-size='16'%3EFood Order System%3C/text%3E%3C/svg%3E" alt="Food Order System">
        </div>
        
        <div class="form-section">
            <div class="logo">
                <h1>Food<span>Admin</span></h1>
            </div>
            
            <h2 class="text-center">Admin Login</h2>
            
            <div id="notification" class="notification" style="display: none;"></div>
            
            <form class="login-form" id="loginForm">
                <div class="form-group">
                    <label for="username">Username</label>
                    <div class="input-with-icon">
                        <i class="fas fa-user"></i>
                        <input type="text" id="username" name="username" placeholder="Enter your username" required>
                    </div>
                </div>
                
                <div class="form-group">
                    <label for="password">Password</label>
                    <div class="input-with-icon">
                        <i class="fas fa-lock"></i>
                        <input type="password" id="password" name="password" placeholder="Enter your password" required>
                        <span class="password-toggle" id="passwordToggle">
                            <i class="fas fa-eye"></i>
                        </span>
                    </div>
                </div>
                
                <button type="submit" class="btn-primary">Login</button>
            </form>
            
            <div class="additional-links">
                <p><a href="#">Forgot Password?</a></p>
                <p>� 2023 Food Order System. All rights reserved.</p>
            </div>
        </div>
    </div>

    <script>
    document.addEventListener('DOMContentLoaded', function() {
        const loginForm = document.getElementById('loginForm');
        const notification = document.getElementById('notification');
        const passwordToggle = document.getElementById('passwordToggle');
        const passwordInput = document.getElementById('password');
        
        // Toggle password visibility
        passwordToggle.addEventListener('click', function() {
            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
                passwordToggle.innerHTML = '<i class="fas fa-eye-slash"></i>';
            } else {
                passwordInput.type = 'password';
                passwordToggle.innerHTML = '<i class="fas fa-eye"></i>';
            }
        });
        
        // Show notification function
        function showNotification(message, type) {
            notification.textContent = message;
            notification.className = `notification ${type}`;
            notification.style.display = 'block';
            
            // Hide notification after 5 seconds
            setTimeout(() => {
                notification.style.display = 'none';
            }, 5000);
        }
        
        // Simulate login process
        function simulateLogin(username, password) {
            // This is a simulation - in a real application, this would be done server-side
            const validUsername = 'admin';
            const validPassword = 'password123';
            
            // Simulate network delay
            return new Promise((resolve) => {
                setTimeout(() => {
                    if (username === validUsername && password === validPassword) {
                        resolve({ success: true });
                    } else {
                        resolve({ success: false });
                    }
                }, 1000);
            });
        }
        
        // Form submission
        loginForm.addEventListener('submit', async function(e) {
            e.preventDefault();
            
            const username = document.getElementById('username').value.trim();
            const password = document.getElementById('password').value;
            
            if (!username || !password) {
                showNotification('Please enter both username and password.', 'error');
                return;
            }
            
            // Show loading state
            const submitButton = loginForm.querySelector('button[type="submit"]');
            const originalText = submitButton.textContent;
            submitButton.textContent = 'Logging in...';
            submitButton.disabled = true;
            
            try {
                // Simulate login process
                const result = await simulateLogin(username, password);
                
                if (result.success) {
                    showNotification('Login successful! Redirecting to dashboard...', 'success');
                    
                    // Redirect to dashboard.php after a short delay
                    setTimeout(() => {
                        window.location.href = 'dashboard.php';
                    }, 1500);
                } else {
                    showNotification('Username or password is incorrect. Please try again.', 'error');
                }
            } catch (error) {
                showNotification('An error occurred during login. Please try again.', 'error');
                console.error('Login error:', error);
            } finally {
                // Restore button state
                submitButton.textContent = originalText;
                submitButton.disabled = false;
            }
        });
        
        // Simulate session messages (like PHP session messages)
        const urlParams = new URLSearchParams(window.location.search);
        if (urlParams.has('logout')) {
            showNotification('You have been successfully logged out.', 'success');
        }
        
        if (urlParams.has('session_expired')) {
            showNotification('Your session has expired. Please log in again.', 'error');
        }
    });
</script>
</body>
</html>