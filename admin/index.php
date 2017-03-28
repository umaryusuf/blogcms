<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="description" content="" />
    <meta name="author" content="" />

    <title>Admin Panel</title>

    <!-- Bootstrap Core CSS -->
    <link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css" />
    <!--  Custom CSS -->
    <link rel="stylesheet" type="text/css" href="../css/style.css" />
    <link rel="stylesheet" type="text/css" href="../css/sidebar.css" />
    <link rel="shortcut icon" href="../images/dcsmall.png" />
    <link rel="stylesheet" type="text/css" href="../font-awesome/css/font-awesome.min.css" />
    <script src="../js/tinymce/tinymce.min.js"></script>
    <script>
        tinymce.init({selector: 'textarea'});
    </script>
</head>
<body>
<nav class="navbar navbar-fixed-top" role="navigation">
    <div class="container-fluid">

        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navBar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class=" navbar-brand fa fa-outdent " id="menu-toggle"></a>
            <a class="navbar-brand" href="index.php">Admin Panel</a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="navBar" >
            <ul class="nav navbar-nav navbar-right">
                <li>
                    <a href="index.php?logout" title="Logout">Logout</a>
                </li>
            </ul>
        </div>

    </div>
</nav>

<div id="wrapper" class="menuDisplayed">
    <!--sidebar-->
    <div id="sidebar-wrapper">
        <div class="sidebar-header">
            <div class="profile-info">
                <h4 class="text-center">Admin Panel</h4>
            </div>
        </div>
        <ul id="sidebar-nav" >
            <li>
                <a href="index.php?insert_post"><i class="icons fa fa-edit fa-fw"></i> Insert New Post</a>
            </li>
            <li>
                <a href="index.php?view_posts"><i class="icons fa fa-eye fa-fw"></i> View all Post</a>
            </li>
            <li>
                <a href="index.php?insert_cats"><i class="icons fa fa-edit fa-fw"></i> Insert New category</a>
            </li>
            <li>
                <a href="index.php?view_cats"><i class="icons fa fa-eye fa-fw"></i> View all category</a>
            </li>
            <li>
                <a href="index.php?view_comments"><i class="icons fa fa-trash-o fa-fw"></i> View Comments</a>
            </li>
            <li>
                <a href="index.php?logout"><i class="icons fa fa-sign-out fa-fw"></i>Logout</a>
            </li>
        </ul>
    </div>

    <!--content-->
    <div id="page-content-wrapper">
        <div class="container-fluid">
            <h1 class="text-center" style="margin-top: 50px;"> Admin Panel</h1>

            <?php
            if(isset($_GET['insert_post'])){
                include("includes/insert_post.php");
            }

            if(isset($_GET['view_posts'])){
                include("includes/view_posts.php");
            }

            if(isset($_GET['edit_posts'])){
                include("includes/edit_posts.php");
            }

            ?>
        </div>
    </div>
</div>


<!-- jQuery -->
<script type="text/javascript" src="../js/jquery.min.js"></script>
<!-- Bootstrap Core JavaScript-->
<script type="text/javascript" src="../js/bootstrap.min.js"></script>
<script type="text/javascript">
    $(function(){
        $('#menu-toggle').click(function(e){
            e.preventDefault();
            $('#wrapper').toggleClass('menuDisplayed');
        });
    });
</script>
</body>
</html>
