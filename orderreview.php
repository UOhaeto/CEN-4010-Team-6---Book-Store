<!DOCTYPE html>
<html>

<?php
	session_start();
	include('functions/functions.php');
  echo file_get_contents("html/header.php");
?>

<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="styles/new_style.css" media="all" </link>
</head>
<body>

  <div class= "content" >

    <head>
      <title> Transaction Complete</title>
    </head>

    <?php echo '<h1>' . '<h1>'; ?>
    <div style="text-align: center">
      <?php echo '<img src="images/cart.png" width="250" height="250" colspan="4"   />'; ?>
      <p1> <br>Transaction successful!</br></p1>

      <p2> <br>Thank you for shopping with us.</br> </p2>
      <p3> Feel free to rate your purchased books </p3>
      <?php //echo '<a href="index.php">Here</a>'; ?>
    </div>
