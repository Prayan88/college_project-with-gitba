<?php 
// require './database/constants.php';
if (!defined('ROOT_URL')) {
    define('ROOT_URL', 'http://localhost/ecommerce11/');
}
if (!defined('DB_HOST')) {
    define('DB_HOST', 'localhost');
}
if (!defined('DB_USER')) {
    define('DB_USER', 'root');
}
if (!defined('DB_PASS')) {
    define('DB_PASS', '');
}
if (!defined('DB_NAME')) {
    define('DB_NAME', 'elite');
}


$con = new mysqli (DB_HOST, DB_USER, DB_PASS, DB_NAME);
if (mysqli_errno($con)){
    die();
}




?>