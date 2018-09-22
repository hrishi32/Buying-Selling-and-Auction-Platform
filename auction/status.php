<?php

	
	$db_host = "localhost";
	$db_user = "root";
	$db_pass = "";
	$db_name = "bsls";


	$currentuser = "1";
	date_default_timezone_set('Asia/Kolkata');
	$current = date('Y-m-d H:i:s', time());
	//echo $current;

	$link = mysqli_connect("$db_host", "$db_user", "$db_pass","$db_name" ) or die("Could not connect to mysql");
	//echo "hello"

	if (mysqli_connect_errno()) 
	{
		echo "error";
	    printf("Connect failed: %s\n", mysqli_connect_error());
	}


	$query = "select * from auction";

	$sql = mysqli_query($link, $query);

	if (mysqli_query($link, $query)) {
    while ($row = mysqli_fetch_assoc($sql)) 
    {
    	$e = $row["end"];

    	//echo $e."<br>";
    	//echo $current."<br>";
    	if($e < $current)
    	{
    		$id = $row["itemId"];
    		$q = "UPDATE auction SET status = 1 WHERE itemId = '".$id."';";
    		mysqli_query($link, $q);
    		//echo "hello1";
    	}

    	// echo "hello1";
    }
}


?>