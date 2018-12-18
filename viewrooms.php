<?php
session_start(); 
include("header.php");
include("databaseconnection.php");
?>
<div id="templatemo_main">

        <div class="col_w900 col_w900_last">
         
	<div class="post_box">            	
                  <p>              
                  <form method="get" action="">
                     <table class="tftable" height="104" border="1" align="center">
  <tr>
  <td height="28" colspan="2" align="center">Select Block</td>
  </tr>
<tr><td width="123" height="38">Block</td><td width="219">
<select name="blockid">
<option value="">Select</option>
<?php


$resultdelid = mysqli_query($dbconnection,"DELETE FROM room where room_id='$_GET[delid]'");
$rsdel = mysqli_fetch_array($resultdelid);

$resultblocks = mysqli_query($dbconnection,"SELECT * FROM blocks where status='Enabled'");
while($rsblocks = mysqli_fetch_array($resultblocks))
{
	if($_GET[blockid] ==$rsblocks[block_id] )
	{
	echo "<option value='$rsblocks[block_id]' selected>$rsblocks[block_name]</option>";
	}
	else
	{
	echo "<option value='$rsblocks[block_id]'>$rsblocks[block_name]</option>";
	}
}
?>
</select>
</td></tr>
<tr><td height="28" colspan="2" align="center"><input type="submit" name="submit" /></td></tr>
</table>
</form>
<hr />
</p>
		<div class="cleaner"></div>
    </div>
   
		</div>
        
        <div class="cleaner"></div>
    </div>     
    <div id="templatemo_main">
   
        <div class="col_w900 col_w900_last">

    
            <div id="gallery">
                <ul>   
<?php
$resultrooms = mysqli_query($dbconnection,"SELECT * FROM room where status = 'Enabled' AND block_id='$_GET[blockid]'");
while($rsrooms = mysqli_fetch_array($resultrooms))
{
$resultblocks1 = mysqli_query($dbconnection,"SELECT * FROM blocks where block_id='$rsrooms[block_id]' AND status = 'Enabled'");
$rsblocks1 = mysqli_fetch_array($resultblocks1);
	echo "<li><center><a href='rooms.php?editid=$rsrooms[room_id]'>Edit</a> | <a href='viewrooms.php?delid=$rsrooms[room_id]'>Delete</a></center><hr>
	<center><strong><font size='3'>Room No. : $rsrooms[room_no]</font></strong></center><br>
	<strong>&nbsp;&nbsp;Block name: </strong> $rsblocks1[block_name]<br>
	<strong>&nbsp;&nbsp;No. of Beds: </strong>";
	echo $rsrooms[no_of_beds];
	echo "<br><br>
	</li>";   
}
?>                                   
                </ul>  
                <div class="cleaner"></div>
            </div>
            
            <div class="cleaner"></div>
		</div>
        
        <div class="cleaner"></div>
    </div> <!-- end of main -->
        
</div> <!-- end of wrapper -->

<?php
include("footer.php");
?>