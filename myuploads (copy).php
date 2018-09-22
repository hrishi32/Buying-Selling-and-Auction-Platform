	
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
<title>Checkout</title>
<head>
	<link rel="stylesheet"  href="search.css">
	<link rel="stylesheet" href="w3.css">
	<link rel="shortcut icon" href="favicon.ico" />
</head>
<body>
<div class="header">
	<div>
	<div id=search_bar>
		<table>
		<tr>
			<td><a href="checkout.php"><button>My Cart</button></a></td>
			<td><a href="home.php"><button>home</button></a></td>
			<td> tag:</td>
	       	<td>	<input type = "text" id="tag"  /></td>
	        <td> <button type=button onclick="search()" >GO</button></td>
	        </tr>
	    </table>    <!-- <input  type="submit" name="submit" value="GO" onclick="search()"> -->
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
						 	else{ header('location:home.html'); } ?>
	</div>
</div>


<?php

// connect to the database
//searching starts from here
include('config.php');

$useremail= $_SESSION['email'];
$sql="SELECT userid FROM user WHERE email = \"$useremail\"";
$result = mysqli_query($db,$sql);
if(!$result)
{
	echo "kuch nahi mila matlab ki meh user ki userid nahi nikal paya";
}
	$row = mysqli_fetch_array($result);
	$usrid= intval($row['userid']);
	

$sql="SELECT * FROM object WHERE user='$useremail'";
// echo $sql;
$result = mysqli_query($db,$sql);
echo "<table> ";
// $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
if(!$row)
{
	echo "saari mehnat pani me";
}
	$count = 0;
	$bill =0;
	while( $row = mysqli_fetch_array($result,MYSQLI_ASSOC)) 
	{ 	
		// echo "mazza aa gaya";
		if( $count % 3 == 0) echo "<tr> ";
		$count=$count+1; 
		if(1)
			{
				$bill+= intval($row['price']);
				?>

				<td class="sale">
				<div  class="saleItem" class="grow">
						<div class="imgcontainer">
				   			 <img src=<?php echo $row['image1_src'] ?> alt="Avatar" class="avatar">
						</div>
						<div class="container">
							<ul>
							<input type="hidden" name="id" value="<?php /*echo $id;*/ ?>"/>
							<li><strong>ID:</strong> <?php echo $row['id']; ?>
							<li><strong>Owner: </strong> <?php echo $row['user'] ?><br/>
							<li><strong>price:</strong> <?php echo $row['price'] ?><br/>
							<li><strong>Description:</strong> <?php echo $row['description'] ?><br/>
							<div id="txtHint<?php echo $row['id']; ?>"><b><!-- Person info will be listed here... --></b></div>
							<li> <strong>Status</strong>
							<?php if($row['available']==1) echo "Not sold yet";
							 		else
							 			{
							 				$soldid=$row['id'];
							 				$soldsql="SELECT user_id FROM user_order WHERE item_id=$soldid";
							 				$soldresult= mysqli_query($db,$soldsql);
							 				$soldrow=mysqli_fetch_array($soldresult,MYSQLI_ASSOC);
							 				$soldsql="SELECT email FROM user WHERE userid=".$soldrow['user_id'];
							 				$soldresult= mysqli_query($db,$soldsql);
							 				$soldrow=mysqli_fetch_array($soldresult,MYSQLI_ASSOC);
							 				echo "Congratulations your item is sold to ".$soldrow['email'];
							 			}
							 				?>
							 				</li>
							</ul>
						</div> 
				</div>
				</td>
	<?php  
			}
			else $count-=1; //if (available end)
	}//while ends ?>
	</table>
</body>
</html>