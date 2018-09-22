	
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
<title>Checkout</title>
<head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<!-- <link rel="stylesheet"  href="search.css"> -->
	<!-- <link rel="stylesheet"  href="search.css"> -->
	<link rel="stylesheet" href="w3.css">
	<link rel="shortcut icon" href="favicon.ico" />
</head>
<body>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<!-- <link rel="stylesheet"  href="search.css"> -->
	<link rel="stylesheet"  href="main.css">
	<link rel="stylesheet" href="w3.css">
	<link rel="shortcut icon" href="favicon.ico" />
</head>
<?php 	
		include('../auction/session.php');
		include('../auction/status.php');

		$itemId = "";

		if( isset($_GET["itemId"])  )
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


						//session_start();
			     		//if($_SESSION['loggedin'] == true){ /*echo $_SESSION['email'];*/ }
						 	//else{ header('location:home.html'); }
		?>
<body>
 <header>
            <div id="top_div" style="">  
                <div id="logo_name" style="display:inline-block;"><a href="home.php"><h1>BSLSa</h1></a></div>
                <div id="top_div_in_header" style="display:inline-block;">
                    <div id="search_bar" style="display:inline;">
                        <form id="search_form" style="display:inline;" action="search.php" method="GET">
                            <input id="search_box" type="search" name="tag" required placeholder="Type and press enter">
                            <input type="submit" value="search" id="search_button"/>
                        </form>
                    </div>
                    <div id="login_signup" style="display:inline-block;">
                    <a href="checkout.php" style="display: inline-block;">
                        <!--div id="cart_button" style="display:inline-block;" class="signin" >
                            <span class="cart">Cart</span>
                            <i class="fa fa-shopping-cart" aria-hidden="false"></i>
                        </div-->
                    </a>
                        <div id="sign_in" style="display:inline-block;"      style="display: inline-block;" class="signin">
							<?php 
                                    $email=$_SESSION['email'];
                                    $emailsql="SELECT username FROM user WHERE username = '$email' ";
                                    $emailresult=mysqli_query($link,$emailsql);
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
                    <li><div class="nav_divs"><a href="">Landing</a></div></li>
                    <li><div class="nav_divs"><a href="">Share</a></div></li>
                    <li><div class="nav_divs"><a href="">Auction</a></div></li>
                    <li><div class="nav_divs"><a href="">Services</a></div></li>
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
	    </table>    <!-- <input  type="submit" name="submit" value="GO" onclick="search()"> 
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


	$sql = "SELECT * FROM auction WHERE itemId = '".$itemId."'";
	$result = mysqli_query($link, $sql );

	while ($row = mysqli_fetch_assoc($result)) 
            {
                $bnprice = $row["bnprice"];
                //$currentprice = (int)$currentprice;
                $status1 = $row["status"];
                $owner = $row['user'];
                //echo "Hello...";

            }

            $sql = "SELECT username FROM user WHERE userid = '".$owner."'";
			$result = mysqli_query($link, $sql );

			while ($row = mysqli_fetch_assoc($result)) 
		            {
		                $owner_name = $row["username"];

		            }






	?>
	<br><br><br><br>

	<form method="POST", action="buy.php">
		<input type="text" name="itemId" value="<?php echo $itemId ?>" style="display: none;">
	<input  type="submit" name="submit" style="width: 50%; position: relative; left: 25%;" value="Ready to pay <?php echo $bnprice; ?> to <?php echo $owner_name; ?> ?"> > 

	</form>

	


</body>
</html>