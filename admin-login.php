<<<<<<< HEAD
<?php 
include("includes/db.php"); 
=======
<?php
include("includes/db.php");
>>>>>>> 5adea8a40b3fc33810e6f592b2acf3b759b0f89e

if (isset($_POST['submit'])) {
    //echo "button clicked";
    $username = $_POST['username'];
    $password = md5($_POST['password']);

    $sql = "SELECT * from tbl_admin WHERE username='$username'AND password='$password'";

    $res = mysqli_query($conn, $sql);

    $count = mysqli_num_rows($res);
    // var_dump($count);
    // die();

<<<<<<< HEAD
    if ($count==1) {
        $_SESSION['login'] = "<div class='success'>login success</div>";
        header('location:'.SITEURL.'admin/index.php');
=======
    if ($count == 1) {
        $_SESSION['login'] = "<div class='success'>login success</div>";
        header('location:' . SITEURL . 'admin/index.php');
>>>>>>> 5adea8a40b3fc33810e6f592b2acf3b759b0f89e
    }
} else {
    //button not clicked
    $_SESSION['login'] = "<div class='error'>password or user name didinot matched</div>";
<<<<<<< HEAD
    header('location:'.SITEURL.'admin.php');
}


?>
=======
    header('location:' . SITEURL . 'admin/admin.php');
}
>>>>>>> 5adea8a40b3fc33810e6f592b2acf3b759b0f89e
