<?php
// $url = getenv('JAWSDB_URL');
// $dbparts = parse_url($url);
// $dbhost = $dbparts['host'];
// $dbuser = $dbparts['user'];
// $dbpass = $dbparts['pass'];
// $dbname = ltrim($dbparts['path'], '/');

define("$url", getenv('JAWSDB_URL'));
define("$dbparts", parse_url($url))
define("DB_SERVER", $dbparts['host']);
define("DB_USER", $dbparts['user']);
define("DB_PASS", $dbparts['pass']);
define("DB_NAME", ltrim($dbparts['path'], '/');

?>