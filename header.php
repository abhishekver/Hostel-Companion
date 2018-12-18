<?php
session_start();  
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Hostel Management System</title>
<link href="templatemo_style.css" rel="stylesheet" type="text/css" />
<script language="javascript" type="text/javascript">
function clearText(field)
{
    if (field.defaultValue == field.value) field.value = '';
    else if (field.value == '') field.value = field.defaultValue;
}
</script>

<link rel="stylesheet" href="css/nivo-slider.css" type="text/css" media="screen" />
<script src="js/jquery.min.js" type="text/javascript"></script>
<script src="script/jquery.nivo.slider.js" type="text/javascript"></script>

<script type="text/javascript">
$(window).load(function() {
	$('#slider').nivoSlider({
		effect:'random',
		slices:10,
		animSpeed:800,
		pauseTime:1600,
		startSlide:1, 
		directionNav:false,
		directionNavHide:false, 
		controlNav:false, 
		controlNavThumbs:false, 
		pauseOnHover:true, 
		manualAdvance:false, 
		captionOpacity:0.6, 
		beforeChange: function(){},
		afterChange: function(){},
		slideshowEnd: function(){} 
	});
});
</script>
<style type="text/css">	
	

#wrap	{
		width: 100%;
		height: 50px; 
		margin: 0; 
		z-index: 99;
		position: relative;
		background-color: #8860D0;
		}
	
	.navbar		{
				height: 50px;
				padding: 0;
				margin: 0;
				position: absolute;
				border-right: 1px solid #54879d;
				}
			
		.navbar li 	{
					height: auto;
					width: 137px; 
					float: left; 
					text-align: center; 
					list-style: none; 
					font: normal bold 12px/1.2em Arial, Verdana, Helvetica;  
					padding: 0;
					margin: 0;
					background-color: #8860D0;					
					}

			.navbar a	{							
						padding: 18px 0; 
						border-left: 1px solid #54879d;
						border-right: 1px solid #1f5065;
						text-decoration: none;
						color: white;
						display: block;
						}

				.navbar li:hover, a:hover	{background-color: #54879d;}
								
				.navbar li ul 	{
								display: none;
								height: auto;									
								margin: 0;
								padding: 0;								
								}
				
				.navbar li:hover ul {
									display: block;									
									}
									
				.navbar li ul li	{background-color: #54879d;}
				
				.navbar li ul li a 	{
									border-left: 1px solid #1f5065; 
									border-right: 1px solid #1f5065; 
									border-top: 1px solid #74a3b7; 
									border-bottom: 1px solid #1f5065; 
									}
				
				.navbar li ul li a:hover	{background-color: #366b82;}
									

</style>
</head>
<body class="homepage">

<div id="templatemo_wrapper">
	<div id="templatemo_header">
    	
      <div id="site_title"><img src="images1/2.jpg" width="960" height="105"></div>
        <div class="cleaner"></div>
    </div>
    <div id="wrap">
		  <ul class="navbar">
			 <li><a href="index.php">Home</a></li>           
<?php
if(isset($_SESSION[visitorid]))
{
?>	
			 <li><a href="visitorprofile.php">Visitor Profile</a></li>
             <li><a href="studentprofile.php">Student Profile</a></li>
             <li><a href="visitorchpassword.php">Change password</a></li>
             <li><a href="visitorviewfees.php">View fees</a></li>
             <li><a href="visitorviewfeetype.php">Fees structure</a></li>
             <li><a href="logout.php">Logout</a></li>            
<?php
}
else if(isset($_SESSION[emp_id]))
{
?>
			 <li><a href="#">Profile</a>
				<ul>
				   <li><a href="employee.php?editid=<?php echo $_SESSION[emp_id] ; ?>">Edit profile</a></li>
				   <li><a href="changepassword.php">Change Password</a></li>
				</ul>         
			 </li>
<?php
if($_SESSION[emp_designation] == "Administrator")
{
?>                 
			 <li><a href="">Rooms</a>
				<ul>
				   <li><a href="rooms.php">Add rooms</a></li>
				   <li><a href="viewrooms.php">View rooms</a></li>				 
                   <li><a href="roomallotment.php">Allot rooms</a></li>			
                    <li><a href="viewroomallot.php">View room allotment</a></li>				   
				</ul>         
			 </li>
<?php
}
?>
             <li><a href="">Students</a>
				<ul>
				   <li><a href="students.php">Add students</a></li>
				   <li><a href="viewstudent.php">View students</a></li>
                   <li><a href="viewregistration.php">View Registration</a></li>
                   <li><a href="messcardadd.php">Mess card</a></li>
                   <li><a href="viewmesscard.php">View Mess card</a></li>
				</ul>         
			 </li>
             <li><a href="">Reports</a>
				<ul>
				   <li><a href="viewfees.php">View fees</a></li>
				   <li><a href="viewmessbill.php">View Messbill</a></li>
				   <li><a href="viewbilling.php">View Billing</a></li>
				</ul>         
			 </li>
<?php
if($_SESSION[emp_designation] == "Administrator")
{
?>             
             <li><a href="#">Settings</a>
				<ul>
				   <li><a href="employee.php">Add Employee</a></li>
				   <li><a href="viewemployee.php">View Employee</a></li>
                   <li><a href="course.php">Add course</a></li>
				   <li><a href="viewcourse.php">View course</a></li>
                   <li><a href="block.php">Add blocks</a></li>
				   <li><a href="viewblocks.php">View blocks</a></li>
                   <li><a href="feetype.php">Add Fees type</a></li>
                   <li><a href="viewfeetype.php">View Fees type</a></li>
				</ul>         
			 </li>
<?php
}
?>
			<li><a href="logout.php">Logout</a></li>
<?php
}
else
{
?>
             <li><a href="about.php">About Us</a></li>
             <li><a href="contact.php">Contact Us</a></li>
<?php
}
?>

		  </ul>
		 </div>