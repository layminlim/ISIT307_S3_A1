<?php
$servername = "127.0.0.1";
$username = "bikeadmin";
$password = "Cde3Xsw2Zaq1!@#$";
$db_name = "test";

$conn = mysqli_connect($servername, $username, $password, $db_name);

// Check connection
if (mysqli_connect_errno())
{
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

// Perform a query, check for error
if ($result = mysqli_query($conn, "SELECT * FROM bikes")) {
  echo "Returned rows are: " . mysqli_num_rows($result);
  // Free result set
  mysqli_free_result($result);
}


mysqli_close($conn);
echo "Hello World";
?>