<html>

<body>

 

 

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

   

   // get the variables from the URL request string

   $Acct_no = intval($_REQUEST['Acct_no']);
   $firstname = $_REQUEST['firstname'];
   $lastname = $_REQUEST['lastname'];
   $address = $_REQUEST['address'];
   $email = $_REQUEST['email'];
   $phone = $_REQUEST['phone'];
   $Balance = floatval($_REQUEST['Balance']);
   $TRansID = intval($_REQUEST['TRansID']);



   $sql = "INSERT INTO checking (Acct_no, firstname, lastname, address, email, phone, Balance, Date, TRansID)
VALUES ('$Acct_no', '$firstname', '$lastname', '$address', '$email', '$phone', '$Balance', CURRENT_DATE(), '$TRansID')";

if ($conn->query($sql) === TRUE) {
  echo "New record created successfully";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>


 

</body>

</html>
