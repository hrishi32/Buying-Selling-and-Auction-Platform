<?php
	
	include 'status.php';
	include 'session.php';

	$currentuser = $_SESSION["email"];
	$itemId = $_POST["itemId"];

	$q = "UPDATE auction SET status = 0, bidder = '".$currentuser."' WHERE itemId = '".$itemId."' ";

	mysqli_query($link, $q);

	header("Location: home.php");
       exit;
	







?>