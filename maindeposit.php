<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DSA Bank of India</title>
    <link rel="stylesheet" href="style.css">
    <link rel="shortcut icon" href="image-removebg-preview (1).png" type="image/x-icon">
</head>
<body id="body">
    <header id="head">
        <img src="image-removebg-preview (1).png" alt="Bank" height="150px">
        <h1>DSA Bank of India</h1>
        <div class="leftbox">
            <table >
                <thead>
                    <th><a href="" id="a">Home&nbsp;|</a></th>
                    <th><a href="" id="a">About Us&nbsp;|</a></th>
                    <th><a href="" id="a">Login</a></th>
                </thead>
            </table>
        </div>
    </header>
    <?php
session_start();
$_SESSION['username'] = 'amit jain';
$_SESSION['authuser'] = 1;
?>
<body>
<a href = "borrowDeposit.php"> Click here to get list of borrowers and depositors</a>
</body>
<body>
<html>