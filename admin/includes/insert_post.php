<div class="col-md-8 col-md-offset-2">

    <!-- panel -->
    <div class="panel panel-danger">
        <!-- panel-heading -->
        <div class="panel-heading">
            <h4 class="text-center" style="color:#fff;">Insert New Post</h4>
        </div> <!-- end panel heding -->
        <!-- panel body -->
        <div class="panel-body">
            <!-- Post form -->
            <form class="form-horizontal" role="form" action="../index.php?insert_post" method="post" enctype="multipart/form-data" id="post_form">
                <div class="form-group">
                    <label class="control-label col-sm-3" for="title">Post Title: </label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control admin"  id="title" name="post_title" placeholder="Enter Post Title" />
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-3" for="category">Post Category: </label>
                    <div class="col-sm-9">
                        <select name="cat" id="category" class="form-control">
                            <option value="null">Select a category</option>
                            <?php

                            include"database.php";

                            $get_cats = "select * from categories";

                            $run_cats = @mysqli_query($dbc, $get_cats);

                            while($cats_row = mysqli_fetch_array($run_cats)){
                                $cat_id = $cats_row["cat_id"];
                                $cat_title = $cats_row["cat_title"];

                                echo"<option value='$cat_id'>$cat_title</option>";
                            }

                            ?>
                        </select>
                    </div>
                </div>
              <div class="form-group">
                <label class="control-label col-sm-3" for="author">Post Author: </label>
                <div class="col-sm-9">
                  <input type="text" class="admin form-control" name="post_author" id="author" placeholder="Enter Post Author" />
                </div>
              </div>
              <div class="form-group">
                <label class="control-label col-sm-3" for="keywords">Post keywords: </label>
                <div class="col-sm-9">
                  <input type="text" class="admin form-control"  name="post_keywords" id="keywords" placeholder="Enter Post keywords" />
                </div>
              </div>
              <div class="form-group">
                <label class="control-label col-sm-3" for="image">Post Image: </label>
                <div class="col-sm-9">
                  <input type="file" class="admin form-control"  name="post_image" id="image" placeholder="Enter Post Image" />
                </div>
              </div>
              <div class="form-group">
                <label class="control-label col-sm-3" for="content">Post Content: </label>
                <div class="col-sm-9">
                  <textarea rows="8" class="admin form-control" name="post_content" id="content" placeholder="Enter Post Content"></textarea>
                </div>
              </div>

              <div class="form-group">
                <div class="col-sm-12">
                  <button type="submit" class="btn btn-danger btn-lg btn-block" name="submit">Publish Now</button>
                </div>
              </div>
            </form>
            <!-- end post form -->
        </div> <!-- end panel body -->
    </div> <!-- end panel -->
</div>


<?php

if(isset($_POST["submit"])){

    $post_title = $_POST["post_title"];
    $post_cat = $_POST["cat"];
    $post_date = date("F j, Y");
    $post_author = $_POST["post_author"];
    $post_keywords = $_POST["post_keywords"];
    $post_image = $_FILES["post_image"]["name"];
    $post_image_tmp = $_FILES["post_image"]["tmp_name"];
    $post_content = $_POST["post_content"];

    if($post_title == "" OR $post_cat == null OR $post_author == "" OR $post_keywords == "" OR $post_image == "" OR $post_content == ""){

        echo "<script>alert('Please fill in the blank fields')</script>";
        exit();

    } else {

        move_uploaded_file($post_image_tmp, "posts_images/$post_image");

        $insert_post = "INSERT INTO posts (post_title, category_id, post_date, post_author, post_image, post_keywords,
        post_content) VALUES ('$post_title', '$post_cat', '$post_date', '$post_author', '$post_image', '$post_keywords', '$post_content')";

        $run_post = @mysqli_query($dbc, $insert_post);

        echo"<script>alert('Post has been Published')</script>";
        echo "<script>window.open('insert_post.php', '_self')</script>";

    }
}

?>
