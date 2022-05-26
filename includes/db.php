<?php

// session
// session_start();

// constants to store repeating values
define('SITEURL', 'http://localhost/BLOG-CMS/');
define('LOCALHOST', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_NAME', 'cms');

$conn = mysqli_connect(LOCALHOST, DB_USERNAME, DB_PASSWORD) or die(mysqli_error($e));
$db_select = mysqli_select_db($conn, DB_NAME) or die(mysqli_error($e));
