<<?php
session_start();

// check if admin is logged in
if (!isset($_SESSION['admin_id'])) {
    header("Location: Alogin.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Dashboard - Bantu Bakery</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f8f9fa;
            margin: 0;
            padding: 0;
        }

        header {
            background: #2f3542;
            color: white;
            padding: 15px 30px;
            text-align: center;
        }

        header h1 {
            margin: 0;
            font-size: 26px;
        }

        .dashboard {
            display: flex;
            justify-content: center;
            align-items: center;
            height: calc(100vh - 80px);
            gap: 40px;
        }

        .card {
            background: white;
            border-radius: 12px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
            width: 250px;
            height: 180px;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            text-decoration: none;
            color: #2f3542;
            font-size: 20px;
            font-weight: bold;
            transition: all 0.3s;
        }

        .card i {
            font-size: 40px;
            margin-bottom: 15px;
            color: #ff4757;
        }

        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 20px rgba(0,0,0,0.2);
        }

        .logout {
            position: absolute;
            top: 20px;
            right: 30px;
            background: #ff4757;
            color: white;
            padding: 8px 15px;
            border-radius: 5px;
            text-decoration: none;
            font-size: 14px;
        }

        .logout:hover {
            background: #ff3742;
        }
    </style>
</head>
<body>
    <header>
        <h1>Welcome, Admin</h1>
        <a href="logout.php" class="logout">Logout</a>
    </header>

    <div class="dashboard">
        <a href="manage-orders.php" class="card">
            <i class="fas fa-receipt"></i>
            Manage Orders
        </a>

        <a href="manage-users.php" class="card">
            <i class="fas fa-users"></i>
            Manage Users
        </a>
    </div>
</body>
</html>
