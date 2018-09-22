	
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
<title>Search</title>
<head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<!-- <link rel="stylesheet"  href="search.css"> -->
	<link rel="stylesheet"  href="main.css">
	<link rel="stylesheet" href="w3.css">
	<link rel="shortcut icon" href="favicon.ico" />
</head>
<body>
<?php
include('config.php');

				session_start();
			     		if($_SESSION['loggedin'] == true){/* echo $_SESSION['email'];*/ }
						 	else{ header('location:home.html'); }
			 ?>
 <header>
            <div id="top_div" style="">  
                <div id="logo_name" style="display:inline-block;"><h1>BSLS</h1></div>
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
                                <p><a href="to_post.php">Upload item</a></p>
                            </div>
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
                            ?>
                            <span style="padding:10px; border-radius:90%; background-color:#80071F; text-allign:center;">
                                <i class="fa fa-user" aria-hidden="true" style="display: inline;"></i>
                            </span>
                        </div>
                    </div>
                </div>
            <div id="navbar">
                <ul>
                    <li><div class="nav_divs"><a href="index.php">home</a></div></li>
                    <li><div class="nav_divs"><a href="sharing/index.php">Share</a></div></li>
                    <li><div class="nav_divs"><a href="">Auction</a></div></li>
                    <!-- <li><div class="nav_divs"><a href="">Services</a></div></li> -->
                </ul>
            </div>
            </div>
        </header>
        <section>
            <div id="category_container"><pre style="display:inline; font-family:serif;">    Top Categories</pre>
                <ul id="category_list">
                  <li><div class="cat_divs"  onclick="show_category('zzz')"><a > Initiate</a></div></li>
                    <li><div class="cat_divs"  onclick="show_category('books')"><a > Books</a></div></li>
                    <li><div class="cat_divs"  onclick="show_category('sports_accessories')"><a > Sports</a></div></li>
                    <li><div class="cat_divs"  onclick="show_category('smartphones')" ><a > Smartphones</a></div></li>
                    <li><div class="cat_divs"  onclick="show_category('food')"><a > Food Items</a></div></li>
                    <li><div class="cat_divs"  onclick="show_category('electronics accessories')"><a > Electronics</a></div></li>
                    <li><div class="cat_divs"  onclick="show_category('bike')"><a > Bike</a></div></li>
                    <li><div class="cat_divs"  onclick="show_category('laboratory_accessories')"><a >Lab Accessories</a></div></li>
                    <li><div class="cat_divs"  onclick="show_category('fashion')"><a > Fashion</a></div></li>
                </ul>
            </div>
        </section>

<!-- <div class="header">
	<div>
	<div id=search_bar>
		<table>
		<tr>
			<td><a href="myorders.php"><button>myorders</button></a></td>
			<td><a href="checkout.php"><button>My cart</button></a></td>
			<td><a href="home.php"><button>home</button></a></td>
			<td> tag:
	       	<td>	<input type = "text" id="tag"  />
	        <td> <button type=button onclick="search()" >GO</button>
	    </table>     <input  type="submit" name="submit" value="GO" onclick="search()">
	</div>
	</div>
</div> -->
<!-- <div id="top_container">
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
	
</div> -->
						<?php
						// // if there are any errors, display them
						// if ($error != '')
						// {
						// 	echo '<div style="padding:4px; border:1px solid red; color:red;">'.$error.'</div>';
						// }
						?>
<!-- 
<div class="imgcontainer">
    <img src=<?php  /*echo "images/".$_GET['id'].".png" */?> alt="Avatar" class="avatar">
 </div>

<form>
<input type="hidden" name="id" value="<?php  $id; ?>"/>
<div class="container">
<p><strong>ID:</strong> <?php  $id; ?></p>
<strong>First Name: *</strong> <?php  $username; ?>"<br/>
<strong>passcode *</strong> <?php  $passcode; ?>"<br/>  -->


<!-- <input  type="submit" name="submit" value="Submit"> -->


<?php

// connect to the database
//searching starts from here

// echo $_GET['tag'];
if (isset($_GET['tag']) /*&& is_numeric($_GET['id']) && $_GET['tag'] > 0*/)	//if id is set
{
// query db
	$tag = $_GET['tag'];
	// echo $tag;
	// $sqlquery="SELECT * FROM object WHERE tag1=\"$tag\" OR tag2=\"$tag\" OR tag3=\"$tag\"";
		$sqlquery="SELECT * FROM object WHERE tag1 LIKE \"%$tag%\" OR tag2 LIKE \"%$tag%\" OR tag3 LIKE \"%$tag%\"";

	$result = mysqli_query($db,$sqlquery);
	// echo $sqlquery;
	if(!$result)
	{
		echo "no result found";
		die(mysql_error());
	}
	// $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
	// check that the 'id' matches up with a row in the databse
		echo "<div id=\"container_feed_items_in_search\">";
	while( $row = mysqli_fetch_array($result,MYSQLI_ASSOC)) 
	{ 	 
		if($row['available']==1)
			{
				
				?>
				<div  class="item_divs_for_feed_in_search" >
						<div class="liked_divs_feed">
							<i class="fa fa-heart-o" aria-hidden="true"></i>
						</div>
						<div class="imgcontainer">
                        <a href=<?php echo "\"view.php?id=".$row['id']."\""; ?> >
				   			 <img src=<?php echo $row['image1_src'] ?> alt="Avatar" class="avatar">
                        </a>
						</div>
						<div class="container">
							<ul>
							<input type="hidden" name="id" value="<?php /*echo $id;*/ ?>"/>

								<li><strong>Title:</strong> <?php echo $row['title']; ?>
								<li><strong>Owner: </strong> <?php echo $row['owner'] ?><br/>
								<li><strong>price:</strong> <?php echo $row['price'] ?><br/></li>
								<!-- <table>
								<tr>
    								<td>
    								<button type=button onclick="add_cart(<?php echo "'".$row['id']."','".$_SESSION['email']."'"; ?>)" >Add to cart</button></td>
    								<td>	<button type=button onclick="buy(<?php echo "'".$row['id']."','".$_SESSION['email']."'"; ?>)" >Buy</button></td>
                                </tr>
								</table> -->
								<div id="txtHint<?php echo $row['id']; ?>"><b><!-- Person info will be listed here... --></b></div>
							</ul>
						</div> 
				</div>
	<?php  
			}  //if (available end)
	}//while ends ?>
	</div>
<script>
$(document).ready(function()
          {
                $("#sign_in").click(function()
                {
                    $("#login_slider").toggle("slow");
                });              
          });
		function add_cart(objid,usrid) {
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
			        xmlhttp.open("GET","add_cart.php?userid="+usrid+"&objectid="+objid,true);
			        xmlhttp.send();
			    }
			}
			 function show_category(category) {
                <?php $category_flag=1;  ?>
                document.getElementById("container_feed_items_in_search").innerHTML = "";
            // window.location = "home.php" ;
                // document.getElementById("txtHint"+   objid).innerHTML = objid+" "+usrid;
                if (category == 0) 
                {
                    document.getElementById("container_feed_items_in_search").innerHTML = "";
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
                            document.getElementById("container_feed_items_in_search").innerHTML =this.responseText;
                        }
                    };
                    xmlhttp.open("GET","category.php?category="+category,true);
                    xmlhttp.send();
                }
            }
			function buy(objid,usrid)
			{
				add_cart(objid,usrid);
				window.location = "checkout.php"
			}
</script>



		<!-- // echo out the contents of each row into a table -->
		<!-- echo "<tr>";
		echo '<td>' . $row['id'] . '</td>';
		echo '<td>' . $row['username'] . '</td>';
		echo '<td>' . $row['passcode'] . '</td>';
		echo '<td><a href="edit.php?id=' . $row['id'] . '">Edit</a></td>';
		echo '<td><a href="delete.php?id=' . $row['id'] . '">Delete</a></td>';
		echo "</tr>"; -->
	<?php
	
	

echo "</table>";
	// if($row)
	// {
	// // get data from db
	// 	$username = $row['username'];
	// 	$passcode = $row['passcode'];
	// // show form
	// 	renderForm($id, $username, $passcode, '');
	// }

	// else
	// // if no match, display result
	// {
	// 	echo "No results!";
	// 	renderForm(0,"-","-",'');
	// }
}
else
{ 
	?>
	<div id="bottom_error"><p>
	<?php
	if(!isset($GET_['tag']))
		echo "please enter the id to be searched";
	else
		echo "error not found";
	?></div><?php 
	// renderForm(0,"-","-",'');
}
?>

<script> 
function search()
{
	var str1 = document.getElementById("tag").value;
	var str2 = "search.php?tag=";
	str2 += str1;
	// var res = str2.concat(str1);
	// document.getElementByName("help").innerHTML = res;
	window.location = str2 ;
}
</script> 




</body>
</html>
