<?php
	// define("DB_SERVER", "localhost");
	// define("DB_USER", "root");
	// define("DB_PASS", "Tonybaj_81");
	// define("DB_NAME", "mazzo_php_app");

  // define("DB_SERVER", "masterdb.co9mzcjtyaxp.us-east-2.rds.amazonaws.com");
  // define("DB_USER", "phpuser");
  // define("DB_PASS", "Tonybaj_81");
  // define("DB_NAME", "phpDatabase");

$mysql_url = parse_url($_ENV["DATABASE_URL"]);
$db = substr($mysql_url['path'], 1);
define('DB_NAME', $db);
define('DB_USER', $mysql_url['user']);
define('DB_PASSWORD', $mysql_url['pass']);
define('DB_SERVER', $mysql_url['host'] . ":" . $mysql_url['port']);



  // 1. Create a database connection
  $connection = mysqli_connect(DB_SERVER, DB_USER, DB_PASS, DB_NAME);
  // Test if connection succeeded
  if(mysqli_connect_errno()) {
    die("Database connection failed: " . 
         mysqli_connect_error() . 
         " (" . mysqli_connect_errno() . ")"
    );
  }
?>
