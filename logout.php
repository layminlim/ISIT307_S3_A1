### Logout Functionality

<?php
session_start();
unset($_SESSION["is_authenticated"]);
header("Location: login.php");
?>