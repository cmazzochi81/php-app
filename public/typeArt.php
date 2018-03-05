<?php
require_once("../includes/initialize.php");
$layout_context = "public";
include_layout_template('header.php');
$message = "";
?>
<div id="mainContent" class="clearfix">
    <nav class="clearfix">
                    <ul class="clearfix">
                        <li class="linkHome"><a href="index.php">Home</a></li>
                        <li class="linkPaint"><a href="paintings.php">Paintings</a></li>
                        <li class="linkTypeArt"><a href="typeArt.php">Type Art</a></li>
                        <li class="linkVideo"><a href="videoArt.php">Video Art</a></li>
                        <li class="linkContact"><a href="contact.php">Contact</a></li>
                   <?php 
                
                 
                    if(!$session->is_logged_in()){
//                        echo("Not logged in.");
                       echo("<li style=\"background-color:#5b32a8;\"><a href=\"admin/login.php\">Login</a></li>"); 
                        }else{
//                            echo("Logged in.");
                        echo("<li style=\"background-color:#5b32a8;\"><a href=\"admin/logout.php\">Logout</a></li>");
                        }
                    ?>
                     </ul>
                </nav>
<h1>Type Art</h1>

    <div class="typeArtContainer clearfix">
        <h1>Love and Glory</h1>
        <div class="bodycopy clearfix">
            <p>"I went off with my hands in my torn coat pockets;
                My overcoat too was becoming ideal;
                I travelled beneath the sky, Muse! and I was your vassal;
                Oh dear me! what marvellous loves I dreamed of!" Arthur Rimbaud </p>
        </div>
    <h1> <a href="index.php" style="text-decoration: none"><span style="color:pink"> Go Back Home</span></a></h1>

        <div class="rotatecontainer">

            <div class="css">
                <p style='color:pink'>What Dreams</p>
            </div>

            <div class="rotation">
                <p><span style="color:yellow">Are Made Of Art Machine</span></p>
            </div>
    </div>
    </div>
</div><!--End Main Content div-->
<?php include_layout_template('footer.php');?>