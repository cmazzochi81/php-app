<?php
require_once('../../includes/initialize.php');
// $config = require('../../config.php');
require(SITE_ROOT . DS . 'vendor/autoload.php');
$s3 = new Aws\S3\S3Client([
    'version'  => '2006-03-01',
    'region'   => 'us-east-1',
]);

$bucket = getenv('S3_BUCKET')?: die('No "S3_BUCKET" config var in found in env!');

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
    echo "attempting to attach file now";
    $photo->attach_file($_FILES['file_upload']);

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
    <p><input type="file" name="file_upload" /></p>
    <p style="font-color:#000;">Caption: <input type="text" name="caption" value="" /></p>
    <input type="submit" name="submit" value="Upload" />
</form>


<?php include_layout_template('admin_footer.php'); ?>