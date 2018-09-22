<!DOCTYPE HTML>
	<html>
		<head>
			<title>BSLS</title>
			<link type="text/css" href="main.css" rel="stylesheet">

			<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <link rel="shortcut icon" href="favicon.ico" />

		</head>
		<?php 
                                include 'config.php';
                                        session_start();
                                        if($_SESSION['loggedin'] == true){ /*echo $_SESSION['email'];*/ }
                                            else{ header('location:home.html'); }
                       $category_flag=0;
                            ?>
		<body style="background: #eee">
       
			<!--button onclick="login();" id="show_login">Log In</button-->
        <header>
            <div id="top_div" style="">  
                <div id="logo_name" style="display:inline-block;"><h1>BSLS</h1></div>
                <div id="top_div_in_header" style="display:inline-block;">
                    <div id="search_bar" style="display:inline;">
                        <form id="search_form" style="display:inline;" action="search.php" method="GET">
                            <input id="search_box" type="search" name="tag" required placeholder="Type and press enter" >
                            <input type="submit" value="search" id="search_button"/>
                        </form>
                    </div>
                    <div id='login_slider'>
                            <div id="order_account">
                                <p><a href="myuploads.php">Your Account</a></p>
                                <p><a href="myorders.php">Your Orders</a></p>
                                <p><a href="helplogin.php">Your Wishlist</a></p>
                            </div>
                                <div id="login_button"><a href="logout.php">Log out</a></div>
                                <div id="new_user"><a href="registration.php">New User?</a></div>
                        </div>
                    <div id="login_signup" style="display:inline-block;">
                    <a href="checkout.php" style="display: inline-block;">
                        <div id="cart_button" style="display:inline-block;" class="signin" >
                            <span class="cart">Cart</span>
                            <i class="fa fa-shopping-cart" aria-hidden="false"></i>
                        </div>
                    </a>
                        
                        
                        <div id="sign_in" style="display:inline-block;"      style="display: inline-block;" class="signin">
                        <?php 
                                    $email=$_SESSION['email'];
                                    $emailsql="SELECT username FROM user WHERE email = '$email' ";
                                    $emailresult=mysqli_query($db,$emailsql);
                                    $emailrow = mysqli_fetch_array($emailresult,MYSQLI_ASSOC);
                                    echo $emailrow['username'];
                            ?>                            <span style="padding:10px; border-radius:90%; background-color:#80071F; text-allign:center;">
                                <i class="fa fa-user" aria-hidden="true" style="display: inline;"></i>
                            </span>
                        </div>
                    </div>
                </div>
            <div id="navbar">
                <ul>
                    <li><div class="nav_divs"><a href="">Landing</a></div></li>
                    <li><div class="nav_divs"><a href="http://localhost/Project/Version5/sharing/index.php">Share</a></div></li>
                    <li><div class="nav_divs"><a href="">Auction</a></div></li>
                    <li><div class="nav_divs"><a href="">Services</a></div></li>
                </ul>
            </div>
            </div>
        </header>
        <section>
            <div id="category_container"><pre style="display:inline; font-family:serif;">    Top Categories</pre>
                <ul id="category_list">
                    <li><div class="cat_divs"  onclick="show_category('zzz')"><a > Initiate</a></div></li>
                    <li><div class="cat_divs"  onclick="show_category('books')"><a > Books</a></div></li>
                    <li><div class="cat_divs"  onclick="show_category('sports_accessories')"><a > Sports</a></div></li>
                    <li><div class="cat_divs"  onclick="show_category('smartphones')" ><a > Smartphones</a></div></li>
                    <li><div class="cat_divs"  onclick="show_category('food')"><a > Food Items</a></div></li>
                    <li><div class="cat_divs"  onclick="show_category('electronics accessories')"><a > Electronics</a></div></li>
                    <li><div class="cat_divs"  onclick="show_category('bike')"><a > Bike</a></div></li>
                    <li><div class="cat_divs"  onclick="show_category('laboratory_accessories')"><a >Lab Accessories</a></div></li>
                    <li><div class="cat_divs"  onclick="show_category('fashion')"><a > Fashion</a></div></li>
                    <!-- <li><div class="cat_divs"><a href=""> Services</a></div></li> -->
                </ul>
            </div>
        </section>
        <div id="slideshow" style="display:inline-block;">
            <img src=""  name="slideshowimage" id="slideshow_image"/>
            <!--div id="slideshow_description"></div-->
        </div>

        <!-- <hr style="position:relative; top:400px;"> -->
        <!-- <button onclick="show_category('zzz')">start</button> -->

        <div id="container_feed_items">
           
        </div>
        <div id="login_form"><span id="close" style="cursor:pointer;">&times;</span>
				<form id="myform" method="post" action="dologin.php">
							<input type="text" name="username" placeholder="   username" class="login_form_inputs" required><br>
							<input type="password" name="given_password" placeholder="   Password" class="login_form_inputs" required><br>							
              <input type="submit" value= "Log In" class="login_form_inputs" required style="background-color:#FDBAEC;cursor:pointer;font-size:17px;"><br>
            <span><a href="forget_passsword.php">Forgot Password</a></span><pre style="display:inline;">     </pre>
            <span><a href="registration.php">New User ?</a></span>
          </form>
				
			</div>
        

			
		<script type="text/javascript">	


          $(document).ready(function()
          {
                $("#sign_in").click(function()
                {
                    $("#login_slider").toggle("slow");
                });              
          });



			// $(document).ready(function()
			// {
			//   	$('#show_login').click(function(){
			// 			showpopup();
			// 		});
		 //  		$('#close').click(function(){
			// 	  	hidepopup();
			// 		});	
			//  });
			


			
			// function showpopup()
			// {
			//   $('#login_form').fadeIn();
			//   $('#login-form').style.display = "block";
			// }
			
			// function hidepopup()
			// {
			// 	$('#login_form').fadeOut();
			// 	$('#login_form').style.display = "none";
			// }
			</script>

    	<?php					
$sqlquery="SELECT * FROM share ";
	$result = mysqli_query($db,$sqlquery);
	// echo $sqlquery;
	if(!$result)
	{
		echo "no result found";
		die(mysql_error());
	}
	// $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
	// check that the 'id' matches up with a row in the databse

	echo "<div id=\"container_feed_items\">";
    if($category_flag==0)
    {
        while( $row = mysqli_fetch_array($result,MYSQLI_ASSOC)) 
    	{ 	 
    		if(0)
    			{
    				
    				?>
    				<div  class="item_divs_for_feed" >
    						<div class="liked_divs_feed">
    							<i class="fa fa-heart-o" aria-hidden="true"></i>
    						</div>
    						<div class="imgcontainer">
                            <a href=<?php echo "\"view.php?id=".$row['id']."\""; ?> >
    				   			 <img src=<?php echo "images/".$row['id'].".jpg"  ?> alt="Avatar" class="avatar">
                            </a>
    						</div>
    						<div class="container">
    							<ul>
    							<input type="hidden" name="id" value="<?php /*echo $id;*/ ?>"/>

    								<li><strong>ID:</strong> <?php echo $row['id']; ?>
    								<!-- <li><strong>Owner: </strong> <?php echo $row['user'] ?><br/> -->
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
    }//if category flag ends?>
	</div>





    <script type="text/javascript">
    function add_cart(objid,usrid) {
			// window.location = "home.php" ;
			    // document.getElementById("txtHint"+	objid).innerHTML = objid+" "+usrid;
			    if (objid == 0) 
			    {
			        document.getElementById("txtHint"+objid).innerHTML = "";
			        return;
			    } 
			    else 
			    { 
			        if (window.XMLHttpRequest) {
			            // code for IE7+, Firefox, Chrome, Opera, Safari
			            xmlhttp = new XMLHttpRequest();
			        } 
			        else 
			        {
			            // code for IE6, IE5
			            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
			        }
			        xmlhttp.onreadystatechange = function() 
			        {
			            if (this.readyState == 4 && this.status == 200) 
			            {
			                document.getElementById("txtHint"+objid).innerHTML =this.responseText;
			            }
			        };
			        xmlhttp.open("GET","add_cart.php?userid="+usrid+"&objectid="+objid,true);
			        xmlhttp.send();
			    }
			}

             function show_category(category) {
                <?php $category_flag=1;  ?>
                document.getElementById("container_feed_items").innerHTML = "";
            // window.location = "home.php" ;
                // document.getElementById("txtHint"+   objid).innerHTML = objid+" "+usrid;
                if (category == 0) 
                {
                    document.getElementById("container_feed_items").innerHTML = "";
                    return;
                } 
                else 
                { 
                    if (window.XMLHttpRequest) {
                        // code for IE7+, Firefox, Chrome, Opera, Safari
                        xmlhttp = new XMLHttpRequest();
                    } 
                    else 
                    {
                        // code for IE6, IE5
                        xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
                    }
                    xmlhttp.onreadystatechange = function() 
                    {
                        if (this.readyState == 4 && this.status == 200) 
                        {
                            document.getElementById("container_feed_items").innerHTML =this.responseText;
                        }
                    };
                    xmlhttp.open("GET","category.php?category="+category,true);
                    xmlhttp.send();
                }
            }

			function buy(objid,usrid)
			{
				add_cart(objid,usrid);
				window.location = "checkout.php"
			}

        // console.log('fvbn');
        // var i=0; 
        // var j=0;
        // var k=0;
        // var divs = [];
        // var divs_liked = [];
        // var image =[];
        // var price = [];
        // var title = [];
        // console.log("dfbgn"); 
        // console.log(j);
        //     for(i=1;i<=3;i++){
        //         for(j=1; j<=4; j++){
        //             k++;
        //             console.log(k);
        //              divs[k] = document.createElement('div');
        //              document.getElementById('container_feed_items').appendChild(divs[k]);
        //              divs[k].className = "item_divs_for_feed";
        //              divs[k].id  = "container_feed_items"+k;
        //              divs_liked[k] = document.createElement('div');
        //              divs[k].appendChild(divs_liked[k]);
        //              divs_liked[k].className = "liked_divs_feed";
        //              divs_liked[k].innerHTML= '<i class="fa fa-heart-o" aria-hidden="true"></i>';
        //              image[k] = document.createElement('img');
        //              divs[k].appendChild(image[k]);
        //              image[k].src = "uploads/books.jpg";
        //              image[k].className = "images_of_item";
        //              title[k] = document.createElement('p');
        //              divs[k].appendChild(title[k]);
        //              console.log("fdghj");
        //              title[k].className = "title_paras";
        //              title[k].innerHTML = "Item Title stays Here bhbfd bd jbfjk b; ;f dj;gnf;jlgnl gn";
        //              price[k] = document.createElement('p');
        //              divs[k].appendChild(price[k]);
        //              price[k].className = "price_of_divs";
        //              price[k].innerHTML = "5000000"+"<br>"+"contact_no"+"<br>"+ "location";       
        //         }
        //     }
        
        // $(document).ready(function(){
        //         $("#sign_in").onclick(
        //            function(){
        //                 $("#login_slider").slideDown("slow");

        //            });
                        
        //         });

        // $(document).ready(function(){
        //     $("#sign_in").mouseout(
        //         function(){
        //             $("#login_slider").slideUp("slow");

        //         });
                        
        //     });

                
        </script>
		</body>
		
</html>