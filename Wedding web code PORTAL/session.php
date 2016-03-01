<?php
session_start();
$log = $_SESSION['loggedin'];
if (!$log) {
   header("Location:index.php");
   echo 'You must log in first';
   exit();
}

?>
