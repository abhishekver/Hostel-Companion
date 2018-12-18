<?php
include("header.php");
?>
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
$delrec=mysqli_query($dbconnection,"DELETE FROM student where stid='$_GET[delid]'");
?>

<div id="templatemo_main">

        <div class="col_w900 col_w900_last">
        <h2>View students</h2>
         <table class="tftable" width="915" border="1">
<tr>
<td width="143"><div align="center"><strong>Name</strong></div></td>
<td width="114"><div align="center"><strong>Course details</strong></div></td>
<td width="138"><div align="center"><strong>Profile</strong></div></td>
<td width="183"><div align="center"><strong>Parents</strong></div></td>
<td width="195"><div align="center"><strong>Contact Info</strong></div></td>
<td width="102"><div align="center"><strong>Action</strong></div></td>
</tr>

<?php
$result=mysqli_query($dbconnection,"SELECT * FROM student left join course ON course.course_id = student.courseid");
while($rs=mysqli_fetch_array($result))
{
	echo "<tr>
	<td>$rs[name]</td>
	<td>
	Course: $rs[course_name]<br>
	Roll No.: $rs[rollno]</td>
	<td>DOB: $rs[dob]
	<br> Gender: $rs[gender]
	<br>Blood group: $rs[blood_group]
	</td>
	<td>Father's Name: $rs[father_name]
	<br> Mother's name: $rs[mother_name]
	</td>
	<td>$rs[address]
	<br>Contact No. $rs[contact_no]
	<br>Parents No. $rs[parents_no]</td>
	<td align='center'>Status: $rs[status]<br>
	<a href='viewstudentdetails.php?studentid=$rs[stid]'>View</a><br>
	<a href='viewstudent.php?delid=$rs[stid]'onclick='return ConfirmDelete()'>Delete</a>
	</td>
	</tr>";
}
?>
</table>
        </div>
</div>

<?php
include("footer.php");
?>