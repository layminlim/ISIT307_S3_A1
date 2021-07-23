<!-- Check for session -->
<?php
session_start();
if (!isset($_SESSION['is_authenticated'])) { header("Location: login.php"); }
?>

<?php include 'static/headers/header.php' ?>

<!-- Include CSS -->
<link rel="stylesheet" href="static/css/nav.css">

<body>

<?php include 'static/headers/nav.php' ?>

<h3>Hello <?php echo $_SESSION["username"]; ?></h3>

<h4>Bike Information</h4>

<?php
require_once('serverside/private/database.php');

$conn = get_conn();

// Select of data from database
$sql = "SELECT * FROM product";
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
</html>