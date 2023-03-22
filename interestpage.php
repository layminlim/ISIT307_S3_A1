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
 </style>

 <body>
    <form method="post" action="interestpage.php" enctype="multipart/form-data">
        <b style="font-size: 20px;">Express Your Interest</b>
        <div class="interestInfo">
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
        
        Serial: 
        <input type="text" name="serial" placeholder="yy-nnn-cc" value="<?php echo $serial;?>"/>
        <span class="error">* <?php echo $sErr;?></span>
        </br></br>
        
        Price: 
        <input type="text" name="pnumber" value="<?php echo $price;?>"/>
        <span class="error">* <?php echo $priceErr;?></span>
        </br></br>
                
        <input type="submit" value="Submit"/>
        <br><br>

        <span class="success"><?php echo $success_msg; ?></span>
        </div>

    </form> 
</body>
</html>
