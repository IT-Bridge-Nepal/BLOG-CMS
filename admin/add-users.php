<?php
include("../includes/db.php");
if (isset($_POST['submit'])) {


    $full_name = $_POST["full_name"];
    $username = $_POST["username"];
    $email = $_POST["email"];
    $password = md5($_POST["password"]);
    // $image_name = $_POST['image'];

    // sql query to save data in db
    if (isset($_FILES['image']['name'])) {
        // get the details of the selected image
        $image_name = $_FILES['image']['name'];
        // check whether the image is selected or not and upload the image only if selected
        if ($image_name != '') {
            // image is selected
            // rename the image
            // get the extension of the image
            $ext = end(explode('.', $image_name));
            // create new image name
            $image_name = "Admin-name" . rand(000, 999) . '.' . $ext;
            //upload the image 
            // get the source path and destination path
            $source = $_FILES['image']['tmp_name'];
            $des = "../images/users/" . $image_name;
            // finally upload the image
            $upload = move_uploaded_file($source, $des);
            // check whether image uploaded or not
            if ($upload = false) {
                $_SESSION['upload'] = "Failed to upload image";
                header('location:admin.php');
                die;
            }
        } else {
            $image_name = "";
        }
    }
    $sql = "INSERT INTO tbl_user SET 
    full_name = '$full_name',
    username = '$username',
    image_name = '$image_name',
    email = '$email',
    password = '$password'
    ";

    $res = mysqli_query($conn, $sql) or die(mysqli_error($e));

    if ($res == TRUE) {
        $_SESSION['add'] = "<div class='success'>Admin Added Successfully</div>";
        header('location:' . SITEURL . 'signup.php');
    } else {

        $_SESSION['add'] = "<div class='error'>Admin Add Failed</div>";
        header('location:' . SITEURL . 'signup.php');
    }
}
