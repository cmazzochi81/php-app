<footer>
    <p><small>Copyright <?php echo date("Y", time()); ?> | Chris Mazzochi Web Designs </small></p>
</footer>
  
</div><!--End Wrapper div-->
<script type="text/javascript">
$(document).ready(function () {
    $('.slideout-menu-toggle').on('click', function (event) {
        event.preventDefault();
        // create menu variables
        var slideoutMenu = $('.slideout-menu');
        var slideoutMenuWidth = $('.slideout-menu').width();

        // toggle open class
        slideoutMenu.toggleClass("open");

        // slide menu
        if (slideoutMenu.hasClass("open")) {
            slideoutMenu.animate({
                left: "0px"
            });
        } else {
            slideoutMenu.animate({
                left: -slideoutMenuWidth
            }, 250);
        }
    });


    $('.slideout-menu-close').on('click', function (event) {
        event.preventDefault();
        // create menu variables
        var slideoutMenu = $('.slideout-menu');
        var slideoutMenuWidth = $('.slideout-menu').width();

        // toggle open class
        if (slideoutMenu.hasClass("open")) {

            slideoutMenu.animate({
                left: -slideoutMenuWidth
            }, 250);

        } else {
            slideoutMenu.animate({
                left: "0px"
            });
        }
        // toogle class after condition check
        slideoutMenu.toggleClass("open");
    });

});
</script>

</body>
</html>
<?php
  // Close database connection
  if(isset($connection)){
  mysqli_close($connection);
  }
?>