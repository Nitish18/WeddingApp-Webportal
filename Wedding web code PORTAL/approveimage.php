<?php
if(isset($_POST['approve_file']) && isset($_POST['approve'])){
       $apprname = $_POST['approve_file'];
 $approve = "INSERT INTO finalimages (flinks) SELECT (links) FROM images WHERE `links`='$apprname'";
$delete = "DELETE FROM `images` WHERE `links` = '$apprname'"; 
    if(mysqli_query($con,$approve)==TRUE && mysqli_query($con,$delete)==TRUE ){
             echo "<center class='alert alert-success'>Approval Successful!</center><br/>";
      }else{
      echo "<center class='alert alert-danger'>There is somewhere an Error!</center><br/>";
      }
}

?>