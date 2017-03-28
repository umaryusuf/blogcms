<main class="col-xs-12 col-sm-8 col-md-9 col-lg-9">

<!--    <div class="btn-group btn-group-justified">-->
<!---->
<!--        --><?php
//
//        require_once("includes/database.php");
//
//        $get_cats = "select * from categories";
//
//        $run_cats = mysqli_query($dbc, $get_cats);
//
//        while($cats_row = mysqli_fetch_array($run_cats)){
//            $cat_id = $cats_row["cat_id"];
//            $cat_title = $cats_row["cat_title"];
//
//            echo"<a href='index.php?cat=$cat_id' class='categories-tab btn btn-danger'>$cat_title</a>";
//        }
//
//        ?>
<!--    </div>-->
    <br>
    <?php
    if(isset($_GET['cat'])){

        $cat_id = $_GET['cat'];

        $get_posts = "Select * from posts where category_id='$cat_id'";

        $run_posts = @mysqli_query($dbc, $get_posts);

        while($row_posts = mysqli_fetch_array($run_posts)){
            $post_id = $row_posts['post_id'];
            $post_title = $row_posts['post_title'];
            $post_date = $row_posts['post_date'];
            $post_author = $row_posts['post_author'];
            $post_image = $row_posts['post_image'];
            $post_content = substr($row_posts['post_content'], 0, 500);

        ?>

        <article class="well ">

            <header>
                <h2 class="blog-post-title"><a href="details.php?post=<?php echo $post_id;?>"><?php echo $post_title; ?></a></h2>
                <p class="blog-post-meta"><em>Posted on: </em> <?php echo $post_date; ?> by <a href="#"> <?php echo $post_author; ?></a></p>
            </header>

            <div>
                <img src="admin/posts_images/<?php echo $post_image; ?>" alt="">
                <?php echo $post_content; ?>
            </div>
            <p class="read-more"><a href="details.php?post=<?php echo $post_id;?>" class="btn btn-danger">Read More...</a></p>
            <hr>
            <p>Share on:</p>
            <div class="button-group btn-group-justified">
                <a href="#" class="btn but">
                    <span><i class="fa fa-comment"><span class="comment-text">&nbsp;&nbsp; Comment</span></i> 6</span>
                </a>
                <a href="#" class="btn but facebook">
              <span>
                  <i class="fa fa-facebook">
                      <span class="comment-text">&nbsp;&nbsp; Share</span>
                  </i> 19
              </span>
                </a>
                <a href="#" class="btn but btn-primary">
                    <span><i class="fa fa-twitter"><span class="comment-text">&nbsp;&nbsp; Tweet</span></i> </span>
                </a>
            </div>
        </article>

    <?php } } ?>
</main>