<?php require_once("validation/sellerpage.php"); ?>

<head>
	<title>Register your bikes!</title> 
</head>
<style>
	body {
		margin-left: auto;
		margin-right: auto;
		text-align: center; 
		padding: 8px;
	}
	div.sellerInfo {
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
<html>
<body>
	<form method="post" action="sellerpage.php" enctype="multipart/form-data">
		<b style="font-size: 20px;">Bike Information</b>
		<div class="sellerInfo">
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
		
		Type: 
		<input type="text" name="type" placeholder="RACER 200 - BLACK" value="<?php echo $type;?>"/>
		<span class="error">* <?php echo $typeErr;?></span>
		</br></br>
				
		Description: 
		<textarea name="description" rows="5" cols="50" value="<?php echo $description; ?>"></textarea>
		</br></br>

		Bike Image:
		<input type="file" name="bikeImage"><span class="error">* <?php echo $imgErr;?></span>
		<br/><br/>

		<input type="submit" value="Submit"/>
		<br><br>


		<span class="success"><?php echo $success_msg; ?></span>
		</div>

	</form> 
</body> 
</html>



