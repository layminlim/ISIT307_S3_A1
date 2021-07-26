<?php
	require_once("utils.php");

	//set to empty strings
	$success_msg = "";
	$name = $phone = $email = $serial = $type = $description = $yom = $characteristics = $condition = $bikeImage = ""; 
	$nameErr = $phoneErr = $emailErr = $sErr = $typeErr = $YOMerr = $charErr = $conErr = $imgErr = "";
	$upload_ok = FALSE;
	
	if ($_SERVER["REQUEST_METHOD"] === "POST") {
		// Name Validation
		if (empty($_POST["sName"])) {
			$nameErr = "Name is required";
		} else {
			$name = test_input($_POST['sName']); 	
		}
		// Phone Validation
		if (empty($_POST["sNum"])) {
			$phoneErr = "Phone number is required"; 
		} else if (!is_numeric($_POST["sNum"]))  {
			//check for letters
			$phoneErr = "No letters allowed";
		} else {
			$phone = test_input($_POST['sNum']);
		} 
		// Email Validation
		if (empty($_POST["sEmail"])) {
			$emailErr = "Email is required";  	
		} else if (!filter_var($_POST["sEmail"], FILTER_VALIDATE_EMAIL)) {  
			$emailErr = "Invalid email format"; 
		} else {
			$email = test_input($_POST['sEmail']);
		}
		// Serial Validation
		if (empty($_POST["serial"])) {
			$sErr = "Serial number is required"; 
		} else if (!preg_match_all("/^[0-9][0-9]\-\d{3}\-[a-z]{3}$/", $_POST["serial"])){
			$sErr = "Format is yy-nnn-ccc"; 
		} else {
			$serial = test_input($_POST['serial']);
		}
		// Type Validation
		if (empty($_POST["type"])) {
			$typeErr = "Type is required";
		} 
		else {
			$type = test_input($_POST["type"]); 
			// Optional Description Field
			$description = test_input($_POST["description"]);
		}
		//YOM validation 
		if (empty($_POST["YOM"])) {
			$YOMerr = "Year of manufracturing is required";
		} 
		else { 
			$yom = test_input($_POST["YOM"]); 
		} 
		
		//characteristics validation 
		if (empty($_POST["characteristics"])) {
			$charErr = "Characteristics is required"; 
		}
		else {
			$characteristics = test_input($_POST["characteristics"]);
		} 
		
		//condition validation 
		if (empty($_POST["condition"])) {
			$conErr = "Condition is required"; 
		} 
		else {
			$condition = test_input($_POST["condition"]);
		} 
		
		// Bike Image Validation
		
		// Check if field is null
		if (empty($_FILES["bikeImage"]["name"])) {
			$imgErr = "File is required";
		}
		else {
			// Get Image Extension
			$imgFileType = pathinfo($_FILES["bikeImage"]["name"], PATHINFO_EXTENSION);
		
			// Check if Image is real or fake
			if (!getimagesize($_FILES["bikeImage"]["tmp_name"])) {
				$imgErr = "File is not an image";
			}
			// Check for File Size
			else if ($_FILES["bikeImage"]["size"] > 500000) {
				$imgErr = "Filesize too large";
			} 
			// Check for file upload type
			else if ($imgFileType != "jpg" && $imgFileType != "png" && $imgFileType != "jpeg") {
				$imgErr = "Please upload image only";
			} 
			else {
				$bikeImage = test_input(basename($_FILES["bikeImage"]["name"]));
				$upload_ok = TRUE;
			}
		}
	}
	
	// Append Record into bikes.txt after successful form validation
	if (!empty($name) && !empty($phone) && !empty($email) && !empty($serial) && !empty($type) && $upload_ok === TRUE) {
		$format = "%s::%d::%s::%s::%s::%s::%s\r";
		// Save Bike Information onto bikes.txt
		save_bike_info(sprintf($format, $name, $phone, $email, $serial, $type, $description, $bikeImage));
		// Show success message
		$success_msg = "Save bike information to bikes.txt";
		// Reset the Buffer
		$name = $phone = $email = $serial = $type = $description = "";
	}

	function test_input($data) {
		$data = trim($data);
		$data = stripslashes($data);
		$data = htmlspecialchars($data);
		return $data;
	}

	function save_bike_info($record) {
		// Save Text Record
		file_put_contents(BIKES_DB, $record.PHP_EOL , FILE_APPEND | LOCK_EX);

		// Save Image
		$target_file = BIKES_IMG . basename($_FILES["bikeImage"]["name"]);
		move_uploaded_file($_FILES["bikeImage"]["tmp_name"], $target_file);
	}
?>