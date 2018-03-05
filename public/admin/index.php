<?php 
require_once('../../includes/initialize.php');
if(!$session->is_logged_in()){redirect_to("login.php");}
$layout_context = "admin"; 
include_layout_template('admin_header.php');
$message="";
?>
<div id="mainContent" class="clearfix">
 
    <h1 style="margin-left:2%; margin-bottom: 0px;">Admin</h1>
    <p>Welcome to the admin area, <?php echo htmlentities($_SESSION["username"]); ?>.</p>
<!--    <p style="margin-left:2%; font-family: Raleway;">Welcome to the admin area, <?php //echo htmlentities($session->username);?></p>-->
  
    <?php echo output_message($message);?>
    <div id="navigation">
         <ul>
           <li><a href="list_photos.php">List Photos</a></li>
           <li><a href="list_admins.php">List Admins</a></li>
           <li><a href="logout.php">Logout</a></li>
         </ul>
    </div>
     
</div><!--End Main Content div-->
<?php include_layout_template('admin_footer.php');?> 