<p>Update Savings Office Number</p>

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
$Acct_no = intval($_REQUEST['Acct_no']);
$DepAmt = floatval(???? Idk what to put here it just needs an input);
//when a deposit happens you need to do both the transactions table and the savings table
$sql = "INSERT INTO savings
