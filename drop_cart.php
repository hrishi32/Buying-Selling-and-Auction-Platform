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
include 'config.php';
$useremail = $_GET['userid'];
$objid = intval($_GET['objectid']);


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
if(!($row = mysqli_fetch_array($result,MYSQLI_ASSOC)))
{
	echo "can't delete an item that is mot present in you cart\r\n in your cart";
}
else
{
	
$sql="DELETE FROM `user_cart` WHERE user_id = $usrid AND item_id = $objid; ";
	$result = mysqli_query($db,$sql);
	if($result)
	{
		echo "Item deleted from your cart";
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