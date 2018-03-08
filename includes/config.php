<?php
// defined('DB_SERVER') ? null : define("DB_SERVER", "localhost");
// defined('DB_USER')   ? null : define("DB_USER", "xxxxxx");
// defined('DB_PASS')   ? null : define("DB_PASS", "xxxxxx");
// defined('DB_NAME')   ? null : define("DB_NAME", "mazzo_php_app");
$mysql_url = parse_url($_ENV["DATABASE_URL"]);
$db = substr($mysql_url['path'], 1);
define('DB_NAME', $db);
define('DB_USER', $mysql_url['user']);
define('DB_PASSWORD', $mysql_url['pass']);
define('DB_SERVER', $mysql_url['host'] . ":" . $mysql_url['port']);


?>
