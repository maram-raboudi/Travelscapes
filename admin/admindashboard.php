<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Admin Panel</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">
    <style>
        body {
            margin: 0;
            font-family: 'Segoe UI', sans-serif;
            background-color: #fff0f6;
            color: #333;
        }

        .header {
            background-color: #ff85c0;
            color: white;
            padding: 20px;
            text-align: center;
        }

        .header h1 {
            margin: 0;
        }

        .navigation {
            background-color: #ffd6e7;
            text-align: center;
            padding: 10px 0;
        }

        .nav-menu {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .nav-menu li {
            display: inline;
            margin: 0 15px;
        }

        .nav-menu li a {
            color: #cc0066;
            text-decoration: none;
            font-weight: bold;
        }

        .container {
            display: flex;
            min-height: 80vh;
        }

        .sidebar {
            background-color: #ffb3c6;
            width: 250px;
            padding: 20px;
            color: white;
        }

        .sidebar .logo img {
            width: 100%;
            border-radius: 10px;
        }

        .sidebar h2 {
            margin-top: 20px;
            font-size: 20px;
            text-align: center;
        }

        .sidebar-menu {
            list-style: none;
            padding: 0;
        }

        .sidebar-menu li {
            margin: 15px 0;
        }

        .sidebar-menu li a {
            color: white;
            text-decoration: none;
            font-weight: 600;
        }

        .sidebar-footer {
            margin-top: 20px;
            text-align: center;
            font-size: 14px;
        }

        .content {
            flex: 1;
            padding: 30px;
            background-color: #fff0f6;
        }

        .dashboard-overview {
            background-color: #ffcfe7;
            padding: 20px;
            border-radius: 10px;
            margin-bottom: 20px;
        }

        .dashboard-container {
            display: flex;
            gap: 20px;
            flex-wrap: wrap;
        }

        .dashboard-widget {
            background-color: #ffe6f0;
            border-radius: 10px;
            padding: 20px;
            flex: 1;
            min-width: 300px;
            box-shadow: 0 2px 6px rgba(0,0,0,0.1);
        }

        .footer {
            background-color: #ff85c0;
            color: white;
            text-align: center;
            padding: 15px;
        }

        canvas {
            background-color: #fff;
            border-radius: 10px;
            padding: 10px;
        }
    </style>
</head>
<body>

<header class="header">
    <h1>Admin Panel</h1>
</header>

<nav class="navigation">
    <ul class="nav-menu">
        <li><a href="adminviewjourneys.php">Journeys</a></li>
        <li><a href="adminviewusers.php">Users</a></li>
        <li><a href="adminusers.php">Admins</a></li>
        <li><a href="#">Settings</a></li>
    </ul>
</nav>

<div class="container">
    <div class="sidebar">
        <div class="logo">
            <img src="silhouette.png" alt="Silhouette Image">
        </div>
        <h2>Welcome, <?php echo $_SESSION['AdminLoginId']; ?></h2>
        <ul class="sidebar-menu">
            <li><a href="#"><i class="fas fa-home"></i> Dashboard</a></li>
            <li><a href="#"><i class="fas fa-edit"></i> Content</a></li>
            <li><a href="#"><i class="fas fa-users"></i> Users</a></li>
            <li><a href="#"><i class="fas fa-comments"></i> Comments</a></li>
            <li><a href="adminviewjourneys.php"><i class="fas fa-pencil-alt"></i> Journeys</a></li>
            <li><a href="#"><i class="fas fa-cogs"></i> Settings</a></li>
        </ul>
        <div class="sidebar-footer">
            <p>Logged in as Admin</p>
            <a href="adminlogout.php"><i class="fas fa-sign-out-alt"></i> Logout</a>
        </div>
    </div>

    <div class="content">
        <div class="dashboard-overview">
            <h2>Dashboard Overview</h2>
            <p>Manage journeys, users, and website settings from one place.</p>
        </div>

        <div class="dashboard-container">
            <div class="dashboard-widget pie-chart-container">
                <h2>User Distribution</h2>
                <canvas id="userPieChart" width="400" height="400"></canvas>
            </div>

            <div class="dashboard-widget userGrowth-chart">
                <h2>User Growth</h2>
                <canvas id="userLineChart" width="400" height="400"></canvas>
            </div>
        </div>
    </div>
</div>

<footer class="footer">
    <p>&copy; 2025 Admin Panel</p>
</footer>

<script>
    const userPieData = {
        labels: ['Admins', 'Regular Users', 'Guests'],
        datasets: [{
            data: [1, 2, 3],
            backgroundColor: ['#ff85c0', '#ffc0cb', '#ffcad4']
        }]
    };

    const userLineData = {
        labels: ['2021', '2022', '2023', '2024', '2025'],
        datasets: [{
            label: 'Number of Users',
            data: [0, 100, 200, 300, 500],
            borderColor: '#ff85c0',
            fill: false
        }]
    };

    new Chart(document.getElementById('userPieChart'), {
        type: 'pie',
        data: userPieData
    });

    new Chart(document.getElementById('userLineChart'), {
        type: 'line',
        data: userLineData
    });
</script>

</body>
</html>