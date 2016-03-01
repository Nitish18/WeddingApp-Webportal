<?php 
 include('session.php');
?>
<!DOCTYPE html>
<html>
<head>
<title>Photo Gallery</title>
 <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
<style>
nav{
		background-color:#ddd;
		color:#fff;
		}
		nav ul li :hover {
		background:$d4d4d4;
		}
</style>
</head>
<body style="background-color:#bbb;">
<div class= "container">
<nav class="navbar navbar-reverse">
			<div class="container-fluid">
				<!-- For NavBar Header or Brand Name -->
				<div class="navbar-header">
					<!--<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
					        <span class="sr-only">Toggle navigation</span>
					        <span class="icon-bar"></span>
					        <span class="icon-bar"></span>
					        <span class="icon-bar"></span>
					      </button> -->
					      <a class="navbar-brand" href="http://www.wedding.eventassociate.com/connectivity.php">Wedding Event Associate</a>
				</div>
				<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
					<ul class="nav navbar-nav navbar-right">
						<li class="active" ><a href="http://www.wedding.eventassociate.com/connectivity.php">WEA Home<span class="sr-only">(current)</span></a></li>
						<li><a href="http://www.wedding.eventassociate.com/gallery.php">Gallery</a></li>
					        <li><a href="http://www.wedding.eventassociate.com/events.php">Events</a></li>
						<li><a href="http://www.wedding.eventassociate.com/logout.php"><span class="glyphicon glyphicon-off"></span> Logout </a></li>
					</ul>
				</div>
				
			</div>		
		</nav>
<div class="jumbotron">
<?php
	
      include('database.php');
	include('deleteimage.php');
	include('approveimage.php');    	

$query = mysqli_query($con,'SELECT * FROM `images` WHERE 1');

while($rows=mysqli_fetch_array($query))
        {  
            $mapNo=$rows[0];  
            $links=$rows[1]; 
			
            echo '
		<center style="display:inline-block; ">
		<a href="'.$links.'"><img class="image" style ="width:200px; height:80px; margin:10px;border:hidden;border-radius:10px;"src="'.$links.'"/></a><br>
	        <form method="post" role="form">
                <input type="hidden" value="'.$links.'" name="approve_file" />
		 <input class= "btn btn-success btn-xs" type="submit" value="Approve image" name = "approve" />
                
		 <input type="hidden" value="'.$links.'" name="delete_file" />
		 <input class= "btn btn-danger btn-xs" type="submit" value="Delete image" name = "delete" />
		</form>

           	</center> ';
		}
		
?>
</div>
 <h2 class="alert alert-info"><center style="font-family:'Comic sans MS';"> All Your Verified Images Are Here.</center></h2>
<div class="jumbotron">
     <?php 
       $query = mysqli_query($con,'SELECT * FROM `finalimages` WHERE 1');

while($rows=mysqli_fetch_array($query))
        {  
            $mapNo=$rows[0];  
            $links=$rows[1]; 
			
            echo '
		<center style="display:inline-block; ">
		<a href="'.$links.'"><img class="image" style ="width:200px; height:80px; margin:10px;border:hidden;border-radius:10px;"src="'.$links.'"/></a><br>
<form method="post" role="form">
                <input type="hidden" value="'.$links.'" name="delete_file" />
		 <input class= "btn btn-danger btn-xs" type="submit" value="Delete image" name = "delete" />
		</form>
             </center>';
}
   ?>    
</div>
</div>

</body>
</html>