<!DOCTYPE HTML>
  <html>
		<head></head>
		<body>
		<?php 
			$con = mysqli_connect("localhost","root","","bsls");

				if (mysqli_connect_errno())
  			{
  				echo "Failed to connect to MySQL: " . mysqli_connect_error();
  			} else{  echo "connected successfully";}
			
			$given_user_name = $given_password = "";
			if ($_SERVER["REQUEST_METHOD"] == "POST") {
    				 $given_user_name = testing_the_input($_POST["username"]);
				     $given_password  = testing_the_input($_POST['given_password']);
			}
			
			echo $given_user_name ;
			echo $given_password ;
			$sql = "SELECT * FROM user WHERE username = '$given_user_name' AND password = '$given_password' ";
			$result = $con->query($sql);
         
			
	if ($result->num_rows > 0) {
    
    	while($row = $result->fetch_assoc()) {
      /*  if($row['username']==$given_user_name){
							   if($row['password']== $given_password){*/
    
									 	session_start();
										$_SESSION['username'] = $given_user_name;
									  $_SESSION['loggedin'] = true;
                    $_SESSION['email']  =  $row['userid'];
                    $_SESSION['id'] = $row['userid'];
									  header("location:../auction/home.php");

								 
						
			}  
			}
			else {
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