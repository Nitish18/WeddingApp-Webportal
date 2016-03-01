<html>
<head>
<title>Photo Album</title>
 <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
</head>
<body style="background-color:#bbb;">
<div class= "container">
<?php
         
	 include('database.php');
$query = mysqli_query($con,'SELECT * FROM `finalimages` WHERE 1');

while($rows=mysqli_fetch_array($query))
        {  
            $mapNo=$rows[0];  
            $links=$rows[1]; 
			
            echo '
		<center style="display:inline-block; ">
		<a href="'.$links.'"><img class="image" style ="width:200px; height:80px; margin:10px;border:hidden;border-radius:10px;"src="'.$links.'"/></a><br> </center>';
}