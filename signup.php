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

                <div class="col-md-6 login-right">
                    <h2>Register Here</h2>
                    <form action="admin/add-users.php" enctype="multipart/form-data" method="post">
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

</html>
<?php include("partials-front.php/footer.php"); ?>