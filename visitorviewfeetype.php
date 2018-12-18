<?php
session_start();  // Developed by www.freestudentprojects.com
include("databaseconnection.php");
$delrec=mysqli_query($dbconnection,"DELETE FROM fees_structure where fee_str_id='$_GET[delid]'");
?><?php
include("header.php");
?>
    <div id="templatemo_main">
        <div class="col_w900 col_w900_last">        
<div class="col_w580 float_l">            
            	<div class="post_box">            	
                    <h2>Fees structure</h2>
                  <p>
 <table class="tftable" width="582" border="1">
<tr>
<td width="132"><strong>Fee type</strong></td>
<td width="100"><strong>Course</strong></td>
<td width="93"><strong>Cost</strong></td>
</tr>

<?php


$result = mysqli_query($dbconnection,"SELECT     fees_structure.*, course.*
FROM         fees_structure LEFT OUTER JOIN
                      course ON fees_structure.course_id = course.course_id");

while($rs = mysqli_fetch_array($result))
{
	echo "<tr>
	<td> &nbsp; $rs[fee_type]</td>
	<td> &nbsp; $rs[course_name]</td>
	<td> &nbsp; $rs[cost]</td>
	</tr>";
}
?>
</table></p>
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