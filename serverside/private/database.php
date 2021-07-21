<?php 
require_once('config.php');

function get_conn(): mysqli {
  $conn = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_DATABASE); 

  // Check connection
  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }
  // echo "Connection Successful";
  return $conn;
}
?>