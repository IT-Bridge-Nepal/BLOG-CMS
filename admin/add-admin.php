<?php include("../includes/db.php"); ?>
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

    $sql = "INSERT INTO tbl_admin SET 
    full_name = '$full_name',
    username = '$username',
    email = '$email',
    password = '$password'
    ";
  
    // execute query and add to db 
    $res = mysqli_query($conn, $sql) or die(mysqli_error($e));
    //       var_dump($res);
    // die(1);
    // check if data is inserted
    if($res==TRUE)
    {
        // echo "Data Inserted";
        // session
        // $_SESSION['add'] = "Admin added successfully";
        // redirect page
        header("location:../admin.php");    
    }
    else
    {
        // echo "Data not inserted";
        // session
        // $_SESSION['add'] = "Failed to add admin";
        // redirect page
        header("location:admin.php");
    }
}

?>