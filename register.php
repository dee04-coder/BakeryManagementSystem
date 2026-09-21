<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bantu Bakery - Register</title>
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

        .register-section {
            flex: 1;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 40px 0;
        }

        .register-container {
            background: white;
            border-radius: 10px;
            box-shadow: 0 5px 25px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 600px;
            padding: 40px;
        }

        .register-header {
            text-align: center;
            margin-bottom: 30px;
        }

        .register-header h2 {
            color: #ff7e5f;
            margin-bottom: 10px;
        }

        .register-header p {
            color: #666;
        }

        .required-note {
            color: #ff7e5f;
            text-align: center;
            margin-bottom: 20px;
            font-size: 0.9rem;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-group label {
            display: block;
            margin-bottom: 8px;
            font-weight: 500;
            color: #333;
        }

        .form-control {
            width: 100%;
            padding: 12px 15px;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-size: 1rem;
            transition: all 0.3s ease;
        }

        .form-control:focus {
            border-color: #ff7e5f;
            box-shadow: 0 0 0 3px rgba(255, 126, 95, 0.2);
            outline: none;
        }

        .is-invalid {
            border-color: #dc3545;
        }

        .invalid-feedback {
            color: #dc3545;
            font-size: 0.875rem;
            margin-top: 5px;
            display: block;
        }

        .form-text {
            color: #6c757d;
            font-size: 0.875rem;
            margin-top: 5px;
        }

        .btn {
            display: block;
            width: 100%;
            padding: 12px;
            background: linear-gradient(to right, #ff7e5f, #feb47b);
            color: white;
            border: none;
            border-radius: 5px;
            font-size: 1.1rem;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .btn:hover {
            box-shadow: 0 4px 15px rgba(255, 126, 95, 0.4);
            transform: translateY(-2px);
        }

        .alert {
            padding: 12px 15px;
            border-radius: 5px;
            margin-bottom: 20px;
            font-weight: 500;
        }

        .alert-success {
            background: #d4edda;
            color: #155724;
            border: 1px solid #c3e6cb;
        }

        .alert-danger {
            background: #f8d7da;
            color: #721c24;
            border: 1px solid #f5c6cb;
        }

        .login-link {
            text-align: center;
            margin-top: 20px;
        }

        .login-link a {
            color: #ff7e5f;
            text-decoration: none;
            font-weight: 500;
            transition: all 0.3s ease;
        }

        .login-link a:hover {
            color: #feb47b;
            text-decoration: underline;
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
            
            .register-container {
                padding: 30px 20px;
                margin: 0 15px;
            }
        }

        .password-toggle {
            position: relative;
        }

        .password-toggle-icon {
            position: absolute;
            right: 15px;
            top: 50%;
            transform: translateY(-50%);
            cursor: pointer;
            color: #777;
        }
    </style>
</head>
<body>
    <header>
        <div class="container">
            <div class="logo">BantuBakery</div>
            <ul class="menu">
                <li><a href="index.php">Home</a></li>
                <li><a href="cart.php">Cart</a></li>
                <li><a href="login.php">Login</a></li>
            </ul>
        </div>
    </header>

    <section class="register-section">
        <div class="container">
            <div class="register-container">
                <div class="register-header">
                    <h2>Sign Up Here</h2>
                    <p>Create your account to start ordering delicious food</p>
                </div>

                <p class="required-note">* All fields are required</p>

                <?php
                // Database connection
                $servername = "localhost";
                $username = "root"; // Change if needed
                $password = ""; // Change if needed
                $dbname = "food-order"; // Database name
                
                // Create connection
                $conn = new mysqli($servername, $username, $password, $dbname);
                
                // Check connection
                if ($conn->connect_error) {
                    die("<div class='alert alert-danger'>Connection failed: " . $conn->connect_error . "</div>");
                }
                
                // Initialize variables
                $username = $customer_name = $customer_email = $customer_contact = $customer_address = "";
                $username_err = $name_err = $password_err = $cpassword_err = $email_err = $contact_err = $address_err = "";
                $success_message = "";
                
                // Process form data when form is submitted
                if ($_SERVER["REQUEST_METHOD"] == "POST") {
                    // Validate username
                    if (empty(trim($_POST["username"]))) {
                        $username_err = "Please enter a username.";
                    } else {
                        $username = trim($_POST["username"]);
                        // Check if username already exists
                        $sql = "SELECT id FROM users WHERE username = ?";
                        
                        if ($stmt = $conn->prepare($sql)) {
                            $stmt->bind_param("s", $param_username);
                            $param_username = $username;
                            
                            if ($stmt->execute()) {
                                $stmt->store_result();
                                
                                if ($stmt->num_rows == 1) {
                                    $username_err = "This username is already taken.";
                                }
                            } else {
                                echo "<div class='alert alert-danger'>Oops! Something went wrong. Please try again later.</div>";
                            }
                            $stmt->close();
                        }
                    }
                    
                    // Validate name
                    if (empty(trim($_POST["customer_name"]))) {
                        $name_err = "Please enter your full name.";
                    } else {
                        $customer_name = trim($_POST["customer_name"]);
                    }
                    
                    // Validate password
                    if (empty(trim($_POST["password"]))) {
                        $password_err = "Please enter a password.";
                    } elseif (strlen(trim($_POST["password"])) < 6) {
                        $password_err = "Password must have at least 6 characters.";
                    } else {
                        $password = trim($_POST["password"]);
                    }
                    
                    // Validate confirm password
                    if (empty(trim($_POST["cpassword"]))) {
                        $cpassword_err = "Please confirm password.";
                    } else {
                        $cpassword = trim($_POST["cpassword"]);
                        if (empty($password_err) && ($password != $cpassword)) {
                            $cpassword_err = "Password did not match.";
                        }
                    }
                    
                    // Validate email
                    if (empty(trim($_POST["customer_email"]))) {
                        $email_err = "Please enter your email.";
                    } else {
                        $customer_email = trim($_POST["customer_email"]);
                        if (!filter_var($customer_email, FILTER_VALIDATE_EMAIL)) {
                            $email_err = "Please enter a valid email address.";
                        } else {
                            // Check if email already exists
                            $sql = "SELECT id FROM users WHERE customer_email = ?";
                            
                            if ($stmt = $conn->prepare($sql)) {
                                $stmt->bind_param("s", $param_email);
                                $param_email = $customer_email;
                                
                                if ($stmt->execute()) {
                                    $stmt->store_result();
                                    
                                    if ($stmt->num_rows == 1) {
                                        $email_err = "This email is already registered.";
                                    }
                                } else {
                                    echo "<div class='alert alert-danger'>Oops! Something went wrong. Please try again later.</div>";
                                }
                                $stmt->close();
                            }
                        }
                    }
                    
                    // Validate contact
                    if (empty(trim($_POST["customer_contact"]))) {
                        $contact_err = "Please enter your phone number.";
                    } elseif (!preg_match("/^\d{10}$/", trim($_POST["customer_contact"]))) {
                        $contact_err = "Please enter a valid 10-digit phone number.";
                    } else {
                        $customer_contact = trim($_POST["customer_contact"]);
                    }
                    
                    // Validate address
                    if (empty(trim($_POST["customer_address"]))) {
                        $address_err = "Please enter your address.";
                    } else {
                        $customer_address = trim($_POST["customer_address"]);
                    }
                    
                    // Check input errors before inserting in database
                    if (empty($username_err) && empty($name_err) && empty($password_err) && 
                        empty($cpassword_err) && empty($email_err) && empty($contact_err) && empty($address_err)) {
                        
                        // Prepare an insert statement
                        $sql = "INSERT INTO users (username, customer_name, password, customer_email, customer_contact, customer_address) VALUES (?, ?, ?, ?, ?, ?)";
                         
                        if ($stmt = $conn->prepare($sql)) {
                            // Bind variables to the prepared statement as parameters
                            $stmt->bind_param("ssssss", $param_username, $param_name, $param_password, $param_email, $param_contact, $param_address);
                            
                            // Set parameters
                            $param_username = $username;
                            $param_name = $customer_name;
                            $param_password = password_hash($password, PASSWORD_DEFAULT); // Creates a password hash
                            $param_email = $customer_email;
                            $param_contact = $customer_contact;
                            $param_address = $customer_address;
                            
                            // Attempt to execute the prepared statement
                            if ($stmt->execute()) {
                                $success_message = "Registration successful! You can now login.";
                                // Clear form fields
                                $username = $customer_name = $customer_email = $customer_contact = $customer_address = "";
                            } else {
                                echo "<div class='alert alert-danger'>Something went wrong. Please try again later.</div>";
                            }
                            $stmt->close();
                        }
                    }
                    
                    // Close connection
                    $conn->close();
                }
                ?>

                <?php if (!empty($success_message)): ?>
                    <div class="alert alert-success"><?php echo $success_message; ?></div>
                <?php endif; ?>

                <form id="registerForm" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                    <div class="form-group">
                        <label for="username">Username</label>
                        <input type="text" id="username" name="username" class="form-control <?php echo (!empty($username_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $username; ?>" required>
                        <div id="usernameError" class="invalid-feedback"><?php echo $username_err; ?></div>
                    </div>

                    <div class="form-group">
                        <label for="customer_name">Full Name</label>
                        <input type="text" id="customer_name" name="customer_name" class="form-control <?php echo (!empty($name_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $customer_name; ?>" required>
                        <div id="nameError" class="invalid-feedback"><?php echo $name_err; ?></div>
                    </div>

                    <div class="form-group password-toggle">
                        <label for="password">Password</label>
                        <input type="password" id="password" name="password" class="form-control <?php echo (!empty($password_err)) ? 'is-invalid' : ''; ?>" required>
                        <span class="password-toggle-icon" id="passwordToggle">
                            <i class="fas fa-eye"></i>
                        </span>
                        <div id="passwordError" class="invalid-feedback"><?php echo $password_err; ?></div>
                    </div>

                    <div class="form-group password-toggle">
                        <label for="cpassword">Confirm Password</label>
                        <input type="password" id="cpassword" name="cpassword" class="form-control <?php echo (!empty($cpassword_err)) ? 'is-invalid' : ''; ?>" required>
                        <span class="password-toggle-icon" id="cpasswordToggle">
                            <i class="fas fa-eye"></i>
                        </span>
                        <div id="cpasswordError" class="invalid-feedback"><?php echo $cpassword_err; ?></div>
                        <small class="form-text">Make sure to type the same password</small>
                    </div>

                    <div class="form-group">
                        <label for="customer_email">Email</label>
                        <input type="email" id="customer_email" name="customer_email" class="form-control <?php echo (!empty($email_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $customer_email; ?>" required>
                        <div id="emailError" class="invalid-feedback"><?php echo $email_err; ?></div>
                    </div>

                    <div class="form-group">
                        <label for="customer_contact">Phone</label>
                        <input type="tel" id="customer_contact" name="customer_contact" class="form-control <?php echo (!empty($contact_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $customer_contact; ?>" required pattern="[0-9]{10}">
                        <div id="contactError" class="invalid-feedback"><?php echo $contact_err; ?></div>
                        <small class="form-text">Please enter a valid 10-digit mobile number</small>
                    </div>

                    <div class="form-group">
                        <label for="customer_address">Address</label>
                        <textarea id="customer_address" name="customer_address" class="form-control <?php echo (!empty($address_err)) ? 'is-invalid' : ''; ?>" rows="3" required><?php echo $customer_address; ?></textarea>
                        <div id="addressError" class="invalid-feedback"><?php echo $address_err; ?></div>
                    </div>

                    <div class="form-group">
                        <button type="submit" class="btn">Sign Up</button>
                    </div>

                    <div class="login-link">
                        <p>Already have an account? <a href="login.php">Login here</a>.</p>
                    </div>
                </form>
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
            const passwordToggle = document.getElementById('passwordToggle');
            const cpasswordToggle = document.getElementById('cpasswordToggle');
            const passwordInput = document.getElementById('password');
            const cpasswordInput = document.getElementById('cpassword');

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

            // Toggle confirm password visibility
            cpasswordToggle.addEventListener('click', function() {
                if (cpasswordInput.type === 'password') {
                    cpasswordInput.type = 'text';
                    cpasswordToggle.innerHTML = '<i class="fas fa-eye-slash"></i>';
                } else {
                    cpasswordInput.type = 'password';
                    cpasswordToggle.innerHTML = '<i class="fas fa-eye"></i>';
                }
            });

            // Client-side validation
            const registerForm = document.getElementById('registerForm');
            
            registerForm.addEventListener('submit', function(e) {
                let isValid = true;
                
                // Reset error displays
                const errorElements = document.querySelectorAll('.invalid-feedback');
                errorElements.forEach(el => {
                    if (!el.id.includes('Error')) {
                        el.style.display = 'none';
                    }
                });
                
                const inputs = document.querySelectorAll('.form-control');
                inputs.forEach(input => {
                    input.classList.remove('is-invalid');
                });
                
                // Validate username
                const username = document.getElementById('username').value.trim();
                if (!username) {
                    showError('usernameError', 'Please enter a username.');
                    isValid = false;
                }
                
                // Validate name
                const name = document.getElementById('customer_name').value.trim();
                if (!name) {
                    showError('nameError', 'Please enter your full name.');
                    isValid = false;
                }
                
                // Validate password
                const password = document.getElementById('password').value;
                if (!password) {
                    showError('passwordError', 'Please enter a password.');
                    isValid = false;
                } else if (password.length < 6) {
                    showError('passwordError', 'Password must be at least 6 characters long.');
                    isValid = false;
                }
                
                // Validate confirm password
                const cpassword = document.getElementById('cpassword').value;
                if (!cpassword) {
                    showError('cpasswordError', 'Please confirm your password.');
                    isValid = false;
                } else if (password !== cpassword) {
                    showError('cpasswordError', 'Passwords do not match.');
                    isValid = false;
                }
                
                // Validate email
                const email = document.getElementById('customer_email').value.trim();
                if (!email) {
                    showError('emailError', 'Please enter your email address.');
                    isValid = false;
                } else if (!isValidEmail(email)) {
                    showError('emailError', 'Please enter a valid email address.');
                    isValid = false;
                }
                
                // Validate contact
                const contact = document.getElementById('customer_contact').value.trim();
                if (!contact) {
                    showError('contactError', 'Please enter your phone number.');
                    isValid = false;
                } else if (!isValidPhone(contact)) {
                    showError('contactError', 'Please enter a valid 10-digit phone number.');
                    isValid = false;
                }
                
                // Validate address
                const address = document.getElementById('customer_address').value.trim();
                if (!address) {
                    showError('addressError', 'Please enter your address.');
                    isValid = false;
                }
                
                if (!isValid) {
                    e.preventDefault();
                }
            });

            function showError(elementId, message) {
                const errorElement = document.getElementById(elementId);
                const inputElement = document.getElementById(elementId.replace('Error', ''));
                
                errorElement.textContent = message;
                errorElement.style.display = 'block';
                inputElement.classList.add('is-invalid');
            }

            function isValidEmail(email) {
                const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
                return emailRegex.test(email);
            }

            function isValidPhone(phone) {
                const phoneRegex = /^\d{10}$/;
                return phoneRegex.test(phone);
            }
        });
    </script>
</body>
</html>