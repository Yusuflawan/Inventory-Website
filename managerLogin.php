<?php

include_once 'dbConnection.php';

// Process form submission
if (isset($_POST['submitBtn'])) {

    // collect input field data
    $email = mysqli_real_escape_string($conn, $_POST["email"]);
    $password = mysqli_real_escape_string($conn, $_POST["password"]);

    $sql = "SELECT * FROM `manager` WHERE `email` = ? AND  `password` = ?";
    $stmt = mysqli_stmt_init($conn);

    if (!mysqli_stmt_prepare($stmt, $sql)) {
        echo "SQL statement failed". mysqli_error($conn);
    }
    else{
        mysqli_stmt_bind_param($stmt, "ss", $email, $password);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        $resultCheck = mysqli_num_rows($result);

        if ($resultCheck > 0) {
            session_start();
            while ($row = mysqli_fetch_assoc($result)) {
                $_SESSION['managerId'] = $row['id'];
                $_SESSION['managerName'] = $row['firstName'];
            }
            header("location: managerHome.php");
        }
        else{
            echo "<p id='errorMsg'>Invalid user</p>";
        }
    }
    
    mysqli_stmt_close($stmt);
    mysqli_close($conn);
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manager Login</title>
    <link rel="stylesheet" href="index.css">
</head>
<body>
    <form method="post" id="form">
        <h2>Manager Login</h2>
        <input type="text" name="email" id="email" placeholder="email" required>
        <input type="password" name="password" id="password" placeholder="password" required>
        <div class="down">
            <span><a href="index.php">back</a></span>
            <div class="space"></div>
            <input name="submitBtn" type="submit" value="login">
        </div>
    </form>
</body>
</html>