<?php include 'static/headers/header.php' ?>

<body>
<?php include 'static/headers/nav.php' ?>

<?php 
require_once('private/database.php');

$conn = get_conn();

// Select of data from database
$sql = "SELECT * FROM products";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
    echo "serial_no: " . $row["serial_no"]. "<br>price: " . $row["price"]. "<br>description: " . $row["description"]. "<br>customer_interests: " . $row['cust_interests'];
  }
  $result->free();
} else {
  echo "0 results";
}

$conn->close();
?>
</body>