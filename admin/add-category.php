<?php 
ob_start();
include("partials/top.php");
 ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Category</title>
    <!-- <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous"> -->
</head>

<body>

    <div class="container">
        <div class="login-box">

            <div class="row">
                <div class="col-md-6">
                    <h2>Add Category</h2>
                    <br>
                    <br>
                    <form action="" method="post">
                        <div class="form-group">
                            <label>Category Title</label>
                            <input type="text" name="category_title" class="form-control" required>
                        </div>
                        
                        <button type="submit" name="submit" class="btn btn-primary">Add Category</button>

                    </form>
                </div>
                

            </div>
        </div>
    </div>
</body>
<?php

// process value and check
if (isset($_POST['submit'])) {
    // echo "Button clicked";

    // get data from form
    $category_title = $_POST["category_title"];
    
    
    // sql query to save data in db
    
    $sql = "INSERT INTO tbl_category SET 
    category_title = '$category_title'
    
    ";

    // execute query and add to db 
    $res = mysqli_query($conn, $sql) or die(mysqli_error($e));

    // check if data is inserted
    if ($res == TRUE) {
        // echo "Data Inserted";
        // session
        $_SESSION['add'] = "<div class='success'>Category Added Successfully</div>";
        // redirect page
        header('location:'.SITEURL.'admin/manage-category.php');
    } else {
        // echo "Data not inserted";
        // session
        $_SESSION['add'] = "<div class='error'>Category Add Failed</div>";
        // redirect page
        header('location:'.SITEURL.'manage-category.php');
    }
}
