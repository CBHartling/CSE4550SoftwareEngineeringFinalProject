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
  // not sure the cast I need for date but fixed the variable types from text to their corresponding values
   $Acct_no = intval($_REQUEST['Acct_no']);
   $firstname = $_REQUEST['firstname'];
   $lastname = $_REQUEST['lastname'];
   $address = $_REQUEST['address'];
   $email = $_REQUEST['email'];
   $phone = $_REQUEST['phone'];
   $Balance = floatval($_REQUEST['Balance']);
   $TRansID = intval($_REQUEST['TRansID']);
   $interst_rate = floatval($_REQUEST['interest_rate']);
   $total_amount = floatval($_REQUEST['total_amount']);


   $sql = "INSERT INTO savings (Acct_no, firstname, lastname, address, email, phone, Balance, Date, TRansID, interest_rate, total_amount)
VALUES ('$Acct_no', '$firstname', '$lastname', '$address', '$email', '$phone', '$Balance', CURRENT_DATE(), '$TRansID', '$interst_rate', '$total_amount')";

if ($conn->query($sql) === TRUE) {
  echo "New record created successfully";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>


 

</body>

</html>
