<?php
include("header.php");

?>
    
    <div id="templatemo_middle_subpage">
    	<h2>Contact Us</h2>
        <p>
        We care about our clients and customers and work very hard to provide them with the best services and 
        in an easy to use, and yet powerful manner. <br>
        If you have any query, suggestion or complaint, reach out to us.
        </p>
        
  </div>
        
    <div id="templatemo_main">

        <div class="col_w900 col_w900_last">
        
            <div class="col_w420 float_l">
            
           	  <h3>Contact Form</h3>
              
              	<div id="cp_contact_form">
                    
                    <form method="post" name="contact" action="#">
                    
                            <label for="author">Name:</label> <input name="author" type="text" class="input_field" id="author" maxlength="60" />
                          	<div class="cleaner_h10"></div>
                            
                            <label for="email">Email:</label> <input name="email" type="text" class="input_field" id="email" maxlength="60" />
                          	<div class="cleaner_h10"></div>
                            
                            <label for="subject">Subject:</label> <input name="subject" type="text" class="input_field" id="subject" maxlength="60" />
                            <div class="cleaner_h10"></div>

                            <label for="text">Message:</label> <textarea id="text" name="text" rows="0" cols="0" class="required"></textarea>
                            <div class="cleaner_h10"></div>
                            
                            <input type="submit" class="submit_btn float_l" name="submit" id="submit" value="Send" />
                            <input type="reset" class="submit_btn float_r" name="reset" id="reset" value="Reset" />
                        
                    </form>
    
                </div>
            </div>
            
            <div class="col_w420 float_r" id="map">
            
            	<h3>Map</h3>
                
                <a href="images/map_big.jpg" title="location map">
                    <img src="images/map_thumb.jpg" alt="location map" />
                </a>

				<div class="cleaner h30"></div>
                                
                <h3>Our Address</h3>
                
                	<h6>Manipal University Jaipur</h6>
                        Jaipur, <br />
                        Rajasthan<br />
						    <br />
                		<br />
                        Tel: 020-040-4400<br />
                        Fax: 020-040-8800
            </div>
            
            <div class="cleaner"></div>
		</div>
        
        <div class="cleaner"></div>
    </div> <!-- end of main -->
        
</div> <!-- end of wrapper -->

<?php
include("footer.php");
?>