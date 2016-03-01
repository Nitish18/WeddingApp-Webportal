<?php
include 'database.php';
//include('session.php');
//For event creation
if(isset($_POST['Ename']) && isset($_POST['Eday']) && isset($_POST['Emonth']) && isset($_POST['Eyear']) && isset($_POST['Eaddress'])){
	if(!empty($_POST['Ename']) && !empty($_POST['Eday']) && !empty($_POST['Emonth']) && !empty($_POST['Eyear']) && !empty($_POST['Eaddress'])){
	$Ename =$_POST['Ename'];
	$Eday = intval($_POST['Eday']);
	$Emonth =intval($_POST['Emonth']);
	$Eyear =intval($_POST['Eyear']);
	$Eaddress =$_POST['Eaddress'];
	$sql = "INSERT INTO `weddingevents` (Ename,Eday,Emonth,Eyear,Eaddress) values ('".$Ename."','".$Eday."','".$Emonth."','".$Eyear."','".$Eaddress."')";
	if(mysqli_query($con,$sql)){
		echo 'Event Created and Saved for Future Workings.';
		mysqli_close($con);
	}else{
          	echo 'Error';  
		mysqli_close($con);
          	}
}
}
 ?>
 
<!DOCTYPE html>
<html>
<head>
	<title>Live Notification</title>
	<meta name="viewport" content="width=device-width,initial-scale=1"/>
	<link rel="icon" href="th.jpg" type="image/icon" sizes="16x16">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
	<style>
		nav{
		background-color:#ddd;
		color:#fff;
		}
		nav ul li :hover {
		background:$d4d4d4;
		}
		#popupMenu{
		background-color:#EF597B;
		}
		</style>
 <link rel="stylesheet" href="http://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.css" />
<script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
<script src="http://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.js"></script>
</head>
<body style="padding-bottom:70px;">
	<div class="container">
	<!-- For NAVBAR-->
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
					   

						<li> <a href="http://www.wedding.eventassociate.com/events.php"> Create Event </a></li>
						<li class="seeevents"><a href="#"> Delete Event </a></li>
						<li><a href="http://www.wedding.eventassociate.com/logout.php"><span class="glyphicon glyphicon-off"></span> Logout </a></li>
					</ul>
				</div>
				
			</div>		
		</nav>
			
		<!-- Pop up form to create an event -->           
       <a href="#popupLogin" class="createevent btn btn-info btn-lg col-md-12" data-rel="popup" data-position-to="window" data-role="button" data-inline="true"  data-theme="c" data-transition="pop"> Create Event </a>
		<form method="post" action="events.php">
                      <input type="text" class="hidden" name="allevents" placeholder="Enter username"/>
                       <input type="submit" value="See all Events"/>   
               <?php
                // error_reporting(E_ALL);
                 	// To show all events
                 	 if(isset($_POST['allevents'])){
                 		$sql1 = "SELECT * FROM weddingevents ";
                		$result = mysqli_query($con,$sql1);
                	    while($row = mysqli_fetch_array($result)) {
                        	echo "<center><div class='alert alert-danger'>Event Name : " . $row[0]. " <br><br> Event Date : " . $row[1]. ":" . $row[2]. ":" . $row[3].     "<br><br>Event Place :  " .$row[4]. " </div></center><br>";
        		     }
                            }
		?>
	</form>

	<form method="post" action="events.php" >
         	<input type="text" name="deleteevent" placeholder="Enter Event name same as you have written at the time of creation." required />
         	<input type="submit" value="Delete Event"/>   
	     <?php
  		if(isset($_POST['deleteevent'])&& !empty($_POST['deleteevent'])){
      			 $ename = $_POST['deleteevent'];
      			 $sql1 = "SELECT * FROM `weddingevents` WHERE `Ename` = '$ename'";
            	        $sql2 = "DELETE FROM `weddingevents` WHERE `Ename` = '$ename' ";
            	       $result = mysqli_query($con,$sql1);
                   if(mysqli_num_rows($result)){
                  	 mysqli_query($con,$sql2);
                    echo "<div class='alert alert-success'> Event '.$ename.' Deleted Successfully.</div>";
                    }else{
                    echo "<div class='alert alert-danger'>No Event with this name.</div>";
                    }
            }     		 
		?>
         </form>
         <div data-role="popup" id="popupMenu" data-theme="a">
		<div style="width:500px;"data-role="popup" id="popupLogin" data-theme="a" class="ui-corner-all">
			<form method="post" role="form" action="events.php">
				<div style="padding:10px 20px; border:1px red solid; border-radius:5px;">
				  <h3>Create an Event</h3>
					  <label for="un" class="ui-hidden-accessible">Enter Event Name:</label>
					  <input type="text" name="Ename" id="un" value="" placeholder="Enter Event Name" data-theme="a"><br/>
					  <label for="pw" class="ui-hidden-accessible">Event Day:</label>
					  <input type="text" name="Eday" id="pw" value="" placeholder="Enter Day of Event" data-theme="a"><br/>
					  <label for="pw" class="ui-hidden-accessible">Event Month:</label>
					  <input type="text" name="Emonth" id="pw" value="" placeholder="Enter Month of Event" data-theme="a"><br/>
					  <label for="pw" class="ui-hidden-accessible">Event Year:</label>
					  <input type="text" name="Eyear" id="pw" value="" placeholder="Enter Year" data-theme="a"><br/>
					  <label for="pw" class="ui-hidden-accessible">Event Address:</label>
					  <input  class="form-control" type="textarea" name="Eaddress" id="pw" value="" placeholder="Enter Address of Event" data-theme="a"><br/>
					  <button type="submit" data-theme="s" data-icon="check">Create an Event</button><br/>
				</div>
			</form>
		</div>
	</div>
         <p></p><p></p><p></p><p></p><p></p><p></p><p></p><p></p><p></p><p></p><p></p><p></p><p></p><p></p><p></p><p></p><p></p><p></p><p></p><p></p><p></p>
	
	<div class="alert alert-info">
			<p align="center">If something doesnot work then REFRESH this page.</p> 
	</div>	
</div>
<nav class="navbar navbar-default navbar-fixed-bottom" style="clear:both;">
  <div class="container">
<center>
    <ul><li style="color:blue;list-style:none; padding-top:20px;"> Copyright <span class="glyphicon glyphicon-copyright-mark"></span> Wedding Event Associate </li></ul>
<center>
  </div>
</nav>
</body>
</html>
