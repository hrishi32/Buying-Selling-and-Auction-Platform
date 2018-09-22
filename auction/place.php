<?php
	include 'status.php';
	echo "Welcome :";
				session_start();
			     		if($_SESSION['loggedin'] == true){ echo $_SESSION['email']; }
						 	else{ header('location:home.html');

	$itemId = $_POST["itemId"];
	$bidprice = $_POST["mybid"];
	$bidprice = (int)$bidprice;
	$currentprice= "";
	$status="";
	$query = "select * from auction where itemId = '".$itemId."' ";

		$sql = mysqli_query($link, $query);

		if (mysqli_query($link, $query)) 
		{
		    while ($row = mysqli_fetch_assoc($sql)) 
		    {
		    	$currentprice = $row["cprice"];
		    	$currentprice = (int)$currentprice;
		    	$status = $row["status"];
		    	//echo "Hello...";

		    }
		}

		if($currentprice+10 <= ($bidprice) && $status == 2)
		{
			$q = "UPDATE auction SET cprice = '".$bidprice."', bidder = '".$currentuser."' WHERE itemId = '".$itemId."' ";
			mysqli_query($link, $q);
			echo "Successfull! <br><br>";
		}

		else
		{
			echo "Failed! Insufficient bid amount!<br><br>";
		}



	

		



?>