<?php  
//include('session.php');
include('maptodatabase.php');
?>
<!DOCTYPE html>
<html>
<head>
<title>How To Reach</title>
<meta name="viewport" content="width=device-width, initial-scale=1"/>
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
<script src="http://maps.googleapis.com/maps/api/js"></script>
<script>
var map;
var myCenter=new google.maps.LatLng(28.49766083,77.233886);

function initialize()
{
var mapProp = {
  center:myCenter,
  zoom:10,
  mapTypeId:google.maps.MapTypeId.ROADMAP
  };

  map = new google.maps.Map(document.getElementById("googleMap"),mapProp);

  google.maps.event.addListener(map, 'click', function(event) {
    placeMarker(event.latLng);
  });
}

function placeMarker(location) {
  var marker = new google.maps.Marker({
    position: location,
    map: map,
  });
var latitude = location.lat();
var longitude = location.lng();
//var name = Marker.name();
 //Creating Input fields to set laoction 
 document.setlocation.latitude.value = latitude;
 document.setlocation.longitude.value = longitude;
  var infowindow = new google.maps.InfoWindow({
    content: 'Latitude: ' + location.lat() + '<br>Longitude: ' + location.lng()

  });
  infowindow.open(map,marker);
}
google.maps.event.addDomListener(window, 'load', initialize);
</script>

<style>
.myLocation{
     display:inline-block;
     border: hidden;
     padding:10px;
     width:inherit;
     hight:100px;
}
.heading{
    background-color:#00FFFF;
    border:hidden;
    border-radius:10px;
    padding:5px;
}
nav{
		background-color:#ddd;
		color:#fff;
		}
		nav ul li :hover {
		background:$d4d4d4;
		}
</style>
</head>

<body>
<div class="container">
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
						<li><a href="http://www.wedding.eventassociate.com/howtoreach.php/#seeplaces">See Places</a></li>
						<li><a href="http://www.wedding.eventassociate.com/gallery.php">Gallery</a></li>
					        <li><a href="http://www.wedding.eventassociate.com/events.php">Events</a></li>
						<li><a href="http://www.wedding.eventassociate.com/logout.php"><span class="glyphicon glyphicon-off"></span> Logout </a></li>
					</ul>
				</div>
				
			</div>		
		</nav>

<div id="googleMap" style="width:100%;height:650px;"></div>
<br>

<form name ="setlocation"  class="myLocation" method="post" style="border:2px solid green; border-radius:10px;">
<center ><h2 class="heading">Set Location of Wedding Place</h2></center>
<input type="text" class="form-control" name ="placename" placeholder ="Place Name (You have to write)" required><br>
<input type="text" class="form-control" name ="latitude" placeholder ="Latitude (Clicking on Map will set this)" required ><br>
<input type="text" class="form-control " name = "longitude" placeholder ="Longitude  (Clicking on Map will set this)" required><br>
<input type="submit" class="form-control btn btn-info" value="Set Location For Wedding Place" onclick="howtoreach.php"> <br><br>
</form>
<br><br><br>
<div class="jumbotron" style="border:2px solid green; border-radius:10px;">
	<form method="post" action="howtoreach.php">
                      <input type="text" class="hidden" name="allplaces" placeholder="Enter Place Name"/>
                       <input type="submit" class="form-control btn btn-info" value="See all Places"/>  
                       </br>   </br> 
               <?php
                
                 	// To show all locations
                 	 if(isset($_POST['allplaces'])){
                 	 
                 		$places = " SELECT * FROM `latlng` ";
                		$result1 = mysqli_query($con,$places);
                	    while($row1 = mysqli_fetch_array($result1)) {
                	   
                        	echo "<center><div class='alert alert-danger'>Place Name : " . $row1[1]. " <br><br>Place Latitude : " . $row1[2]. "<br><br> Place Longitude :  " .$row1[3]. " </div></center><br>";
        		     }
                            }
		?>
	</form>
	<br><br>
<form method="post" id="seeplaces" action="howtoreach.php" >
         	<input type="text" class="form-control" name="deletemap" placeholder="Enter Location/Place name same as you have written at the time of creation." required /><br>
         	<input type="submit" class="form-control btn btn-danger" value="Delete Place"/>   
	     <?php
  		if(isset($_POST['deletemap'])&& !empty($_POST['deletemap'])){
      			 $pname = $_POST['deletemap'];
      			 $sql1 = "SELECT * FROM `latlng` WHERE `placeName` = '$pname'";
            	        $sql2 = "DELETE FROM `latlng` WHERE `placeName` = '$pname' ";
            	       $result = mysqli_query($con,$sql1);
                   if(mysqli_num_rows($result)){
                  	 mysqli_query($con,$sql2);
                    echo "<div class='alert alert-success'> Place '.$pname.' Deleted Successfully.</div>";
                    }else{
                    echo "<div class='alert alert-danger'>No Place/Location with this name.</div>";
                    }
            }     		 
		?>
         </form>
</div>
</div>
</body>
</html>
