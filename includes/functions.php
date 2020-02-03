<?php

require_once("database.php");

 $database = new MySQLDatabase();

function strip_zeros_from_date( $marked_string="" ) {
  // first remove the marked zeros
  $no_zeros = str_replace('*0', '', $marked_string);
  // then remove any remaining marks
  $cleaned_string = str_replace('*', '', $no_zeros);
  return $cleaned_string;
}

function redirect_to( $location = NULL ) {
  if ($location != NULL) {
    header("Location: {$location}");
    exit;
  }
}

function mysql_prep($string) {
    global $database;
    $escaped_string = mysqli_real_escape_string($database->connection, $string);
    return $escaped_string;
  }
function output_message($message="") {
  if (!empty($message)) { 
    return "<p class=\"message\">{$message}</p>";
  } else {
    return "";
  }
}

function form_errors($errors=array()) {
    $output = "";
    if (!empty($errors)) {
      $output .= "<div class=\"error\">";
      $output .= "Please fix the following errors:";
      $output .= "<ul>";
      foreach ($errors as $key => $error) {
        $output .= "<li>";
        $output .= htmlentities($error);
        $output .= "</li>";
      }
      $output .= "</ul>";
      $output .= "</div>";
    }
    return $output;
  }

function __autoload($class_name) {
  $class_name = strtolower($class_name);
  $path = "LIB_PATH.DS.{$class_name}.php";
  if(file_exists($path)) {
    require_once($path);
  } else {
    die("The file {$class_name}.php could not be found.");
	}
}

function include_layout_template($template=""){
    include(SITE_ROOT.DS.'public'.DS.'layouts'.DS.$template);
}

function log_action($action, $message="") {
	$logfile = SITE_ROOT.DS.'logs'.DS.'log.txt';
	$new = file_exists($logfile) ? false : true;
  if($handle = fopen($logfile, 'a')) { // append
    $timestamp = strftime("%Y-%m-%d %H:%M:%S", time());
		$content = "{$timestamp} | {$action}: {$message}\n";
    fwrite($handle, $content);
    fclose($handle);
    if($new) { chmod($logfile, 0755); }
  } else {
    echo "Could not open log file for writing.";
  }
}

function datetime_to_text($datetime="") {
  $unixdatetime = strtotime($datetime);
  return strftime("%B %d, %Y at %I:%M %p", $unixdatetime);
}

function password_encrypt($password) {
    $hash_format = "$2y$10$";   // Tells PHP to use Blowfish with a "cost" of 10
    $salt_length = 22;          // Blowfish salts should be 22-characters or more
    $salt = generate_salt($salt_length);
    $format_and_salt = $hash_format . $salt;
    $hash = crypt($password, $format_and_salt);
    return $hash;
  }
  
  function generate_salt($length) {
    // Not 100% unique, not 100% random, but good enough for a salt
    // MD5 returns 32 characters
    $unique_random_string = md5(uniqid(mt_rand(), true));
    
    // Valid characters for a salt are [a-zA-Z0-9./]
    $base64_string = base64_encode($unique_random_string);
    
    // But not '+' which is valid in base64 encoding
    $modified_base64_string = str_replace('+', '.', $base64_string);
    
    // Truncate string to the correct length
    $salt = substr($modified_base64_string, 0, $length);
    
    return $salt;
  }
  
  function password_check($password, $existing_hash ) {
    echo "Running Password Check with: ";
    echo $password;
    echo $existing_hash;
    // existing hash contains format and salt at start
    $hash = password_hash($password, MD5);
    echo "The crypted hash is " . $hash;
    if ($hash === $existing_hash) {
      echo "The hashes match.";
      return true;
    } else {
      echo "The hashes just don't match";
      return false;
    }
  }

  function attempt_login($username, $password) {
    $admin = find_admin_by_username($username);
    
    if ($admin) {
      echo "We found the admin! " . $admin;
      echo "The admin hashed password is " . $admin["hashed_password"];
  
      // found admin, now check password
      if (password_check($password, $admin["hashed_password"])) {
        // password matches
        echo "THE PASSWORD MATCHES!";
        return $admin;
      } else {
        // password does not match
        echo "THE PASSWORD DOESN'T MATCH!";
        return false;
      }
    } else {
      // admin not found
      echo "Did not find admin";
      return false;
    }
  }

  function logged_in() {
    return isset($_SESSION['admin_id']);
  }
  
  function confirm_logged_in() {
    if (!logged_in()) {
      redirect_to("login.php");
    }
  }

  function find_admin_by_username($username) {
    global $database;
    $safe_username = mysqli_real_escape_string($database->connection, $username);
    
    $query  = "SELECT * ";
    $query .= "FROM admins ";
    $query .= "WHERE username = '{$safe_username}' ";
    $query .= "LIMIT 1";
    $admin_set = mysqli_query($database->connection, $query);
    confirm_query($admin_set);
    if($admin = mysqli_fetch_assoc($admin_set)) {
      return $admin;
    } else {
      return null;
    }
  }

  function find_admin_by_id($admin_id) {
    global $connection;
    $safe_admin_id = mysqli_real_escape_string($connection, $admin_id);
    
    $query  = "SELECT * ";
    $query .= "FROM admins ";
    $query .= "WHERE id = {$safe_admin_id} ";
    $query .= "LIMIT 1";
    $admin_set = mysqli_query($connection, $query);
    confirm_query($admin_set);
    if($admin = mysqli_fetch_assoc($admin_set)) {
      return $admin;
    } else {
      return null;
    }
  }

  function confirm_query($result_set) {
    if (!$result_set) {
      die("Database query failed.");
    }
  }

  


?>