<?php
include('database.php');
$sql1 = "SELECT * FROM weddingevents ";
$result = mysqli_query($con,$sql1);
        while($row=mysqli_fetch_array($result)) {
        $Ename = '".$row[0]."';
        echo "<center><div class='alert alert-danger'>Event Name : " . $row[0]. " <br><br> Event Date : " . $row[1]. ":" . $row[2]. ":" . $row[3]. "<br><br>Event Place :  " . $row[4]. " <button type='submit' onclick='<?php mysqli_query($con,'DELETE FROM `weddingevents` WHERE `Ename` = '".$Ename."'');?>' class='btn btn-danger'>Delete Event</button></div><center><br>";
        
    }
?>