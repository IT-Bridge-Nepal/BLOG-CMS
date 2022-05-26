<?php include("partials/top.php"); ?>

<div class="maincontent">
    <div class="warper">
        <h1 class="page-header"><strong>
                Manage admin</strong></h1>

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
                        $image_name = ['image_name'];



            ?>


                        <tr>
                            <td><?php echo $sn++; ?></td>
                            <td><?php echo $full_name; ?></td>
                            <td><?php echo $username; ?></td>
                            <td><?php $email; ?></td>
                            <td><?php echo $image_name; ?></td>
                            <td>
                                <a href="#" class="btn-first">Change Password</a>
                                <a href="#" class="btn-second">Update Admin</a>
                                <a href="delete.admin.php" class="btn-third">Delete Admin</a>
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