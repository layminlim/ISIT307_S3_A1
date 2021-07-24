<?php
//set to empty strings
$success_msg = "";
$name = $phone = $email = $serial = $price = "";
$nameErr = $phoneErr = $emailErr = $sErr = $priceErr = "";

if ($_SERVER["REQUEST_METHOD"] === "POST")
{
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

    // Serial Validation
    if (empty($_POST["serial"]))
    {
        $sErr = "Serial number is required";
    }
    else if (!preg_match_all("/^[0-9][0-9]\-\d{3}\-[a-z]{3}$/", $_POST["serial"]))
    {
        $sErr = "Format is yy-nnn-ccc";
    }
    else
    {
        $serial = test_input($_POST['serial']);
    }

    // Price Validation
    if (empty($_POST["pnumber"]))
    {
        $priceErr = "Price is required";
    }
    else if (!is_numeric($_POST["pnumber"]))
    {
        //check for letters
        $priceErr = "No letters allowed";
    }
    else
    {
        $price = test_input($_POST['pnumber']);
    }

    if (!empty($name) && !empty($phone) && !empty($email) && !empty($serial) && !empty($price))
    {
        echo "Thank you for expressing your interest";
    }
}

?>
