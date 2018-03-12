<?php 
require_once('../includes/initialize.php');
if (!isset($layout_context)) {//default value for $layout_context.
$layout_context = "public";
}
?>
<!doctype html>
<html lang= en>
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=yes">
        <title>Chris Mazzochi Web Designs<?php
            if ($layout_context == "admin") {
                echo "Admin";
            }
            ?></title>
       
        <link href="stylesheets/bootstrap.css" rel="stylesheet" type="text/css" />
        <link href="stylesheets/style.css" rel="stylesheet" type="text/css" />
        <link href="stylesheets/jquery-ui-1.10.3.custom.css" rel="stylesheet" type="text/css"/>
        <script src="https://use.typekit.net/nwn4kiw.js"></script>
        <script>try {
                Typekit.load({async: true});
            } catch (e) {
            }</script>
        <link rel="shortcut icon" href="../images/favicon.ico"/>
       
        <script type="text/javascript" src="scripts/jquery-1.9.1.js"></script>
        <script type="text/javascript" src="scripts/jquery-ui-1.10.3.custom.js"></script>
        <script type="text/javascript" src="scripts/mazzo-javaScript.js"></script>
        <script type="text/javascript" src="scripts/responsive_slides.js"></script>
        <script type="text/javascript" src="scripts/navicon.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    </head>

    <body>
        <div id="wrapper" class="wrapper" class="clearfix">

            <header class="clearfix">
              
                <h1>Chris Mazzochi Web Designs</h1>
                <h3 class="date"><?php echo date("l F dS"); ?><br />
                    <?php
                    if ($layout_context == "admin") {
                        echo "Logged in as Administrator";
                    }
                    ?>
                </h3>  

                      
</header><!--End Header div--> 