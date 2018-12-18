<?php
session_start();  
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
	else if(document.form1.roomno.value=="")
	{
		alert("Room Number should not be Empty...");
		return false;
	}
	else if(document.form1.roomno.value>10000)
	{
		alert("Room Number is not valid...");
		return false;
	}
	else if(document.form1.noofbeds.value=="")
	{
		alert("No of Beds should not be Empty...");
		return false;
	}
	else if(document.form1.description.value=="")
	{
		alert("Description should be Text...");
		return false;
	}
	else
	{
		return true;
	}
}
</script>
<script>
function showroomno(str)
{
if (str=="")
  {
  document.getElementById("txtroomno").innerHTML="";
  return;
  } 
if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
    document.getElementById("txtroomno").innerHTML=xmlhttp.responseText;
    }
  }
xmlhttp.open("GET","ajaxroomno.php?q="+str,true);
xmlhttp.send();
}
</script>
<?php
if($_SESSION[insid]==$_POST[insid])
{
	if(isset($_POST[submit]))
	{
		if(isset($_GET[editid]))
		{
			$sql="UPDATE room SET block_id='$_POST[block]',room_no='$_POST[roomno]',no_of_beds='$_POST[noofbeds]',description='$_POST[discription]', status='$_POST[status]' WHERE room_id='$_GET[editid]'";
			if(!mysqli_query($dbconnection,$sql))
			{
				die('ERRORUPDT:'. mysqli_error($dbconnection));
			}
			else
			{
				$res="<font color='purple'><strong>Record Updated Successfully......</strong></font><br>";
				$resi=1;
			}
		}
		else
		{
			$sqlquery ="INSERT INTO room (block_id,room_no,no_of_beds,description, status) VALUES ('$_POST[block]','$_POST[roomno]','$_POST[noofbeds]','$_POST[discription]','$_POST[status]')";
			
			if(!mysqli_query($dbconnection,$sqlquery))
			{
				//echo "Problem in SQL query". mysqli_error($dbconnection);
				$res = "<strong>Room number already exist</strong>";
				$resi =1;
			}
			else
			{
				$res="<font color='purple'><strong> One room inserted successfully......</strong></font><br>";
				$resi =1;
			}
		}
	}
	}
	$_SESSION[insid] = rand();

if(isset($_GET[editid]))
{
	$resultrooms = mysqli_query($dbconnection,"SELECT * FROM room where room_id = '$_GET[editid]' ");
	$rsrooms = mysqli_fetch_array($resultrooms);
}

include("header.php");
?>
    <div id="templatemo_main">
        <div class="col_w900 col_w900_last">        
<div class="col_w580 float_l">            
            	<div class="post_box">            	
                    <h2>Add rooms</h2>
                  <p>

<form method="post" action="" name="form1" onsubmit="return validation()">
<input type="hidden" name="insid" value="<?php echo $_SESSION[insid];?> " />
 <table class="tftable" height="234" border="1">
<?php
if($resi == 1)
{
echo "<tr><td colspan='2'>$res</td></tr>";
}
?>
<tr><td width="123">Block</td><td width="219">
<select name="block" onchange="showroomno(this.value)" >
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
</select>
</td></tr>
<tr><td>Room no</td><td><div id="txtroomno"><input type="text" name="roomno" value="<?php echo $rsrooms[room_no] ;?>" /></div></td></tr>
<tr><td>No of beds</td><td><select name="noofbeds">
<option value="">Select</option>
<?php
$arr = array("1","2","3");
foreach($arr as $value)
{
	if( $value ==$rsrooms[no_of_beds])
	{
	echo "<option value='$value' selected>$value</option>";
	}
	else
	{
	echo "<option value='$value'>$value</option>";
	}
}
?>
</select>
</td></tr>
<tr><td>Discription</td><td><textarea name="discription"><?php echo $rsrooms[description] ;?></textarea></td></tr>
<tr><td>Status</td><td>
<select name="status">
<option value="Enabled" 
<?php
if($rsrooms[status] == "Enabled")
{
	echo "selected";
}
?>
>Enabled</option>
<option value="Disabled"
<?php
if($rsrooms[status] == "Disabled")
{
	echo "selected";
}
?>
>Disabled</option>
</select>
</td>
</tr>
<tr><td colspan="2" align="center"><input type="submit" name="submit" /></td></tr>
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