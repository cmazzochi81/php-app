<?php require_once("../../includes/initialize.php"); ?>
<?php if (!$session->is_logged_in()) {redirect_to("login.php");} ?>

<?php
    $photos = Photograph::find_all();
    $message = "";
?>
<?php include_layout_template('admin_header.php'); ?>
<?php echo output_message($message); ?>

<div id="main">

    <a id="backButton" style="margin-left:20px;color:#000;" href="index.php">&laquo; Back</a><br />

    <div id="page" style="margin-left:30%;margin-bottom:2%;">

    <h2 style="margin-left:25%;">Photographs</h2>

    <table id="listPhotosTable">
         <a style="color:#000;" id="uploadText" href="photo_upload.php">Upload a new photograph</a>
        <tr>
            <th>Id</th>
            <th>Image</th>
            <th>Filename</th>
            <th>Caption</th>
            <th>Size</th>
            <th>Type</th>
        </tr>
        <?php foreach ($photos as $photo): ?>
            <tr>
                <td><?php echo $photo->id ?></td> 
                <td><img src="../<?php echo $photo->image_path(); ?>" width="100" /></td>
                <td><?php echo $photo->filename; ?></td>
                <td><?php echo $photo->caption; ?></td>
                <td><?php echo $photo->size_as_text(); ?></td>
                <td><?php echo $photo->type; ?></td>
               
                <td><a style="color:#000"  href="delete_photo.php?id=<?php echo $photo->id; ?>"
                    onclick = "return confirm('Are you sure?');">Delete</a></td> 
            </tr>
        <?php endforeach ?>
    </table>
    </div><!--end page div -->
</div><!--end main div-->
<?php include("../layouts/footer.php"); ?>