<p>Checking Transfer</p>

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
$conn->begin_transaction();

try {
    // Subtract the transaction amount from the source account
    $sql = "UPDATE checking SET Balance = Balance - $TransAmt WHERE Acct_no = $Acct_noFrom";
    $conn->query($sql);

    // Add the transaction amount to the target account
    $sql = "UPDATE checking SET Balance = Balance + $TransAmt WHERE Acct_no = $Acct_noTar";
    $conn->query($sql);

    // Insert the transaction record
    $sql = "INSERT INTO checking_transactions (transid, trans_type, trans_date, trans_amount, lastname, firstname, phone)
            SELECT TRansID, 'Transfer', CURRENT_DATE(), $TransAmt, lastname, firstname, phone
            FROM checking
            WHERE Acct_no = $Acct_noFrom";

    // Commit the transaction
    $conn->commit();

    echo "Transaction successful.";
} catch (Exception $e) {
    // Rollback the transaction if an error occurred
    $conn->rollback();
    echo "Transaction failed: " . $e->getMessage();
}

if ($conn->query($sql) === TRUE) {
  echo "New record created successfully";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
