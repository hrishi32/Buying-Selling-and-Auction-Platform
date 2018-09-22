<?php 
 // this starts the session 
	/*session_start(); 
	if(isset($_SESSION['CustomerfName'])!= TRUE)
	{
		ECHO "<script type=\"text/javascript\">alert(\"Please login again\");window.location = \"login.html\";</script>";
	}*/

	include 'status.php';


	$item = $description = $category = $bprice = $cprice = $bnprice = $startd = $startt = $endd = $endt = $user = $status = "";

	// $user = $_SESSION["userid"];
	$currentuser = "1";
	$item = $_POST["item_title"];
	$description = $_POST["item_description"];
	$category = $_POST["item_category"];
	//$cprice = $_POST["cprice"];
	$bprice = $_POST["bprice"];
	$bnprice = $_POST["bnprice"];
	$startd = $_POST["startd"];
	$startt = $_POST["startt"];
	$endd = $_POST["endd"];
	$endt = $_POST["endt"];
	


	/*if(isset($_POST["imagesrc1"]))
	{
		$imagesrc1 = $_POST["imagesrc1"];
	}

	if(isset($_POST["imagesrc2"]))
	{
		$imagesrc2 = $_POST["imagesrc2"];
	}

	if(isset($_POST["imagesrc3"]))
	{
		$imagesrc3 = $_POST["imagesrc3"];
	}
*/
	$start = $startd." ".$startt;
	$end = $endd." ".$endt;


	date_default_timezone_set('Asia/Kolkata');
	 $current = date('m/d/Y h:i:s a', time());

    if(isset($_POST["submitbtn"]) && isset($_FILES['fileToUpload']) && isset($_FILES['fileToUploadTwo']) && isset($_FILES['fileToUploadThr']) &&                    isset($_FILES['fileToUploadFour']))
            {
                $target_dir = "uploads/";
                $target_file1 = $target_dir . $highest_id . "_1.jpg";/// basename($_FILES["fileToUpload"]["name"]);
                $uploadOk = 1;
                $imageFileType = pathinfo($target_file1,PATHINFO_EXTENSION);
                $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
                    if($check !== false) {
                       /* echo "File is an image - " . $check["mime"] . ".";*/
                        move_uploaded_file($_FILES['fileToUpload']['tmp_name'], $target_file1);
                        $uploadOk = 1;
                        $pass = 1;
                    } else {
                        echo "File is not an image.";
                        $uploadOk = 0;
                        $pass = 0; 
                       // header("location:to_post.php");
                        //exit();
                    }
                $target_file2 = $target_dir . $highest_id . "_2.jpg";// basename($_FILES["fileToUploadTwo"]["name"]);
                $uploadOk = 1;
                $imageFileType = pathinfo($target_file2,PATHINFO_EXTENSION);
                $check = getimagesize($_FILES["fileToUploadTwo"]["tmp_name"]);
                    if($check !== false) {
                        //   echo "File is an image - " . $check["mime"] . ".";
                        move_uploaded_file($_FILES['fileToUploadTwo']['tmp_name'], $target_file2);
                        $pass = 1; 
                        $uploadOk = 1;
                    }  else {
                        echo "File is not an image.";
                        $uploadOk = 0;
                        $pass = 0; 
                       // header("location:to_post.php");
                       // exit();
                    }
        

                $target_file3 = $target_dir . $highest_id . "_3.jpg"; //basename($_FILES["fileToUploadThr"]["name"]);
                $uploadOk = 1;
                $imageFileType = pathinfo($target_file3,PATHINFO_EXTENSION);
                $check = getimagesize($_FILES["fileToUploadThr"]["tmp_name"]);
                    if($check !== false) {
                        //   echo "File is an image - " . $check["mime"] . ".";
                        move_uploaded_file($_FILES['fileToUploadThr']['tmp_name'], $target_file3);
                        $uploadOk = 1;
                        $pass = 1; 
                    } else {
                        //echo "File is not an image.";
                        $uploadOk = 0;
                        $pass=0;
                        header('location:to_post.php');
                        exit();
                    }
        
                $target_file4 = $target_dir . $highest_id . "_4.jpg"; //basename($_FILES["fileToUploadFour"]["name"]);
                $uploadOk = 1;
                $imageFileType = pathinfo($target_file4,PATHINFO_EXTENSION);
                $check = getimagesize($_FILES["fileToUploadFour"]["tmp_name"]);
                    if($check !== false) {
                        //echo "File is an image - " . $check["mime"] . ".";
                        move_uploaded_file($_FILES['fileToUploadFour']['tmp_name'], $target_file4);
                        $uploadOk = 1;
                        $pass = 1; 
                    } else {
                        //echo "File is not an image.";
                        $uploadOk = 0;
                        $pass = 0;
                        header("location:to_post.php");
                        exit();
                    }
         }  else{echo "files not reached";
                header("location:to_post.php");
                exit();
         }

	// echo $date;

	 if( $current <= $end && $start < $end)
	 {
	 	$query = "INSERT INTO `auction`( `item`, `description`, `category`, `imagesrc`, `imagesrc1`, `imagesrc2`, `imagesrc3`, `bprice`, `cprice`, `bnprice`, `start`, `end`, `user`, `status`,`bidder` ) VALUES ('".$item."','".$description."','".$category."','".$target_file1."','".$target_file2."','".$target_file3."','".$target_file4."','".$bprice."','".$cprice."','".$bnprice."','".$start."','".$end."',1,2, '".$currentuser."');";

	 	mysqli_query($link, $query);

	 	?>
	 	<!DOCTYPE HTML>
	 	<p>Your auction added successfully!!<p>
	 		<a href="index.php">Go to Auctios</a>
	 		<?php 

	 }

	 elseif($current <= $start && $start < $end)
	 {
	 	$query = "INSERT INTO `auction`( `item`, `discription`, `category`, `imagesrc`,`imagesrc1`, `imagesrc2`, `imagesrc3`, `bprice`, `cprice`, `bnprice`, `start`, `end`, `user`, `status`) VALUES ('".$item."','".$description."','".$category."','".$imagesrc."','".$imagesrc1."','".$imagesrc2."','".$imagesrc3."','".$bprice."','".$bprice."','".$bnprice."','".$start."','".$end."',1,1);";

	 	mysqli_query($link, $query);

	 	?>
	 	<!DOCTYPE HTML>
	 	<p>Your auction added as Expired!!<p>
	 		<a href="index.php">Go to Auctios</a>
	 		<?php 
	 }
	 else
	 {?>
	 	<!DOCTYPE HTML>
	 	<p>Recheck Start and End time!!<p>
	 		<a href="add-auction.html">Try again</a>
	 		<?php 
	 }

	 









?>