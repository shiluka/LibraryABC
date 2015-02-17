<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Electronics</title>
<link href="style/main.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" href="style/normalize.css">
<link rel="stylesheet" href="style/style.css" media="screen" type="text/css" />
  
<link href='http://fonts.googleapis.com/css?family=PT+Sans:400,700,400italic|PT+Sans+Narrow:400,700|PT+Sans+Caption:400,700' rel='stylesheet' type='text/css'>
<script type="text/javascript">
  WebFontConfig = {
    google: { families: [ 'PT+Sans:400,700,400italic:latin', 'PT+Sans+Narrow:400,700:latin', 'PT+Sans+Caption:400,700:latin' ] }
  };
  (function() {
    var wf = document.createElement('script');
    wf.src = ('https:' == document.location.protocol ? 'https' : 'http') +
      '://ajax.googleapis.com/ajax/libs/webfont/1/webfont.js';
    wf.type = 'text/javascript';
    wf.async = 'true';
    var s = document.getElementsByTagName('script')[0];
    s.parentNode.insertBefore(wf, s);
  })(); </script>
  <style type="text/css">
  .get_boxright a	{	color:#069; text-decoration:none;  }
  .get_boxright a:hover	{	color:#930;}
  .get_boxright { padding-left:10px}
  #get_box	{ border-bottom:dotted 1px #ccc; padding-bottom:5px;}
  </style>
  
</head>

<body>


<div class="top_blu_line" ></div>
<div id="main_div">
	<div id="main_top">
    	<div class="top_left"><a href="#"><img src="image/logo.png"></a></div>
        <div class="top_mid">
        	<span class="top_title1">ABC University</span><br/>
            <span class="top_title2">Library Management System </span>
        </div>
        <div class="top_right">
        	<div class="top_link"><a href="#">Home</a> | <a href="#">Help</a></div>
        </div>
        <div class="clear"></div>
    </div>
 
<!-- ---------------------- top -------------------------- -->

        <div class="body_mid" style="width:600px; margin:0 auto; float:none; " >
        	<div class="title1">Search</div>
            
            
            
<?php

//radio button part
$selection="";


	 
	 
function test_input($data)
{
     $data = trim($data);
     $data = stripslashes($data);
     $data = htmlspecialchars($data);
     return $data;
}

// Create connection
$con=mysqli_connect("localhost","root","mysql","abc_lms_new");

// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
  


            

if (true) { 

$selection="category";



if($selection=="category"){
	 $result = mysqli_query($con,"SELECT * from bookSearch_new where category = 'ee' ");
	 
}

echo "<div style='margin-top:20px;'>";
echo "<div id='get_box' style='border-bottom:2px solid #999; margin-bottom:20px;'>
                	<div class='get_boxleft'><strong>Author(s)</strong></div>
					
					<div class='get_boxright'><span name='book_title'><strong>Title</strong></span></div>
                    <div class='clear'></div>                    
                </div>";

		  
while($row = mysqli_fetch_array($result))
  {

	 echo "<div id='get_box' style='margin-bottom:10px'>
	<div class='get_boxleft'>" .$row['author_name_1']. ", " .$row['author_name_2']. ", " .$row['author_name_3']. "</div>
                  
			<div class='get_boxright'><a href='index_books.php?id=".$row['id']."' target='_blank' ><span name='title_span'>" .$row['title']. "</span></a></div>
           	<div class='clear'></div>                    
                </div>";
 
  
  }
		  
		  






}
?>



<!--<div id="main_bottom">Copyright © 2014 ABC University. All rights reserved.</div>-->
<script src="js/index.js"></script>








</body>
</html>






