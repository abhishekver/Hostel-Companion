<?php
session_start();
include("databaseconnection.php");  

if(isset($_SESSION[visitorid]))
{
	header("Location: visitorpanel.php");
}

if(isset($_SESSION[emp_id]))
{
	header("Location: dashboard.php");
}


if(isset($_POST[submit]))
{
	$sqlquery = mysqli_query($dbconnection,"SELECT * FROM visitor WHERE username='$_POST[uname]' and password='$_POST[password]' and status='Enabled'");
	$count = mysqli_num_rows($sqlquery);
	if($count == 1)
	{
		$msg="<p><font color='green'><strong>Logged in successfully...</strong></font></p>";
		$rs = mysqli_fetch_array($sqlquery);
		$_SESSION[visitorid] = $rs[visitorid] ;
		$_SESSION[stid] = $rs[stid] ;
		header("Location: visitorpanel.php");
	}
	else
	{
		$msg="<p><font color='red'><strong>Failed to login...</strong></font></p>";
	}
}

if(isset($_POST[empsubmit]))
{
	$sqlquery = mysqli_query($dbconnection,"SELECT * FROM employee WHERE login_id='$_POST[login]' and password='$_POST[emppassword]' and status='Enabled'");
	$count = mysqli_num_rows($sqlquery);
	if($count == 1)
	{
		$msg1="<p><font color='green'><strong>Logged in successfully...</strong></font></p>";
		$rs = mysqli_fetch_array($sqlquery);
		$_SESSION[emp_id] = $rs[emp_id] ;
		$_SESSION[emp_designation] = $rs[emp_type] ;
		header("Location: dashboard.php");		
	}
	else
	{
		$msg1="<p><font color='red'><strong>Failed to login...</strong></font></p>";
	}
}

include("header.php");
?>

   
    <div id="templatemo_middle">
    
    	<div id="intro">
        	<h2 align="center">HOSTEL MANAGEMENT SYSTEM</h2>
            <p>Website to Manage Hostels, students details, Employees, Mess bill, Room rent, etc.</p>
        </div>
    
        <div id="slider">

            <a href="#"><img src="images1/4.jpg" width="320" height="250" alt="" title="" /></a>
            <!-- <a href="#"><img src="images/slideshow/07.jpg" alt="" title="" /></a>
            <a href="#"><img src="images/slideshow/08.jpg" alt="" title="" /></a> -->

        </div>
	</div>
        
    <div id="templatemo_main">
          
        <div class="col_w900 col_w900_last">
        
        	<div class="col_w420 lp_box float_l">
       	  	  <h2 align="center"> VISITOR LOG-IN</h2>
              <?php echo $msg; ?>
              <form method="post" action="">
           	  	 <table class="tftable" width="380" height="138" border="0">
                <tr><td height="39">User Name</td><td><input name="uname" type="text" size="40"  class="input_field" /></td></tr>
                <tr><td>Password</td><td><input name="password" type="password" size="40" class="input_field" /></td></tr>
                <tr><td colspan=2 align="center"><input name="submit" type="submit" value="Login"></td></tr>
              </table>
              </form>
                </p>
        	</div>
        
            <div class="col_w420 float_r">
            
            	<h2 align="center"> EMPLOYEE LOG-IN            	</h2>
                <?php echo $msg1; ?>
              <form method="post" action="">                
            	 <table class="tftable" width="355" height="138" border="0">
                <tr><td>Login Id</td><td><input name="login" type="text" size="40"  class="input_field" /></td></tr>
                <tr><td>Password</td><td><input name="emppassword" type="password" size="40"  class="input_field" /></td></tr>
                <tr><td colspan=2 align="center"><input name="empsubmit" type="submit" value="Login"/></td></tr>
              </table>
              </form>
              </p>
            </div>
            
            
            
            <div class="cleaner"></div>
		</div>
        
        <div class="cleaner"></div>
    </div> <!-- end of main -->
        
</div> <!-- end of wrapper -->
<?php
include("footer.php");
?>