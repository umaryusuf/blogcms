<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="Content-Type" type="text/html" charset="UTF-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no"/>

	<title>BLOG | DYAJI CHARLES</title>

	<link rel="shortcut icon" href="images/dcsmall.png" />
	<link rel="stylesheet" href="css/bootstrap.min.css" />
	<link rel="stylesheet" href="font-awesome/css/font-awesome.min.css" />
	<link rel="stylesheet" href="css/style.css">
</head>
<body>
	<!-- nav -->
	<?php include "includes/navbar.php"; ?>
	<!-- end nav -->

	<!-- header -->
	<?php include "includes/header.php"; ?>
	<!-- end header -->

	<div class="container-fluid">
        <div class="row">
            <!-- main -->
            <?php include "includes/main.php"; ?>
            <!-- end main -->

            <!-- aside -->
            <?php include "includes/sidebar.php"; ?>
            <!-- end aside -->
        </div>
    </div>
	
	<!-- footer -->
    <div class="clearfix"></div>
    <footer id="myFooter">
        <?php include("includes/footer.php"); ?>
    </footer>
	<!-- end footer -->

	
	<script src="js/jquery.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
</body>
</html>