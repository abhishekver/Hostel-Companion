<?php
include("databaseconnection.php");
?>
<script type="application/javascript">
function validation()
{
	if(document.form1.block.value=="")
	{
		alert("Block should not be Empty...");
		return false;
	}
	else if(document.form1.course.value=="")
	{
		alert("Course should not be Empty...");
		return false;
	}
	else
	{
		return true;
	}
}
</script>
<?php
if($_SESSION[insid] == $_POST[insid])
{
	if(isset($_POST[submit]))
	{
		if(isset($_GET[editid]))
		{
					$sql="UPDATE roomallotment SET blockid='$_POST[blockid]',course_id='$_POST[course_id]',status='$_POST[status]' WHERE allotment_id='$_POST[allotment_id]'";
			if(!mysqli_query($con,$sql))
			{
				die('ERROR:'. mysqli_error($dbconnection));
			}
			else
			{
				$res="<font color='purple'><strong>Record Updated Successfully......</strong></font><br>";
				$resi=1;
			}
		}
		else
		{
	$result = mysqli_query($dbconnection,"insert into block_allotment(block_id,course_id,status)values('$_POST[block]',
	'$_POST[course]','$_POST[status]')");
	
			if(!$result)
			{
				echo "Problem in SQL query";
			}
			else
			{
				$res = "Inserted successfully...";
				$resi= 1;
			}
		}
	}
}

$_SESSION[insid] = rand();

?>
<?php
include("header.php");
?>
    <div id="templatemo_main">
        <div class="col_w900 col_w900_last">        
<div class="col_w580 float_l">            
            	<div class="post_box">            	
                    <h2>Room allotment</h2>
                  <p>
<form method="post" action="" name="form1" onsubmit="return validation()">
<input type="hidden" name="insid" value="<?php echo $_SESSION[insid]; ?>" />
 <table class="tftable" border="1">
<?php
if($resi == 1)
{
	echo "<tr><td colspan=2>$res</td></tr>";
}
?>
<tr>
  <td width="120">Block</td><td width="240">
  <select name="block" >
<option value="">Select</option>
<?php
$resultblocks = mysqli_query($dbconnection,"SELECT * FROM blocks where status='Enabled'");
while($rsblocks = mysqli_fetch_array($resultblocks))
{
	if($rsblocks[block_id] == $rsrooms[block_id] )
	{
		echo "<option value='$rsblocks[block_id]' selected>$rsblocks[block_name]</option>";
	}
	else
	{
		echo "<option value='$rsblocks[block_id]'>$rsblocks[block_name]</option>";
	}
}
?>
</select></td></tr>
<tr>
<td>Course</td>
<td><select name="course">
  <option value="">Select</option>
<?php  
$resultcourse = mysqli_query($dbconnection,"SELECT * FROM course where status = 'Enabled' ");
while($rscourse = mysqli_fetch_array($resultcourse))
{  
	if($rscourse[course_id] == $sqlfetch[courseid])
	{
	echo "<option value='$rscourse[course_id]' selected>$rscourse[course_name]</option>";
	}
	else
	{
	echo "<option value='$rscourse[course_id]'>$rscourse[course_name]</option>";	
	}
}
?>
</select>
</td> </tr>
<tr><td>Status</td>
<td><select name="status">
<option>Enabled</option>
<option>Disabled</option>
</select>
</td>
</tr>
<tr><td colspan="2"><input type="submit" name="submit"></td></tr>
</table>
</form>
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