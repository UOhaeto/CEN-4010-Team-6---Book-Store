<!DOCTYPE html>
<html>

<?php
	include("functions/functions.php");
?>

<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="styles/new_style.css" media="all" </link>
  <h1 align="center"> <a href="index.php">Monsta Codes</a> </h1> <!-- TODO Possibly replace with site logo -->
</head>

<body>
  <div id="login" class="login_div">
    <form action="customer_register.php" method="post" enctype="multipart/form-data">
      <label for="login_email"><b><font face="helvetica">Username</font></b></label>
      <input type="text" name="login_email" required placeholder="Enter email"/>
      <label for="login_pass"><b><font face="helvetica">Password</font></b></label>
      <input type="password" name="login_pass" required placeholder="password"/>
      <button class="login_button"> Log In </button>
    </form>
    <p><font face="helvetica">New User? </font><a href="/register.php"><b><font face="helvetica">Sign Up</font></b> </a> </p>
  </div>
</body>
</html>
