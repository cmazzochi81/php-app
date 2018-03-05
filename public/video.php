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
            <li class="linkPaint"><a href="gallery.php">Gallery</a></li>
            <li class="linkVideo"><a href="video.php">Video</a></li>
            <li class="linkContact"><a href="contact.php">Contact</a></li>
            <?php
            if (!$session->is_logged_in()) {
//                        echo("Not logged in.");
                echo("<li style=\"background-color:#5b32a8;\"><a href=\"admin/login.php\">Login</a></li>");
            } else {
//                            echo("Logged in.");
                echo("<li style=\"background-color:#5b32a8;\"><a href=\"admin/logout.php\">Logout</a></li>");
            }
            ?>
        </ul>
    </nav>

    <h1>Video</h1>
      <div class="container my-video">
        <video id="my_video"  controls>

            <source src="video/electro_fun.mp4" type='video/mp4; codecs="avc1.42E01E, mp4a.40.2"'>

            <source src="video/electro_fun.ogv" type='video/ogg; codecs="theora, vorbis"'>

            <p>Your browser does not support HTML5 video.</p>
        </video>
      </div>
           
</div><!--End Main Content div-->
<?php include_layout_template('footer.php'); ?>