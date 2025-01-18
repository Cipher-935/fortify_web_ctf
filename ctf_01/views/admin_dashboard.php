<?php require("../views/headers/header_admin.php"); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="../views/css/admin_dashboard.css">
    <script src="../views/js/admin.js"></script>
</head>
<body>
    <div class="navbar">
        <a href="./admin_dashboard.php">Home</a>
        <a href="./fileShredder.php">Upload</a>
        <!-- <a href="#">Server Status</a>
        <a href="#">Logout</a> -->
    </div>

    <div class="content">
        <h1>Dashboard</h1>
        <div class="dashboard-sections">
            <div class="section">
                <h2>Btns</h2>
                <button class="view_logs" onclick="viewLogs()">View Stolen Data</button>
            </div>
            <div class="section">
                <h2>Alerts</h2>
                <ul id="alerts-list">
                </ul>
            </div>
            <div class="section">
                <h2>Overview</h2>
                <p id="overview">
                </p>
            </div>
        </div>
    </div>
</body>
</html>
