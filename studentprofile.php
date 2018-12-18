<?php
session_start(); 
include("databaseconnection.php");

$sqlquery = "SELECT * FROM student WHERE stid='$_SESSION[stid]'";
$sqlqueryresult = mysqli_query($dbconnection,$sqlquery);
$sqlfetch = mysqli_fetch_array($sqlqueryresult);


$_SESSION[insid] = rand();

include("header.php");
?>
    <div id="templatemo_main">
        <div class="col_w900 col_w900_last">        
<div class="col_w580 float_l">            
            	<div class="post_box">            	
                    <h2>Student details</h2>
                  <p>

<form method="post" action="" name="form1" onsubmit="return validation()">
<input type="hidden" name="insid" value="<?php echo $_SESSION[insid]; ?>" />
 <table class="tftable" width="407" border="1">
<tr><td>Course</td><td> 
 &nbsp; 
<?php  
$resultcourse = mysqli_query($dbconnection,"SELECT * FROM course where status = 'Enabled' ");
$rscourse = mysqli_fetch_array($resultcourse);
	echo $rscourse[course_name];

?>
</td>
</tr>
<tr><td>Name</td><td> &nbsp; <?php echo ucfirst($sqlfetch[name]); ?></td></tr>
<tr><td>Roll no</td><td> &nbsp; <?php echo $sqlfetch[rollno]; ?></td></tr>
<tr><td>Date of Birth</td><td> &nbsp; <?php echo $sqlfetch[dob]; ?></td></tr>
<tr><td>Father's Name</td><td> &nbsp; <?php echo $sqlfetch[father_name]; ?></td></tr>
<tr><td>Mother's Name</td><td> &nbsp; <?php echo $sqlfetch[mother_name]; ?></td></tr>
<tr><td>Gender</td><td> &nbsp; <?php echo $sqlfetch[gender]; ?></td></tr>
<tr><td>Address</td><td> &nbsp; <?php echo $sqlfetch[address]; ?></td></tr>
<tr><td>Contact No</td><td> &nbsp; <?php echo $sqlfetch[contact_no]; ?></td></tr>
<tr><td>Parents No</td><td> &nbsp; <?php echo $sqlfetch[parents_no]; ?></td></tr>
<tr><td>Blood group</td><td> &nbsp; <?php echo $sqlfetch[blood_group]; ?></td></tr>
<tr><td>Status</td><td> &nbsp; <?php echo $sqlfetch[status]; ?></td></tr>
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