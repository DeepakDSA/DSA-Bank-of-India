<?php
if($_POST['customer_name'])
{
$DB_USERNAME="root";
$DB_PASS="";
$DB_HOSTNAME="localhost";
$DB_NAME="DSA";
// create connection
$connect=mysqli_connect($DB_HOSTNAME,$DB_USERNAME,$DB_PASS,$DB_NAME) or die('DATABASE CONNECTION ERROR');
//begin the transaction
mysqli_query($connect,"BEGIN");
$customer_name = $_POST['customer_name'] ;
$result = mysqli_query($connect,"SELECT SUM(A.balance), A.account_number FROM depositor D, account A WHERE D.customer_name = '$customer_name' and
D.account_number = A.account_number;");
$i = 0; //Flag is taken to keep track of delete
while($row = mysqli_fetch_array($result))
{
if($row[0] < 500) //$row[0] would then refer to the first column in the current row of the result set
{
mysqli_query($connect,"delete from depositor where customer_name = '$customer_name'");
$i = 1;
}
$account_number = $row[1];
} //end of while loop
//Check for year condition
$result = mysqli_query($connect,"SELECT COUNT(*) FROM account WHERE year(DATE) < 2010 and account_number = '$account_number'");
while($row = mysqli_fetch_array($result))
{
if($row[0]==0) //No row is resulted from the upper query where year < 2010
{
if($i == 1) //account is set for deletion in the previous while loop
{
echo "<br>Your account balance is lower than 500, but your account is not older than 2010 so account will not be deleted.";
mysqli_query($connect,"ROLLBACK");
}
else
{
echo "<br>Your balance is higher than 500."; // value of variable i does not change in the previous while loop as balance is > 500. This is just for information.
}
}
else
if($i == 1) // Condition satisfied so commit the transaction (value of count is more than 1 means the account is older than 2010)
{
echo "Your account balance is lower than 500 and your account is older than 2010, thus, the account will be deleted.";
mysqli_query($connect,"delete from account where account_number = '$account_number'");
mysqli_query($connect,"COMMIT");
}
}
}
else
{
//Show transactionPage webpage along with error.
include("transactionPage.php");
echo "<hr> Customer Name is missing.";
}
?>