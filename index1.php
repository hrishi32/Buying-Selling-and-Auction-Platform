<!DOCTYPE HTML>
	<html>
		<head>
			<title>BSLS</title>
			<link type="text/css" href="main.css" rel="stylesheet">
			<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">

		</head>
		
		<body>
        <div id='login_slider'>
            cvxj m, jgh hj hjh gj tyn erghgf uy ,uy mu j u,
        
        </div>
			<!--button onclick="login();" id="show_login">Log In</button-->
        <header>
            <div id="top_div" style="">  
                <div id="logo_name" style="display:inline-block;"><h1>BSLS</h1></div>
                <div id="top_div_in_header" style="display:inline-block;">
                    <div id="search_bar" style="display:inline;">
                        <form id="search_form" style="display:inline;">
                            <input id="search_box" type="search" required placeholder="Type and press enter">
                            <input type="submit" value="" id="search_button"/>
                        </form>
                    </div>
                    <div id="login_signup" style="display:inline-block;">
                        <div id="cart_button" style="display:inline-block;" class="signin">
                            <span class="cart">Cart</span>
                            <i class="fa fa-shopping-cart" aria-hidden="false"></i>
                        </div>
                        <div id="sign_in" style="display:inline-block;" onmouseover="show_for_login();" onmouseout="hide_slider();" class="signin">
                            <span id="sign_In">Sign In</span>
                            <span style="padding:10px; border-radius:90%; background-color:#80071F; text-allign:center;">
                                <i class="fa fa-user" aria-hidden="true"></i>
                            </span>
                        </div>
                    </div>
                </div>
            <div id="navbar">
                <ul>
                    <li><div class="nav_divs"><a href="">Landing</a></div></li>
                    <li><div class="nav_divs"><a href="">Share</a></div></li>
                    <li><div class="nav_divs"><a href="">Auction</a></div></li>
                    <li><div class="nav_divs"><a href="">Services</a></div></li>
                </ul>
            </div>
            </div>
        </header>
        <section>
            <div id="category_container"><pre style="display:inline; font-family:serif;">    Top Categories</pre>
                <ul id="category_list">
                    <li><div class="cat_divs"><a href=""> Books</a></div></li>
                    <li><div class="cat_divs"><a href=""> Sports</a></div></li>
                    <li><div class="cat_divs"><a href=""> Floaters</a></div></li>
                    <li><div class="cat_divs"><a href=""> Smartphones</a></div></li>
                    <li><div class="cat_divs"><a href=""> Food Items</a></div></li>
                    <li><div class="cat_divs"><a href=""> Electronics</a></div></li>
                    <li><div class="cat_divs"><a href=""> Bike</a></div></li>
                    <li><div class="cat_divs"><a href="">Lab Accessories</a></div></li>
                    <li><div class="cat_divs"><a href=""> Fashion</a></div></li>
                    <li><div class="cat_divs"><a href=""> Services</a></div></li>
                </ul>
            </div>
        </section>
        <div id="slideshow" style="display:inline-block;">
            <img src=""  name="slideshowimage" id="slideshow_image"/>
            <!--div id="slideshow_description"></div-->
        </div>
        <hr style="position:relative; top:400px;">
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
			  	$('#show_login').click(function(){
						showpopup();
					});
		  		$('#close').click(function(){
				  	hidepopup();
					});	
			 });
			
			
			function showpopup()
			{
			  $('#login_form').fadeIn();
			  $('#login-form').style.display = "block";
			}
			
			function hidepopup()
			{
				$('#login_form').fadeOut();
				$('#login_form').style.display = "none";
			}
			</script>
    <script type="text/javascript">
        console.log('fvbn');
        var i=0; 
        var j=0;
        var k=0;
        var divs = [];
        var divs_liked = [];
        var image =[];
        var price = [];
        var title = [];
        console.log("dfbgn"); 
        console.log(j);
            for(i=1;i<=3;i++){
                for(j=1; j<=4; j++){
                    k++;
                    console.log(k);
                     divs[k] = document.createElement('div');
                     document.getElementById('container_feed_items').appendChild(divs[k]);
                     divs[k].className = "item_divs_for_feed";
                     divs[k].id  = "container_feed_items"+k;
                     divs_liked[k] = document.createElement('div');
                     divs[k].appendChild(divs_liked[k]);
                     divs_liked[k].className = "liked_divs_feed";
                     divs_liked[k].innerHTML= '<i class="fa fa-heart-o" aria-hidden="true"></i>';
                     image[k] = document.createElement('img');
                     divs[k].appendChild(image[k]);
                     image[k].src = "uploads/books.jpg";
                     image[k].className = "images_of_item";
                     title[k] = document.createElement('p');
                     divs[k].appendChild(title[k]);
                     console.log("fdghj");
                     title[k].className = "title_paras";
                     title[k].innerHTML = "Item Title stays Here bhbfd bd jbfjk b; ;f dj;gnf;jlgnl gn";
                     price[k] = document.createElement('p');
                     divs[k].appendChild(price[k]);
                     price[k].className = "price_of_divs";
                     price[k].innerHTML = "5000000"+"<br>"+"contact_no"+"<br>"+ "location";       
                }
            }
        
        $(document).ready(function(){
                $("#sign_in").onclick(
                   function(){
                        $("#login_slider").slideDown("slow");

                   });
                        
                });

        $(document).ready(function(){
            $("#sign_in").mouseout(
                function(){
                    $("#login_slider").slideUp("slow");

                });
                        
            });

                
        </script>
		</body>
		
</html>