	
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
<title>Checkout</title>
<head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<!-- <link rel="stylesheet"  href="search.css"> -->
	<link rel="stylesheet"  href="main.css">
	<link rel="stylesheet" href="w3.css">
	<link rel="shortcut icon" href="favicon.ico" />
</head>
<?php 					include('config.php');
						session_start();
			     		if($_SESSION['loggedin'] == true){ /*echo $_SESSION['email'];*/ }
						 	else{ header('location:home.html'); } ?>
<body>
 <header>
            <div id="top_div" style="">  
                <div id="logo_name" style="display:inline-block;"><h1><a href="index.php">BSLS</a></h1></div>
                <div id="top_div_in_header" style="display:inline-block;">
                    <div id="search_bar" style="display:inline;">
                        <form id="search_form" style="display:inline;" action="search.php" method="GET">
                            <input id="search_box" type="search" name="tag" required placeholder="Type and press enter">
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
                        <div id="cart_button" style="display:inline-block;" class="signin" >
                            <span class="cart">Cart</span>
                            <i class="fa fa-shopping-cart" aria-hidden="false"></i>
                        </div>
                    </a>
                        <div id="sign_in" style="display:inline-block;"      style="display: inline-block;" class="signin">
							<?php 
                                    $email=$_SESSION['email'];
                                    $emailsql="SELECT username FROM user WHERE email = '$email' ";
                                    $emailresult=mysqli_query($db,$emailsql);
                                    $emailrow = mysqli_fetch_array($emailresult,MYSQLI_ASSOC);
                                    echo $emailrow['username'];
                            ?>                            <span style="padding:10px; border-radius:90%; background-color:#80071F; text-allign:center;">
                                <i class="fa fa-user" aria-hidden="true" style="display: inline;"></i>
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





<!-- <div class="header">
	<div>
	<div id=search_bar>
		<table>
		<tr>
			<td><a href="myorders.php"><button>myorders</button></a></td>
			<td><a href="home.php"><button>home</button></a></td>
			<td> tag:</td>
	       	<td>	<input type = "text" id="tag"  /></td>
	        <td> <button type=button onclick="search()" >GO</button></td>
	        </tr>
	    </table>    <input  type="submit" name="submit" value="GO" onclick="search()"> 
	</div>
	</div>
</div>
	 <div id="top_container">
					<table>
					<tbody>
						<tr>
							<td>
								<div id="selling">
				  				<a id="To_sell_item" href="to_post.php">Submit Item</a>
								</div>
							</td>
							<td>
								<div id="logout">
									<a href="logout.php">Log Out</a>						
								</div>
							</td>
						</tr>
					</tbody>
					</table>	
	<div id="main_container">
				Welcome : <?php session_start();
			     		if($_SESSION['loggedin'] == true){ echo $_SESSION['email']; }
						 	else{ header('location:home.html'); }
			?> 
	</div>
</div>
 -->

<?php

// connect to the database
//searching starts from here


$useremail= $_SESSION['email'];
$sql="SELECT userid FROM user WHERE email = \"$useremail\"";
	$result = mysqli_query($db,$sql);
	if(!$result)
{
	echo "kuch nahi mila";
}
	$row = mysqli_fetch_array($result);
	$usrid= intval($row['userid']);
	

$sql="SELECT share.id, share.price, share.title, share.description,share.user,share.owner,share.available,share.image1_src FROM share INNER JOIN proposals on share.id=proposals.item_id and proposals.user_id = $usrid";
// echo $sql;
$result = mysqli_query($db,$sql);

// $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
if(!$row)
{
	echo "saari mehnat pani me";
}
	$count = 0;
	$bill =0;
	echo "<div id=\"container_feed_items_in_search\">";

	while( $row = mysqli_fetch_array($result,MYSQLI_ASSOC)) 
	{ 	
		$count+=1;
		// echo "mazza aa gaya";
	
		if($row['available'])
			{
				$bill+= intval($row['price']);
				?>

				
				<div  class="item_divs_for_feed_in_search" >
					<div class="liked_divs_feed">
								<i class="fa fa-heart-o" aria-hidden="true"></i>
							</div>
						<div class="imgcontainer">
						<a href="view.php?id=<?php echo $row['id'];?>">	
				   			 <img src=<?php echo $row['image1_src']?> alt="Avatar" class="avatar">
				   		</a>
						</div>
						<div class="container">
							<ul>
							<input type="hidden" name="id" value="<?php /*echo $id;*/ ?>"/>
							<li><strong>Title:</strong> <?php echo $row['title']; ?>
							<li><strong>Owner: </strong> <?php echo $row['owner'] ?><br/>
							<li><strong>price:</strong> <?php echo $row['price'] ?><br/>
							 <?php 
				                    $sql="SELECT userid FROM user WHERE email = '".$_SESSION['email']."'";
				                        $result = mysqli_query($db,$sql);
				                        $newrow = mysqli_fetch_array($result);
				                        $usrid= intval($newrow['userid']);


				                        $sql="SELECT * FROM proposals WHERE user_id = $usrid AND item_id = ".$row['id'];
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
				                            
				                            echo "<li><strong>Status:</strong>".$approvalstatus."<br /></li>";
				                        } 
				                    ?>
							<!-- <li><strong>Description:</strong> <?php echo $row['description'] ?><br/> -->
							<!-- <button style="width: 80%;" type=button onclick="drop_cart(<?php echo "'".$row['id']."','".$_SESSION['email']."'"; ?>)" >remove from cart</button> -->
							<div id="txtHint<?php echo $row['id']; ?>"><b><!-- Person info will be listed here... --></b></div>
							</ul>
						</div> 
				</div>
				</td>
	<?php  
			}
			else $count-=1; //if (available end)
	}//while ends ?>

	</div>
	<?php if($count!=0) 
	{ ?>
	<!-- <div>
		<button type=button style="width: 15%; position: relative; " onclick="checkout(<?php echo "'".$usrid."',".$count ?>)" >checkout</button>
	<div> -->
	<?php 
	}
	else{
		echo "You have contributed in none";
		echo "<a href=\"home.php\"><button type=button  >Go shopping</button></a>";
		} ?>
	<div id="txtHint"><b><!-- Person info will be listed here... --></b></div>
	<script type="text/javascript">
	 	$(document).ready(function()
          {
                $("#sign_in").click(function()
                {
                    $("#login_slider").toggle("slow");
                });              
          });

		function drop_cart(objid,usrid) {
			// window.location = "home.php" ;
			    // document.getElementById("txtHint"+	objid).innerHTML = objid+" "+usrid;
			    if (objid == 0) 
			    {
			        document.getElementById("txtHint"+objid).innerHTML = " udfishfiuuhfiuhf";
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
			            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
			        }
			        xmlhttp.onreadystatechange = function() 
			        {
			            if (this.readyState == 4 && this.status == 200) 
			            {
			                document.getElementById("txtHint"+objid).innerHTML =this.responseText;
			            }
			        };
			        xmlhttp.open("GET","drop_cart.php?userid="+usrid+"&objectid="+objid,true);
			        xmlhttp.send();  
			    }
			     location.reload();
			}

			function search()
			{
				var str1 = document.getElementById("tag").value;
				var str2 = "search.php?tag=";
				str2 += str1;
				// var res = str2.concat(str1);
				// document.getElementByName("help").innerHTML = res;
				window.location = str2 ;
			}

			function checkout(usrid,count) 
			{
			// window.location = "home.php" ;
			    // document.getElementById("txtHint"+	objid).innerHTML = objid+" "+usrid;
			    if(count)
			    {
			    	if (usrid == 0) 
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
				            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
				        }
				        xmlhttp.onreadystatechange = function() 
				        {
				            if (this.readyState == 4 && this.status == 200) 
				            {
				                document.getElementById("txtHint").innerHTML =this.responseText;
				            }
				        };
				        xmlhttp.open("GET","order.php?userid="+usrid,true);
				        xmlhttp.send();  
				    }
			     window.location = "myorders.php";
			    }
			    else
			    {
			    	document.getElementById("txtHint").innerHTML = " No item in your cart";
			    }
			}

	</script>

<!-- <p> Your total bill is <?php echo $bill;?> -->
</body>
</html>