<!DOCTYPE HTML>
	<html>
		<head>
			<title>BSLS</title>
      <link type="text/css" href="main2.css" rel="stylesheet">
      <link type="text/css" href="main.css" rel="stylesheet">
			<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">

		</head>
		
		<body>
        <?php
        				include 'config.php';
                        session_start();
                        if($_SESSION['loggedin'] == true){  }
                            else{ header('location:home.html'); }
        $item_id = $_GET['id'];
         $sql = "SELECT * FROM share WHERE id = $item_id";
         $result = mysqli_query($db,$sql);
        if (($row = mysqli_fetch_array($result,MYSQLI_ASSOC))) {
        			$item_id = $row['id'];
                    $item_title = $row['title'];
                    $item_category = $row['category'];
                    $price    = $row['price'];//   = $row["price"]
                    $owner_name = $row['owner'];//$row['name'];
                    $owner_contact = $row['owner_contact']; //$row['contact_no'];
                    $owner_add    =  "room 006, G2" ;// $row['address'];
                    $pickup_location = $row['pickup_location'];// $row['pickup_location'];
                    $description =   $row['description'];
                    $image1 = $row['image1_src'];
                    $image2 = $row['image2_src'];
                    $image3 = $row['image3_src'];
                    $image4 = $row['image4_src'];
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
                <div id="logo_name" style="display:inline-block;"><h1>BSLS</h1></div>
                <div id="top_div_in_header" style="display:inline-block;">
                    <div id="search_bar" style="display:inline;">
                        <form id="search_form" style="display:inline;" action="search.php" method="GET">
                            <input id="search_box" type="search" name="tag" required placeholder="Type and press enter" >
                            <input type="submit" value="search" id="search_button"/>
                        </form>
                    </div>
                    <div id='login_slider'>
                            <div id="order_account">
                                <p><a href="myuploads.php">Your Account</a></p>
                                <p><a href="myorders.php">Your Orders</a></p>
<p><a href="to_post.php">Upload item</a></p>                            </div>
                                <div id="login_button"><a href="logout.php">Log out</a></div>
                                <div id="new_user"><a href="registration.php">New User?</a></div>
                    </div>
                    <div id="login_signup" style="display:inline-block;">
                    <a href="checkout.php" style="display: inline-block;">
                        <div id="cart_button" style="display:inline-block;" class="signin">
                            <span class="cart">Cart</span>
                            <i class="fa fa-shopping-cart" aria-hidden="false"></i>
                        </div>
                    </a>
                        <div id="sign_in" style="display:inline-block;" class="signin">
                            <span id="sign_in"><?php 
                                    $email=$_SESSION['email'];
                                    $emailsql="SELECT username FROM user WHERE email = '$email' ";
                                    $emailresult=mysqli_query($db,$emailsql);
                                    $emailrow = mysqli_fetch_array($emailresult,MYSQLI_ASSOC);
                                    echo $emailrow['username'];
                            ?></span>
                            <span style="padding:10px; border-radius:90%; background-color:#80071F; text-allign:center;">
                                <i class="fa fa-user" aria-hidden="true"></i>
                            </span>
                        </div>
                    </div>
                </div>
            <div id="navbar">
                <ul>
                    <li><div class="nav_divs"><a href="http://10.8.16.11/Project/Version5/index.php">Home</a></div></li>
                    <li><div class="nav_divs"><a href="http://10.8.16.11/Project/Version5/sharing/index.php">Share</a></div></li>
                    <li><div class="nav_divs"><a href="">Auction</a></div></li>
                    <!-- <li><div class="nav_divs"><a href="">Services</a></div></li> -->
                </ul>
            </div>
            </div>
        </header>
        
        <div id="body_container_of_selected_item" >
                  <div id="list" style="display:inline-block;">
                    <ul  style="display:inline-block;">
                        <li><img src="<?php echo $image1; ?>"/></li>
                        <li id="image2" onmouseover="show_image2();" onmouseout="hide_image();"><img src="<?php echo $image2; ?>"/></li>
                        <li id="image3" onmouseover="show_image3();" onmouseout="hide_image();"><img src="<?php echo $image3; ?>"/></li>
                        <li id="image4" onmouseover="show_image4();" onmouseout="hide_image();"><img src="<?php echo $image4; ?>"/></li>
                    </ul>
                  </div>
                <div id="selected_image_show" style="display:inline-block;">
                    <img  id="image_main" src="<?php echo $image1;?>"/>
                </div>
            <div id="right_info_containing_div" style="display:inline-block";>
                <div id="product_title" style="padding:20px; padding-left:0px;">
                    <h1 style="margin:0px;"><?php echo $item_title;?></h1>
                </div>
                <div id="prices_offers" style="padding:20px; padding-left:0px;">
                    <p style="margin:0px; font-size:24px;">
                        <i style="margin-right:10px;" class="fa fa-inr" aria-hidden="true"></i><?php echo $price; ?>
                        Price At buying Time
                    </p>  
                </div>
                <div id="category" style="padding:20px; padding-left:0px;"><?php echo $item_category;?></div>
                <div id="owner_info" style="padding:20px; width:50%; border:solid red 1px;">
                    <span >Owner<pre style="display:inline;" >       </pre><?php echo $owner_name;?></span><br>
                    <span>Contact<pre style="display:inline;" >      </pre><?php echo $owner_contact ;?></span><br>
                    <span>Location<pre style="display:inline;" >     </pre><?php echo $owner_add;?></span><br>
                    <?php 
                    $sql="SELECT userid FROM user WHERE email = '".$_SESSION['email']."'";
                        $result = mysqli_query($db,$sql);
                        $row = mysqli_fetch_array($result);
                        $usrid= intval($row['userid']);


                        $sql="SELECT * FROM proposals WHERE user_id = $usrid AND item_id = ".$item_id;
// echo "   query is    ".$sql;
                        $result = mysqli_query($db,$sql);
                        if($row = mysqli_fetch_array($result,MYSQLI_ASSOC))
                        {
                        	$intstatus = intval($row['status']);
                        	if($intstatus==0)
                        	{
                        		$approvalstatus = "waiting for approval";
                        	}
                        	elseif ($intstatus==1) {
                        		$approvalstatus = "Congratulatipons!Approved";
                     		}
                     		elseif ($intstatus==2) {
                     			$approvalstatus = "Sorry ! denied";
                     		}
                            echo "<button type=button onclick=\"drop_item('".$item_id."','".$_SESSION['email']."')\" >You have requested for this</button>";
                            echo "<span >Status<pre style=\"display:inline;\" >       </pre>".$approvalstatus."</span><br>";
                        }
                        else
                        {?>

                    		<button type=button onclick="contribute(<?php echo "'".$item_id."','".$_SESSION['email']."'"; ?>)" >I want to contribute</button> 
                     <?php   }

                         ?>
                    <!-- <button type=button onclick="contribute(<?php echo "'".$row['id']."','".$_SESSION['email']."'"; ?>)" >I want to contribute</button>  -->
                    <!-- <button type=button onclick="buy(<?php echo "'".$row['id']."','".$_SESSION['email']."'"; ?>)" >Buy</button>  -->
                    <div id="txtHint"><b><!-- Person info will be listed here... --></b></div>
                </div>
                <div id="pickup_location" style="padding:20px; padding-left:0px;"><span>Pickup Location - <?php echo $pickup_location; ?></span></div>
                <div id="specification" style="width:70%;"><h2 style="margin:0px;">Description</h2> <p><?php echo $description; ?></p></div>
                
                <div id="Additional_info"></div>
            </div>
        </div>


        <script>
             $(document).ready(function()
          {
                $("#sign_in").click(function()
                {
                    $("#login_slider").toggle("slow");
                });              
          });

        function contribute(objid,usrid) {
            // window.location = "home.php" ;
                // document.getElementById("txtHint"+   objid).innerHTML = objid+" "+usrid;
                if (objid == 0) 
                {
                    document.getElementById("txtHint").innerHTML = " udfishfiuuhfiuhf";
                    return;
                } 
                else 
                { 
                    if (window.XMLHttpRequest) {
                        // code for IE7+, Firefox, Chrome, Opera, Safari
                        xmlhttp = new XMLHttpRequest();
                    } 
                    else 
                    {
                        // code for IE6, IE5
                        xmlhttp = new ActiveXshare("Microsoft.XMLHTTP");
                    }
                    xmlhttp.onreadystatechange = function() 
                    {
                        if (this.readyState == 4 && this.status == 200) 
                        {
                            document.getElementById("txtHint").innerHTML =this.responseText;
                        }
                    };
                    xmlhttp.open("GET","contribute.php?userid="+usrid+"&shareid="+objid,true);
                    xmlhttp.send();
                }
            }
            function drop_item(objid,usrid) {
            // window.location = "home.php" ;
                // document.getElementById("txtHint"+   objid).innerHTML = objid+" "+usrid;
                if (objid == 0) 
                {
                    document.getElementById("txtHint").innerHTML = " udfishfiuuhfiuhf";
                    return;
                } 
                else 
                { 
                    if (window.XMLHttpRequest) {
                        // code for IE7+, Firefox, Chrome, Opera, Safari
                        xmlhttp = new XMLHttpRequest();
                    } 
                    else 
                    {
                        // code for IE6, IE5
                        xmlhttp = new ActiveXshare("Microsoft.XMLHTTP");
                    }
                    xmlhttp.onreadystatechange = function() 
                    {
                        if (this.readyState == 4 && this.status == 200) 
                        {
                            document.getElementById("txtHint").innerHTML =this.responseText;
                        }
                    };
                    xmlhttp.open("GET","drop_item.php?userid="+usrid+"&shareid="+objid,true);
                    xmlhttp.send();
                }
            }


            // function buy(objid,usrid)
            // {
            //     add_cart(objid,usrid);
            //     window.location = "checkout.php"
            // }
</script>

        
        <script type="text/javascript">
        function show_image2(){
            document.getElementById('image_main').src = "<?php echo $image2; ?>";
        }
        
        function show_image3(){
            document.getElementById('image_main').src = "<?php echo $image3; ?>";
        }
        function show_image4(){
            document.getElementById('image_main').src = "<?php echo $image4; ?>";
        }

        function hide_image(){
             document.getElementById('image_main').src = "<?php echo $image1; ?>";
        }
        </script>
      </body>
</html>
        
