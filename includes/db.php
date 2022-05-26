<?php

// session
// session_start();

// constants to store repeating values
// define('SITEURL', 'http://localhost/cms/');
define('LOCALHOST', 'localhost');
define('DB_USERNAME', 'binaya');
define('DB_PASSWORD', 'Password@1');
define('DB_NAME', 'blog_cms');

$conn = mysqli_connect(LOCALHOST, DB_USERNAME, DB_PASSWORD) or die(mysqli_error($e));
$db_select = mysqli_select_db($conn, DB_NAME) or die(mysqli_error($e));
