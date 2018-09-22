<!DOCTYPE html>
<html>
<head>
<style>
table {
    width: 100%;
    border-collapse: collapse;
}

table, td, th {
    border: 1px solid black;
    padding: 5px;
}

th {text-align: left;}
</style>
</head>
<body>

<?php
$usrid = intval($_GET['userid']);

include 'config.php';
	session_start();
			     		if($_SESSION['loggedin'] == true){ echo $_SESSION['email']; }
						 	else{ header('location:home.html'); }
		
	

// mysqli_select_db($db,"ajax_demo");


	// echo $usrid." is your id  \n";

// echo "user_id = $usrid and item_id = $objid";

$sql="SELECT object.id FROM object INNER JOIN user_cart on object.id=user_cart.item_id and user_cart.user_id = $usrid;";
// echo "   query is    ".$sql;
$result = mysqli_query($db,$sql);
if(!($row = mysqli_fetch_array($result,MYSQLI_ASSOC)))
{
	echo "Unable to place your order  either your cart is empty or you are an Idiot";
}
else
{
$insertsql="INSERT INTO `user_order` VALUES (".$usrid.",".$row['id'].");" ;
	echo "order ".$row['id']." placed on user". $usrid;
$insertresult = mysqli_query($db,$insertsql); 		// adding item to user_orders
$updatesql = "UPDATE `object` SET available = 0 where id=".$row['id'];	//removing item from display
$updateresult = mysqli_query($db,$updatesql);
$deletecart="DELETE FROM `user_cart` WHERE item_id = ".$row['id'];
$deleteresult= mysqli_query($db,$deletecart);

while($row = mysqli_fetch_array($result,MYSQLI_ASSOC))
{
	$insertsql="INSERT INTO `user_order` VALUES (".$usrid.",".$row['id'].");" ;
	echo "order ".$row['id']." placed on user". $usrid;
	$insertresult = mysqli_query($db,$insertsql); 		// adding item to user_orders
	$updatesql = "UPDATE `object` SET available = 0 where id=".$row['id'];	//removing item from display
	$updateresult = mysqli_query($db,$updatesql);
	$deletecart="DELETE FROM `user_cart` WHERE  item_id = ".$row['id'];
	$deleteresult= mysqli_query($db,$deletecart);
}
	


}
// echo "<table>
// <tr>
// <th>Firstname</th>
// <th>Lastname</th>
// <th>Age</th>
// <th>Hometown</th>
// <th>Job</th>
// </tr>";
// while($row = mysqli_fetch_array($result)) {
//     echo "<tr>";
//     echo "<td>" . $row['FirstName'] . "</td>";
//     echo "<td>" . $row['LastName'] . "</td>";
//     echo "<td>" . $row['Age'] . "</td>";
//     echo "<td>" . $row['Hometown'] . "</td>";
//     echo "<td>" . $row['Job'] . "</td>";
//     echo "</tr>";
// }
// echo "</table>";
?>
</body>
</html>



<?php 
	
?>