<?php
if (!isset($layout_context)) {//default value for $layout_context.
    $layout_context = "admin";
}
?>
<!doctype html>
<html lang= en>
    <head>
       <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=yes">
        <title>Mazzochi Techno Logi <?php if ($layout_context == "admin") {echo "Admin";}?></title>
        <link href="../stylesheets/style.css" rel="stylesheet" type="text/css" />
        <link href="../stylesheets/jquery-ui-1.10.3.custom.css" rel="stylesheet" type="text/css"/>
        <script src="https://use.typekit.net/nwn4kiw.js"></script>
        <script>try{Typekit.load({ async: true });}catch(e){}</script>
        <link rel="shortcut icon" href="../images/favicon.ico"/>
        <!--<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>-->
        <script type="text/javascript" src="../scripts/jquery-1.9.1.js"></script>
        <script type="text/javascript" src="../scripts/jquery-ui-1.10.3.custom.js"></script>
        <script type="text/javascript" src="../scripts/mazzo-javaScript.js"></script>
        <script type="text/javascript" src="../scripts/responsive_slides.js"></script>
    </head>

    <body>
        <div id="wrapper" class="clearfix">

            <header class=""clearfix">
                <h1>Chris Mazzochi Web Designs</h1><br />
                <h3 class="date"><?php echo date("l F dS"); ?><br />
                <?php if ($layout_context == "admin") {
                    echo "Logged in as Administrator"; 
                }
                ?></h3>
            </header><!--End Header div--> 