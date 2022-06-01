<?php
ob_start();
include("partials/top.php");
$id = $_GET['id'];
$sql = "SELECT * FROM tbl_category WHERE id=$id";
$res = mysqli_query($conn, $sql);

if ($res == true) {
    $count = mysqli_num_rows($res);

    if ($count == 1) {
        $row = mysqli_fetch_assoc($res);

        // $id = $row['id'];
        $category_title = $row['category_title'];
        
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
                    <form action="" method="post" >
                        <div class="form-group">
                            <label>Category Title:</label>
                            <input type="text" name="category_title" class="form-control" value="<?php echo $category_title; ?>" required>
                        </div>
                        <input type="hidden" name="id" value="<?php echo $id; ?>">
                        <input type="submit" name="submit" class="btn btn-primary" value="Update">
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>

<?php
if (isset($_POST['submit'])) {
    $category_title = $_POST['category_title'];
    $sql2 = "UPDATE tbl_category SET
    category_title = '$category_title'
    WHERE id=$id
    ";
    $res2 = mysqli_query($conn, $sql2);
    if ($res2 == true) {
        $_SESSION['update'] = "<div class='success'>Updated Successfully</div>";
        header('location:' . SITEURL . 'admin/manage-category.php');
    } else {
        $_SESSION['update'] = "<div class='error'>Update Failed</div>";
        header('location:' . SITEURL . 'admin/manage-category.php');
    }
}
?>

</html>
<?php include("partials/bottom.php"); ?>
                    