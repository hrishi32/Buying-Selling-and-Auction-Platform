<!DOCTYPE HTML>
<html>
		<head>
			<link type="text/css" href="main1.css" rel="stylesheet">
			<link type="text/css" href="search.css" rel="stylesheet">
			<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
		</head>
		<body>
		<div class="header">
			<div>
				<div id=search_bar>
					<table>
					<tr>
						<td> tag:</td>
				       	<td>	<input type = "text" id="tag"  /> </td>
				        <td> <button type=button onclick="search()" >  GO</button></td>
				    </table>    <!-- <input  type="submit" name="submit" value="GO" onclick="search()"> -->
				</div>
			</div>
		</div>
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
			     		if($_SESSION['loggedin'] == true){ /*echo $_SESSION['username'];*/ }
						 	else{ header('location:home.html'); }
			?>
			
			<header>
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
		$count=$count+1; ?>

		<td class="sale">
		<div  class="saleItem" class="grow">
				<div class="imgcontainer">
		   			 <img src=<?php echo "images/".$row['id'].".png" ?> alt="Avatar" class="avatar">
				</div>
				<div class="container">
					<ul>
					<input type="hidden" name="id" value="<?php echo $id; ?>"/>
				
					<li><strong>ID:</strong> <?php echo $row['id']; ?></p>
					<li><strong>Owner: </strong> <?php echo $row['user'] ?>"<br/>
					<li><strong>price:</strong> <?php echo $row['price'] ?>"<br/>
					<li><strong>Description:</strong> <?php echo $row['description'] ?>"<br/>
					</ul>
				</div> 
		</div>
		</td>
	<?php } ?>
				</div>
			</header>
			
			<div id="main_container">
				Welcome : <?php echo $_SESSION['email']; ?>
			</div>
			
			<footer>
			</footer>
			
		</body>
</html>