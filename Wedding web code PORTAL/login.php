<?php 
session_start();
include('database.php');
if(isset($_POST['username']) && isset($_POST['password']) ){
	$username = $_POST['username'];
	$password = md5($_POST['password']);
	if(!empty($username) && !empty($password)){
		
$sql = "SELECT * FROM users WHERE username = '$username' AND password= '$password' ";
	$query=mysqli_query($con,$sql);
       if (mysqli_num_rows($query))
    {          
                $_SESSION['loggedin'] = true;
		$_SESSION['username'] = $username;
                header("location:connectivity.php");
        
    }else{
    		 echo "<center><h4>Wrong Username or Password. Please Retry</h4> </center>"; 
                session_destroy(); 
               echo '<br/><br/><br/><center><a href="http://www.wedding.eventassociate.com/index.php"> Please Login Again With Right Credentials. </a></center>';
	}
}
}

    ?>