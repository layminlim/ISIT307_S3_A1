<?php require_once("validation/sellerpage.php"); ?>

<head>
	<title>Register your bikes!</title> 
	<!-- fonts -->
	<link rel="stylesheet" href="https://use.typekit.net/uyw6teo.css">
</head>
<style>

	body {
		padding: 20px;
		text-align: center;
		background-color: #fdfde7;
	}
	
	<!--
	label {
    cursor: pointer;
    display: inline-block;
    padding: 3px 6px;
    text-align: right;
    width: 150px;
    vertical-align: top;
    }-->
	div.sellerInfo {
		position: relative; 
		bottom: 20px;
	} 
	
	form {
	margin-right: 3em;
	font-family: novecento-sans, sans-serif;
	font-weight: 300;
	font-style: normal;
	font-size: 20px;
    }
	
	input {
	padding:10px;
	border:0;
	box-shadow:0 0 15px 4px rgba(0,0,2,0.06);
	border-radius: 20px;
	}	

	textarea {
	padding:10px;
	border:0;
	box-shadow:0 0 15px 4px rgba(0,0,2,0.06); 
	border-radius: 20px;
	}

	.error {
		position: absolute;
		color: #ff8080;
	}

	.success {
		text-align: center;
		color: green;	
	}
	
	a {
	font-weight:600;
	text-decoration: none;
	margin-right: 2em;
	color: #995c00;
	font-size: 15px;
	}
	
</style>

<script> //font style 
  (function(d) {
    var config = {
      kitId: 'mme3beq',
      scriptTimeout: 3000,
      async: true
    },
    h=d.documentElement,t=setTimeout(function(){h.className=h.className.replace(/\bwf-loading\b/g,"")+" wf-inactive";},config.scriptTimeout),tk=d.createElement("script"),f=false,s=d.getElementsByTagName("script")[0],a;h.className+=" wf-loading";tk.src='https://use.typekit.net/'+config.kitId+'.js';tk.async=true;tk.onload=tk.onreadystatechange=function(){a=this.readyState;if(f||a&&a!="complete"&&a!="loaded")return;f=true;clearTimeout(t);try{Typekit.load(config)}catch(e){}};s.parentNode.insertBefore(tk,s)
  })(document);
</script>
<html>
<body>

	<p style="font-family: vdl-megamaru, serif;
		font-size: 60px;
		font-style: italic; color:  #ff9900; text-shadow: 5px 4px 5px #d9d9d9">Bike Information
	</p>	
		<form method="post" action="sellerpage.php" enctype="multipart/form-data">
		<div class="sellerInfo">
			<label>Name: </label>
			<input type="text" name="sName" placeholder="Angel Lee" value="<?php echo $name;?>" />
			<span class="error">* <?php echo $nameErr;?></span>
			<br><br>
			
			<label>Phone: </label>
			<input type="text" name="sNum" placeholder="12345678" value="<?php echo $phone;?>"/>
			<span class="error">* <?php echo $phoneErr;?></span>
			<br><br>
			
			<label>Email: </label>
			<input type="text" name="sEmail" placeholder="angel_lee@gmail.com" value="<?php echo $email;?>"/>
			<span class="error">* <?php echo $emailErr;?></span>
			<br><br>
			
			<label>Serial:</label> 
			<input type="text" name="serial" placeholder="yy-nnn-cc" value="<?php echo $serial;?>"/>
			<span class="error">* <?php echo $sErr;?></span>
			<br><br>
			
			<label>Type: </label>
			<input type="text" name="type" placeholder="RACER 200 - BLACK" value="<?php echo $type;?>"/>
			<span class="error">* <?php echo $typeErr;?></span>
			<br><br>
					
			<label>Description: </label>
			<textarea name="description" rows="5" cols="50" value="<?php echo $description; ?>"></textarea>
			<br><br>
			
			<label>Year of Manufracturing:</label> 
			<input type="text" name="YOM" placeholder="2010" value="<?php echo $yom;?>"/>
			<span class="error">* <?php echo $YOMerr;?></span>
			<br><br>
			
			<label>Characteristics:</label> 
			<input type="text" name="charateristics" placeholder="Meant for mountain biking" value="<?php echo $characteristics;?>"/>
			<span class="error">*<?php echo $charErr;?></span> 
			<br><br>
			
			<label>Condition:</label> 
			<input type="text" name="condition" placeholder="Used/Good/Functional" value="<?php echo $condition;?>"/>
			<span class="error">*<?php echo $conErr;?></span>
			<br><br>

			<label>Bike Image:</label>
			<input type="file" name="bikeImage">
			<span class="error">* <?php echo $imgErr;?></span>
			<br><br><br>

			<input type="submit" style="background-color:#ffad33; border-radius: 5px; width: 10%; font-size: 20; color: white; margin-left: 2em;"
			value="Submit"/>
			<br><br>


			<span class="success"><?php echo $success_msg; ?></span>
		</div>
	</form>


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



</body> 
</html>