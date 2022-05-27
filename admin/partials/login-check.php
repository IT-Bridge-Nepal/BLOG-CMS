<?php

if (!isset($_SESSION['user'])) {

    $_SESSION['no-login-message'] = "<div class='error'><center><h3>Please login to access admin panel</h3></center></div>";

    header('location:'.SITEURL.'admin.php');
}
?>