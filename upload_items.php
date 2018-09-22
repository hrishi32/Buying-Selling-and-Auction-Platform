<!DOCTYPE HTML>
<html>
		<head>
			<link type="text/css" href="main1.css" rel="stylesheet">
			<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
			<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" />
		</head>
		<body>
				<?php 
						include 'config.php';
			  
        
						function test_input($data) {
                $data = trim($data);
  				      $data = stripslashes($data);
  				      $data = htmlspecialchars($data);
  				      return $data;
			     }

      session_start();
                    $person = $_SESSION['email'];
			   if(isset($_SESSION['loggedin'])){
                if ($_SERVER["REQUEST_METHOD"] == "POST") {
                    if(isset($_POST['submitbtn'])){
                        $item_title  =   test_input($_POST["item_title"]);
                        $category    =   test_input($_POST['item_category']);
                        $description =   test_input($_POST['item_description']);
                        $seller_name =   test_input($_POST['seller_name']);
                        $seller_roll =   test_input($_POST['seller_roll']);
                        $address     =   test_input($_POST['address']);
                        $contact     =   test_input($_POST['contact']);
                        $tags        =   test_input($_POST['tag']);
                        $service     =   test_input($_POST['type_of_service']);
                    } else { echo "fuck";
                        header("location:to_post.php");
                        exit();
                    }
                }
         }  else{
                    header("location:helplogin.php");
                    exit();
         }
        // echo "'".$tags."'";
          $tags_break =  explode(",",$tags);
          $tag1 =$tags_break[0];
          $tag2 =$tags_break[1];
          $tag3 = $tags_break[2];


          // echo $tag1;
          // echo "    ";
          // echo $tag2;
          // echo "    ";
          // echo $tag3 ;

        
        $date_available_from = $date_available_upto = $price = "";
        //echo $item_title; echo $category; echo $description ; echo $seller_name ; echo $seller_roll; echo  $address; echo $contact;  echo  $tags; 
      //  echo $service;
        
       /*    if(!strcmp($service, "sell")){
                 $price  =   test_input($_POST['price']);
           } else if(!strcmp($service, "lend")){
                 $date_available_from = test_input($_POST['date_available_from']);
                 $date_available_upto = test_input($_POST['date_available_upto']);
                 $price   =  test_input($_POST['lend_price']);
                 
           } else if(!strcmp($service, "share")){
                $persons =  test_input($_POST['persons_sharing']);
                $price   =  test_input($_POST['original_price']);
           }
        

    
       /* echo $item_title ; echo $category ; echo $description ; echo $seller_name; echo $seller_roll;*/
            $pass = 0;    
        if(isset($_POST['submitbtn'])){
            $result = mysqli_query($db, "SELECT MAX(id) FROM $service");
            $row = mysqli_fetch_array($result);
            $highest_id =  $row[0]+1;
        }
 
        
    if(isset($_POST["submitbtn"]) && isset($_FILES['fileToUpload']) && isset($_FILES['fileToUploadTwo']) && isset($_FILES['fileToUploadThr']) &&                    isset($_FILES['fileToUploadFour']))
            {
                $target_dir = "uploads/" . $service . "/";
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
            if(!strcmp($service, "object") && $pass){
                 $price  =   test_input($_POST['price']);
                    $sql =   "INSERT INTO object(`title`,`description`,`category`,`tag1`, `tag2`, `tag3`, `price`, `available` ,`owner`, `owner_contact`,             `pickup_location`,  `image1_src`, `image2_src`, `image3_src`,`image4_src`, `user`)
                               VALUES('$item_title','$description','$category','$tag1','$tag2','$tag3','$price', 1, '$seller_name','$contact', '$address','$target_file1', '$target_file2', '$target_file3','$target_file4','$person')";
                                    if ($db->query($sql) === TRUE) {
                                        echo "dataCreated sucesssfully";
                                        header("location:myuploads.php");
                                    } else {
                                        echo "Error creating table: " . $db->error;
                                        header("location:to_post.php");
                                        // exit();
                                }

                
                 
           } else if(!strcmp($service, "lend")){
                 $date_available_from = test_input($_POST['date_available_from']);
                 $date_available_upto = test_input($_POST['date_available_upto']);
                 $price   =  test_input($_POST['lend_price']);
                 $sql =  "INSERT INTO lend(`title`,`description`,`category`,`tag1`, `tag2`, `tag3`, `price`, `available` ,`owner`, `owner_contact`,               `pickup_location`,  `image1_src`, `image2_src`, `image3_src`,`image4_src`, `user`,`date_available_from`,`date_available_upto`)
                            VALUES('$item_title','$description','$category','$tag1','$tag2','$tag3','$price', 1, '$seller_name','$contact', '$address','$target_file1', '$target_file2','$target_file3','$target_file4','$person',
                            '$date_available_from','$date_available_upto')";
                                    if ($db->query($sql) === TRUE) {
                                        echo "dataCreated sucesssfully";
                                        header("location:your_orders.php");
                                      
                                    } else {
                                        echo "Error creating table: " . $db->error;
                                        // header("location:to_post.php");
                                        // exit();
                                    }
                
                 
           } else if(!strcmp($service, "share")){
                $persons =  test_input($_POST['persons_sharing']);
                $price   =  test_input($_POST['original_price']);
                $sql =  "INSERT INTO share(`title`,`description`,`category`,`tag1` ,`tag2`, `tag3`, `price`, `available` ,`owner`, `owner_contact`,               `pickup_location`,  `image1_src`, `image2_src`, `image3_src`,`image4_src`, `user`, `persons`)
                        VALUES('$item_title','$description','$category','$tag1','$tag2','$tag3','$price', 1, '$seller_name','$contact', '$address','$target_file1', '$target_file2','$target_file3','$target_file4','$person','$persons')";
                                    if ($db->query($sql) === TRUE) {
                                        echo "dataCreated sucesssfully";
                                        header("location:your_orders.php");
                                        
                                    } else {
                                        echo "Error creating table: " . $db->error;
                                        // header("location:to_post.php");
                                        // exit();
                                    }        
           }

         
        
   /*     if($pass) {
                    $sql =  "INSERT INTO product(`title`,`description`,`category`,`tags`, `image1_src`, `image2_src`, `image3_src`,`image4_src`)
                            VALUES('$item_title','$description','$category','$tags', '$target_file1', '$target_file2', '$target_file3','$target_file4')";
            if ($db->query($sql) === TRUE) {
                           echo "dataCreated sucesssfully";
                            
                        } else {
                echo "Error creating table: " . $db->error;
                           // header("location:to_post.php");
                           // exit();
        }               }

/*$p = mysqli_insert_id($db 
           //echo $p;
           $target_file1 =  $p . $target_file1;
           $target_file2 =  $p . $target_file2;
           $target_file3 =  $p . $target_file3;
           $target_file4 =  $p . $target_file4;*/

     /*   if($pass){
                 $sql1 = "UPDATE product SET image1_src='$target_file1', image2_src='$target_file2' ,image3_src='$target_file3' ,
                            image4_src='$target_file4'   WHERE itemID= '$highest_id' ";

                            if ($db->query($sql1) === TRUE) {
                                   // echo "Record updated successfully";
                            } else {
                               // echo "Error updating record: " . $db->error;

                                   header("location:to_post.php");
                                    exit();
             /                 }
        }
*/

			?>
                
      <!--img src="/*php echo  $target_file1; ?>"/> 
        <img src="<php echo $target_file2; ?>"/>
        <img src="<php echo $target_file3; ?>"/>
        <img src="<php echo $target_file4; ?>"/-->
        
	</body>
</html>

			
  