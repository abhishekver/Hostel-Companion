<?php
session_start(); 
include("databaseconnection.php");

$_SESSION[insid] = rand();

?>
<?php
include("header.php");
?>
    <div id="templatemo_main">
        <div class="col_w900 col_w900_last">        
<div class="col_w580 float_l">            
            	<div class="post_box">            	
                    <h2>View Room allotment</h2>
                  <p>
<script>
function ConfirmDelete()
{
	var result=confirm("Are you sure want to delete this record?");
	if(result==true)
	{
		return true;
	}
	else
	{
		return false;
	}
}
</script>


<?php
$delrec=mysqli_query($dbconnection,"DELETE FROM block_allotment where allotment_id='$_GET[delid]'");
?>
 <table class="tftable" width="577" border="1">
<tr>
<td width="125" align="center"><strong>Block</strong></td>
<td width="154" align="center"><strong>Course</strong></td>
<!-- <td width="146" align="center"><strong>Status</strong></td> -->
<td width="124" align="center"><strong>Action</strong></td>
</tr>

<?php
$result=mysqli_query($dbconnection,"SELECT     block_allotment.*, course.*
FROM         block_allotment LEFT OUTER JOIN
                      course ON block_allotment.course_id = course.course_id");
while($rs=mysqli_fetch_array($result))
{
	$result1=mysqli_query($dbconnection,"SELECT * FROM blocks where block_id = '$rs[block_id]'");
$rs1=mysqli_fetch_array($result1);
	echo "<tr>
	<td>$rs1[block_name]</td>
	<td>$rs[course_name]</td>
	<td><a href='viewroomallot.php?delid=$rs[allotment_id]'onclick='return ConfirmDelete()'>Delete</a></td>
	</tr>";
}
?>
</table>
</p>
<div class="cleaner"></div>
                </div>
</div>           
            <div class="col_w280 float_r">
            <?php
			include("sidebar.php");
			?>   
            </div>            
            <div class="cleaner"></div>
		</div>
        
        <div class="cleaner"></div>
    </div> <!-- end of main -->
        
</div> <!-- end of wrapper -->


<?php
include("footer.php");
?>