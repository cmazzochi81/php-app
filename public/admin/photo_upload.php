<?php
require_once('../../includes/initialize.php');
require_once(LIB_PATH . DS . 's3.php');
// $config = require('../../config.php');


if (!$session->is_logged_in()) {
    redirect_to("login.php");
}
?>
<?php
$max_file_size = 10485760;   // expressed in bytes
//     10240 =  10 KB
//    102400 = 100 KB
//   1048576 =   1 MB
//  10485760 =  10 MB
//2e+6
$message="";
if (isset($_POST['submit'])) {
    $photo = new Photograph();
    $photo->caption = $_POST['caption'];
    

    $s3 = new S3('AKIA22GH7JT3WNQTKPXV','QToCKTyXybueM6OaL1NKOK8E4/PiFhXHJtTsfK9u', 'region: us-west-2');
     $new_name = time() . '.png';

    S3::putObject(
        $_FILES['file_upload'],
        'mazzo-php-app',
        $new_name,
        S3::ACL_PUBLIC_READ,
        array(),
        array(),
        S3::STORAGE_CLASS_RRS

    );


    $photo->attach_file($_FILES['file_upload']);
    echo "attempting to save file now";
    if ($photo->save()) {
        // Success
        $session->message("Photograph uploaded successfully.");
        redirect_to('list_photos.php');
    } else {
        // Failure
        $message = join("<br />", $photo->errors);
    }
}
?>

<?php include_layout_template('admin_header.php'); ?>

<h2>Photo Upload</h2>

<?php echo output_message($message); ?>

<form action="photo_upload.php" enctype="multipart/form-data" method="POST">
    <input type="hidden" name="MAX_FILE_SIZE" value="<?php echo $max_file_size; ?>" />
    <p><input style="color:#000;" type="file" name="file_upload" /></p>
    <p style="color:#000;">Caption: <input type="text" name="caption" value="" /></p>
    <input type="submit" name="submit" value="Upload" />
</form>


<?php include_layout_template('admin_footer.php'); ?>