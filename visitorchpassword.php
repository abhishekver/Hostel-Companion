<?php
session_start();  
include("databaseconnection.php");
?>
<script type="application/javascript">
function validation()
{
	if(document.form1.login.value=="")
	{
		alert("Login ID should be empty..");
		return false;
	}
	else if(document.form1.oldpassword.value=="")
	{
		alert("Old password should be empty..");
		return false;
	}
		else if(document.form1.newpassword.value=="")
	{
		alert("New password should be empty..");
		return false;
	}
		else if(document.form1.cpassword.value=="")
	{
		alert("Confirm password should be empty..");
		return false;
	}	
			else if(document.form1.cpassword.value != document.form1.newpassword.value)
	{
		alert("Password mismatch...");
		return false;
	}	
	else
	{
		return true;
	}
}
</script>
<?php
if(isset($_POST[submit]))
{
$sql="UPDATE visitor SET password='$_POST[newpassword]' WHERE visitorid='$_SESSION[visitorid]' and password='$_POST[oldpassword]'";
			if(!mysqli_query($dbconnection,$sql))
			{
				die('ERROR:'. mysqli_error($dbconnection));
			}
			if(mysqli_affected_rows($dbconnection) ==1)
			{
				$res="<font color='purple'><strong>Record Updated Successfully......</strong></font><br>";
				$resi=1;
			}
			else
			{
				$res="<font color='purple'><strong>No records to update......</strong></font><br>";
				$resi=1;
			}
}
include("header.php");

$resst="select visitor.*,student.* FROM visitor inner join student on student.stid=visitor.stid WHERE visitorid='$_SESSION[visitorid]'";
$g=mysqli_query($dbconnection,$resst);
$s=mysqli_fetch_array($g);
?>
    <div id="templatemo_main">
        <div class="col_w900 col_w900_last">        
<div class="col_w580 float_l">            
            	<div class="post_box">            	
                    <h2>Change Password</h2>
<p><form method="post" action="" name="form1" onsubmit="return validation()">
 <table class="tftable" width="455" height="234" border="2">
<?php
if($resi== 1)
{
echo "<tr><td colspan='2'> $res </td></tr>";
}
?>
<tr><td width="112">User name</td><td width="228"><input type="text" name="login" readonly="readonly" value="<?php echo  $s[username]; ?>" /></td></tr>
<tr><td>Old password</td><td><input type="password" name="oldpassword" /></td></tr>
<tr><td>New password</td><td><input type="password" name="newpassword"/></td></tr>
<tr><td>Confirm password</td><td><input type="password" name="cpassword"/></td></tr>
<tr><td colspan="2" align="center" ><input type="submit" name="submit" value="Change password"/></td></tr>
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