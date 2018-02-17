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
  <div id="register" class="login_div">
    <form> 
      <label for="first_name"><b><font face="helvetica">First Name</font></b></label>
      <input class="user" type="text" name="first_name" required placeholder="First Name"/>

      <label for="last_name"><b><font face="helvetica">Last Name</font></b></label>
      <input class="user" type="text" name="last_name" required placeholder="Last Name"/>

      <label for="email"><b><font face="helvetica">Email Address</font></b></label>
      <input class="user" type="text" name="email" required placeholder="someemail@emails.com"/>

      <label for="con_email"><b><font face="helvetica">Re-enter Email Address</font></b></label>
      <input class="user" type="text" name="con_email" required placeholder="someemail@emails.com"/>

      <label for="password"><b><font face="helvetica">Password</font></b></label>
      <input class="user" type="text" name="password" required/>

      <label for="re_password"><b><font face="helvetica">Re-enter Password</font></b></label>
      <input class="user" type="text" name="re_password" required/>

      <button class="login_button"> Submit </button>
    </form>
  </div>
</body>
</html>