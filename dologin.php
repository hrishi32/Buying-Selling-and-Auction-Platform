<!DOCTYPE HTML>
  	<html>
		<head>
			<link rel="shortcut icon" href="favicon.ico" />
		</head>
		<body>
		<?php 
			include 'config.php';
			
			$given_user_name = $given_password = "";
			if ($_SERVER["REQUEST_METHOD"] == "POST") {
    				 $given_user_name = testing_the_input($_POST["username"]);
				     $given_password  = testing_the_input($_POST['given_password']);
				     // header("location:index.php")
			}
			
			//echo $given_user_name ;
			//echo $given_password ;
			$sql = "SELECT email FROM user WHERE username = '$given_user_name' AND password = '$given_password' ";
			$result = $db->query($sql);
			

			if ($result->num_rows > 0) {
    
    	while($row = $result->fetch_assoc()) {
/*            if($row['username']==$given_user_name){
							   if($row['password']== $given_password){*/
									 	session_start();
										$_SESSION['email'] = $row['email'];
									  $_SESSION['loggedin'] = true;
									 // header('Content-Type: application/json');
									  echo json_encode($given_user_name);
									  //header("location:index.php");

								 
						
			}  
			}
			else {
				$sql = "INSERT INTO user (fullname, username, email, password, gender) VALUES ('jwefn', 'knlfds', 'ekerlnf@lerkngm.rfg', 'pass@iit', 'male')";
				$result = $db->query($sql);
     		header("location:helplogin.php");
			}
			

			
			function testing_the_input($data) {
  				$data = trim($data);
  				$data = stripslashes($data);
  				$data = htmlspecialchars($data);
  				return $data;
			}

							  


	
		?>
			
		</body>
</html>