<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<title>Navbar with Logo Image</title>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

<style>
    .bs-example{
        margin: 0;
    }
</style>
</head>
<body>
<div class="bs-example">
    <nav class="navbar navbar-expand-md navbar-light bg-light">
        <a href="home.php" class="navbar-brand">
            <img src="../images/logo.png" height="70" alt="CoolBrand">
        </a>
        <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarCollapse">
            <div class="navbar-nav">
                <a href="home.php" class="nav-item nav-link"><b>Home</b></a>
                <a href="price.php" class="nav-item nav-link"><b>Price</b></a>
                <a href="courierMenu.php" class="nav-item nav-link"><b>Courier</b></a>
                <a href="trackMenu.php" class="nav-item nav-link"><b>Track</b></a>
                <a href="profile.php" class="nav-item nav-link"><b>Profile</b></a>
                <a href="contactUs.php" class="nav-item nav-link"><b>ContactUs</b></a>
                
            </div>
            <div class="navbar-nav ml-auto">
                <a href="../admin/logout.php" class="nav-item nav-link"><b>Admin Page</b></a>
                <a href="../logout.php" class="nav-item nav-link"><b>LogOut</b></a>
            </div>
        </div>
    </nav>
</div>
</body>
</html>
<?php include('footer.php'); ?>

  