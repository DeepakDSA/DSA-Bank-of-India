<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DSA Bank of India</title>
    <link rel="stylesheet" href="login.css">
    <link rel="shortcut icon" href="image-removebg-preview (1).png" type="image/x-icon">
</head>

<body id="body">
    <header id="head">
        <img src="image-removebg-preview (1).png" alt="Bank" height="150px">
        <h1>DSA Bank of India</h1>
        <div class="leftbox">
            <table>
                <thead>
                    <tr>
                    <th><a href="http://localhost/borrowDeposit.php" id="a">Dashboard|</a></th>
                        <th><a href="accountopeningform.htm" id="a">Open A/C|</a></th>
                        <th><a href="http://localhost/depositor_page.php" id="a">Depositer|</a></th>
                        <th><a href="http://localhost/loan.php" id="a">Loan</a></th>
                    </tr>
                </thead>
            </table>
        </div>
    </header>
    <div class="phpwork">
    <h2>Get Details by Account Number</h2>
    <form method="post">
        <label for="account_number">Enter Account Number:</label>
        <input type="text" name="account_number" required>
        <button type="submit">Get Details</button>
    </form>
</div>
<?php
include('conn.php');

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $account_number = $_POST['account_number'];

    // Query to get details by account number
    $sql = "SELECT c.customer_name, c.customer_street, c.customer_city, 
                   a.account_number, a.balance, b.loan_number, l.amount
            FROM customer c
            INNER JOIN depositor d ON c.customer_name = d.customer_name
            INNER JOIN account a ON d.account_number = a.account_number
            LEFT JOIN borrower b ON c.customer_name = b.customer_name
            LEFT JOIN loan l ON b.loan_number = l.loan_number
            WHERE a.account_number = ?";

    // Prepare statement
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $account_number);
    $stmt->execute();
    $result = $stmt->get_result();

    // Display results
    if ($result && mysqli_num_rows($result) > 0) {
        echo '<h2>Account Details</h2>';
        echo '<table border="1"><tr><th>Name</th><th>Street</th><th>City</th><th>A/C No.</th><th>Balance</th><th>Loan No.</th><th>Loan Amount</th></tr>';
        while ($row = $result->fetch_assoc()) {
            echo '<tr>
                    <td>' . htmlspecialchars($row['customer_name']) . '</td>
                    <td>' . htmlspecialchars($row['customer_street']) . '</td>
                    <td>' . htmlspecialchars($row['customer_city']) . '</td>
                    <td>' . htmlspecialchars($row['account_number']) . '</td>
                    <td>' . htmlspecialchars($row['balance']) . '</td>
                    <td>' . htmlspecialchars($row['loan_number'] ?? 'N/A') . '</td>
                    <td>' . htmlspecialchars($row['amount'] ?? 'N/A') . '</td>
                  </tr>';
        }
        echo '</table>';
    } else {
        echo "<p>No details found for the given account number.</p>";
    }

    // Close statement
    $stmt->close();
}

// Close connection
mysqli_close($conn);
?>

</body>

</html>