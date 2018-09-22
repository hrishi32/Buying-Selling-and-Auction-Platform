<?php 
			    include 'config.php';
    
    			function test_input($data) {
  				      $data = trim($data);
  				      $data = stripslashes($data);
  				      $data = htmlspecialchars($data);
  				      return $data;
			    }

        $fullname = $username =  $email = $password = $confirm_password= $gender =""  ;
      
          if ($_SERVER["REQUEST_METHOD"] == "POST") {
                    $fullname = test_input($_POST['fullname']);
                    $username = test_input($_POST['username']);
                    $email   = test_input($_POST['email']);
                    $password = test_input($_POST['password']);
                    $confirm_password = test_input($_POST['confirm_password']);
                    $gender  = test_input($_POST['gender']);
        }
            
      
        // echo $fullname; echo $username ; echo $email ; echo $password; echo $confirm_password ; echo $gender;
           if(!strcmp($password , $confirm_password)){
                   $sql = "INSERT INTO user(`fullname`,`username`,`email`,`password`,`gender`)
                            VALUES('$fullname','$username','$email','$password','$gender')";
                              if($db->query($sql) === TRUE) {
                                echo "dataCreated sucesssfully";
                                header("location:index.php");
                                // session_destroy();
                                session_start();
                                $_SESSION['email'] = $email; 
                                $_SESSION['loggedin'] = true;
                                exit();
                            } else {
                                        echo "Error creating table: " . $con->error;
                                        echo "Redirecting to registration page";
                                        sleep(2);
                                        header("location:registration.php");
                                        // exit();
                            }

           }   
      
    ?>