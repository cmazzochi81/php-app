<footer>
    <p><small>Copyright <?php echo date("Y", time()); ?> | Mazzochi Techno Logi | www.chrismazzochi.com | <a href='contact.php'>contact</a></small></p>

<!--Copyright<?php //echo date("Y"), time());?>-->
        
  </footer><!--End footer div-->
  
</div><!--End Wrapper div-->

<nav id="c-menu--slide-left" class="c-menu c-menu--slide-left clearfix" style="border: 3px solid yellow;">
   
  <button class="c-menu__close">&larr; Close Menu</button>
  <ul class="c-menu__items clearfix">
    <li class="c-menu__item" style="border: 2px solid greenyellow; width:100%;"><a href="#" class="c-menu__link" style="color:#fff;">Home</a></li>
    <li class="c-menu__item" style="border: 2px solid greenyellow; width:100%;"><a href="#" class="c-menu__link" style="color:#fff;">About</a></li>
    <li class="c-menu__item" style="border: 2px solid greenyellow; width:100%;"><a href="#" class="c-menu__link" style="color:#fff;">Services</a></li>
    <li class="c-menu__item" style="border: 2px solid greenyellow; width:100%;"><a href="#" class="c-menu__link" style="color:#fff;">Work</a></li>
    <li class="c-menu__item" style="border: 2px solid greenyellow; width:100%;"><a href="#" class="c-menu__link" style="color:#fff;">Contact</a></li>
  </ul>
</nav><!-- /c-menu slide-left -->



<div id="c-mask" class="c-mask"></div><!-- /c-mask -->

<!-- menus script -->
<script src="../scripts/navicon.js"></script>
<script>
  
  /**
   * Slide left instantiation and action.
   */
  var slideLeft = new Menu({
    wrapper: '#wrapper',
    type: 'slide-left',
    menuOpenerClass: '.c-button',
    maskId: '#c-mask'
  });

  var slideLeftBtn = document.querySelector('#c-button--slide-left');
  
  slideLeftBtn.addEventListener('click', function(e) {
    e.preventDefault;
    slideLeft.open();
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