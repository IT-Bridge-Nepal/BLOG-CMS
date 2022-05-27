<?php include("partials-front.php/menu.php");
session_start(); ?>
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
    <?php
    if (isset($_SESSION['no-login-message'])) {
        echo $_SESSION['no-login-message']; //Display session
        unset($_SESSION['no-login-message']); //Remove session
    }
    ?>

    <div class="container">
        <div class="login-box">

            <div class="row">
                <div class="col-md-6">
                    <h2>Login Here</h2>
                    <br>
                    <br>
                    <?php
                    if (isset($_SESSION['login'])) {
                        echo $_SESSION['login']; //Display session
                        unset($_SESSION['login']); //Remove session
                    }
                    ?>
                    <br>
                    <br>



                    <form action="admin-login.php" method="post">
                        <div class="form-group">
                            <label>Username</label>
                            <input type="text" name="username" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label>Password</label>
                            <input type="password" name="password" class="form-control" required>
                        </div>
                        <button type="submit" name="submit" class="btn btn-primary">Login</button>

                    </form>
                </div>
                <div class="col-md-6 login-right">
                    <h2>Register Here</h2>
                    <br>
                    <br>

                    <?php
                    if (isset($_SESSION['add'])) {
                        echo $_SESSION['add']; //Display session
                        unset($_SESSION['add']); //Remove session
                    }
                    if (isset($_SESSION['upload'])) {
                        echo $_SESSION['upload']; //Display session
                        unset($_SESSION['upload']); //Remove session
                    }
                    ?>
                    <br>
                    <br>

                    <form action="admin/add-admin.php" method="POST" enctype="multipart/form-data">
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
                            <label>Select Image:</label>
                            <input type="file" name="image">
                        </div>
                        <button type="submit" name="submit" class="btn btn-primary">Sign Up</button>
                    </form>
                </div>

            </div>
        </div>
    </div>
</body>
<?php include("partials-front.php/footer.php"); ?>