<?php
$conn = mysqli_connect("localhost", "root", "", "cms");
if (!$conn) {
    die("not connected");
} else {
    echo "success";
}
