<?php
include("databaseconnection.php");

$resultroomsno = mysqli_query($dbconnection,"SELECT MAX(room_id) FROM room where block_id='$_GET[q]'");
$rsroomsno = mysqli_fetch_array($resultroomsno);

$resultroomsno1 = mysqli_query($dbconnection,"SELECT room_no+1 FROM room where room_id='$rsroomsno[0]'");
$rsroomsno1 = mysqli_fetch_array($resultroomsno1);
?>
<input type="text" name="roomno" value="<?php echo $rsroomsno1[0]; ?>" />