<!DOCTYPE HTML>
<html>
		<head>
			<link type="text/css" href="main1.css" rel="stylesheet">
			<link type="text/css" href="search.css" rel="stylesheet">
			<link rel="stylesheet" href="w3.css">
			<link rel="shortcut icon" href="favicon.ico" />
			<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
		</head>
		<body>
		<div align="center" class="header">
			<div>
				<div id=search_bar>
					<table>
					<tr>
						<td><a href="myorders.php"><button>myorders</button></a></td>
						<td><a href="checkout.php"><button>My cart</button></a></td>
						<td> tag:</td>
				       	<td>	<input type = "text" id="tag"  /> </td>
				        <td> <button type=button onclick="search()" >  GO</button></td>
				    </table>    <!-- <input  type="submit" name="submit" value="GO" onclick="search()"> -->
				</div>
			</div>
		</div>

		<div class="w3-cntainer w3-row">
		<nav class="w3-third w3-sidebar w3-right w3-bar-block w3-white w3-collapse w3-top" style="z-index:3;width:250px" id="mySidebar">
		  <div class="w3-container w3-display-container w3-padding-16">
		    <i onclick="w3_close()" class="fa fa-remove w3-hide-large w3-button w3-display-topright"></i>
		    <h3 class="w3-wide"><b>CATEGORY</b></h3>
		  </div>
		  <div class="w3-padding-64 w3-large w3-text-grey" style="font-weight:bold">
		    <a href="#" class="w3-bar-item w3-button">Clothing</a>
		    <a href="#" class="w3-bar-item w3-button">Electronics</a>
		    <a onclick="myAccFunc()" href="javascript:void(0)" class="w3-button w3-block w3-white w3-left-align" id="myBtn">
		      Food<i class="fa fa-caret-down"></i>
		    </a>
		    <a href="#" class="w3-bar-item w3-button">Sports</a>
		    <a href="#" class="w3-bar-item w3-button">Music</a>
		    <a href="#" class="w3-bar-item w3-button">Study</a>
		    <a href="#" class="w3-bar-item w3-button">Others</a>
		  </div>
		  <a href="#footer" class="w3-bar-item w3-button w3-padding">Contact</a> 
		  <a href="javascript:void(0)" class="w3-bar-item w3-button w3-padding" onclick="document.getElementById('newsletter').style.display='block'">Newsletter</a> 
		  <a href="#footer"  class="w3-bar-item w3-button w3-padding">Subscribe</a>
		</nav>

		<div class="w3-overlay w3-hide-large" onclick="w3_close()" style="cursor:pointer" title="close side menu" id="myOverlay"></div>

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
			<?php 
				include 'config.php';
						session_start();
			     		if($_SESSION['loggedin'] == true){ echo $_SESSION['email']; }
						 	else{ header('location:home.html'); }
			?>
			
			<header style="clear:left" class = "w3-right">

				<div class="w3-main" style="margin-left:250px">

			  <div id="top_container ">
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
<?php					
$sqlquery="SELECT * FROM object ";
	$result = mysqli_query($db,$sqlquery);
	// echo $sqlquery;
	if(!$result)
	{
		echo "no result found";
		die(mysql_error());
	}
	// $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
	// check that the 'id' matches up with a row in the databse
	echo "<table> ";
	$count = 0;
	while( $row = mysqli_fetch_array($result,MYSQLI_ASSOC)) 
	{ 	
		if( $count % 3 == 0) echo "<tr> ";
		$count=$count+1; 
		if($row['available']==1)
			{
				
				?>

				<td class="sale">
				<div  class="saleItem" class="grow">
						<div class="imgcontainer">
				   			 <img src=<?php echo "images/".$row['id'].".jpg" ?> alt="Avatar" class="avatar">
						</div>
						<div class="container">
							<ul>
							<input type="hidden" name="id" value="<?php /*echo $id;*/ ?>"/>
							<li><strong>ID:</strong> <?php echo $row['id']; ?>
							<li><strong>Owner: </strong> <?php echo $row['user'] ?><br/>
							<li><strong>price:</strong> <?php echo $row['price'] ?><br/>
							<li><strong>Description:</strong> <?php echo $row['description'] ?><br/>
							<button type=button onclick="add_cart(<?php echo "'".$row['id']."','".$_SESSION['email']."'"; ?>)" >Add to cart</button>
							<button type=button onclick="buy(<?php echo "'".$row['id']."','".$_SESSION['email']."'"; ?>)" >Buy</button>
							<div id="txtHint<?php echo $row['id']; ?>"><b><!-- Person info will be listed here... --></b></div>
							</ul>
						</div> 
				</div>
				</td>
	<?php  
			} 
			else $count-=1; //if (available end)
	}//while ends ?>
	<script>
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

			function buy(objid,usrid)
			{
				add_cart(objid,usrid);
				window.location = "checkout.php"
			}

// Accordion 
function myAccFunc() {
    var x = document.getElementById("demoAcc");
    if (x.className.indexOf("w3-show") == -1) {
        x.className += " w3-show";
    } else {
        x.className = x.className.replace(" w3-show", "");
    }
}

// Click on the "Jeans" link on page load to open the accordion for demo purposes
document.getElementById("myBtn").click();


// Script to open and close sidebar
function w3_open() {
    document.getElementById("mySidebar").style.display = "block";
    document.getElementById("myOverlay").style.display = "block";
}
 
function w3_close() {
    document.getElementById("mySidebar").style.display = "none";
    document.getElementById("myOverlay").style.display = "none";
}


		</script>



				</div>
			</header>
		</li></li></li></li></ul></div>

			<div id="main_container">
				Welcome : <?php echo $_SESSION['email']; ?>
			</div>
			

		 <!-- Image header -->
  <div class="w3-display-container w3-container">
    <img src="images/lassan1.bmp" alt="BUY ANYTHING" style="width:100%">
    <div class="w3-display-topleft w3-text-white" style="padding:24px 48px">
      <h1 class="w3-jumbo w3-hide-small">New Arrivals</h1>
      <h1 class="w3-hide-large w3-hide-medium">New arrivals</h1>
      <p><a href="#jeans" class="w3-button w3-black w3-padding-large w3-large">SHOP NOW</a></p>
    </div>
  </div>

  <div class="w3-container w3-text-grey" id="jeans">
    <p>10 items</p>
  </div>
	
	<div class="w3-container w3-black w3-padding-32">
    <h1>Subscribe</h1>
    <p>To get special offers and VIP treatment:</p>
    <p><input class="w3-input w3-border" type="text" placeholder="Enter e-mail" style="width:100%"></p>
    <button type="button" class="w3-button w3-red w3-margin-bottom">Subscribe</button>
  </div>
  
  <!-- Footer -->
  <footer class="w3-padding-64 w3-light-grey w3-small w3-center" id="footer">
    <div class="w3-row-padding">
      <div class="w3-col s4">
        <h4>Contact</h4>
        <p>Questions? Go ahead.</p>
        <form action="/action_page.php" target="_blank">
          <p><input class="w3-input w3-border" type="text" placeholder="Name" name="Name" required></p>
          <p><input class="w3-input w3-border" type="text" placeholder="Email" name="Email" required></p>
          <p><input class="w3-input w3-border" type="text" placeholder="Subject" name="Subject" required></p>
          <p><input class="w3-input w3-border" type="text" placeholder="Message" name="Message" required></p>
          <button type="submit" class="w3-button w3-block w3-black">Send</button>
        </form>
      </div>

      <div class="w3-col s4">
        <h4>About</h4>
        <p><a href="#">About us</a></p>
        <p><a href="#">We're hiring</a></p>
        <p><a href="#">Support</a></p>
        <p><a href="#">Find store</a></p>
        <p><a href="#">Shipment</a></p>
        <p><a href="#">Payment</a></p>
        <p><a href="#">Gift card</a></p>
        <p><a href="#">Return</a></p>
        <p><a href="#">Help</a></p>
      </div>

      <div class="w3-col s4 w3-justify">
        <h4>Store</h4>
        <p><i class="fa fa-fw fa-map-marker"></i> Company Name</p>
        <p><i class="fa fa-fw fa-phone"></i> 0044123123</p>
        <p><i class="fa fa-fw fa-envelope"></i> ex@mail.com</p>
        <h4>We accept</h4>
        <p><i class="fa fa-fw fa-cc-amex"></i> Amex</p>
        <p><i class="fa fa-fw fa-credit-card"></i> Credit Card</p>
        <br>
        <i class="fa fa-facebook-official w3-hover-opacity w3-large"></i>
        <i class="fa fa-instagram w3-hover-opacity w3-large"></i>
        <i class="fa fa-snapchat w3-hover-opacity w3-large"></i>
        <i class="fa fa-pinterest-p w3-hover-opacity w3-large"></i>
        <i class="fa fa-twitter w3-hover-opacity w3-large"></i>
        <i class="fa fa-linkedin w3-hover-opacity w3-large"></i>
      </div>
    </div>
  </footer>

  <div class="w3-black w3-center w3-padding-24">Powered by <a href="https://www.w3schools.com/w3css/default.asp" title="W3.CSS" target="_blank" class="w3-hover-opacity">w3.css</a></div>

  <!-- End page content -->
</div>

<!-- Newsletter Modal -->
<div id="newsletter" class="w3-modal">
  <div class="w3-modal-content w3-animate-zoom" style="padding:32px">
    <div class="w3-container w3-white w3-center">
      <i onclick="document.getElementById('newsletter').style.display='none'" class="fa fa-remove w3-right w3-button w3-transparent w3-xxlarge"></i>
      <h2 class="w3-wide">NEWSLETTER</h2>
      <p>Join our mailing list to receive updates on new arrivals and special offers.</p>
      <p><input class="w3-input w3-border" type="text" placeholder="Enter e-mail"></p>
      <button type="button" class="w3-button w3-padding-large w3-red w3-margin-bottom" onclick="document.getElementById('newsletter').style.display='none'">Subscribe</button>
    </div>
  </div>
</div>

		
			<footer>
			</footer>
			

		</body>

</html>