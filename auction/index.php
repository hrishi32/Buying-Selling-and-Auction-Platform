<?php
?>
<HTML>
<head>
	<title>Auctions</title>
	<link type="text/css" href="main.css" rel="stylesheet">
</head>
<?php
	include 'status.php';
	//session_start();

	?>
	<header>
	<div id = "top_div"style="/*font-family:  sans-serif;
      width:100% ;
      /*height: 10%;
      position:relative ;
      top: 0%;
      padding:0px;
      background-color: #23918f; 
      /*text-align: center;
      /*font-size: 25px;
      color: #f3f3f3;*/">
	
		
		<div id="logo_name" style="display:inline-block;"><h1>Auctions</h1></div>
		<div id="login_signup" style="display:inline-block;">
                    <a href="add-auction.html">
                    	<div id="cart_button" style="display:inline-block;" class="signin" >
                            <span class="cart">New Item?</span>
                            <i class="fa fa-shopping-cart" aria-hidden="false"></i>
                        </div>
                    </a>
        </div>

		

	</div>

</header>


	<?php
	header("location:home.php");
    $sql = mysqli_query($link, $query);

	if (mysqli_query($link, $query)) 
	{
	    while ($row = mysqli_fetch_assoc($sql)) 
	    {

	    	?>


	    	<div class="item_divs_for_feed"  >
				      	
	        <li><?php echo "Item Id: ".( $row["itemId"]);?></li>


	        <li><?php echo "Item name.".( $row["item"]);?></li>

	        <li><?php echo "Description: ".( $row["description"]);?></li>
	        
	        <li><?php echo "Category: ".( $row["category"]);?></li>

	        <li><?php echo "Base Price: ".( $row["bprice"]);?></li>

	        <li><?php echo "Current Price. ".( $row["cprice"]);?></li>

	        <li><?php echo "Buy Now Price: ".( $row["bnprice"]);?></li>

	        <li><?php echo "Started: ".( $row["start"]);?></li>
	        
	        <li><?php echo "Till: ".( $row["end"]);?></li>
	        <<?php 

	        $st = $row["start"];
	        $ed = $row["end"];
	        ?>

	        <li><?php echo "Duration: ".( $row["end"]);?></li>


	        <?php $q = "select email from user where userid = '".$row["user"]."'";
	         $s = mysqli_query($link, $q);
	         if (mysqli_query($link, $q)) 
			{
			    while ($row1 = mysqli_fetch_assoc($s))
			    {?>
			    	<li><?php echo "Uploaded By: ".$row1["email"];?></li>
			    	<?php

			    }
			}

	         if($row["status"] == 0)
	         {?>
	         	<li style="color: grey"><?php echo "Status: Sold";?></li>
	         	
	         	<?php
	         }
	         elseif ($row["status"] == 1) 
	         {?>
	         	<li style="color: red"><?php echo "Status: Expired";?></li>
	         	
	         	<?php
	         }
	         elseif ($row["status"] == 2) 
	         {?>
	         	<li style="color: green"><?php echo "Status: Avaiable";?></li>

	         	<li><?php echo "Current Bid by: ".$row["bidder"];?></li>
	         	<?php

			?>



			
			<form method="POST" action="place.php">
				<span id="itemid" style="display:none;"><input type="text" name="itemId" value = <?php echo $row["itemId"]; ?>  ID="txtCategory"></span>
				<span id="itemid" style="display:none;"><input type="text" name="user" value = <?php echo $currentuser; ?>  ID="txtCategory"></span>
				<input type="text" name="mybid" size=10 ID="mybid" placeholder="Yout bid?" >
				<input type="submit" name="place" value="Place">

			</form>

			<form method="POST" action="buy.php">
				<span id="itemid" style="display:none;"><input type="text" name="itemId" value = <?php echo $row["itemId"]; ?>  ID="txtCategory"></span>
				<span id="itemid" style="display:none;"><input type="text" name="user" value = <?php echo $currentuser; ?>  ID="txtCategory"></span>
				<input type="submit" name="buynow" value="Buy Now!">
			</form>

			

			
		
		

			

			


			<?php
	         }//eslif closing

	         

		echo "</div>";	

	}//while closing
}//intial if closing

?>
</HTML>
<?php
?>