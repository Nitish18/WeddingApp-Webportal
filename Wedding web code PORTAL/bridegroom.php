<?php 
include('database.php');
//error_reporting(E_ALL);
  if(isset($_POST['bridename']) && isset($_POST['discriptionbride']) && isset($_POST['familydiscriptionbride']) && isset($_FILES['photobride'])&& isset($_POST['groomname']) && isset($_POST['discriptiongroom']) && isset($_POST['familydiscriptiongroom']) && isset($_FILES['photogroom']) ){
       $bname = $_POST['bridename'];
      $bdis = $_POST['discriptionbride'];
      $bphoto = $_FILES['photobride']['name'];
      $bfamdis = $_POST['familydiscriptionbride'];
      $gname = $_POST['groomname'];
      $gdis = $_POST['discriptiongroom'];
      $gfamdis = $_POST['familydiscriptiongroom'];
      $gphoto = $_FILES['photogroom']['name'];
     if(!empty($bname) && !empty($bdis) && !empty($bphoto) && !empty($bfamdis) && !empty($gname) && !empty($gdis) && !empty($gphoto) && !empty($gfamdis)){
     $location = "bridegroom/";
     $bfname = $_FILES['photobride']['name'];
     $gfname = 	$_FILES['photogroom']['name'];
	$btmp_name = $_FILES['photobride']['tmp_name'];
        $gtmp_name = $_FILES['photogroom']['tmp_name'];
	$bextension = pathinfo($bfname, PATHINFO_EXTENSION);
        $gextension = pathinfo($gfname, PATHINFO_EXTENSION);
	if(isset($bfname) && isset($gfname)){
			
		if(!empty($bfname) && !(file_exists($bfname))&& !empty($gfname) && !(file_exists($gfname))){
			
			
			if($bextension=="jpg" || $bextension =="png" || $bextension =="jpeg" || $gextension=="jpg" || $gextension =="png" || $gextension =="jpeg" && $type =="image/jpeg"){
                                 
					if(move_uploaded_file($btmp_name,$location.$bfname) && move_uploaded_file($gtmp_name,$location.$gfname) ){	
				echo '<center><span class="btn btn-block btn-success btn-lg"> File uploaded successfully </span></center>';
				}
				else {echo '<center><span class="btn btn-block btn-danger btn-lg">There is an error </span></center>';
					}
				} else{
				 echo '<center><span class="btn btn-block btn-danger btn-lg">File is not an image</span></center>';
				 }
		}
		else{
			echo '<center><span class="btn btn-block btn-info btn-lg">Select file or already exists </span></center>';
			}

			}
        $sqlb = "INSERT INTO `bridegroom`(`ID`, `bname`, `discription`, `familyDiscription`, `photolink`, `gname`, `gdiscription`,`gfamilydiscription`,`gphotolink`) VALUES  (default,'$bname','$bdis','$bfamdis','$location$bphoto','$gname','$gdis','$gfamdis','$location$gfname')";
         $result = mysqli_query($con,$sqlb);
         echo '<center><h3> Data Inserted Successfully .<h3></center>';
        echo '<center><a href="http://www.wedding.eventassociate.com/connectivity.php"> Go Back TO Main Page </a></center>';

 }
}
?>