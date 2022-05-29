<?php
include("includes/db.php");
// session_start();

if (isset($_POST['submit'])) {
    //echo "button clicked";
    $username = $_POST['username'];
    $password = md5($_POST['password']);

    $sql = "SELECT * from tbl_admin WHERE username='$username' AND password='$password'";

    $res = mysqli_query($conn, $sql);

    $count = mysqli_num_rows($res);
    // var_dump($count);
    // die();

    if ($count == 1) {
        $row = mysqli_fetch_assoc($res);
        $id = $row['id'];
        $full_name = $row['full_name'];
        $image_name = $row['image_name'];
        $_SESSION['login'] = "<div class='success'>login success</div>";
        $_SESSION['user'] = $full_name;
        $_SESSION['image'] = $image_name;
        $_SESSION['userid'] = $id;

        // var_dump($_SESSION['userid']);
        // die;


        header('location:' . SITEURL . 'admin/index.php');
    } else {
        //button not clicked
        $_SESSION['login'] = "<div class='error'>Password or Username didnot matched</div>";
        header('location:' . SITEURL . 'admin.php');
    }
}
