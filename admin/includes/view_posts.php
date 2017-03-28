<!doctype html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Insert Post</title>
    <script src="../../js/jquery.min.js"></script>
    <script src="../../js/tinymce/tinymce.min.js"></script>
    <script>
        tinymce.init({selector: 'textarea'});
    </script>
</head>
<body>
    <div >

        <h3 class="text-center">View All Posts</h3>

        <div class="table-responsive">
            <table class="table table-bordered text-center table-striped ">
                <thead>
                <tr class="active">
                    <th>No</th>
                    <th>Post Date</th>
                    <th>Post Author</th>
                    <th>Post Title</th>
                    <th>Post Image</th>
                    <th>Delete Post</th>
                    <th>Edit</th>
                </tr>
                </thead>
                <tbody>

                <?php
                include "database.php";

                $query = "SELECT * FROM posts";

                $run = mysqli_query($dbc, $query);

                $i = 1;

                while($row = mysqli_fetch_array($run)){
                    $post_id = $row["post_id"];
                    $post_date = $row["post_date"];
                    $post_author = $row["post_author"];
                    $post_title = $row["post_title"];
                    $post_image = $row["post_image"];

                    ?>
                    <tr>
                        <td width="5%"><?php echo $post_id; ?></td>
                        <td width="15%"><?php echo $post_date; ?></td>
                        <td width="15%"><?php echo $post_author; ?></td>
                        <td width="15%"><?php echo $post_title; ?></td>
                        <td width="30%"><img width="300" height="160" src="posts_images/<?php echo $post_image; ?>"></td>
                        <td width="15%"><a href="includes/delete_post.php?delete_post=<?php echo $post_id; ?>">Delete</a></td>
                        <td width="5%"><a href="index.php?edit_posts=<?php echo $post_id; ?>">Edit</a></td>
                    </tr>
                <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>