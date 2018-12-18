<?php
session_start();  
include("databaseconnection.php");

    $resultregno=mysqli_query($dbconnection,"SELECT * FROM registration where stid='$_SESSION[stid]' AND status='Enabled'");
    $rsregno=mysqli_fetch_array($resultregno);

$_SESSION[insid] = rand();

include("header.php");
?>
    <div id="templatemo_main">
        <div class="col_w900 col_w900_last">        
<div class="col_w580 float_l">            
            	<div class="post_box">            	
                  <p>
<form method="post" action="" name="form1" onsubmit="return validation()">

   <h2>Invoice details  </h2>


<?php
$result=mysqli_query($dbconnection,"SELECT * FROM fees where reg_id='$rsregno[reg_id]'");
?>
     <table class="tftable" width="922" border="1">
    <tr align="center" bgcolor="#FFFFCC">
    <td height="23"><strong>Particulars</strong></td>
    <td><strong>Invoice Date</strong></td>
    <td><strong>Cost</strong></td>
    </tr>
    
    <?php
    $totalfee=0;
    
    while($rs=mysqli_fetch_array($result))
    {
        echo "<tr>
        <td>&nbsp; Establishment Fee</td>
        <td align='center'>$rs[invoice_date]</td>
        <td align='center'>&nbsp; Rs.  $rs[total_fees] </td>	
        </tr>";
        $totalfee = $totalfee + $rs[total_fees];
    }
    
    $result=mysqli_query($dbconnection,"SELECT * FROM mess_bill where reg_id='$rsregno[reg_id]'");
    while($rs=mysqli_fetch_array($result))
    {
        echo "<tr>
        <td>&nbsp; Mess Advance</td>
        <td align='center'>$rs[date]</td>
        <td align='center'>&nbsp; Rs.  $rs[mess_bill] </td>	
        </tr>";
        $totalfee = $totalfee + $rs[mess_bill];
    }
    
        echo "<tr bgcolor='#99FFFF'>
        <td colspan='2'  align='center'>&nbsp; <strong>Total Invoice : </strong></td>
        <td align='center'>&nbsp;<strong> Rs.  $totalfee </strong></td>	
        </tr>";
    ?>
    </table>

<br />
<hr />
 <h2>Payment details  </h2>
    
 <table class="tftable" width="922" border="1">
<tr align="center" bgcolor="#FFFFCC">
<td height="23"><strong>Payment type</strong></td>
<td><strong>Date</strong></td>
<td><strong>Paid Amount</strong></td>
</tr>
<?php
$paidfee = 0;
$result=mysqli_query($dbconnection,"SELECT * FROM billing where reg_id='$rsregno[reg_id]'");
while($rs=mysqli_fetch_array($result))
{
	echo "<tr>
	<td>&nbsp; $rs[bill_type]</td>
	<td align='center'>$rs[paid_date]</td>
	<td align='center'>&nbsp; Rs.  $rs[paid_amt] </td>	
	</tr>";
	$paidfee = $paidfee  + $rs[paid_amt];
}

	echo "<tr bgcolor='#99FFFF'>
	<td colspan='2'  align='center'>&nbsp; <strong>Total Paid amount: </strong></td>
	<td align='center'>&nbsp;<strong> Rs.  $paidfee </strong></td>	
	</tr>";
	$remainingfee = $totalfee - $paidfee;
	echo "<tr bgcolor='#99FFFF'>
	<td colspan='2'  align='center'>&nbsp; <strong>Remaining Fee: </strong></td>
	<td align='center'>&nbsp;<strong> Rs.  $remainingfee </strong></td>	
	</tr>";
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