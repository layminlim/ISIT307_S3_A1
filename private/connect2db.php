<?php
$servername = "127.0.0.1:3306";
$username = "bikeadmin";
$password = "Cde3Xsw2Zaq1!@#$";
$db_name = "test";

$con = mysqli_connect($servername, "root","","test");

// Check connection
if (mysqli_connect_errno())
{
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

// Perform a query, check for error
if (!mysqli_query($con,"SELECT * FROM bikes"))
{
    echo("Error description: " . mysqli_error($con));
}

mysqli_close($con);

?>