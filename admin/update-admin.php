<?php include("partials/top.php"); ?>

<?php
$id = $_GET['id'];
$sql = "SELECT * FROM tbl_admin WHERE id=$id";
$res = mysqli_query($conn, $sql);

if ($res == true) {
    $count = mysqli_num_rows($res);

    if ($count == 1) {
        $row = mysqli_fetch_assoc($res);

        // $id = $row['id'];
        $full_name = $row['full_name'];
        $username = $row['username'];
        $email = $row['email'];
        $current_image = $row['image_name'];
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Admin</title>
    <!-- <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous"> -->
</head>

<body>
    <div class="container">
        <div class="login-box">
            <div class="row">

                <div class="col-md-6 login-right">
                    <h2>Update Admin</h2>
                    <form action="" method="post">
                        <div class="form-group">
                            <label>Full Name:</label>
                            <input type="text" name="full_name" class="form-control" value="<?php echo $full_name; ?>" required>
                        </div>
                        <div class="form-group">
                            <label>Username:</label>
                            <input type="text" name="username" class="form-control" value="<?php echo $username; ?>" required>
                        </div>
                        <div class="form-group">
                            <label>Email</label>
                            <input type="email" name="email" class="form-control" value="<?php echo $email; ?>" required>
                        </div>
                        <div class="form-group">
                            <label>Current Image:</label>
                            <img src="">
                        </div>

                        <div class="form-group">
                            <label>New Image:</label>
                            <input type="file" name="image">
                        </div>
                        <button type="submit" class="btn btn-primary">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>

<?php
if (isset($_POST['submit'])) {
    $full_name = $_POST['full_name'];
    $username = $_POST['username'];
    $email = $_POST['email'];

    if (isset($_FILES['image']['name'])) {
        $image_name = $_FILES['image']['name'];

        if ($image_name != "") {
            $ext = end(explode('.', $image_name));

            $image_name = "Admin_image" . rand(000, 999) . '.' . $ext;

            $source_path = $_FILES['image']['tmp_name'];
            $destination_path = "../imgs/users" . $image_name;

            $upload = move_uploaded_file($source_path, $destination_path);

            if ($upload == false) {
                $_SESSION['upload'] = "Failed to upload image";
                header('location:manage-admin.php');
                die();
            }

            if ($current_image != "") {
                $path = "../imgs/users" . $image_name;

                $remove = unlink($path);

                if ($remove == false) {
                    $_SESSION['failed-remove'] = "Failed to remove image";
                    header("location:manage-admin.php");
                    die();
                }
            } else {
                $image_name = $current_image;
            }
        }
    } else {
        $image_name = $current_image;
    }

    $sql2 = "UPDATE tbl_admin SET
    full_name = '$full_name',
    username = '$full_name',
    email = '$email',
    image_name = '$image_name'
    WHERE id=$id
    ";
    $res2 = mysqli_query($conn, $sql2);

    if ($res == true) {
        $_SESSION['update'] = "Admin updated succesfully";
        header("location:manage-admin.php");
    } else {
        $_SESSION['update'] = "Failed to update admin";
        header("location:manage-admin.php");
    }
}
?>

</html>
<?php include("partials/bottom.php"); ?>