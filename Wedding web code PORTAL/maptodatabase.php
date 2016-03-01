<?php 
include('database.php');
error_reporting(E_ALL);
if(isset($_POST['placename']) && isset($_POST['latitude'])&& isset($_POST['longitude'])){
$placeName = $_POST['placename'];
$latitude = $_POST['latitude'];
$longitude = $_POST['longitude'];
   if(!empty($placeName) && !empty($latitude) && !empty($longitude)){
	$result = mysqli_query($con,"INSERT INTO `latlng`(`mapNo`, `placeName`, `latitude`,`longitude`) VALUES (default,'$placeName','$latitude','$longitude')");
	
		if(!mysqli_num_rows($result)){
			echo '<center>Map Submitted successfully.</center>';
			}
		else{
	echo '<center>error</center>';
	}
}
else{
     echo 'Please set Map Credentials.';
}
}
?>