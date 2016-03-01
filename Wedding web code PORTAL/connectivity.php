<?php
include('session.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>Wedding Event Associate</title>
<meta name="viewport" content="width=device-width,initial-scale=1"/>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css"/>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
<link rel="stylesheet" type="text/css" href="style.css"/>

</head>
<body>
<div class="container">
<div id="page_links" class="alert alert-warning col-md-12">
	<div class="circle" align="center">
		<div><a href="#aboutus">About US</a></div>
		<div><a href="http://wedding.eventassociate.com/album.php"> Gallery </a></div>
		 <div><a href="http://wedding.eventassociate.com/events.php">Events</a></div>
		<div><a href="http://wedding.eventassociate.com/gallery.php"> Album </a></div>
	</div>
	<div class = "circle" align = "center">
               
		<div><a href="http://wedding.eventassociate.com/livechat.html">Live Chat</a></div>		
		<div><a href="http://wedding.eventassociate.com/livenotifications.html">Live Notification</a></div>
		<div><a href="http://wedding.eventassociate.com/howtoreach.php">How To Reach</a></div>
<div><a href="http://wedding.eventassociate.com/logout.php">Log out</a></div>
	</div>
</div>
</div>
<div class="container">
<div id="aboutus">
     <h3 align="center" class="alert alert-success"> Add and view Bride and Groom Details !!!!</h3>
<div class="row">
       <div class="col-md-12 alert alert-danger"> 
           <br/><br/>
             <div class="bride-form login-panel panel panel-info">  
                <div class="panel-heading">  
                    <h3 class="panel-title" align="center"> Add Bride & Groom Details</h3>  
                </div>  
            <div class="panel-body">
 			<form   method="post" enctype="multipart/form-data" action="bridegroom.php">
			 <fieldset> 
                                <div class="form-group"> 
     					<input class="form-control" type="text" name="bridename" placeholder="Name of Bride" required>
   				  </div>
				<div class="form-group"> 
    					<input class="form-control" type="text" name="discriptionbride" placeholder="Discription of Bride" required>
   				 </div>
   				  <div class="form-group"> 
    					<input class="form-control" type="text" name="familydiscriptionbride" placeholder="Discription of Bride's Family" required>
   				 </div>
				<div class="form-group"> 
					<input  class="form-control" type="file" name="photobride" placeholder="Upload Bride's Beautiful Photo">
				</div>
<div class="form-group">  
    					<input class="form-control" type="text" name="groomname" placeholder="Name of Groom" required>
   				 </div>
				<div class="form-group">
    					<input class="form-control" type="text" name="discriptiongroom" placeholder="Discription of Groom" required>
   				 </div>
   				 <div class="form-group">  
    					<input class="form-control" type="text" name="familydiscriptiongroom" placeholder="Discription of Groom's Family"  required>
   				 </div>
				<div class="form-group"> 
					<input  class="form-control" type="file" name="photogroom" placeholder="Upload Groom's Beautiful Photo">
				</div>
				<div class="form-group">
     					<input  class=" btn btn-info btn-block" type="submit" name="submit" value=" Save Bride & Groom Details">
   				 </div>
                        </fieldset>
                    </form>
                  </div>       
               
              </div>
       </div>
 <!-- Div closing row class -->
</div>
<!-- Div closing container -->
</div>
</body>
</html>