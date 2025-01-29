<?php require("../views/headers/header_admin.php"); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="../views/css/admin_dashboard.css">

</head>

<body>
    <div class="navbar">
        <a class="active" href="event_controller.php?val=home">Home</a>
        <a class="active" href="event_controller.php?val=eajmpu">Upload</a>
    </div>

    <div class="content">
        <h1>Dashboard</h1>
        <div class="dashboard-sections">
            <div class="section">
                <h2>Server Actions</h2>
                <div style="display: flex; flex-direction:column; padding: 7px;width:fit-content;margin-left:5px;">
                    <h3 style="color: white;">Alert Gang!</h3>
                    <textarea rows="4" cols="27" placeholder="Enter your message here" style="padding: 4px;background-color:black;color:red;border:2px solid red;"
                        id="txt_mess"></textarea>
                    <button
                        style="color: white; background-color:red; border:none;border-radius: 5px; width:fit-content;padding: 4px;text-align:center;margin-top:8px;"
                        id="btn_broad">Broadcast</button>
                </div>
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

    <div class='alert_gang_box'>
        <textbox row="6" col="7"></text>
    </div>
</body>

</html>