<p>Checking Deposit</p>

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
$Acct_noFrom = intval($_REQUEST['Acct_noFrom']);
$Acct_noTar = intval($_REQUEST['Acct_noTar']);
$DepAmt = floatval($_REQUEST['TransAmt']);


//when a deposit happens you need to do both the transactions table and the checking table
$sql = "UPDATE checking SET Balance = Balance - '$TransAmt' WHERE Acct_no='$Acct_noFrom'";
$sql = "UPDATE checking SET Balance = Balance - '$TransAmt' WHERE Acct_no='$Acct_noTar'";
$sql = "INSERT INTO checking_transactions (transid, trans_type, trans_date, trans_amount, lastname, firstname, phone)
SELECT s.TRansID, 'Transfer', CURRENT_DATE(), $TransAmt, s.lastname, s.firstname, s.phone
FROM checking s
WHERE s.Acct_no = $Acct_noFrom;"



if ($conn->query($sql) === TRUE) {
  echo "New record created successfully";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
