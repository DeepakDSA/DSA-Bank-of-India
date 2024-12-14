<?php
session_start();
include('conn1.php'); 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $userid = mysqli_real_escape_string($conn, $_POST['userid']);
    $password = mysqli_real_escape_string($conn, $_POST['passwd']);

    
    $sql = "SELECT * FROM master_login WHERE userid = '$userid' AND password = '$password'";
    $result = mysqli_query($conn, $sql);

   
    if (mysqli_num_rows($result) == 1) {
      
        $_SESSION['userid'] = $userid;
        echo "<p>Login successful! Welcome, $userid.</p>";
        header('location:bank.htm'); 
        
    } else {
        
        echo "<p>Invalid userid or password. Please try again.</p>";
    }
}
?>