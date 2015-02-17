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

        <div class="body_mid" style="width:650px">
        	<div class="title1">Search</div>
            <div>

            </div>
            
     
     
<?php 

$id = $_GET['id'];


$con = mysqli_connect("localhost","root","mysql","abc_lms_new");


if (mysqli_connect_errno()){
	echo "Failed to connect Database: " .mysqli_connect_error();
	}

$result = mysqli_query($con,"SELECT * from bookSearch_new where id = '" . $id . "'" );


while($row = mysqli_fetch_array($result)){
	
 $ISBN = $row['ISBN'];
	 
  echo " <div style='margin-top:20px;' class='test'>
        	<form action='' method='get'>
            	<div id='get_box'>
                	<div class='get_boxleft'>ISBN</div>
					<div class='get_boxright'><label name='isbn_label'>" .$row['ISBN']. "</label></div>
                    <div class='clear'></div>                    
                </div>
                ";
				
		
				$newLocation = mysqli_query($con,"SELECT * from locations where id = '" . $row['location_id'] . "'" );
				$row2=mysqli_fetch_array($newLocation);
				$location = "Shelf : ".$row2['shelve_ID']." <br> Row : ".$row2['row_number']."  <br>  Section : ".$row2['section'];
				
				
				echo "
                <div id='get_box'>
                	<div class='get_boxleft'>location ID</div>
  
                    <div class='get_boxright'><label name='location_label' type='text'>" .$location. "</div>
                    <div class='clear'></div>                    
                </div>
                
                <div id='get_box'>
                	<div class='get_boxleft'>status</div>
                  
				  ";
  
  						$availablity;
	
						if($row['borrowed']){
							$availablity=" Not Available";
						}else{
							$availablity=" Available";
						}
					
					echo "
					
					<div class='get_boxright'><label name='status_label'>" .$availablity. "</label></div>
                    <div class='clear'></div>                    
                </div>
                
                <div id='get_box'>
                	<div class='get_boxleft'>category</div>
                   

					<div class='get_boxright'><label name='category_label'>" .$row['category']. "</label></div>
                    <div class='clear'></div>                    
                </div>
                
                <div id='get_box'>
                	<div class='get_boxleft'>title</div>
                    
                    <div class='get_boxright'><label name='title_label'>" .$row['title']. "</label></div>
                    <div class='clear'></div>                    
                </div>
                
                <div id='get_box'>
                	<div class='get_boxleft'>author(s)</div>
                 
					<div class='get_boxright'><label name='aurtor_label'>" .$row['author_name_1']. ", " .$row['author_name_2']. ", " .$row['author_name_3']. "</label></div>
                    <div class='clear'></div>                    
                </div>
            </form>
			
        </div>
        
        	
        </div>
        
        
        <div class='body_right' style='float:right;'>
        	
            <div class='img_preview'><img width='100%' src='image/".$ISBN.".jpg'></div>
        </div>
        <div class='clear'></div>
    </div>      	
    </div>
</div>";
	
	
}
	
?>
            

         </div>
        <div class="clear"></div>
    </div>      	
    </div>
</div>

<script src="js/index.js"></script>




</body>
</html>






