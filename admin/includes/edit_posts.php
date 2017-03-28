<div class="col-md-8 col-md-offset-2">
    <div class="panel panel-danger">
        <!-- panel-heading -->
        <div class="panel-heading">
            <h4 class="text-center" style="color:#fff;">Edit Post</h4>
        </div> <!-- end panel heading -->
        <!-- panel body -->
        <div class="panel-body">
            <?php

            include "database.php";

            if (isset($_GET["edit_posts"])){

                $edit_id = $_GET["edit_posts"];

                $select_post = "SELECT * FROM posts WHERE post_id='$edit_id'";
                $run_query = mysqli_query($dbc, $select_post);

                while($row_post = mysqli_fetch_array($run_query)){

                    $post_id = $row_post["post_id"];
                    $title = $row_post["post_title"];
                    $post_cat = $row_post["category_id"];
                    $author = $row_post["post_author"];
                    $keywords = $row_post["post_keywords"];
                    $image = $row_post["post_image"];
                    $content = $row_post["post_content"];

                }
            }

            ?>
            <!-- Post form -->
            <form class="form-horizontal" role="form" action="index.php?edit_posts" method="post" enctype="multipart/form-data" id="post_form">
                <div class="form-group">
                    <label class="control-label col-sm-3" for="title">Post Title: </label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control admin" value="<?php echo $title;?>"  id="title" name="post_title" placeholder="Enter Post Title" />
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-3" for="category">Post Category: </label>
                    <div class="col-sm-9">
                        <select name="cat" id="category" class="form-control">

                            <?php

                            $get_cats = "SELECT * FROM categories WHERE cat_id='$post_cat'";

                            $run_cats = @mysqli_query($dbc, $get_cats);

                            while($cats_row = mysqli_fetch_array($run_cats)){
                                $cat_id = $cats_row["cat_id"];
                                $cat_title = $cats_row["cat_title"];
                                echo"<option value='$cat_id'>$cat_title</option>";

                                $get_more_cats = "SELECT * FROM categories";
                                $run_more_cats = @mysqli_query($dbc, $get_more_cats);

                                while($row_more_cats = mysqli_fetch_array($run_more_cats)){
                                    $cat_id = $row_more_cats["cat_id"];
                                    $cat_title = $row_more_cats["cat_title"];
                                    echo"<option value='$cat_id'>$cat_title</option>";
                                }
                            }

                            ?>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-3" for="author">Post Author: </label>
                    <div class="col-sm-9">
                        <input type="text" class="admin form-control" value="<?php echo $author?>" name="post_author" id="author" placeholder="Enter Post Author" />
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-3" for="keywords">Post keywords: </label>
                    <div class="col-sm-9">
                        <input type="text" class="admin form-control" value="<?php echo $keywords;?>"  name="post_keywords" id="keywords" placeholder="Enter Post keywords" />
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-3" for="image">Post Image: </label>
                    <div class="col-sm-9">
                        <input type="file" class="admin form-control"  name="post_image" id="image" placeholder="Enter Post Image" />
                        <img src="posts_images/<?php echo $image; ?>" alt="" width="150" >
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-3" for="content">Post Content: </label>
                    <div class="col-sm-9">
                        <textarea rows="8" class="admin form-control" name="post_content" id="content" placeholder="Enter Post Content"><?php echo $content;?></textarea>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-sm-12">
                        <button type="submit" class="btn btn-danger btn-lg btn-block" name="update">Update Now</button>
                    </div>
                </div>
            </form>
            <!-- end post form -->
        </div> <!-- end panel body -->
    </div> <!-- end panel -->
</div>

<?php

if(isset($_POST["update"])){

    $update_id = $_GET['edit_posts'];

    $post_title = $_POST["post_title"];
    $post_cat1 = $_POST["cat"];
    $post_date = date("F j, Y");
    $post_author = $_POST["post_author"];
    $post_keywords = $_POST["post_keywords"];
    $post_image = $_FILES["post_image"]["name"];
    $post_image_tmp = $_FILES["post_image"]["tmp_name"];
    $post_content = $_POST["post_content"];

    if($post_title == "" OR $post_cat1 == null OR $post_author == "" OR $post_keywords == "" OR $post_image == "" OR $post_content == ""){

        echo "<script>alert('Please fill in the blank fields')</script>";
        exit();

    } else {

        move_uploaded_file($post_image_tmp, "posts_images/$post_image");

        $update_post = "UPDATE posts SET category_id='$post_cat1', post_title='$post_title', post_date='$post_date', post_author='$post_author', post_keywords='$post_keywords', post_image='$post_image', post_content='$post_content' WHERE post_id='$update_id'";

        $run_update = @mysqli_query($dbc, $update_post);

        echo"<script>alert('Post has been Updated')</script>";
        echo "<script>window.open('index.php?view_posts', '_self')</script>";
    }
}

?>

