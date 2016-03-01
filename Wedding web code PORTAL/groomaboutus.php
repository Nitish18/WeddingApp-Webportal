<?php  
$username="eventjyy_wedding";  
$password="wedding";  
$hostname = "localhost";  
//connection string with database  
$dbhandle = mysql_connect($hostname, $username, $password)  
or die("Unable to connect to MySQL");  
echo "Connected to MySQL<br>";  
// connect with database  
$selected = mysql_select_db("eventjyy_wedding",$dbhandle)  
or die("Could not select examples");  
//query fire  
$result = mysql_query("SELECT * FROM groom");  
$json_response = array();  
// fetch data in array format  
while ($row = mysql_fetch_array($result, MYSQL_ASSOC)) {  
// Fetch data of Fname Column and store in array of row_array  
 $row_array['description'] = $row['description'];
 $row_array['familyDiscription'] = $row['familyDiscription'];
 $row_array['photo'] = $row['photo'];




 
//push the values in the array  
array_push($json_response,$row_array);  
}  
//  
echo json_encode($json_response);  
?>  
json_encode() - Returns the JSON representation of a value.  