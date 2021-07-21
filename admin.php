<?php
session_start();
if (!isset($_SESSION['is_authenticated'])) { header("Location: login.php"); }
?>

<!-- Include CSS -->
<link rel="stylesheet" href="static/css/nav.css">

<body>
	<?php include 'static/headers/nav.php' ?>

	<h1>Hello <?php echo $_SESSION["username"]; ?></h1>
</body>