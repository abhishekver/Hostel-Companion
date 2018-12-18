<?php
session_start();  
include("header.php");
include("databaseconnection.php");

?>
    
    <div id="templatemo_middle_subpage">
    	<h2 align="center">Fee Report</h2>
  </div>
        
    <div id="templatemo_main">

        <div class="col_w900 col_w900_last">
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

$delrec=mysqli_query($dbconnection,"DELETE FROM fees where fee_id='$_GET[delid]'");
?>
 <table class="tftable" width="919" border="1">
<tr bgcolor="#FFFFCC">
<td>Invoice No.</td>
<td>Invoice date</td>
<td>Name</td>
<td>Roll No.</td>
<td>Course</td>
<td>Block name</td>
<td>Room No.</td>
<td>Student type</td>
<td>Start date</td>
<td>Last date</td>
<td>Total fees</td>
</tr>

<?php

$result=mysqli_query($dbconnection,"SELECT     fees.*, registration.*, student.*, student.courseid AS Expr1, course.*, room.*, blocks.*
FROM         student INNER JOIN
                      registration ON student.stid = registration.stid INNER JOIN
                      course ON student.courseid = course.course_id INNER JOIN
                      room ON registration.room_id = room.room_id INNER JOIN
                      blocks ON room.block_id = blocks.block_id RIGHT OUTER JOIN
                      fees ON registration.reg_id = fees.reg_id");
while($rs=mysqli_fetch_array($result))
{
	echo "<tr>
	<td>$rs[fee_id]</td>
	<td>$rs[invoice_date]</td>
	<td>$rs[name]</td>
	<td>$rs[rollno]</td>
	<td>$rs[course_name]</td>
	<td>$rs[block_name]</td>
	<td>$rs[room_no]</td>
	<td>$rs[stud_type]</td>
	<td>$rs[start_date]</td>
	<td>$rs[end_date]</td>	

	<td>$rs[total_fees]</td>				
	</tr>";
}
?>
</table>      
<br>
<centeR><button onclick="myFunction()">Print this report</button></centeR>

<script>
function myFunction()
{
window.print();
}
</script>
      <div class="cleaner"></div>
		</div>
        
        <div class="cleaner"></div>
    </div> <!-- end of main -->
        
</div> <!-- end of wrapper -->

<?php
include("footer.php");
?>