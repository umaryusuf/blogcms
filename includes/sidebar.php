<aside class="col-xs-12 col-sm-4 col-md-3 col-lg-3">
	<section class="container-fluid">
        <form action="results.php" method="get" enctype="multipart/form-data">
            <div class="form-group input-group">
                <input type="text" class="form-control form-search" required name="search_query" placeholder="Search here...">
                <span class="input-group-btn">
                    <button class="btn btn-default" name="search" type="submit" value="search now"><i class="fa fa-search"></i></button>
                </span>
            </div>
        </form>
        <br>
        <div class="panel  panel-danger">
            <div class="panel-heading">
                <h4 class="post-header text-center" style="color: #fff;">About me</h4>
            </div>
            <div class="panel-body">
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. At repellat enim eius dolore, non minima quidem alias quam vero aut, sapiente nostrum possimus totam asperiores facilis quasi voluptatibus minus et.</p>
                <p class="read-more"><a href="#">Read More...</a></p>
            </div>
        </div>
        <div class="panel  panel-danger">
            <div class="panel-heading">
                <h4 class="post-header text-center" style="color: #fff;">My News Letter</h4>
            </div>
            <div class="panel-body">
                <form action="#" method="post">
                    <label for="email">Subscribe Via Email: </label>
                    <div class="form-group">
                        <input type="email" class="form-control form-search" name="newsletter" placeholder="Enter your email here...">
                        <br>
                        <button class="btn btn-primary btn-block" style="text-transform: capitalize;" name="subscribe" type="submit">Subscribe me</button>
                    </div>
                </form>
            </div>
        </div>
        <div class="panel panel-danger">
            <div class="panel-heading">
                <h4 class="post-header text-center" style="color:#fff;">Recent Posts</h4>
            </div>
            <div class="panel-body text-center"  style="margin: 0 auto;">
                <?php
                require_once("includes/database.php");

                $query = "select * from posts order by 1 DESC LIMIT 0,5";

                $run = mysqli_query($dbc, $query);

                while($row = mysqli_fetch_array($run)){
                    $post_id = $row["post_id"];
                    $title = $row["post_title"];
                    $image = $row["post_image"];

                    ?>

                    <h4>
                        <a href="details.php?post=<?php echo $post_id;?>">
                            <?php echo $title; ?>
                        </a>
                    </h4>
                    <a href="details.php?post=<?php echo $post_id;?>" >
                        <img src="admin/posts_images/<?php echo $image;?>" alt="" width="80%" style="margin: 0 auto;" class="img-responsive img-rounded" height="150">
                    </a>
                <?php } ?>

            </div>
        </div>
    </section>
</aside>
