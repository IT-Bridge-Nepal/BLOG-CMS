<!-- <?php include("../includes/db.php"); ?>
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

?> -->