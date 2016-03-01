 <?php
	if(isset($_POST['delete_file']) && isset($_POST['delete'])){
	 $filename = $_POST['delete_file'];
       if($filename != "Admin/"){
	 $sql1 = "DELETE FROM `images` WHERE `links`='$filename'";
         $sql2 = "DELETE FROM `finalimages` WHERE `flinks` = '$filename'";
	if($con->query($sql1)==TRUE && $con->query($sql2)==TRUE){
              unlink($filename);
         echo "<center class='alert alert-success'>Deletion Successful!</center><br/>";
           }
        }else{
              echo "<center class='alert alert-success'>Deletion Failed!</center><br/>";
             }

             }
?>