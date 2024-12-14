<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Abhivyakti</title>
    <link rel="stylesheet" href="login.css">
    <link rel="shortcut icon" href="image-removebg-preview (1).png" type="image/x-icon">
</head>

<body id="body">
    <header id="head">
        
        
        </div>
    </header>

    

       
    </div>
</body>

</html>




<?php
include('conn.php');


    echo "You have bought";
    $account_number = $_GET['p_name'];
    
  
    $sql = "SELECT genre , p_name where p_name = $account_number";

 
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $account_number);
    $stmt->execute();
    $result = $stmt->get_result();

 
    $stmt->close();


mysqli_close($conn);
?>
