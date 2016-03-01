<?php
      include('database.php');
	if(isset($_POST['delete_file']) && isset($_POST['delete'])){
	 $filename = $_POST['delete_file'];
       if($filename != "Admin/"){
	 //$sql1 = "DELETE FROM `images` WHERE `links`='".$filename."'";
         $sql2 = "DELETE FROM `adminimages` WHERE `alinks` = '$filename'";
	if($con->query($sql2)==TRUE){
              unlink($filename);
         echo "<div class='alert alert-success' align='center'> Image deleted.</div>";
           }
        }else{
              echo "Unable To Delete Image.";
             }

             }
?>