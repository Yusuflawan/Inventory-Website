<?php

include_once 'dbConnection.php';

session_start();

echo $_SESSION['employeeId'];
echo $_SESSION['employeeName'];

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employee</title>
    <link rel="stylesheet" href="employeeHome.css">
</head>
<body>
    <div class="company-name">
        <h2>Inventory Website</h2>
    </div>
    <div class="main-body">
        <div class="nav-bar">
            <ul>
                <li><a href="#">Home</a></li>
                <li><a href="#">Home</a></li>
                <li><a href="#">Home</a></li>
                <li><a href="#">Logout</a></li>
            </ul>
        </div>
        <div class="main-content">

        </div>
    </div>
</body>
</html>