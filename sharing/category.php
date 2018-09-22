	
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
<title>Search</title>
<head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<!-- <link rel="stylesheet"  href="search.css"> -->
	<link rel="stylesheet"  href="main.css">
	<!-- <link rel="stylesheet" href="w3.css"> -->
	<link rel="shortcut icon" href="favicon.ico" />
</head>
<body>
<?php
				session_start();
			     // 		if($_SESSION['loggedin'] == true){ echo $_SESSION['email']; }
						 	// else{ header('location:home.html'); }
			 ?>




<?php

// connect to the database
//searching starts from here
include('config.php');

// echo $_GET['tag'];
if (isset($_GET['category']) /*&& is_numeric($_GET['id']) && $_GET['tag'] > 0*/)	//if id is set
{
// query db
	$category = $_GET['category'];
	// echo $category;
	$sqlquery="SELECT * FROM share WHERE category=\"$category\"";
	$result = mysqli_query($db,$sqlquery);
	// echo $sqlquery;
	if(!$result)
	{
		echo "no result found";
		die(mysql_error());
	}
	// $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
	// check that the 'id' matches up with a row in the databse

	while( $row = mysqli_fetch_array($result,MYSQLI_ASSOC)) 
	{ 	 
		if($row['available']==1)
			{
				
				?>
				<div  class="item_divs_for_feed_in_category" >
						<div class="liked_divs_feed">
							<i class="fa fa-heart-o" aria-hidden="true"></i>
						</div>
						<div class="imgcontainer">
                        <a href=<?php echo "\"view.php?id=".$row['id']."\""; ?> >
				   			 <img src=<?php echo $row['image1_src'];  ?> alt="Avatar" class="avatar">
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
	}//while ends
	if($category=='zzz')
	{
		$sqlquery="SELECT * FROM share ORDER BY id DESC LIMIT 12 ";
	$result = mysqli_query($db,$sqlquery);
	// echo $sqlquery;
	if(!$result)
	{
		echo "no result found";
		die(mysql_error());
	}
	// $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
	// check that the 'id' matches up with a row in the databse
	// echo "<div id=\"container_feed_items_in_cateory\">";
	while( $row = mysqli_fetch_array($result,MYSQLI_ASSOC)) 
	{ 	 
		if($row['available']==1)
			{
				
				?>
				<div  class="item_divs_for_feed_in_category" >
						<div class="liked_divs_feed">
							<i class="fa fa-heart-o" aria-hidden="true"></i>
						</div>
						<div class="imgcontainer">
                        <a href=<?php echo "\"view.php?id=".$row['id']."\""; ?> >
				   			 <img src=<?php echo $row['image1_src'];  ?> alt="Avatar" class="avatar">
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
	}//while ends
	}

	 ?>




		
	<?php


}


?>





</body>
</html>
