<?php
require_once("../includes/initialize.php");
include_layout_template('header.php');
$layout_context = "public";
$message = "";

    // Get the current page number ($current_page)
    $page = !empty($_GET['page']) ? (int)$_GET['page'] : 1;

    //Number of records per page ($per_page)
    $per_page = 3;

    //Get the total record count ($total_count)
    $total_count = Photograph::count_all();

    //Use pagination instead of finding all of them
    //$photos = Photograph::find_all();
    
    $pagination = new Pagination($page, $per_page, $total_count);
    
    //Instead of finding all the records, just find the records 
    // for this page. 
    $sql = "SELECT * FROM photographs ";
    $sql .= "LIMIT {$per_page} ";
    $sql .= "OFFSET {$pagination->offset()}";
    $photos = Photograph::find_by_sql($sql);
    
    // Need to add ?page=$page to all links we want to 
    // maintain the current page (or store $page in $session)
?>
<div id="mainContent" style="display:inline-block;" class="clearfix">
   <nav class="clearfix">
        <ul class="clearfix">
            <li class="linkHome"><a href="index.php">Home</a></li>
            <li class="linkPaint"><a href="gallery.php">Gallery</a></li>
            <li class="linkVideo"><a href="video.php">Video</a></li>
            <li class="linkContact"><a href="contact.php">Contact</a></li>
            <?php 
                if(!$session->is_logged_in()){
                    echo("<li style=\"background-color:#5b32a8;\"><a href=\"admin/login.php\">Login</a></li>"); 
                }else{
                    echo("<li style=\"background-color:#5b32a8;\"><a href=\"admin/logout.php\">Logout</a></li>");
                        }
            ?>
        </ul>
    </nav>
<h1>Gallery</h1>
<div id ="paintingsDiv">
    <?php foreach ($photos as $photo): ?>
        <div class="eachPaintingDiv" >
            <a href="photo.php?id=<?php echo $photo->id; ?>">
                <img src="<?php echo $photo->image_path(); ?>" width="300" />
            </a>
            <p class="caption"><?php echo $photo->caption; ?></p>
        </div>
    <?php endforeach; ?> 
</div>
</div><!--End Main Content div-->

<div id="pagination" style="clear: both;">
<?php
    if($pagination->total_pages() > 1) {
        
        if($pagination->has_previous_page()) { 
        echo "<a href=\"gallery.php?page=";
        echo $pagination->previous_page();
        echo "\">&laquo; Previous</a> "; 
    }

        for($i=1; $i <= $pagination->total_pages(); $i++) {
            if($i == $page) {
                echo " <span class=\"selected\">{$i}</span> ";
            } else {
                echo " <a href=\"gallery.php?page={$i}\">{$i}</a> "; 
            }
        }

        if($pagination->has_next_page()) { 
            echo " <a href=\"gallery.php?page=";
            echo $pagination->next_page();
            echo "\">Next &raquo;</a> "; 
    }
        
    }
?>
</div>
<?php include_layout_template('footer.php');?>