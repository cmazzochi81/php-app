<?php
require_once('../includes/initialize.php');
include_layout_template('header.php');
?>

<div id="mainContent" class="clearfix">
<a href="index.php">&laquo; Back</a><br />
    
    <form id="contactForm" class = "clearfix" name="contactform" method="post" action="sendMail.php"  autocomplete="on">
       

        <fieldset id="fieldset">
             <h1>Contact Me</h1>
            <div id="form_fields_container" class="clearfix">

                <div class="form_fields"><label for="first_name"> First Name:</label>
                    <input type="text"  name="first_name" id="first_name" autofocus placeholder="First name" required/></div>

                <div class="form_fields"><label for="last_name"> Last Name:</label>
                    <input type="text"  name="last_name" id="last_name" placeholder="Last name" required/></div>

                <div class="form_fields"><label for="maincontactphone"> Phone/Cell:</label>
                    <input type="text" name="telephone" id="telephone" placeholder="Contact number" /></div>

                <div class="form_fields"><label for="email"> E-mail:</label>
                    <input type="email"  name="email" id="email" placeholder="email" required/></div>
            </div><!--End "form_fields_container-->

            <div id="questions" class="clearfix">
                <p>Site Description:</p> 
                
                <textarea class="text_area" name="message" rows="12" cols="40" placeholder="Please describe what kind of website you are thinking of building." required></textarea>
                <p><span id="errorMessage"></span></p>
               
            </div><!--End questions div-->
            <button type="submit" class="submit" name="submit">Submit</button>
        </fieldset>
    </form>
</div><!--End Main Content div-->
<?php include_layout_template('footer.php'); ?>