<?php
require_once("../includes/initialize.php");
$database = new MySQLDatabase();
var_dump($database->connection);
//$photos = Photograph::find_all();
$layout_context = "public";
include_layout_template('header.php');
$message = "";
?>
<div id="mainContent" class="clearfix">

    <a href="#" class="slideout-menu-toggle" onclick="slideMenu();">
        <div class="navicon"></div>
        <div class="navicon"></div>
        <div class="navicon"></div>
    </a>
    
    <div class="slideout-menu" style="margin-bottom:20px;">
        <ul style="padding-left:0px;">
            <li class="linkHome"><a href="index.php">Home <i class="fa fa-angle-right"></i></a></li>
            <li class="linkGallery"><a href="gallery.php">Gallery <i class="fa fa-angle-right"></i></a></li>
            <li class="linkJava"><a href="http://play-auction-app.osc-fr1.scalingo.io/">Java App<i class="fa fa-angle-right"></i></a></li>
            <li class="linkAngular"><a href="https://mazzo-angular-app.herokuapp.com/">Angular App<i class="fa fa-angle-right"></i></a></li>
            <li class="linkNet"><a href="https://mazzo-react-test.herokuapp.com/">React Demo<i class="fa fa-angle-right"></i></a></li>
            <li class="linkNet"><a href="https://vue-mazzo.herokuapp.com/">Vue Demo<i class="fa fa-angle-right"></i></a></li>
             <li class="linkNet"><a href="">Angular Tables<i class="fa fa-angle-right"></i></a></li>

            <?php
            if (!$session->is_logged_in()) {
                echo("<li class=\"loginLogout fa fa-angle-right\"><a href=\"admin/login.php\">Login</a></li>");
            } else {
                echo("<li class=\"loginLogout fa fa-angle-right\"><a href=\"admin/logout.php\">Logout</a></li>");
            }
            ?>
            <li><a href="#" class="fa fa-angle-right slideout-menu-close">Close Me<i></i></a></li>
        </ul>
    </div>

    <div id="linksDiv" class="clearfix">
        <ul class="clearfix">
            <li class="links linkHome"><a class="active" href="index.php">Home</a></li>
            <li class="links linkGallery"><a href="gallery.php">Gallery</a></li>
            <li class="links linkJava"><a href="https://mazzo-java-app.scalingo.io/" target="_blank">Java App</a></li>
            <li class="links linkAngular"><a href="https://mazzo-angular-app.herokuapp.com/" target="_blank">Angular App</a></li>
            <li class="links linkNet"><a href="https://corridormdtest.azurewebsites.net/" target="_blank">.NET App</a></li>
            <?php
            if (!$session->is_logged_in()) {
                echo("<li class = \"links loginLogout\"><a href=\"admin/login.php\">Login</a></li>");
            } else {
                echo("<li class=\"links loginLogout\"><a href=\"admin/logout.php\">Logout</a></li>");
            }
            ?>
            
        </ul>
    </div>
    <div class ="container" style="margin-top:0px;">

        <div class ="row">
            
            <div id="latest_news" class="col-md-4 col-lg-4">
                <h3><span class="subhead">Art News</span></h3>
                <div class="feedDiv">
                    <script type="text/javascript" src="http://feed.informer.com/widgets/QQBNOWHDBU.js"></script>
                    <noscript><a href="http://feed.informer.com/widgets/QQBNOWHDBU.html">"Art Forum Mag Widget 1"</a>
                    </noscript>
                </div>

                <h3><span class="subhead">Music News</span></h3>
                <div class="feedDiv">
                    <script type="text/javascript" src="http://feed.informer.com/widgets/8HGMCLGXFO.js"></script>
                    <noscript><a href="http://feed.informer.com/widgets/8HGMCLGXFO.html">"Rolling Stone Music News 1"</a>
                    </noscript>

                </div>

                <h3><span class="subhead">Technology News</span></h3>
                <div class="feedDiv">
                    <script type="text/javascript" src="http://feed.informer.com/widgets/NKMJYXDSOV.js"></script>
                    <noscript><a href="http://feed.informer.com/widgets/NKMJYXDSOV.html">"Wired Magazine 1"</a>
                    </noscript>
                </div>
            </div><!--End latest news  div-->
            
             <div id="photoShow" class="col-xs-12 col-sm-12 col-md-4 col-lg-4" >
                <ul class="rslides">
                    <li><img alt="" src="images/nypics_1.jpg"></li>
                    <li><img alt="" src="images/nypics_2.jpg"></li>
                    <li><img alt="" src="images/nypics_3.jpg"></li>
                    <li><img alt="" src="images/nypics_4.jpg"></li>
                    <li><img alt="" src="images/nypics_5.jpg"></li>
                    <li><img alt="" src="images/nypics_6.jpg"></li>
                    <li><img alt="" src="images/nypics_7.jpg"></li>
                    <li><img alt="" src="images/nypics_8.jpg"></li>
                    <li><img alt="" src="images/nypics_9.jpg"></li>
                    <li><img alt="" src="images/nypics_10.jpg"></li>
                    <li><img alt="" src="images/nypics_11.jpg"></li>
                    <li><img alt="" src="images/nypics_12.jpg"></li>
                    <li><img alt="" src="images/nypics_13.jpg"></li>
                    <li><img alt="" src="images/nypics_14.jpg"></li>
                </ul>
            </div><!--End photoShow div--> 
            
            
            <div id="twitterTimeline" class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                <a  class="twitter-timeline" href="https://twitter.com/ChrisMazzochi" data-widget-id="726033274628411392">Tweets by @ChrisMazzochi</a>
                <script>!function (d, s, id) {
                        var js, fjs = d.getElementsByTagName(s)[0], p = /^http:/.test(d.location) ? 'http' : 'https';
                        if (!d.getElementById(id)) {
                            js = d.createElement(s);
                            js.id = id;
                            js.src = p + "://platform.twitter.com/widgets.js";
                            fjs.parentNode.insertBefore(js, fjs);
                        }
                    }(document, "script", "twitter-wjs");
                </script>
            </div>
            
            
        </div><!--end row-->
        
    </div><!--end container -->

    <div class ="container">  
             
        <div class="row">
      
                <div class="typeArtContainer col-xs-12 col-sm-12 col-md-12 col-lg-4  clearfix">
                    
                    <h1>Love and Glory</h1>
                    
                        <div class="bodycopy clearfix">
                            
                            <p>"I went off with my hands in my torn coat pockets;
                                My overcoat too was becoming ideal;
                                I traveled beneath the sky, Muse! and I was your vassal;
                                Oh dear me! what marvelous loves I dreamed of!" Arthur Rimbaud 
                            </p>
                            
                        </div>
                    
                            <h2>Go Back Home</h2>

                                <div class="rotatecontainer clearfix">

                                    <div class="css clearfix">
                                        <p>What Dreams</p>
                                    </div>

                                    <div class="rotation">
                                        <p>Are Made Of Art Machine</p>
                                    </div>
                                    
                                </div><!--end rotatecontainer div-->
                </div><!--End typeArtContainer div-->
                
                <div  id="vidPaintingDiv" class = "col-xs-12 col-sm-12 col-md-12 col-lg-8">
                    
                    <video id="my_video" class = "col-xs-6 col-sm-6 col-md-6 col-lg-6" autoplay loop muted>

                        <source src="video/electro_fun.mp4" type='video/mp4; codecs="avc1.42E01E, mp4a.40.2"'>

                        <source src="video/electro_fun.ogv" type='video/ogg; codecs="theora, vorbis"'>

                        <p>Your browser does not support HTML5 video.</p>
                    </video>
                    
                    <div id="painting" class = "col-xs-12 col-sm-6 col-md-6 col-lg-6" ></div>
                
                </div>
                    
                
            </div><!--end row -->
    
    </div><!--end container class-->


</div><!--End Main Content div-->
<?php include_layout_template('footer.php'); ?>