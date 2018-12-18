<?php
include("header.php");
?>

    
    <div id="templatemo_middle_subpage">
    	<h2>About Us</h2>
        <p>
        	We are a small team of four people who are trying their best to do the best for our customers.
        </p>
        
  </div>

	<!-- Style starts -->
	<style>
					html {
					box-sizing: border-box;
					}

					*, *:before, *:after {
					box-sizing: inherit;
					}

					.column {
					float: left;
					width: 33.3%;
					margin-bottom: 16px;
					padding: 0 8px;
					}

					@media screen and (max-width: 650px) {
					.column {
						width: 100%;
						display: block;
					}
					}

					.card {
					box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
					}

					.container {
					padding: 0 16px;
					}

					.container::after, .row::after {
					content: "";
					clear: both;
					display: table;
					}

					.title {
					color: grey;
					}

					.button {
					border: none;
					outline: 0;
					display: inline-block;
					padding: 8px;
					color: white;
					background-color: #000;
					text-align: center;
					cursor: pointer;
					width: 100%;
					}

					.button:hover {
					background-color: #555;
					}
		</style>

		<!-- Style ends -->

        
    <div id="templatemo_main">

		


        <div class="col_w900 col_w900_last">
        
            
			<div class="row">

				<div class="column">
					<div class="card">
					<img src="images/boss.jpg" alt="John" style="width:100%">
					<div class="container">
						<h2>Abhishek Verma</h2>
						<h4 class="title">Just a lazy boss</h4>
						<p>I feel so lazy, even to write something about myself</p>
						<p>asa@hostelcompanion.com</p>
						<p><button class="button">Contact</button></p>
					</div>
					</div>
				</div>

				<div class="column">
					<div class="card">
					<img src="images/ui.jpg" alt="Mike" style="width:100%">
					<div class="container">
						<h2>Aman Gupta</h2>
						<h4 class="title">UI\UX designer</h4>
						<p>You know I can!!</p>
						<p>gupta@hostelcompanion.com</p>
						<p><button class="button">Contact</button></p>
					</div>
					</div>
				</div>
				<div class="column">
					<div class="card">
					<img src="images/man2.jpeg" alt="John" style="width:100%">
					<div class="container">
						<h2>Aman Saxena</h2>
						<h4 class="title">Developer & Manager</h4>
						<p>Internet, O yeah! That's what I am working to better</p>
						<p>saxena@hostelcompanion.com</p>
						<p><button class="button">Contact</button></p>
					</div>
					</div>
				</div>
			</div>
			
			<div class="column">
					<div class="card">
					<img src="images/memb.png" alt="Jane" style="width:100%">
					<div class="container">
						<h2>A Shikhar</h2>
						<h4 class="title">System Testing</h4>
						<p>I can do soething, but only when you are going to tell me</p>
						<p>shikhar@hostelcompanion.com</p>
						<p><button class="button">Contact</button></p>
					</div>
					</div>
				</div>
			
			<div class="col_w420 float_l">

            </div>
            
            
            <div class="cleaner"></div>
		</div>
        
        <div class="cleaner"></div>
    </div> <!-- end of main -->
        
</div> <!-- end of wrapper -->

<?php
include("footer.php");
?>