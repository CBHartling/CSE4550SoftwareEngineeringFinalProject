<p>Savings Interest</p>

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


//when a deposit happens you need to do both the transactions table and the savings table
$sql = "UPDATE savings SET Balance = Balance + (Balance * interest_rate) WHERE Acct_no='$Acct_no'";
$conn->query($sql);
$sql = "INSERT INTO savings_transactions (transid, trans_type, trans_date, trans_amount, lastname, firstname, phone)
SELECT s.TRansID, 'Interest', CURRENT_DATE(), s.Balance, s.lastname, s.firstname, s.phone
FROM savings s
WHERE s.Acct_no = $Acct_no";



if ($conn->query($sql) === TRUE) {
  echo "New record created successfully";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
