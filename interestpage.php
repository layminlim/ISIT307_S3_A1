<?php 

require_once("utils.php");
require_once("validation/interestpage.php"); 
?>

<html>
 <head>
  <title> Express Your Interest </title>
  <link rel="stylesheet" href="https://use.typekit.net/uyw6teo.css">
 </head>

 <style>
    body {
        padding: 20px;
		text-align: center;
		background-color: #fdfde7;
		
        }
    div.interestInfo {
        position: relative; 
		top: 30px;
    }
	
	form {
	margin-right: 3em;
	font-family: novecento-sans, sans-serif;
	font-weight: 300;
	font-style: normal;
	font-size: 15px;
    }
	
	input {
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
 <body>
    <form method="post" action="interestpage.php?serial_no=<?= $_GET["serial_no"]; ?>">
        <b style="font-family: vdl-megamaru, serif;
		font-size: 40px;
		font-style: italic; color: #ff9900; text-shadow: 5px 4px 5px #d9d9d9"">Express Your Interest</b>
        <div class="interestInfo">
            <label>Selected Bike:</label> <b><?= $_GET["serial_no"]; ?></b>
            <input type="hidden" name="serial_no" value="<?= $_GET["serial_no"]; ?>">
            <br><br>
            <label>Name:</label> 
            <input type="text" name="sName" placeholder="Angel Lee" value="<?php echo $name;?>" />
            <span class="error">* <?php echo $nameErr;?></span>
            </br></br>
            
            <label>Phone:</label> 
            <input type="text" name="sNum" placeholder="12345678" value="<?php echo $phone;?>"/>
            <span class="error">* <?php echo $phoneErr;?></span>
            </br></br>
            
            <label>Email:</label>
            <input type="text" name="sEmail" placeholder="angel_lee@gmail.com" value="<?php echo $email;?>"/>
            <span class="error">* <?php echo $emailErr;?></span>
            </br></br>
            
            <label>Price ($):</label> 
            <input type="text" name="pnumber" value="<?php echo $price;?>"/>
            <span class="error">* <?php echo $priceErr;?></span>
            </br></br>
                    
            <input type="submit" style="background-color:#ffad33; border-radius: 5px; width: 8%; font-size: 15; color: white; margin-left: 2em;"value="Submit"/>
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