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
include("databaseconnection.php");
$delrec=mysqli_query($dbconnection,"DELETE FROM registration where reg_id='$_GET[delid]'");

?>
<?php
include("header.php");
?>
    <div id="templatemo_main">
        <div class="col_w900 col_w900_last">        
<div class="col_w580 float_l">            
            	<div class="post_box">            	
                    <h2>View registration details</h2>
<p>

 <table class="tftable" width="922" border="1">
<tr align="center">
<td><strong>Student details</strong></td>
<td><strong>Room details</strong></td>
<td><strong>Student type</strong></td>
<td><strong>Date</strong></td>
<td><strong>Types of food</strong></td>
<td><strong>Action</strong></td>
</tr>

<?php
$result=mysqli_query($dbconnection,"SELECT * FROM registration");
while($rs=mysqli_fetch_array($result))
{
	echo "<tr><td>";
$result3=mysqli_query($dbconnection,"SELECT * FROM student left join course ON course.course_id = student.courseid where stid='$rs[stid]'");
$rs3=mysqli_fetch_array($result3);
	echo "Name: $rs3[name]<br>
	Course: $rs3[course_name]<br>
	Roll No.: $rs3[rollno]<br>
	DOB: $rs3[dob]<br>
	Gender: $rs3[gender]<br>";
	echo "</td><td>";
	
$resultroom1=mysqli_query($dbconnection,"SELECT * FROM room where room_id='$rs[room_id]'");
$rsroom1 =mysqli_fetch_array($resultroom1);
echo "Room No.: $rsroom1[room_no]<br>";
echo "No. of Beds: $rsroom1[no_of_beds]<br>";

$resultblock2= mysqli_query($dbconnection,"SELECT * FROM blocks where block_id='$rsroom1[block_id]'");
$rsblock2=mysqli_fetch_array($resultblock2);
echo "Block Name: $rsblock2[block_name]<br>";

	echo "</td>
	<td>&nbsp; $rs[stud_type]</td>
	<td>
	&nbsp; Start date: $rs[start_date]<br>
	&nbsp; End date: $rs[end_date]</td>
	<td>&nbsp;
	Food type: $rs[food_type]<br>
	&nbsp;&nbsp;Beverage type: $rs[beverage_type]</td>
	<td align='center'>
	$rs[status]<br>
	<a href='viewregistration.php?delid=$rs[reg_id]' onclick='return ConfirmDelete()'>Delete</a></td>
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