<?php
include "database.php";

if(isset($_GET["delete_post"])){
    $delete_id = $_GET["delete_post"];

    $delete_query = "delete from posts where post_id='$delete_id'";

    if(@mysqli_query($dbc, $delete_query)){
        echo "<script>alert('Post has been deleted');</script>";
        echo "<script>window.open('../index.php?view_posts', '_self');</script>";
    }
}
