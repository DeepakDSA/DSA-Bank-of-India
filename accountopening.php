
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DSA Bank of India</title>
    <link rel="stylesheet" href="login.css">
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
                <th><a href="http://localhost/borrowDeposit.php" id="a">Dashboard|</a></th>
                        <th><a href="accountopeningform.htm" id="a">Open A/C|</a></th>
                        <th><a href="http://localhost/depositor_page.php" id="a">Depositer|</a></th>
                        <th><a href="http://localhost/loan.php" id="a">Loan</a></th>
                </thead>
            </table>
        </div>  
    </header>
    <br>
        

    
</body>
</html>



<?php
// Database connection settings
$servername = "localhost"; // Change if necessary
$username = "root"; // Replace with your database username
$password = ""; // Replace with your database password
$dbname = "dsa"; // Replace with your database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $customer_name = $_POST['firstname'];
    $address = $_POST['address'];
    $city = $_POST['city'];

    // Prepare and bind
    $stmt = $conn->prepare("INSERT INTO customer (customer_name, customer_street, customer_city) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $customer_name, $address, $city);

    // Execute the statement
    if ($stmt->execute()) {
        echo "New record created successfully";
        echo "<h1>Account Opened Successfully !</h1>";
    echo "<p><strong>Customer Name:</strong> " . $_POST['firstname'] . "</p>";
    echo "<p><strong>Address:</strong> " . $_POST['address']. "</p>";
    echo "<p><strong>City:</strong> " . $_POST['city']. "</p>";
    } else {
        echo "Error: " . $stmt->error;
    }

    // Close statement
    $stmt->close();
}

// Close connection
$conn->close();
?>
