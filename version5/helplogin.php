<!DOCTYPE HTML>
  <html>
		<head>
			<link type="text/css" href="main.css" rel="stylesheet">
			<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
		</head>
		<body style="background-color:#9FDCD9;">
		<?php 
			$con = mysqli_connect("localhost","root","","bsls");

				if (mysqli_connect_errno())
  			{
  				echo "Failed to connect to MySQL: " . mysqli_connect_error();
  			} else{  /*/echo *"connected successfully"*/}
			
			
	 ?>
			<div id="error_login">
				<h3 id="error_header" style="position:absolute; color:red;">Wrong Details Entered! Try Again</h3>
			</div>
        			<div id="relogin_form">
				<form id="myform" method="post" action="dologin.php">
							<input type="text" name="username" placeholder="   username" class="login_form_inputs" required><br>
							<input type="password" name="given_password" placeholder="   Password" class="login_form_inputs" required><br>							
              <input type="submit" value= "Log In" class="login_form_inputs" required style="background-color:#FDBAEC;cursor:pointer;font-size:17px;"><br>
            <span><a href="forget_passsword.php">Forgot Password</a></span><pre style="display:inline;">     </pre>
            <span><a href="registration.php">New User ?</a></span>
          </form>
				
			</div>

			<!--div id="relogin">
				<form id="myform" method="post" action="dologin.php">
					<table>
						<tbody>
							<tr><input type="text" name="username" placeholder="username" class="login_form_inputs" required></tr><br>
							<tr><input type="password" name="given_password" placeholder="********" class="login_form_inputs" required></tr><br>
							<tr><input type="submit" value= "Log In" class="login_form_inputs" required></tr>
						</tbody>
					</table>
				</form>
				<div id="Forgot_password">
					<p id="messege" style="position:relative; left:70px;">Forgot Password? <a class="bottom_link">Click Here</a></p>
				</div>
			</div-->
		</body>
</html>
