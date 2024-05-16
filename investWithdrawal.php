<p>Investment Deposit</p>

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
$WithAmt = floatval($_REQUEST['WithAmt']);
$sql = "SELECT Date FROM Investment WHERE Acct_no = '$Acct_no'";
$result = $conn->query($sql);
if (!$result) {
    // Query execution failed, handle the error
    die("Query failed: " . $conn->error);
}
$bridge = $result->fetch_assoc();
$dbDate = $bridge['Date'];
$OGDate = new DateTime($dbDate);
$current = new DateTime();
$interval = $current->diff($OGDate);

if($interval->y >=1){
//when a deposit happens you need to do both the transactions table and the Investment table
$sql = "UPDATE Investment SET Balance = Balance - '$WithAmt' WHERE Acct_no='$Acct_no'";
$conn->query($sql);
$sql = "INSERT INTO investment_transactions (transid, trans_type, trans_date, trans_amount, lastname, firstname, phone)
SELECT s.TRansID, 'Withdrawal', CURRENT_DATE(), $WithAmt, s.lastname, s.firstname, s.phone
FROM Investment s
WHERE s.Acct_no = $Acct_no";

if ($conn->query($sql) === TRUE) {
  echo "New record created successfully";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}
}

else{
	echo "You must wait one year to withdraw.";
}


$conn->close();
?>
