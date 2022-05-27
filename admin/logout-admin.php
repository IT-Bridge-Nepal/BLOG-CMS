<?php
//include constant.php for SETURL
include("../includes/db.php");
//1. distroy the session
session_destroy(); //unsets $_SESSION['user']
//redirect to login page
header('location:' . SITEURL . 'index.php');
