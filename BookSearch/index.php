<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Library Management System </title>
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
    <div id="main_body">
    	<div class="body_left">
        	<div class="title1">Category</div>
            <div class="container">
  
  <ul>
    <li class="dropdown">
      <a href="#" data-toggle="dropdown">Engineering <i class="icon-arrow"></i></a>
      <ul class="dropdown-menu">
       <li><a href='cse.php' target="_blank">Computer Science</a></li>
       <li><a href='ee.php' target="_blank">Electronic</a></li>
      </ul>
    </li>
    <li class="dropdown">
      <a href="#" data-toggle="dropdown">Medicine <i class="icon-arrow"></i></a>
      <ul class="dropdown-menu">
        <li><a href='anatomy.php' target="_blank">Anatomy</a></li>
        <li><a href='cardiology.php' target="_blank">Cardiology</a></li>
      </ul>
    </li>
    <li class="dropdown">
      <a href="#" data-toggle="dropdown">Physics <i class="icon-arrow"></i></a>
      <ul class="dropdown-menu">
        <li><a href='quantum.php' target="_blank">Quantum Mechanics</a></li>
        <li><a href='relativity.php' target="_blank">Relativity & Gravitation</a></li>
      
      </ul>
    </li>
  </ul>
  
</div>
        </div>
        <div class="body_mid">
        	<div class="title1">Search</div>
            <div>
            
           			 
            
            
            	<form action="" method="post">
                <div id="searchby">
                	<div class="radio_1"><span><input name="selection" type="radio" value="majic"><?php if (isset($selection) && $selection=="majic") echo "checked";?></span>
                    <span class="ra_tex1">Majic</span> <span class="ra_tex2">(e.g. einst relative))</span></div>
                    
                    <div class="radio_1"><span><input name="selection" type="radio" value="smart"><?php if (isset($selection) && $selction=="smart") echo "checked";?></span>
                    <span class="ra_tex1">Smart</span> <span class="ra_tex2">(by title)</span></div>
                    
                    <div class="radio_1"><span><input name="selection" type="radio" value="author"><?php if (isset($selection) && $selction=="author") echo "checked";?></span>
                    <span class="ra_tex1">Author</span> <span class="ra_tex2">(partial name allowed)</span></div>
                    
                    <div class="clear"> </div>
                    
                    
                    
                </div>
                <div style="margin-top:10px;">
                	<div class="serch_left"><input name="search_text" type="text"></div>
                    <div class="serch_right"><input name="search_button" type="submit" value="search"></div>
                    <div class="clear"></div>
                </div>
                </form>
            </div>
            
            
<?php

//radio button part
$selection="";
$selectionErr="";

if (empty($_POST["selection"]))
     {$selectionErr = "Selection is required";}
else
     {$selection = test_input($_POST["selection"]);}
	 
	 
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
  
  
            

if (isset($_POST['search_button'])) { // cheking whether form is submitted

$input = $_POST['search_text']; // getting the name
$input=strip_tags($input); //prevent sql injection

if($selection=="author") $result = mysqli_query($con,"SELECT * from bookSearch_new where author_name_1 like '%" . $input . "%' or author_name_2 like '%" .$input. "%' or author_name_3 like '%" .$input. "%'   " );

else if($selection=="smart") $result = mysqli_query($con,"SELECT * from bookSearch_new where title = '" . $input . "'" );

else if($selection=="majic"){
	 $result = mysqli_query($con,"SELECT * from bookSearch_new where title like '%" . $input . "%' or author_name_1 like '%" . $input . "%' or author_name_2 like '%" .$input. "%' or author_name_3 like '%" .$input. "%'   " );
	 
}
else
$result = mysqli_query($con,"SELECT * from bookSearch_new where title like '%" . $input . "%'" );


echo "<div id='get_box'>
                	<div class='get_boxleft'>Author(s)</div>
					
					<div class='get_boxright'><span name='book_title'>Title</span></div>
                    <div class='clear'></div>                    
                </div>";
	 
	 while($row = mysqli_fetch_array($result)){
		echo "<div id='get_box2'>
			<div class='get_boxleft'>" .$row['author_name_1']. ", " .$row['author_name_2']. ", " .$row['author_name_3']. "</div>
                  
			<div class='get_boxright'><a href='index_books.php?id=".$row['id']."' target='_blank' ><span name='title_span'>" .$row['title']. "</span></a></div>
           	<div class='clear'></div>                    
                </div>";
		  }

		 
}
?>

<script src="js/index.js"></script>

</body>
</html>






