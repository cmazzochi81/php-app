<?php
require_once('../includes/initialize.php');
include_layout_template('header.php');
?>

<div id="mainContent" class="clearfix">
    <nav class="clearfix">
        <ul class="clearfix">
            <li style="background-color:#f6de36;"><a href="index.php">Home</a></li>
            <li style="background-color:#ddf135;"><a href="gallery.php">Gallery</a></li>
            <li style="background-color:#ce8062;"><a href="video.php">Video</a></li>
            <li style="background-color:#fff;"><a href="contact.php">Contact</a></li>
            <?php
            if (!$session->is_logged_in()) {
                echo("<li style=\"background-color:#5b32a8;\"><a href=\"../public/admin/login.php\">Login</a></li>");
            } else {
                echo("<li style=\"background-color:#5b32a8;\"><a href=\"../public/admin/logout.php\">Logout</a></li>");
            }
            ?>
        </ul>
    </nav>
    
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