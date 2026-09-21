<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FoodExpress - Order History</title>
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

        .main-content {
            padding: 40px 0;
        }

        .page-title {
            text-align: center;
            margin-bottom: 40px;
            color: #ff7e5f;
            position: relative;
            padding-bottom: 15px;
        }

        .page-title::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 50%;
            transform: translateX(-50%);
            width: 100px;
            height: 3px;
            background: linear-gradient(to right, #ff7e5f, #feb47b);
        }

        .orders-container {
            background: white;
            border-radius: 10px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
            overflow: hidden;
        }

        .orders-table {
            width: 100%;
            border-collapse: collapse;
        }

        .orders-table th {
            background: linear-gradient(to right, #ff7e5f, #feb47b);
            color: white;
            padding: 15px;
            text-align: left;
        }

        .orders-table td {
            padding: 15px;
            border-bottom: 1px solid #eee;
        }

        .orders-table tr:last-child td {
            border-bottom: none;
        }

        .orders-table tr:hover {
            background-color: #f9f9f9;
        }

        .status-ordered {
            color: #333;
            font-weight: 500;
        }

        .status-delivery {
            color: orange;
            font-weight: 500;
        }

        .status-delivered {
            color: green;
            font-weight: 500;
        }

        .status-cancelled {
            color: red;
            font-weight: 500;
        }

        .error {
            text-align: center;
            padding: 30px;
            color: #666;
        }

        .error i {
            font-size: 3rem;
            color: #ddd;
            margin-bottom: 15px;
        }

        hr {
            border: none;
            height: 1px;
            background: #eee;
            margin: 20px 0;
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
            
            .orders-container {
                overflow-x: auto;
            }
            
            .orders-table {
                min-width: 600px;
            }
            
            .orders-table th,
            .orders-table td {
                padding: 10px;
            }
        }

        @media (max-width: 480px) {
            .orders-table {
                min-width: 100%;
            }
            
            .orders-table th:nth-child(2),
            .orders-table td:nth-child(2),
            .orders-table th:nth-child(3),
            .orders-table td:nth-child(3) {
                display: none;
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

    <div class="main-content">
        <div class="container">
            <h1 class="page-title">Order Details</h1>

            <div class="orders-container">
                <table class="orders-table">
                    <thead>
                        <tr>
                            <th>S.N.</th>
                            <th>Food</th>
                            <th>Price</th>
                            <th>Qty.</th>
                            <th>Total</th>
                            <th>Order Date</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody id="ordersTableBody">
                        <!-- Orders will be dynamically inserted here -->
                    </tbody>
                </table>
            </div>
        </div>
    </div>

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
            // Check if user is logged in
            if (localStorage.getItem('loggedIn') !== 'true') {
                window.location.href = 'login.html';
                return;
            }

            // Sample order data - in a real application, this would come from a server
            const ordersData = [
                {
                    id: 1,
                    food: "Chicken Burger",
                    price: 5.99,
                    qty: 2,
                    total: 11.98,
                    order_date: "2023-06-15 14:30:25",
                    status: "Delivered"
                },
                {
                    id: 2,
                    food: "Beef Burger",
                    price: 6.99,
                    qty: 1,
                    total: 6.99,
                    order_date: "2023-06-18 19:15:42",
                    status: "On Delivery"
                },
                {
                    id: 3,
                    food: "Veggie Burger",
                    price: 5.49,
                    qty: 3,
                    total: 16.47,
                    order_date: "2023-06-20 12:45:18",
                    status: "Ordered"
                },
                {
                    id: 4,
                    food: "BBQ Burger",
                    price: 7.49,
                    qty: 1,
                    total: 7.49,
                    order_date: "2023-06-22 18:20:33",
                    status: "Cancelled"
                }
            ];

            const ordersTableBody = document.getElementById('ordersTableBody');

            // Display orders
            function displayOrders() {
                ordersTableBody.innerHTML = '';
                
                if (ordersData.length === 0) {
                    ordersTableBody.innerHTML = `
                        <tr>
                            <td colspan="7">
                                <div class="error">
                                    <i class="fas fa-shopping-bag"></i>
                                    <p>You have not placed any orders yet!!!</p>
                                </div>
                            </td>
                        </tr>
                    `;
                    return;
                }

                let sn = 1;
                
                ordersData.forEach(order => {
                    const orderRow = document.createElement('tr');
                    
                    // Determine status class
                    let statusClass = '';
                    switch(order.status) {
                        case 'Ordered':
                            statusClass = 'status-ordered';
                            break;
                        case 'On Delivery':
                            statusClass = 'status-delivery';
                            break;
                        case 'Delivered':
                            statusClass = 'status-delivered';
                            break;
                        case 'Cancelled':
                            statusClass = 'status-cancelled';
                            break;
                    }
                    
                    orderRow.innerHTML = `
                        <td>${sn++}.</td>
                        <td>${order.food}</td>
                        <td>$${order.price.toFixed(2)}</td>
                        <td>${order.qty}</td>
                        <td>$${order.total.toFixed(2)}</td>
                        <td>${order.order_date}</td>
                        <td class="${statusClass}">${order.status}</td>
                    `;
                    
                    ordersTableBody.appendChild(orderRow);
                });
            }

            // Initial display
            displayOrders();
        });
    </script>
</body>
</html>