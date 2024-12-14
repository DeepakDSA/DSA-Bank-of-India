<?php
session_start();
include('conn.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DSA Bank of India</title>
    <link rel="stylesheet" href="style.css">
    <link rel="shortcut icon" href="image-removebg-preview (1).png" type="image/x-icon">
    <link rel="stylesheet" href="accountopeningform.css">
</head>
<body id="body">
    <header id="head">
        <img src="image-removebg-preview (1).png" alt="Bank" height="150px">
        <h1>DSA Bank of India</h1>
        <div class="leftbox">
            <table >
                <thead>
                    <th><a href="bank.html" id="a">Home&nbsp;|</a></th>
                    <th><a href="" id="a">About Us&nbsp;|</a></th>
                    <th><a href="" id="a">Login</a></th>
                </thead>
            </table>
        </div>
    </header>
    <br>
        
    <form action="login_check.php" method="POST">
        <label for="userid">User ID:</label>
        <input type="text" name="userid" required><br><br>
        
        <label for="passwd">Password:</label>
        <input type="password" name="passwd" required><br><br>
        
        <input type="submit" value="Login">
    </form>
</body>
</html>

