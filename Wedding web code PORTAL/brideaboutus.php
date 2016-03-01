<?php  
$username="eventjyy_wedding";  
$password="wedding";  
$hostname = "localhost";  
//connection string with database  
$dbhandle = mysql_connect($hostname, $username, $password)  
or die("Unable to connect to MySQL");  

// connect with database  
$selected = mysql_select_db("eventjyy_wedding",$dbhandle)  
or die("Could not select examples");  
//query fire  
$result = mysql_query("SELECT * FROM bridegroom");  
$json_response = array();  
// fetch data in array format  
while ($row = mysql_fetch_array($result, MYSQL_ASSOC)) {  
// Fetch data of Fname Column and store in array of row_array  

 $row_array['bname'] = $row['bname'];
 $row_array['discription'] = $row['discription'];
 $row_array['familyDiscription'] = $row['familyDiscription'];
 $row_array['photolink'] = $row['photolink'];

 $row_array['gname'] = $row['gname'];
 $row_array['gdiscription'] = $row['gdiscription'];
 $row_array['gfamilydiscription'] = $row['gfamilydiscription'];
 $row_array['gphotolink'] = $row['gphotolink'];
 





 
//push the values in the array  
array_push($json_response,$row_array);  
}  
//  
echo json_encode($json_response);  
?>  
