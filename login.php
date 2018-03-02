<!DOCTYPE html>
<html>

<?php
	include_once("functions/functions.php");
?>

<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="styles/new_style.css" media="all" </link>
  <h1 align="center"> <a href="index.php"><img src="images/Book Monster.png" alt="home_logo" width="250" height="80"></a> </h1> <!-- TODO Possibly replace with site logo -->
</head>

<body>
  <div id="login" class="login_div">
    <form class="user" action="customer_register.php" method="post" enctype="multipart/form-data">
      <label for="login_email"><b><font face="helvetica">Username</font></b></label>
      <input class="user" type="text" name="login_email" required placeholder="Enter email"/>
      <label for="login_pass"><b><font face="helvetica">Password</font></b></label>
      <input class="user" type="password" name="login_pass" required placeholder="password"/>
      <button class="login_button"> Log In </button>
      <p> New user? <a href="register.php"> Sign Up </a> </p>
    </form>
  </div>
</body>
</html>
