<?php
 include('session.php');
?>
<!DOCTYPE html>
<html>
<head>
<title>WEA ADMIN Album</title>
<meta name="viewport" content="width=device-width,initial-scale=1"/>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">

<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
<style>
li{
        font: 20px Verdana; 
	padding-left:20px; 
	padding-right:20px; 
	align-self:flex-start;
	}
</style>
</head>
<body>
	<div class="container jumbotron">
	<nav class="nav navbar-top-fixed pull-right">
	  <ul style="list-style:none;display:inline-flex; clear:both;">
	  <li><a href="http://www.wedding.eventassociate.com/connectivity.php#aboutus">About US</a></li>
	  <li><a href="http://www.wedding.eventassociate.com/events.php">Events</a></li>
	  <li><a href="http://www.wedding.eventassociate.com/gallery.php"> Album </a></li>
	  <li><a href="http://www.wedding.eventassociate.com/livechat.html">Live Chat</a></li>
	  <li><a href="http://www.wedding.eventassociate.com/howtoreach.php">How To Reach</li>
	  <li><a href="http://www.wedding.eventassociate.com/livenotifications.html"> Live Notifications </a></li>
	  <li><a href="http://www.wedding.eventassociate.com/logout.php"> Logout </a></li>
	  </ul>
        </nav>
	<div class="row" id="up2">  
        <div class="col-md-7 col-md-offset-2">  
            <div class="login-panel panel panel-danger" id ="gallery" style="margin-top:100px;">  
                <div class="panel-heading">  
                    <h3 class="panel-title" align="center">Upload Images</h3>  
                </div>  
                <div class="panel-body">
			<form  class=""onsubmit= "gallery.php" method="post" enctype="multipart/form-data">
			<fieldset> 
				<div class="form-group"> 
    					<input  type="file" placeholder="choose file" name ="file">
   				 </div>
    				<div class="form-group">
    					<input  class=" btn btn-danger btn-block" type="submit" value="Upload" >
   				 </div>
<?php 
		include('database.php');
		 $location = "Admin/";
            	$file = $_FILES['file']['name'];
	                     	
		 //$sql = "INSERT INTO `eventjyy_wedding`.`images` (`imgNo`, `links`) VALUES (default,'$location$file')";
                 //$result = mysqli_query($con, $sql);
                  if($file != ''){
                $sql1 = "INSERT INTO `eventjyy_wedding`.`adminimages` (`no`, `alinks`) VALUES (default,'$location$file')";
		$result1 = mysqli_query($con, $sql1);		
                         		}else {
                      echo 'select an image';       
                      }
			
 ?>
    <?php
         
         $location = "Admin/";
	$fname = $_FILES['file']['name'];	
	$tmp_name = $_FILES['file']['tmp_name'];
	$extension = pathinfo($fname, PATHINFO_EXTENSION);
	if(isset($fname)){
			
		if(!empty($fname) && !(file_exists($fname))){
			
			
			if($extension=="jpg" || $extension =="png" || $extension =="jpeg" && $type =="image/jpeg"){
                                 
					if(move_uploaded_file($tmp_name,$location.$fname)){	
				echo '<span class="btn btn-block btn-success btn-lg"> File uploaded successfully </span>';
				}
				else {echo '<span class="btn btn-block btn-danger btn-lg">There is an error </span>';
					}
				} else{
				 echo '<span class="btn btn-block btn-danger btn-lg">File is not an image</span>';
				 }
		}
		else{
			echo '<span class="btn btn-block btn-info btn-lg">Select file or already exists </span>';
			}

			}
			
			
	
?>  
     			</fieldset> 
    			</form>
    			
     		  </div>  
            </div>  
        </div>  
    </div>  
</div>
<div class="container jumbotron">
<?php
      include('database.php');
	include('deleteadmin.php');
	$query = mysqli_query($con,'SELECT * FROM `adminimages` WHERE 1');

while($rows=mysqli_fetch_array($query))
        {  
            $mapNo=$rows[0];  
            $links=$rows[1]; 
			
            echo '<center style="display:inline-block;">
		<a href="'.$links.'"><img class="image" style ="width:200px; height:80px; margin:10px;border:hidden;border-radius:10px;"src="'.$links.'"/></a><br>
	        <form method="post" role="form">
                <input type="hidden" value="'.$links.'" name="delete_file" />
		 <input class= "btn btn-danger btn-xs" type="submit" value="Delete image" name = "delete" />
		</form>

           	</center> ';
		}
		
?>
    </div>
    </body>
</html>