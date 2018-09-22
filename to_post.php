<!DOCTYPE HTML>
<html>
		<head>
			<link type="text/css" href="main1.css" rel="stylesheet">
			<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
			<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" />

		</head>
		<body style="background-color:#70DBDB;">
		<?php 
			include 'config.php';
              session_start();
			             if(!isset($_SESSION['loggedin'])){
                        header("location:helplogin.php");
                   }
	  ?>
        
    <div id="header">
        <ul style="list-style-type:none;" >
            <li>
                <div class="navbar_button"><a href=></a></div>
            </li>
            <li>
            </li>
        </ul>
    </div>
			
		<div id="container">
					<h1 style="padding-left:40px; font-weight:100; font-size:40px; background-color:#254B87; color:white;">Submit An Item</h1>
          <div id="bhavesh" style="padding:80px; text-align:left;">
					<form id="upload_form" action="upload_items.php" method="post" style="padding:0px;" enctype="multipart/form-data">
							     <div id="bhavesh1">  
                    <!--fieldset  style="margin:0px; padding-top:0px; padding-left:0px;padding-right:0px; border-radius:2px;"-->
										<div id="title" class="form_divs">
												<!--pre style="display:inline;" >              </pre>Item Title <pre style="display:inline;">   </pre-->
                        Item Title <pre style="display:inline;">   </pre>
												<input type= "text"  name="item_title"  required placeholder="Item Title" onfocus="show_title();" onblur="hide_title();">						 
										</div>
										<div id="category" class="form_divs">
                        category
												<pre style="display:inline;" >    </pre>
                        
												<input type="text" required name="item_category" onfocus="showCategories();" id="cat">
                    
										</div>
										<div id="description" class="form_divs">
                        Description
												<pre style="display:inline;" >  </pre>  
												<textarea name="item_description" style="height:130px; width:350px;" required placeholder="Write the brand name , features and all other internal external accesssories and specifications of Item" onfocus="show_description();"  onblur="hide_description();" ></textarea>	
										</div>
                    </div>
                    <h3 style="font-family:verdana; font-weight:100; color:#254B87">Upload Images of The product</h3>
                    <div id="bhavesh2">
					  				<div id="tags" class="form_divs">
												Tags
                        <pre style="display:inline;" >         </pre>   
												<input type="text" name="tag" onfocus="show();" placeholder="Tag1, Tag2, Tag3" onfocus="show_tags();" onblur="hide_tags();">
										</div>
              
								<!--/fieldset-->
								<div id="images_upload" class="form_divs" >
										Upload<pre style="display:inline;">          </pre>                    
                    <input type="file" name="fileToUpload" id="fileToUpload" required><br><br>
                    <pre style="display:inline;">                </pre>   
                    <input type="file" name="fileToUploadTwo" required><br><br>
                    <pre style="display:inline;">                </pre>  
                    <input type="file" name="fileToUploadThr" required><br><br>
                    <pre style="display:inline;">                </pre>
                    <input type="file" name="fileToUploadFour" required><br>
                    
								</div>
              </div>
              
              <h3 style="font-family:verdana; font-weight:100; color:#254B87">Enter Your Personal details</h3>
                <div id="bhavesh3">
										<div id="name" class="form_divs">
                        Name<pre style="display:inline;" >           </pre>
												<input type="text" name="seller_name" onfocus="show_name();" onblur="hide_name();" required>	 
					  				</div>
					  				<div id="roll_no" class="form_divs">
												Roll No.<pre style="display:inline;">         </pre>
												<input type="text" name="seller_roll"/>
										</div>
										<div id="address" class="form_divs">
												Add.<pre  style="display:inline;">            </pre>
												<input type="text" name="address"  onfocus="show_address();" onblur="hide_address();">
										</div>
										<div id="contact" class="form_divs">
												Contact<pre  style="display:inline;" onfocus="show_contact();" onblur="hide_contact();">          </pre>
												<input type="text" name="contact"/ >
										</div>
              </div>
              <div id="button_choose" style="margin-top:80px;"><pre  style="display:inline;">            </pre>
                <div id="sell" onclick="sell_form();">Sell</div>
                <div id="lend" onclick="lend_form();">Lend</div>
                <div id="share" onclick="share_form();">Share</div>
                <div id="auction">Auction</div>
              </div>
              <input type="text" style="display:none;" id="what_opt_for" name="type_of_service"/>
              <div id="bhavesh4">
                
              </div>
							 		<input type="submit" value="Submit" id="submit_button" name="submitbtn">
					</form>	
            </div>
         
		</div>
    <div id="categories">
        <div id="heading">
            <h4 style="display:inline; font-weight:100;">Choose  Category</h4>
            <div id="close" style="display:inline;"><a onclick="closeIt();" style="font-weight:bolder;">&times;</a></div>
        </div>
        
        <table>
            <tbody>
            <tr>
                <td>
                    <div class="category_divs" onclick="books();">
                        <img  class="cat_images" src="cat_img/books.jpg"/>
                        <p>Books</p>
                    </div>      
                </td>
                <td>
                    <div class="category_divs" onclick="sports();">
                        <img class="cat_images" src="cat_img/sports.jpg"/>
                        <p>Sports</p>
                    </div>
                </td>
                <td>
                    <div class="category_divs" onclick="floaters();">
                        <img src=""/>
                        <p>Shoes/floaters</p>
                    </div>
                </td>
                <td>
                    <div class="category_divs" onclick="smartphones();">
                        <img class="cat_images" src="cat_img/phone.gif"/>
                        <p>Smartphones</p>
                    </div>
                </td>
                <td>
                    <div class="category_divs" onclick="food();">
                        <img src="cat_img/fast_food_311861.jpg" class="cat_images"/>
                        <p>Food Item</p>
                    </div>  
                </td>
            </tr> 
            <tr>
                <td>
                    <div class="category_divs" onclick="electronics();">
                        <img  class="cat_images" src="cat_img/headphones.gif"/>
                        <p>Electronics</p>
                    </div>    
                </td>
                <td>
                    <div class="category_divs" onclick="bike();">
                        <img class="cat_images" src="cat_img/bike.gif"/>
                        <p>Bikes</p>
                    </div>
                </td>
                <td>
                    <div class="category_divs" onclick="lab();">
                        <img src="cat_img/lab.jpeg" class="cat_images"/>
                        <p>Lab Accessories</p>
                    </div>
                </td>
    
                <td>
                    <div class="category_divs" onclick="fashion();">
                        <img class="cat_images" src="cat_img/fashion.jpg"/>
                        <p>Fashion</p>
                    </div>
                </td>
                <td>
                    <div class="category_divs" onclick="services();">
                        <img src="cat_img/services.jpg" class="cat_images"/>
                        <p>Services</p>
                    </div>
                </td>
            </tr>
           </tbody>
        </table>    
    </div>
			<script type="text/javascript">
          function showCategories(){
               document.getElementById('categories').style.display = "block";
          }
          
          function closeIt(){
              document.getElementById('categories').style.display  = "none";
          }
          
          function services(){
              document.getElementById('cat').value = "services";
              document.getElementById('categories').style.display = "none";
          }
          
          function fashion(){
              document.getElementById('cat').value = "fashion";
              document.getElementById('categories').style.display = "none";
          }
          
          function lab(){
              document.getElementById('cat').value = "laboratory_accessories";
              document.getElementById('categories').style.display = "none";
          }
          
          function bike(){
              document.getElementById('cat').value = "bike";
              document.getElementById('categories').style.display = "none";
          }
          
          function electronics(){
              document.getElementById('cat').value = "electronics accessories";
              document.getElementById('categories').style.display = "none";
          }
          
          function food(){
              document.getElementById('cat').value = "Food";
              document.getElementById('categories').style.display = "none";
          }
          
          function smartphones(){
              document.getElementById('cat').value = "smartphones";
              document.getElementById('categories').style.display = "none";
          }
          
          function floaters(){
              document.getElementById('cat').value = "floaters";
              document.getElementById('categories').style.display = "none";
          }
          
          function sports(){
              document.getElementById('cat').value = "sports_accessories";
              document.getElementById('categories').style.display = "none";
          }
          
          function books(){
              document.getElementById('cat').value = "books";
              document.getElementById('categories').style.display = "none";
          }
          
          
          
			</script>
		 
      <script type="text/javascript">
          var p = 0;
          var sold = 0, lend=0;shared =   0;
          
            function  sell_form(){
                if(p==0){
                    document.getElementById('sell').style.display ="none";
                    var div_input = document.createElement('div');
                    document.getElementById('bhavesh4').appendChild(div_input);
                    div_input.className ="form_divs";
                    div_input.innerHTML = "Price"+"<pre style='display:inline;'>           </pre>";
                    var input = document.createElement('input');
                    div_input.appendChild(input);
                    input.name = "price";
                    input.type  =  "text";
                    div_input.tagName = "Price_for_sale"
                    document.getElementById('what_opt_for').value ="object";
                    sold = 1;
                    p=1;
                }  
            }
          
            function lend_form(){
                if(p==0){
                    document.getElementById('lend').style.display ="none";
                    var div_input1 = document.createElement('div');
                    document.getElementById('bhavesh4').appendChild(div_input1);
                    div_input1.innerHTML = "Available From"+"<pre style='display:inline;'>        </pre>";
                    div_input1.className ="form_divs";
                    var input1 = document.createElement('input');
                    div_input1.appendChild(input1);
                    input1.name = "date_available_from";
                    input1.type  =  "date";
                    var div_input2 = document.createElement('div');
                    document.getElementById('bhavesh4').appendChild(div_input2);
                    div_input2.innerHTML = "Available Upto"+"<pre style='display:inline;'>        </pre>";
                    div_input2.className ="form_divs";
                    var input2 = document.createElement('input');
                    div_input2.appendChild(input2);
                    input2.name = "date_available_upto";
                    input2.type  =  "date";                    
                    var div_input3 = document.createElement('div');
                    document.getElementById('bhavesh4').appendChild(div_input3);
                    div_input3.innerHTML = "Lend Price Per Day"+"<pre style='display:inline;'>    </pre>";
                    div_input3.className ="form_divs";
                    var input3 = document.createElement('input');
                    div_input3.appendChild(input3);
                    input3.name = "lend_price";
                    input3.type  =  "text";                    
                    document.getElementById('what_opt_for').value ="lend";          
                    lend = 1;
                    p=1;
                }
            }   
          
           
          
                             
            function share_form(){
                if(p==0){
                    document.getElementById('share').style.display ="none";
                    var div_input1 = document.createElement('div');
                    document.getElementById('bhavesh4').appendChild(div_input1);
                    div_input1.innerHTML = "sharing Persons"+"<pre style='display:inline;'>   </pre>";
                    div_input1.className ="form_divs";
                    var input1 = document.createElement('input');
                    div_input1.appendChild(input1);
                    input1.name = "persons_sharing";
                    input1.type  =  "number";                    
                    input1.placeholder = "No of Persons You want Share with";
                    var div_input2 = document.createElement('div');
                    document.getElementById('bhavesh4').appendChild(div_input2);
                    div_input2.innerHTML = "Original Price"+"<pre style='display:inline;'>    </pre>";
                    div_input2.className ="form_divs";
                    var input2 = document.createElement('input');
                    div_input2.appendChild(input2);
                    input2.name = "original_price";
                    input2.type  =  "text";                    
                    document.getElementById('what_opt_for').value ="share";                    
                    p = 1;
                    shared = 1;
                   // input2.placeholder = "No of Persons You want Share with";

                }
            }

          /*
            
                    var p = 0;
            function share_form(){
                if(p==0){
                    var input = document.createElement('input');
                    document.getElementById('upload_form').appendChild(input);
                    p++;
                }
            }


         */


         /*var imgArray = [
        'cat_img/hd1.png',
        'cat_img/hd2.jpg',
        'cat_img/hd3.jpg'],
        curIndex = 0;
        imgDuration = 5000;

    function slideShow() {
        document.getElementById('slideshow_image').src = imgArray[curIndex];
        curIndex++;
        if (curIndex == imgArray.length) { curIndex = 0; }
        setTimeout("slideShow()", imgDuration);
    }
    slideShow();*/

      </script>
    







    <div id="dialogbox" style="position:absolute;right: 20em; top:20em; background-color: white; border: solid black 0.7px;">
        <div id="dialog_title" style="display:none; position:relative:top:px; ">
                want to get you item noticed ? 
            <ul style="list-style-type:square;">
                <li>Give an attractive title</li>
                <li>Use correct spellings</li>
                <li>Use words that people can use to<br> search your item</li>
            </ul>
        </div>
        <div id="dialog_description" style="display:none;">
               Items with good description satisfy<br> customer
            <ul>
               <li>Add brand model  age and any <br>included accessories</li>
               <li>Mention condition and features</li>
               <li>Atleast Write 2 3 sentences for<br>good description</li>
            </ul>
        </div>
        <div id="dialogtag" style="display:none;">
             Give tags that people use to <br> search Your item
             <ul>
                <li>Write tag in the format shown</li>
                 <li>Put your tags wisely</li>
             </ul>
        </div>
        <div id="dialogname" style="display:none;">
            Enter The name of the person <br>
             owning the item
        </div>
        <div id="dialoglocation" style="display:none;">
             Enter the place where <br>
             item is currently placed <br>
             or to be picked up
        </div>
        <div id="dialogcontact" style="display:none;">
            <ul style="list-style-type:square; ">
                <li>Enter your mobile number</li>
                <li>Enter number correctly</li>
                <li>This number will be used <br> by customer to connect <br> with you </li>
            </ul>
        
        </div>
</div>
        
                    

          <script type="text/javascript">
            function show_title(){
                x = document.getElementById('dialog_title');
                x.style.display ="block";
                x.style.position = "relative";
                x.style.top = "0em";
                x.style.left = "5em";
                
            }
          
            function hide_title(){
                 document.getElementById("dialog_title").style.display = 'none';
            }
          
         //   function show_title(){
           //     document.getElementById('dialog_title').style.display ="block";
            //}
          
            function hide_cat(){
                 document.getElementById("categories").style.display = 'none';
            }
          
            function show_description(){
               x =  document.getElementById('dialog_description');
               x.style.display ="block";
               x.style.position = "relative";
               x.style.top = "em";
               x.style.left = "10em";

            }
          
            function hide_description(){
                 document.getElementById("dialog_description").style.display = 'none';
            }
          
            function show_tags(){
                 x =  document.getElementById("dialogtag");
                 x.style.display = 'block';
                 x.style.position = "relative";
                 x.style.top = "em";
                 x.style.left = "1em";
                
           }
            function hide_tags(){
                 document.getElementById("dialogtag").style.display = 'none';
            }
          
            function show_name(){
                x  = document.getElementById('dialogname');
                x.style.display ="block";
                x.style.position = "relative";
                x.style.top = "em";
                x.syle.left = "4em";
            }
            
           function  hide_name(){
                document.getElementById('dialogname').style.display= "none" ;

           }
          
           function show_address(){
               x = document.getElementById('dialoglocation');
               x.style.display ="block";
               x.style.position = "relative"; 
               x.style.top = "em";
               x.style.left = "-1em";
           }
          
          function  hide_address(){
                document.getElementById('dialoglocation').style.display= "none" ;

           }

          function show_contact(){
               x = document.getElementById('dialogcontact');
               x.style.display = "block";
               x.style.position = "relative";
               x.style.top = "em";
               x.style.left ="2.5em";
          }
            
          function hide_contact(){
              document.getElementById('dialogcontact').style.display = "none";

          }
            
          
          
          
          


 




    $(function(){           
        if (!Modernizr.inputtypes.date) {
            $('input[type=date]').datepicker({
                  dateFormat : 'yy-mm-dd'
                }
             );
        }
    });
</script>

		</body>
</html>
                      

































<!--input type="submit" value="Upload Image" name="submit">

											<!--label for="file-upload" class="custom-file-upload">
    										<i class="fa fa-upload" aria-hidden="true"></i>
											</label>
												<input id="file-upload" type="file" name="fileToUpload"><pre style="display:inline;">  </pre>
											<label for="file-upload" class="custom-file-upload">
    											<i class="fa fa-upload" aria-hidden="true"></i>
											</label>
													<input id="file-upload" type="file" name="fileToUploadTwo"><pre style="display:inline;">  </pre>
											<label for="file-upload" class="custom-file-upload">
    											<i class="fa fa-upload" aria-hidden="true"></i>
											</label>
												  <input id="file-upload" type="file" name="fileToUploadThr"><pre style="display:inline;">  </pre>
											<!--label for="file-upload" class="custom-file-upload">
    											<i class="fa fa-upload" aria-hidden="true"></i>
											</label>
											<input id="file-upload" type="file" name="image4"><pre style="display:inline;">  </pre-->					
