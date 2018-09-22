<!DOCTYPE HTML>

<?php
    include 'session.php';
    include 'status.php';
    // session_start();

    if(isset($_POST["itemId"]) && isset($_POST["mybid"]))
    {

        $currentuser = $_SESSION['email'];   

    $itemId1 = $_POST["itemId"];
    $bidprice = $_POST["mybid"];
    $bidprice = (int)$bidprice;
    $currentprice= "";
    $status1="";
    $query1 = "select * from auction where itemId = '".$itemId1."' ";

        $sql = mysqli_query($link, $query1);

        if (mysqli_query($link, $query1)) 
        {
            while ($row2 = mysqli_fetch_assoc($sql)) 
            {
                $currentprice = $row2["cprice"];
                $currentprice = (int)$currentprice;
                $status1 = $row2["status"];
                //echo "Hello...";

            }
        }

        if($currentprice+10 <= ($bidprice) && $status1 == 2)
        {
            $q1 = "UPDATE auction SET cprice = '".$bidprice."', bidder = '".$currentuser."' WHERE itemId = '".$itemId1."' ";
            mysqli_query($link, $q1);
            //echo "Successfull! <br><br>";
        }

        else
        { ?>
            <div id="top_div" style="display: inline;">Faild! Insufficient bid amount.</div> <?php
        }
    }


    

    $itemId = "";

    if( isset($_GET["itemId"]) && !isset($_POST["mybid"]) )
    {
        //echo "Welcome ". $_GET['name']. "<br />";
        //echo "You are ". $_GET['age']. " years old.";
        //exit();
        $itemId = $_GET["itemId"];


    }
    else
    {
        header("Location: home.php");
        exit;
    }


?>



	<html>
		<head>
			<title>BSLS</title>
      <link type="text/css" href="main2h.css" rel="stylesheet">
      <link type="text/css" href="main2.css" rel="stylesheet">
      <link type="text/css" href="main1.css" rel="stylesheet">


			<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">

      


		</head>
		
		<body style="padding-bottom: 6em">
        <?php

        include 'status.php';
        				$con = mysqli_connect("localhost","root","","bsls");
					if (mysqli_connect_errno()){	echo "Failed to connect to MySQL: " . mysqli_connect_error();} else{  /*echo *"connected successfully"*/}
            //$itemId = $_POST["itemId"];
         $sql = "SELECT * FROM auction WHERE itemId = '".$itemId."' ";
         $result = $con->query($sql);
         $currentuser = 5;
        if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    //$itemId = $row["itemId"];
                    $item_title = $row['item'];
                    $item_category = $row['category'];
                    $bprice = $row["bprice"];
                    $cprice = $row["cprice"];
                    $bnprice = $row["bnprice"];
                    $owner_id = $row['user'];
                    //$owner_contact = "9462304350"; //$row['contact_no'];
                    //$owner_add    =  "room 006, G2" ;// $row['address'];
                    //$pickup_location = "room 006, G2";// $row['pickup_location'];
                    $description =   $row['description'];
                    $image1 = $row['imagesrc'];
                    $image2 = $row['imagesrc1'];
                    $image3 = $row['imagesrc2'];
                    $image4 = $row['imagesrc3'];
                    $end = $row['end'];
                    $start = $row['start'];
                    $bidderid = $row['bidder'];
                    $status = $row['status'];
                       
                }
        }

        $owner_name = "hbgfb" ;
            $bidder = "hgnhjm";

         $q = "select username from user where userid = '".$owner_id."'";
             $s = mysqli_query($link, $q);
             if (mysqli_query($link, $q)) 
            {
                while ($row1 = mysqli_fetch_assoc($s))
                {
                    $owner_name = $row1["username"];
                }
            }


            $q = "select username from user where userid = '".$bidderid."'";
             $s = mysqli_query($link, $q);
             if (mysqli_query($link, $q)) 
            {
                while ($row1 = mysqli_fetch_assoc($s))
                {
                    $bidder = $row1["username"];
                }
            }
         
/*$arr = preg_split('/(?<=[0-9])(?=[a-z]+)/i',$image1);                                                      
        $coun = count($arr);
        
       echo $arr[0];
        echo $arr[1];
        echo $arr[2];*
        
        echo count($arr);*/
        ?>
			<!--button onclick="login();" id="show_login">Log In</button-->
        <header style="">
            
            <div id="top_div" style="">  
                <div id="logo_name" style="display:inline-block;"><h1>BSLSA</h1></div>
                <div id="top_div_in_header" style="display:inline-block;">
                    <div id="search_bar" style="display:inline">
                        <form id="search_form" style="display:inline;">
                            <input id="search_box" type="search" required placeholder="Type and press enter">
                            <input type="submit" value="Search" id="search_button"/>
                        </form>
                    </div>
                    <div id="login_signup" style="display:inline-block;">
                    <a href="../version5/to_post.php">
                        <div id="cart_button" style="display:inline-block;" class="signin" >
                            <span class="cart1">Add Auction</span>
                            <!--i class="fa fa-shopping-cart" aria-hidden="false"></i-->
                        </div>
                    </a>
                        <div id="sign_in" style="display:inline-block;" onmoushover="show_for_login();" onmouseout="hide_slider();" class="signin">
                            <?php 
                                include 'status.php';
                                        
                                        // if($_SESSION['loggedin'] == true){ echo "hoomanlovescat@gmail"; }
                                        //     else{ header('location:home.html'); }
                            ?>
                            <span style="padding:10px; border-radius:90%; background-color:#80071F; text-allign:center;">
                                <i class="fa fa-user" aria-hidden="true"></i>
                            </span>
                        </div>
                    </div>
                </div>
            <div id="navbar">
                <ul>
                    <li><div class="nav_divs"><a href="../">home</a></div></li>
                    <li><div class="nav_divs"><a href="">Share</a></div></li>
                    <li><div class="nav_divs"><a href="home.php">Auction</a></div></li>
                    <!-- <li><div class="nav_divs"><a href="">Services</a></div></li> -->
                </ul>
            </div>
            </div>
            </div>
        </header>
        
        <div id="body_container_of_selected_item" >
                  <div id="list" style="display:inline-block;">
                    <ul  style="display:inline-block;">
                        <li><img src="../version5/<?php echo $image1; ?>"/></li>
                        <?php
                        if(! is_null($image2))
                        {?>

                        <li id="image2" onmouseover="show_image2();" onmouseout="hide_image();"><img src="../version5/<?php echo $image2; ?>"/></li>
                        <?php }
                        else
                        {
                            ?>
                            <li id="image2" onmouseover="show_image0();" onmouseout="hide_image();"><img src="../version5/uploads/auction/0.png"/></li> <?php
                        } ?>

                        <?php
                        if(! is_null($image3))
                        {?>
                        <li id="image3" onmouseover="show_image3();" onmouseout="hide_image();"><img src="../version5/<?php echo $image3; ?>"/></li>
                        <?php } 

                         else
                        {
                            ?>
                            <li id="image3" onmouseover="show_image0();" onmouseout="hide_image();"><img src="../version5/uploads/auction/0.png"/></li> <?php
                        } ?>

                        

                        <?php
                        if(! is_null($image4))
                        {?>
                        <li id="image4" onmouseover="show_image4();" onmouseout="hide_image();"><img src="../version5/<?php echo $image4; ?>"/></li>
                        <?php } 

                        else
                        {
                            ?>
                            <li id="image4" onmouseover="show_image0();" onmouseout="hide_image();"><img src="../version5/uploads/auction/0.png"/></li> <?php
                        } 

                        ?>
                    </ul>
                  </div>
                <div id="selected_image_show" style="display:inline-block;">
                    <img  id="image_main" src="../version5/<?php echo $image1;?>"/>
                </div>
            <div id="right_info_containing_div" style="display:inline-block; margin:bottom;">
                <div id="product_title" style="padding:20px; padding-left:0px;">
                    <h1 style="margin:0px;"><?php echo $item_title;?></h1>
                </div>
                <div id="prices_offers" style="padding:20px; padding-left:0px;">
                    <p style="margin:0px; font-size:24px;">
                        Base Price: <i style="margin-right:10px;" class="fa fa-inr" aria-hidden="true"></i><?php echo $bprice; ?>
                        
                    </p>  
                </div>

                <div id="prices_offers" style="padding:20px; padding-left:0px;">
                    <p style="margin:0px; font-size:24px;">
                        Current Price: <i style="margin-right:10px;" class="fa fa-inr" aria-hidden="true"></i><?php echo $cprice; ?>
                        
                    </p>  
                </div>

                <div id="prices_offers" style="padding:20px; padding-left:0px;">
                    <p style="margin:0px; font-size:24px;">
                        Buy Now Price: <i style="margin-right:10px;" class="fa fa-inr" aria-hidden="true"></i><?php echo $bnprice; ?>
                        
                    </p>  
                </div>
                <div id="category" style="padding:20px; padding-left:0px;"><?php echo $item_category;?></div>
                <div id="owner_info" style="padding:20px; width:55%; border:solid red 1px;">
                    <span >Owner<pre style="display:inline;" >       </pre><?php echo $owner_name; ?></span><br>
                    <!--span>Contact<pre style="display:inline;" >      </pre><?php echo $owner_contact ;?></span><br>
                    <span>Location<pre style="display:inline;" >     </pre><?php echo $owner_add;?></span><br-->
                    <span style="color: #b79d64">Last Bid by: <pre style="display:inline;" >  </pre><?php echo $bidder; ?></span><br>

                    
                </div>
                <!--div id="pickup_location" style="padding:20px; padding-left:0px;"><span>Pickup Location - <?php echo $pickup_location; ?></span></div-->

                <?php
                if($status == 2) { ?>
                <div><h2>Time Remaining:</h2><h2 id="ctdown" style="color: #b22a77"> </h2></div><?php } 

                elseif ($status == 1) { ?>

                <div><h2 style="color: red">Expired!</h2></div>     
                    
                <?php }

                elseif($status == 0) {?>

                <div><h2 style="color: grey">Sold!</h2></div>

                <?php
            }
                ?>
                <div id="specification" style="width:70%;"><h2 style="margin:0px;">Description</h2> <p><?php echo $description; ?></p></div>
                <div id="Additional_info"></div> 

                <?php if($status == 2) { ?>
                <form  action="view.php" method="POST" style="display: inline-block;">
                <span id="itemid" style="display:none;"><input type="text" name="itemId" value = <?php echo $itemId; ?>  ID="txtCategory"></span>
                <span id="itemid" style="display:none;"><input type="text" name="user" value = <?php echo $currentuser; ?>  ID="txtCategory"></span>
                <input type="number" name="mybid" size=10 id="search_box" placeholder="Yout bid?"  style="width: 100px" >
                <input type="submit" name="place" value="Place" id="submit_button" style="background: #42895c">

                

            </form>

            <!--form method="POST" action="checkout.php" style="display: inline-block;">
                <span id="itemid" style="display:none;"><input type="text" name="itemId" value = <?php echo $itemId; ?>  ID="txtCategory"></span>
                <span id="itemid" style="display:none;"><input type="text" name="user" value = <?php echo $currentuser; ?>  ID="txtCategory"></span>
                <input type="submit" name="buynow" value="Buy Now!" id="submit_button">
            </form-->

            <a href="checkout.php?itemId=<?php echo $itemId ?>"><button id="submit_button">Buy Now!</button> </a>

            <?php } ?>
            </div>
        </div>
        <br>
        
        <script type="text/javascript">

            $(document).ready(function()
          {
                $("#sign_in").click(function()
                {
                    $("#login_slider").toggle("slow");
                });              
          });

        function show_image2(){
            document.getElementById('image_main').src = "../version5/<?php echo $image2; ?>";
        }
        
        function show_image3(){
            document.getElementById('image_main').src = "../version5/<?php echo $image3; ?>";
        }
        function show_image4(){
            document.getElementById('image_main').src = "../version5/<?php echo $image4; ?>";
        }

        function show_image0(){
            document.getElementById('image_main').src = "../version5/uploads/auction/0.png";
        }

        function hide_image(){
             document.getElementById('image_main').src = "../version5/<?php echo $image1; ?>";
        }
        </script>

        <script>
          
          function sqlToJsDate(sqlDate){
            //sqlDate in SQL DATETIME format ("yyyy-mm-dd hh:mm:ss.ms")

            
            var sqlDateArr1 = sqlDate.split("-");
            //format of sqlDateArr1[] = ['yyyy','mm','dd hh:mm:ms']
            var sYear = sqlDateArr1[0];
            var sMonth = (Number(sqlDateArr1[1]) - 1).toString();
            var sqlDateArr2 = sqlDateArr1[2].split(" ");
            //format of sqlDateArr2[] = ['dd', 'hh:mm:ss.ms']
            var sDay = sqlDateArr2[0];
            var sqlDateArr3 = sqlDateArr2[1].split(":");
            //format of sqlDateArr3[] = ['hh','mm','ss.ms']
            var sHour = sqlDateArr3[0];
            var sMinute = sqlDateArr3[1];
            var sqlDateArr4 = sqlDateArr3[2].split(".");
            //format of sqlDateArr4[] = ['ss','ms']
            var sSecond = sqlDateArr3[2];
            var sMillisecond = /*sqlDateArr4[1]*/"0";

            //document.getElementById(<?php echo $row["itemId"]; ?>).innerHTML ="pifogng"+sqlDate;
            
            return [sYear,sMonth,sDay,sHour,sMinute,sSecond,sMillisecond];
        }

            endt = '<?php echo $end ?>';
        
         var dateggg = sqlToJsDate(endt) ;
         var dt = new Date(dateggg[0], dateggg[1], dateggg[2], dateggg[3], dateggg[4], dateggg[5], dateggg[6]).getTime();
          //document.getElementById("ctdown").innerHTML ="pifogng"+dt;


          // Set the date we're counting down to
        
        //var countDownDate = new Date(dt).getTime();

        // Update the count down every 1 second
        var x = setInterval(function() {

            // Get todays date and time
            var now = new Date().getTime();
            
            // Find the distance between now an the count down date
            var distance = /*countDownDatedt -*/dt- now;
            
            // Time calculations for days, hours, minutes and seconds
            var days = Math.floor(distance / (1000 * 60 * 60 * 24));
            var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
            var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
            var seconds = Math.floor((distance % (1000 * 60)) / 1000);
            
            // Output the result in an element with id="demo"
            document.getElementById("ctdown").innerHTML = days + "d " + hours + "h "
            + minutes + "m " + seconds + "s ";
            
            // If the count down is over, write some text 
            if (distance < 0) {
                clearInterval(x);
                document.getElementById("ctdown").innerHTML = "EXPIRED";
            }
        }, 1000);

    

      </script>
      </body>
</html>
        
