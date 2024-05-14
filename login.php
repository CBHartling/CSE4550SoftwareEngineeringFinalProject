<p>Login</p>

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
//Values for userid and pssword
$userid = $_REQUEST['userid'];
$pssword = $_REQUEST['pssword'];


//Check if login is valid and then send into access page
$sql = "SELECT * FROM login_tbl WHERE $userid = 'userid' AND $pssword = 'pssword'"
$result = $conn->query($sql)

if ($conn->query($sql) === TRUE) {
  echo "Succesful login";
  // Send to access page

}
else {
  echo "Failed Login";
  // Send back to index_html

}

$conn->close();
?>
