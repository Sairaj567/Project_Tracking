<?php 
define('DB_HOST', 'localhost'); 
define('DB_USERNAME', 'id22066344_sairaj'); 
define('DB_PASSWORD', 'L4dheka@project'); 
define('DB_NAME', 'id22066344_sairaj');

date_default_timezone_set('Asia/Karachi');

// Connect with the database 
$db = new mysqli(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_NAME); 
 
// Display error if failed to connect 
if ($db->connect_errno) { 
    echo "Connection to database is failed: ".$db->connect_error;
    exit();
}