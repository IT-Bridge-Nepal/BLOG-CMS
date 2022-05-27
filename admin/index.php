<?php include("partials/top.php"); ?>
                        <h1 class="page-header"></h1>
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
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i> <a href="index.php">Dashboard</a>
                            </li>

                        </ol>
<?php include("partials/bottom.php"); ?>
                    