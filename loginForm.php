<!DOCTYPE html>
<html>

<?php
	include('functions/functions.php');

	//Start session
	session_start();	
	//Unset the variables stored in session
	unset($_SESSION['SESS_USERID']);
	unset($_SESSION['SESS_USERNAME']);
	unset($_SESSION['SESS_PASSWORD']);
	
?>

<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="styles/new_style.css" media="all" </link>
  <h1 align="center"> Monsta Codes </h1>
</head>

<body>

<td colspan="2">
		<!--Displays the message of input validation-->
		 <?php
			if( isset($_SESSION['ERRMSG_ARR']) && is_array($_SESSION['ERRMSG_ARR']) && count($_SESSION['ERRMSG_ARR']) >0 ) {
			echo '<ul class="err">';
			foreach($_SESSION['ERRMSG_ARR'] as $msg) {
				echo '<li>',$msg,'</li>'; 
				}
			echo '</ul>';
			unset($_SESSION['ERRMSG_ARR']);
			}
		?>
	</td>
	
  <div id="login" class="login_div">
    <form action="login.php" method="post" enctype="multipart/form-data">
      <label for="username"><b>Username</b></label>
      <input type="text" name="username" required placeholder="Enter username"/>
      <label for="password"><b>Password</b></label>
      <input type="password" name="password" required placeholder="Pssword"/>
      <button class="login_button"> Log In </button>
      <p> New user? <a href="register.php"> Sign Up </a> </p>
    </form>
  </div>
</body>
</html>
