<?php include("partials-front.php/menu.php"); ?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login and Registration</title>
    <!-- <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous"> -->
</head>

<body>
    <div class="container">
        <div class="login-box">
            <div class="row">
                <div class="col-md-6">
                    <h2>Login Here</h2>

                    <form action="" method="post">
                        <div class="form-group">
                            <label>Username</label>
                            <input type="text" name="user" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label>Password</label>
                            <input type="password" name="password" class="form-control" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Login</button>

                    </form>
                </div>
                <div class="col-md-6 login-right">
                    <h2>Register Here</h2>
                    <?php
                    if(isset($_SESSION['add'])){
                    echo $_SESSION['add']; //Display session
                    unset($_SESSION['add']); //Remove session
                    }
                    if(isset($_SESSION['upload'])){
                    echo $_SESSION['upload']; //Display session
                    unset($_SESSION['upload']); //Remove session
                    }
                    ?>
                    <form action="admin/add-admin.php" method="post">
                        <div class="form-group">
                            <label>Full Name:</label>
                            <input type="text" name="full_name" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label>Username:</label>
                            <input type="text" name="username" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label>Email</label>
                            <input type="email" name="email" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label>Password:</label>
                            <input type="password" name="password" class="form-control" required>
                        </div>

                        <div class="form-group">
                            <input type="file" name="image">
                        </div>
                        <button type="submit" name="submit" class="btn btn-primary">Sign Up</button>
                    </form>
                </div>

            </div>
        </div>
    </div>
</body>
<?php include("includes/db.php"); ?>
<?php

// process value and check
if(isset($_POST['submit']))
{
// echo "Button clicked";

// get data from form
    $full_name= $_POST["full_name"];
    $username= $_POST["username"];
    $email= $_POST["email"];
    $password= md5($_POST["password"]);  //Password encryption

    // sql query to save data in db
if(isset($_FILES['image']['name']))
{
    // upload image
    // to upload image we need image source and destination
    $image_name = $_FILES['image']['name']; 
    // var_dump($image_name);
    // die;
    // upload image if image is selected only
    if($image_name !='')
    {

    //auto rename image get extension of image
    $ext = end(explode('.',$image_name)); 

    // rename image
    $image_name = "Admin_image".rand(000,999).'.'.$ext;

    $source_path = $_FILES['image']['tmp_name'];
    $destination_path = "../imgs/users/".$image_name;


    // finally upload image
    $upload = move_uploaded_file($source_path, $destination_path);
        // var_dump($upload);
        // die;
    // check whether image is uploaded or not
    // if image is not uploaded then the stop process and redirect error message
    if($upload==false)
    {
        $_SESSION['upload'] = "<div class='error'>Image uploaded failed</div>";
    // redirect to add category  page
    header('location:../admin.php');

    die();
    }
}
}
else
{
    // donot upload image and set image as blank
    $image_name="";
}

    $sql = "INSERT INTO tbl_admin SET 
    full_name = '$full_name',
    username = '$username',
    image_name = '$image_name',
    email = '$email',
    password = '$password'
    ";
    //   var_dump($image_name);
    // die(1);
    // execute query and add to db 
    $res = mysqli_query($conn, $sql) or die(mysqli_error($e));
      
    // check if data is inserted
    if($res==TRUE)
    {
        // echo "Data Inserted";
        // session
        $_SESSION['add'] = "Admin added successfully";
        // redirect page
        header("location:../admin.php");    
    }
    else
    {
        // echo "Data not inserted";
        // session
        $_SESSION['add'] = "Failed to add admin";
        // redirect page
        header("location:../admin.php");
    }
}

?>

</html>
<?php include("partials-front.php/footer.php"); ?>