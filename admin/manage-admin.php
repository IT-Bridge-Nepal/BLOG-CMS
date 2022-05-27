<?php include("partials/top.php"); ?>

<div class="maincontent">
    <div class="warper">
        <h1 class="page-header"><strong>
                Manage admin</strong></h1>
        <br>
        <?php
        if (isset($_SESSION['delete'])) {
            echo ($_SESSION['delete']);
            unset($_SESSION['delete']);
        }
        
    if (isset($_SESSION['update'])) {
        echo $_SESSION['update']; //Display session
        unset($_SESSION['update']); //Remove session
    }

        ?>
        <br><br>


        <table class="tbl">
            <tr>
                <th>S.N.</th>
                <th>full name</th>
                <th>User Name</th>
                <th>Email</th>
                <th>Image Name</th>
                <th>Action</th>
            </tr>
            <?php
            $sql = "SELECT * from tbl_admin";
            $res = mysqli_query($conn, $sql);
            // var_dump($res);
            // die;
            if ($res == TRUE) {
                $count = mysqli_num_rows($res);
                $sn = 1;
                if ($count > 0) {
                    while ($row = mysqli_fetch_assoc($res)) {
                        $id = $row['id'];
                        $full_name = $row['full_name'];
                        $username = $row['username'];
                        $password = $row['password'];
                        $email = $row['email'];
                        $image_name = $row['image_name'];



            ?>


                        <tr>
                            <td><?php echo $sn++; ?></td>
                            <td><?php echo $full_name; ?></td>
                            <td><?php echo $username; ?></td>
                            <td><?php echo $email; ?></td>
                            <td><?php
                                if ($image_name != "") {
                                    // display image
                                ?>
                                    <img src="<?php echo SITEURL; ?>images/users/<?php echo $image_name; ?>" width="100px">
                                <?php

                                } else {
                                    // display error message
                                    echo "<div class=error>Image not added</div>";
                                }
                                ?>
                            </td>
                            <td>
                                <a href="#" class="btn-first">Change Password</a>
                                <a href="<?php echo SITEURL ?>admin/update-admin.php?id=<?php echo $id; ?>" class="btn-second">Update Admin</a>
                                <a href="<?php echo SITEURL ?>admin/delete-admin.php?id=<?php echo $id; ?>&image_name=<?php echo $image_name; ?>" class="btn-third"> delete admin </a>
                            </td>
                        </tr>
            <?php

                    }
                } else {
                    echo "we do not have data";
                }
            }


            ?>




    </div>
</div>




<?php include("partials/bottom.php"); ?>