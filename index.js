<script>
        // Mock session message
    const sessionLogin = "Welcome back, Admin!";
    if(sessionLogin) {
        document.getElementById('login-message').innerText = sessionLogin;
        }

    // Mock API response data
    const dashboardData = {
        categories: 12,
    foods: 45,
    orders: 78,
    users: 20,
    revenue: 15200
        };

    // Update the DOM
    document.getElementById('categories-count').innerText = dashboardData.categories;
    document.getElementById('foods-count').innerText = dashboardData.foods;
    document.getElementById('orders-count').innerText = dashboardData.orders;
    document.getElementById('users-count').innerText = dashboardData.users;
    document.getElementById('revenue').innerText = "₹" + dashboardData.revenue;
</script>