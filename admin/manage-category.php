<?php include("partials/top.php"); ?>
<div class="maincontent">
    <div class="warper">
<h1 class="page-header">
    Categories 
</h1>
<br>
<br>
  <a href="<?php echo SITEURL; ?>admin/add-category.php" class="btn-primary">Add Category</a>

  <br>
  <br>  
  <?php
        if (isset($_SESSION['add'])) {
            echo ($_SESSION['add']);
            unset($_SESSION['add']);
        }
        if (isset($_SESSION['delete'])) {
            echo ($_SESSION['delete']);
            unset($_SESSION['delete']);
        }

        if (isset($_SESSION['update'])) {
            echo $_SESSION['update']; //Display session
            unset($_SESSION['update']); //Remove session
        }
    ?>
  <br>
  <br>

<table class="tbl">
            <tr>
                <th>S.N.</th>
                <th>Category Title</th>
                <th>Action</th>
            </tr>
<?php
            $sql = "SELECT * from tbl_category";
            $res = mysqli_query($conn, $sql);
            // var_dump($res);
            // die;
            if ($res == TRUE) {
                $count = mysqli_num_rows($res);
                $sn = 1;
                if ($count > 0) {
                    while ($row = mysqli_fetch_assoc($res)) {
                        $id = $row['id'];
                        $category_title = $row['category_title'];
            ?>
                        <tr>
                            <td><?php echo $sn++; ?></td>
                            <td><?php echo $category_title; ?></td>
                            <td>    
                                <a href="<?php echo SITEURL ?>admin/update-category.php?id=<?php echo $id; ?>" class="btn-second">Update Category</a>
                                <a href="<?php echo SITEURL ?>admin/delete-category.php?id=<?php echo $id; ?>" class="btn-third"> Delete Category </a>
                            </td>
                        </tr>
            <?php
                    }
                } else {
                    echo "we do not have data";
                }
            }
            ?>
</table>
    </div>
</div>

<ol class="breadcrumb">
    <li>
        <i class="fa fa-dashboard"></i> <a href="index.php">Dashboard</a>
    </li>

</ol>
<?php include("partials/bottom.php"); ?>