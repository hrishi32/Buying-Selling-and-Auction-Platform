<!DOCTYPE HTML>

	<html>
		<head>
			<title>BSLS</title>
			<link type="text/css" href="main.css" rel="stylesheet">
			<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">

     <script>
         
    //      function sqlToJsDate(sqlDate){
    //         //sqlDate in SQL DATETIME format ("yyyy-mm-dd hh:mm:ss.ms")

            
    //         var sqlDateArr1 = sqlDate.split("-");
    //         //format of sqlDateArr1[] = ['yyyy','mm','dd hh:mm:ms']
    //         var sYear = sqlDateArr1[0];
    //         var sMonth = (Number(sqlDateArr1[1]) - 1).toString();
    //         var sqlDateArr2 = sqlDateArr1[2].split(" ");
    //         //format of sqlDateArr2[] = ['dd', 'hh:mm:ss.ms']
    //         var sDay = sqlDateArr2[0];
    //         var sqlDateArr3 = sqlDateArr2[1].split(":");
    //         //format of sqlDateArr3[] = ['hh','mm','ss.ms']
    //         var sHour = sqlDateArr3[0];
    //         var sMinute = sqlDateArr3[1];
    //         var sqlDateArr4 = sqlDateArr3[2].split(".");
    //         //format of sqlDateArr4[] = ['ss','ms']
    //         var sSecond = sqlDateArr3[2];
    //         var sMillisecond = /*sqlDateArr4[1]*/"0";

    //         //document.getElementById(<?php echo $row["itemId"]; ?>).innerHTML ="pifogng"+sqlDate;
            
    //         return [sYear,sMonth,sDay,sHour,sMinute,sSecond,sMillisecond];
    //     }

    //     function ctdown(endt, idtoprt){
    //      var dateggg = sqlToJsDate(endt) ;
    //      var dt = new Date(dateggg[0], dateggg[1], dateggg[2], dateggg[3], dateggg[4], dateggg[5], dateggg[6]).getTime();
    //       document.getElementById(<?php echo $row["itemId"]; ?>).innerHTML ="pifogng"+dt;


    //       // Set the date we're counting down to
        
    //     //var countDownDate = new Date(dt).getTime();

    //     // Update the count down every 1 second
    //     var x = setInterval(function() {

    //         // Get todays date and time
    //         var now = new Date().getTime();
            
    //         // Find the distance between now an the count down date
    //         var distance = /*countDownDatedt -*/dt- now;
            
    //         // Time calculations for days, hours, minutes and seconds
    //         var days = Math.floor(distance / (1000 * 60 * 60 * 24));
    //         var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
    //         var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
    //         var seconds = Math.floor((distance % (1000 * 60)) / 1000);
            
    //         // Output the result in an element with id="demo"
    //         document.getElementById(idtoprt).innerHTML = days + "d " + hours + "h "
    //         + minutes + "m " + seconds + "s " + now+"rygtr"+dt;
            
    //         // If the count down is over, write some text 
    //         if (distance < 0) {
    //             clearInterval(x);
    //             document.getElementById(idtoprt).innerHTML = "EXPIRED";
    //         }
    //     }, 1000);

    // }

     </script>

		</head>
		
		<body>

            <?php

            
                //session_start();
                        include "session.php";

                        $cat = "";
                //session_start();
                        //include "session.php";

                        if( isset($_GET["cat"])  )
                    {
                            //echo "Welcome ". $_GET['name']. "<br />";
                            //echo "You are ". $_GET['age']. " years old.";
                            //exit();
                            $cat = $_GET["cat"];


                    }

            ?>
        <div id='login_slider'>
            cvxj m, jgh hj hjh gj tyn erghgf uy ,uy mu j u,
        
        </div>
			<!--button onclick="login();" id="show_login">Log In</button-->
        <header>
            <div id="top_div" style="">  
                <div id="logo_name" style="display:inline-block;"><h1>BSLS Auctions</h1></div>
                <div id="top_div_in_header" style="display:inline-block;">
                    <div id="search_bar" style="display:inline;">
                        <form id="search_form" style="display:inline;">
                            <input id="search_box" type="search" required placeholder="Type and press enter">
                            <input type="submit" value="Search" id="search_button"/>
                        </form>
                    </div>
                    <div id="login_signup" style="display:inline-block;">
                    <a href="../version5/to_post.php">
                        <div id="cart_button" style="display:inline-block;" class="signin" >
                            <span class="cart1">Add Auction</span>
                            <!--i class="fa fa-shopping-cart" aria-hidden="false"></i-->
                        </div>
                    </a>
                        <div id="sign_in" style="display:inline-block;" onmouseover="show_for_login();" onmouseout="hide_slider();" class="signin">
                            <?php 
                                include 'status.php';
                                        
                                        // if($_SESSION['loggedin'] == true){ echo "hoomanlovescat@gmail"; }
                                        //     else{ header('location:home.html'); }
                            ?>
                            <span style="padding:10px; border-radius:90%; background-color:#80071F; text-allign:center;">
                                <i class="fa fa-user" aria-hidden="true"></i>
                            </span>
                        </div>
                    </div>
                </div>
            <div id="navbar">
                <ul>
                    <li><div class="nav_divs"><a href="../">Home</a></div></li>
                    <li><div class="nav_divs"><a href="../sharing">Share</a></div></li>
                    <li><div class="nav_divs"><a href="home.php">Auction</a></div></li>
                    <li><div class="nav_divs"><a href="">Services</a></div></li>
                </ul>
            </div>
            </div>
        </header>
        <section>
            <div id="category_container"><pre style="display:inline; font-family:serif;">    Top Categories</pre>
                <ul id="category_list">
                    <li><div class="cat_divs"><a href="home.php?cat=books"> Books</a></div></li>
                    <li><div class="cat_divs"><a href="home.php?cat=sports"> Sports</a></div></li>
                    <li><div class="cat_divs"><a href="home.php?cat=floaters"> Floaters</a></div></li>
                    <li><div class="cat_divs"><a href="home.php?cat=smartphones"> Smartphones</a></div></li>
                    <li><div class="cat_divs"><a href="home.php?cat=Food"> Food Items</a></div></li>
                    <li><div class="cat_divs"><a href="home.php?cat=Electronics"> Electronics</a></div></li>
                    <li><div class="cat_divs"><a href="home.php?cat=bike"> Bike</a></div></li>
                    <li><div class="cat_divs"><a href="home.php?cat=laboratory_accessories">Lab Accessories</a></div></li>
                    <li><div class="cat_divs"><a href="home.php?cat=fashion"> Fashion</a></div></li>
                    <li><div class="cat_divs"><a href="home.php?cat=services"> Services</a></div></li>
                </ul>
            </div>
        </section>
        <div id="slideshow">
            <img src=""  name="slideshowimage" id="slideshow_image"/>
            <!--div id="slideshow_description"></div-->
        </div>

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



var imgArray = [
        '../version5/uploads/auction/20_2.jpg',
        '../version5/uploads/auction/21_1.jpg',
        '../version5/uploads/auction/22_1.jpg'],
        curIndex = 0;
        imgDuration = 3000;

    function slideShow() {
        document.getElementById('slideshow_image').src = imgArray[curIndex];
        curIndex++;
        if (curIndex == imgArray.length) { curIndex = 0; }
        setTimeout("slideShow()", imgDuration);
    }
    slideShow();

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
    	<?php		
       
        date_default_timezone_set('Asia/Kolkata');
     $current = date('m/d/Y h:i:s a', time());
     if($cat == "")
     {			
    
        $sqlquery="SELECT * FROM auction  ORDER BY status DESC ";
    }

    elseif($cat != "")
    {
        $sqlquery="SELECT * FROM auction where category like '".$cat."'  ORDER BY status DESC  ";
    }
    
	$result = mysqli_query($link,$sqlquery);
	// echo $sqlquery;
	if(!$result)
	{
		echo "no result found";
		die(mysql_error());
	}
	// $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
	// check that the 'id' matches up with a row in the databse
	echo "<div id=\"container_feed_items\">";
	while( $row = mysqli_fetch_array($result,MYSQLI_ASSOC)) 
	{ 	 
        //if($row['available']==1)
            {
                $enddd = $row["end"];
                
                ?>

               
            
                
               
                <div  class="item_divs_for_feed" >
                     <!--form method="POST" action="view.php"-->
                        <div class="liked_divs_feed">
                            <i class="fa fa-heart-o" aria-hidden="true"></i>
                        </div>
                        <div class="imgcontainer">
                        <a href=<?php echo "\"view.php?itemId=".$row['itemId']."\""; ?> >
                             <img src=<?php echo "../version5/".$row['imagesrc']  ?> alt="Avatar" class="avatar">
                        </a>
                        </div>
                        <div class="container">
                            <ul>
                            <input type="hidden" name="itemId" value="<?php echo $row["itemId"]; ?>"/>

                                <li><strong>Item name:</strong> <?php echo $row['item']; ?>
                                <!-- <li><strong>Owner: </strong> <?php echo $row['user'] ?><br/> -->
                                <li><strong>Last bid:</strong> <?php echo $row['cprice'] ?><br/></li>
                                <?php

                                if($row["status"] == 2)
                                { ?>
                                <h3 style="color: green">Ends at <?php echo $row['end'] ?><h3>


                               <?php }

                               elseif ($row["status"] == 1) 
                               {?>
                                   <h3 style="color: red">Expired!<h3>
                               <?php }

                               elseif ($row["status"] == 0) 
                               {
                                   ?>
                                   <h3 style="color: grey">Sold!<h3>
                               <?php
                               }

                                ?>



                                

                            </ul>

                            <div>
                                <p id=<?php echo $row["itemId"]; ?>> 
                                    <!--script>
                                        ctdown('<?php echo $row["end"];?>', '<?php echo $row["itemId"]?>' );
                                    </script--></p>
                                    
                                </div>

                             
                        </div>
                        <!--/form--> 
                </div>
                
	<?php  
			}  //if (available end)
	}//while ends ?>
	</div>





    <script type="text/javascript">
    /*function add_cart(objid,usrid) {
			// window.location = "home.php" ;
			    // document.getElementById("txtHint"+	objid).innerHTML = objid+" "+usrid;
			    if (objid == 0) 
			    {
			        document.getElementById("txtHint"+objid).innerHTML = " udfishfiuuhfiuhf";
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
                        
            });*/

                
        </script>
		</body>
		
</html>