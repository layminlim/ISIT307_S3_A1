<?php
    require_once("utils.php");

    //set to empty strings
    $success_msg = "";
    $name = $phone = $email = $serial = $price = "";
    $nameErr = $phoneErr = $emailErr = $sErr = $priceErr = "";

    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        // Set Serial Variable
        $serial = test_input($_POST["serial_no"]);

        // Name Validation
        if (empty($_POST["sName"]))
        {
            $nameErr = "Name is required";
        }
        else
        {
            $name = test_input($_POST['sName']);
        }

        // Phone Validation
        if (empty($_POST["sNum"]))
        {
            $phoneErr = "Phone number is required";
        }
        else if (!is_numeric($_POST["sNum"]))
        {
            //check for sNum
            $phoneErr = "No letters allowed";
        }
        else
        {
            $phone = test_input($_POST['sNum']);
        }

        // Email Validation
        if (empty($_POST["sEmail"]))
        {
            $emailErr = "Email is required";
        }
        else if (!filter_var($_POST["sEmail"], FILTER_VALIDATE_EMAIL))
        {
            $emailErr = "Invalid email format";
        }
        else
        {
            $email = test_input($_POST['sEmail']);
        }

        // Price Validation
        if (empty($_POST["pnumber"]))
        {
            $priceErr = "Price is required";
        }
        else if (!preg_match("/^\d+(\.\d{2})?$/", $_POST["pnumber"]))
        {
            //check for letters
            $priceErr = "Price is either 10 or 10.00";
        }
        else
        {
            $price = test_input($_POST['pnumber']);
        }
    }

    // Append Record into bikes.txt after successful form validation
    if (!empty($name) && !empty($phone) && !empty($email) && !empty($price)) {
        $format = "%s,%d,%s,%s,%.2f\r";
        
        // Save Express Interest Information onto bikes.txt
        save_interest_info(sprintf($format, $name, $phone, $email, $serial, $price));

        $success_msg = "Thank you for expressing your interest";

        // Reset the buffer
        $name = $phone = $email = $price = "";
    }

    function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    function save_interest_info($record) {
        // Save Text Record
        file_put_contents(EXP_INTEREST_FILE, $record.PHP_EOL , FILE_APPEND | LOCK_EX);
    }

?>
