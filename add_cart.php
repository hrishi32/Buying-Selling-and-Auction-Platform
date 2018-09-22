<!DOCTYPE html>
<html>
<head>
<style>

</style>
</head>
<body>

<?php
$useremail = $_GET['userid'];
$objid = intval($_GET['objectid']);
include 'config.php';
	
	session_start();
	if($_SESSION['loggedin'] == true)
		{
		 // echo $_SESSION['email']; 
		}
	else{ header('location:home.html'); }

// mysqli_select_db($db,"ajax_demo");

// echo "using user email ".$useremail."   ";  
$sql="SELECT userid FROM user WHERE email = \"$useremail\"";
	$result = mysqli_query($db,$sql);
	$row = mysqli_fetch_array($result);
	$usrid= intval($row['userid']);
	// echo $usrid." is your id  \n";

// echo "user_id = $usrid and item_id = $objid";

$sql="SELECT * FROM user_cart WHERE user_id = $usrid AND item_id = $objid; ";
// echo "   query is    ".$sql;
$result = mysqli_query($db,$sql);
if($row = mysqli_fetch_array($result,MYSQLI_ASSOC))
{
	echo "Item already exist \r\n in your cart";
}
else
{
	
$sql="INSERT INTO `user_cart` VALUES ($usrid,$objid);";
	$result = mysqli_query($db,$sql);
	if($result)
	{
		echo "Item added to your cart";
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