<?php
require_once(LIB_PATH . DS . 'database.php');
require_once(LIB_PATH . DS . 'initialize.php');
// require_once('s3.php');
require '../vendor/autoload.php';


use Aws\S3\S3Client;
use Aws\S3\Exception\S3Exception;


$config = require('config.php');
class Photograph extends DatabaseObject {

    protected static $table_name = "photographs";
    protected static $db_fields = array('id','filename', 'type', 'size', 'caption');

    public $id;
    public $filename;
    public $type;
    public $size;
    public $caption;
    private $temp_path;
    protected $upload_dir = "images";
    public $errors = array();
    protected $upload_errors = array(
        UPLOAD_ERR_OK => "No errors.",
        UPLOAD_ERR_INI_SIZE => "Larger than upload_max_filesize.",
        UPLOAD_ERR_FORM_SIZE => "Larger than form MAX_FILE_SIZE.",
        UPLOAD_ERR_PARTIAL => "Partial upload.",
        UPLOAD_ERR_NO_FILE => "No file.",
        UPLOAD_ERR_NO_TMP_DIR => "No temporary directory.",
        UPLOAD_ERR_CANT_WRITE => "Can't write to disk.",
        UPLOAD_ERR_EXTENSION => "File upload stopped by extension."
    );

    
    // Pass in $_FILE(['uploaded_file']) as an argument
    public function attach_file($file) {
        // Perform error checking on the form parameters
        if (!$file || empty($file) || !is_array($file)) {
            // error: nothing uploaded or wrong argument usage
            $this->errors[] = "No file was uploaded.";
            return false;
        } elseif ($file['error'] != 0) {
            // error: report what PHP says went wrong
            $this->errors[] = $this->upload_errors[$file['error']];
            return false;
        } else {
            // Set object attributes to the form parameters.
            $this->temp_path = $file['tmp_name'];
            $this->filename = basename($file['name']);
            $this->type = $file['type'];
            $this->size = $file['size'];
            // Don't worry about saving anything to the database yet.
            return true;
        }
    }

    // Common Database Methods
    public static function find_all() {
        return self::find_by_sql("SELECT * FROM ".self::$table_name);
  }

    public function save() {
  
        // A new record won't have an id yet.
        if (isset($this->id)) {
          //if(!empty($this->id)){
            // Really just to update the caption
            $this->update();
        } else {
            // Make sure there are no errors
            // Can't save if there are pre-existing errors
            if (!empty($this->errors)) {
                return false;
            }

            // Make sure the caption is not too long for the DB
            if (strlen($this->caption) > 255) {
                $this->errors[] = "The caption can only be 255 characters long.";
                return false;
            }

            // Can't save without filename and temp location
            if (empty($this->filename) || empty($this->temp_path)) {
                $this->errors[] = "The file location was not available.";
                return false;
            }

            // Determine the target_path


                // $s3 = new S3('AKIA22GH7JT3WNQTKPXV','QToCKTyXybueM6OaL1NKOK8E4/PiFhXHJtTsfK9u', 'region: us-west-2');
                //  $new_name = time() . '.png';

                // S3::putObject(
                //     $_FILES['file_upload'],
                //     'mazzo-php-app',
                //     $new_name,
                //     S3::ACL_PUBLIC_READ,
                //     array(),
                //     array(),
                //     S3::STORAGE_CLASS_RRS

                // );

            $target_path = SITE_ROOT . DS . 'public' . DS . $this->upload_dir . DS . $this->filename;
             
            // $target_path = $this->s3->upload($this->bucket, $_FILES['userfile']['name'], fopen($_FILES['userfile']['tmp_name'], 'rb'), 'public-read');

            // $target_path = SITE_ROOT . DS . 'public' . DS . $this->upload_dir . DS . $this->filename;
            // $target_path = SITE_ROOT . DS . $this->upload_dir . DS . $this->filename;

            // Make sure a file doesn't already exist in the target location
            if (file_exists($target_path)) {
                $this->errors[] = "The file {$this->filename} already exists.";
                return false;
            }

            // Attempt to move the file 
            if (move_uploaded_file($this->temp_path, $target_path)) {

                try{
                    $s3->putObject([
                        'Bucket' => $config['s3']['bucket'],
                        'Key' => 'uploads/{$name}',
                        'Body' => fopen($this->temp_path, 'rb'),
                        'ACL' => 'public-read'
                    ]);

                } catch(S3Exception $e){

                    die("There was an error uploading the file.");
                }

                // Success
                // Save a corresponding entry to the database
                if ($this->create()) {
                    // We are done with temp_path, the file isn't there anymore
                    unset($this->temp_path);
                    return true;
                }
            } else {
                // File was not moved.
                $this->errors[] = "The file upload failed, possibly due to incorrect permissions on the upload folder.";
                return false;
            }
        }
    }

    public function destroy() {
        // First remove the database entry
        if ($this->delete()) {
            // then remove the file
            // Note that even though the database entry is gone, this object 
            // is still around (which lets us use $this->image_path()).
            //$target_path = SITE_ROOT . DS . 'public' . DS . $this->image_path();
             $target_path = SITE_ROOT . DS . 'public' . DS . $this->upload_dir . $this->filename;
            return unlink($target_path) ? true : false;
        } else {
            // database delete failed
            return false;
        }
    }

    public function image_path() {
        return $this->upload_dir . DS . $this->filename;
    }

    public function size_as_text() {
        if ($this->size < 1024) {
            return "{$this->size} bytes";
        } elseif ($this->size < 1048576) {
            $size_kb = round($this->size / 1024);
            return "{$size_kb} KB";
        } else {
            $size_mb = round($this->size / 1048576, 1);
            return "{$size_mb} MB";
        }
    }

    public function comments() {
        return Comment::find_comments_on($this->id);
    }
    
    public static function count_all() {
      global $database;
      $sql = "SELECT COUNT(*) FROM ".self::$table_name;
    $result_set = $database->query($sql);
      $row = $database->fetch_array($result_set);
    return array_shift($row);
    }
}
?>