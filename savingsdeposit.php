<p>Savings Office Number</p>

<?php



$servername = "localhost";
$username = "quickme1_4211";
$password = "csci4211";
$dbname = "dbvpny1qngaxgp";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
} 
//Values for account number and the requested deposit amount
$Acct_no = intval($_REQUEST['Acct_no']);
$DepAmt = floatval($_REQUEST['DepAmt');


//when a deposit happens you need to do both the transactions table and the savings table
$sql = "UPDATE savings SET Balance = Balance + '$DepAmt' WHERE Acct_no='$Acct_no'";
$sql = "INSERT INTO savings_transactions (transid, trans_type, trans_date, trans_amount, lastname, firstname, phone)
VALUES('Wherever we get transid from', "Deposit", date, '$DepAmt', Lastname, firstname, phone)";



if ($conn->query($sql) === TRUE) {
  echo "New record created successfully";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>