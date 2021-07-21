<?php 
require_once('serverside/login.php');
?>

<!-- Header -->
<?php require_once('static/headers/header.php'); ?>

<link rel="stylesheet" href="static/css/login.css">

</head>
<body>
  <div class="logo">
    <img src="logo.png" width="350" alt="Bike Passion Logo"> 
  </div>
  
  <div class="homepage">
    <form action="login.php" method="POST">
      <div class="container">
        <span class="error"><?php echo $error_message;?></span>
        
        <br/>

        <label for="username"><b>Username</b></label>
        <input type="text" placeholder="Username" name="username">
        <span class="error"><?php echo $unameErr;?></span>
        
        <br /><br />
        
        <label for="password"><b>Password</b></label>
        <input type="password" placeholder="Password" name="password">
        <span class="error"><?php echo $pwdErr;?></span>

        <br /><br />
        <button type="submit">Login</button>
      </div>
    </form>
  </div>
</body>