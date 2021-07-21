<?php 

### Authenticate the User, Check user if its Seller (Admin) or Buyer (Normal User) ###

require_once('private/database.php');

$error_login = FALSE;
$unameErr = $pwdErr = $error_message = "";
$username = $password = "";
$id = $is_admin = 0;

if ($_SERVER["REQUEST_METHOD"] === "POST") {
	// Form Validation
	if (empty($_POST["username"])) {
		$error_login = TRUE;
		$unameErr = "Username is required";
	} else {
		$username = test_input($_POST["username"]);
	}

	if (empty($_POST["password"])) {
		$error_login = TRUE;
		$pwdErr = "Password is required";
	} else {
		$password = test_input($_POST["password"]);
	}

	// Check records with mysql
	if ($error_login === FALSE) {
		$sql = "SELECT id, username, password, is_admin FROM users WHERE username = ? AND password = ?";

		// Open DB Connection
		$conn = get_conn();

		// Prepared Statement SQL
		if ($query = $conn->prepare($sql)) {
			$query->bind_param("ss", $username, $password);
			$query->execute();
			$query->bind_result($id, $username, $password, $is_admin);
			$query->store_result();
			
			// To check if the row exists
			if($query->num_rows == 1)  {
				
				// Fetch the results
				if($query->fetch()) {
					// User Authenticated, Start session
					session_start();

					$_SESSION["is_authenticated"] = TRUE;
					$_SESSION['id'] = $id;
					$_SESSION["username"] = $username;
					$_SESSION["is_admin"] = $is_admin;
				}
			} else {
				$error_login = TRUE;
				$error_message = "Invalid credentials.";
			}
			
			$query->close();

		}

		// Close DB Connection
		$conn->close();
	}

	if ($error_login === FALSE && ($is_admin) === 1) {
		// Seller Page
		header("Location: admin.php");
	} else if ($error_login === FALSE) {
		// Buyer Page
		header("Location: index.php");
	}
}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

?>