<?php 

require_once("utils.php");
require_once("validation/interestpage.php"); 
?>

<html>
 <head>
  <title> Express Your Interest </title>
 </head>

 <style>
    body {
        margin-left: auto;
        margin-right: auto;
        text-align: center; 
        padding: 8px;
        }
    div.interestInfo {
        position: relative; 
        top: 50px;

    }

    .error {
        position: absolute;
        color: red;
    }

    .success {
        text-align: center;
        color: green;   
    }
 </style>

 <body>
    <form method="post" action="interestpage.php?serial_no=<?= $_GET["serial_no"]; ?>">
        <b style="font-size: 20px;">Express Your Interest</b>
        <div class="interestInfo">
            Selected Bike: <b><?= $_GET["serial_no"]; ?></b>
            <input type="hidden" name="serial_no" value="<?= $_GET["serial_no"]; ?>">
            <br><br>
            Name: 
            <input type="text" name="sName" placeholder="Angel Lee" value="<?php echo $name;?>" />
            <span class="error">* <?php echo $nameErr;?></span>
            </br></br>
            
            Phone: 
            <input type="text" name="sNum" placeholder="12345678" value="<?php echo $phone;?>"/>
            <span class="error">* <?php echo $phoneErr;?></span>
            </br></br>
            
            Email: 
            <input type="text" name="sEmail" placeholder="angel_lee@gmail.com" value="<?php echo $email;?>"/>
            <span class="error">* <?php echo $emailErr;?></span>
            </br></br>
            
            Price ($): 
            <input type="text" name="pnumber" value="<?php echo $price;?>"/>
            <span class="error">* <?php echo $priceErr;?></span>
            </br></br>
                    
            <input type="submit" value="Submit"/>
            <br><br>

            <?php 
                // After user insert, show success message and nav bar back to home
                if (!empty($success_msg)) {
                    ?>
                    <!-- Show Success Message -->
                    <span class="success"><?php echo $success_msg; ?></span>
                    <br/><br/>
                    <!-- Show Nav Bar -->
                    <a href="buyerpage.php">&larr; Back to Home</a>
            <?php 
                }
            ?>
            
        </div>

    </form> 
</body>
</html>