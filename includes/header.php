<?php
$app = new App;
$app->startingSession();

define("baseUrl", "/");

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Restaurant - Bootstrap Restaurant Template</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600&family=Nunito:wght@600;700;800&family=Pacifico&display=swap" rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="<?php echo baseUrl; ?>lib/animate/animate.min.css" rel="stylesheet">
    <link href="<?php echo baseUrl; ?>lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="<?php echo baseUrl; ?>lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet" />

    <!-- Customized Bootstrap Stylesheet -->
    <link href="<?php echo baseUrl; ?>css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="<?php echo baseUrl; ?>css/style.css" rel="stylesheet">
</head>

<body>
    <div class="container-xxl bg-white p-0">
        <!-- Spinner Start -->
        <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
            <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div>
        <!-- Spinner End -->


        <!-- Navbar & Hero Start -->
        <div class="container-xxl position-relative p-0">
            <nav class="navbar navbar-expand-lg navbar-dark bg-dark px-4 px-lg-5 py-3 py-lg-0">
                <a href="<?php echo baseUrl; ?>" class="navbar-brand p-0">
                    <h1 class="text-primary m-0"><i class="fa fa-utensils me-3"></i>Restaurant</h1>
                    <!-- <img src="img/logo.png" alt="Logo"> -->
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                    <span class="fa fa-bars"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarCollapse">
                    <div class="navbar-nav ms-auto py-0 pe-4">
                        <a href="<?php echo baseUrl; ?>" class="nav-item nav-link active">Home</a>
                        <a href="<?php echo baseUrl . "about.php"; ?>" class="nav-item nav-link">About</a>
                        <a href="<?php echo baseUrl . "service.php"; ?>" class="nav-item nav-link">Service</a>
                        <a href="<?php echo baseUrl . "menu.php"; ?>" class="nav-item nav-link">Menu</a>
                        <div class="nav-item dropdown">
                            <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Pages</a>
                            <div class="dropdown-menu m-0">
                                <a href="<?php echo baseUrl . "booking.php"; ?>" class="dropdown-item">Booking</a>
                                <a href="<?php echo baseUrl . "team.php"; ?>" class="dropdown-item">Our Team</a>
                                <a href="<?php echo baseUrl . "testimonial.php"; ?>" class="dropdown-item">Testimonial</a>
                            </div>
                        </div>
                        <a href="<?php echo baseUrl . "contact.php"; ?>" class="nav-item nav-link">Contact</a>
                        <?php if (isset($_SESSION['user_id'])) : ?>
                            <div class="nav-item dropdown">
                                <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><?php echo htmlspecialchars($_SESSION['username'], ENT_QUOTES, 'UTF-8'); ?></a>
                                <div class="dropdown-menu m-0 mx-4">
                                    <a href="<?php echo baseUrl; ?>auth/logout.php" class="dropdown-item">Log out</a>
                                </div>
                            </div>
                        <?php else : ?>
                            <a href="<?php echo baseUrl; ?>auth/login.php" class="nav-item nav-link">Login</a>
                            <a href="<?php echo baseUrl; ?>auth/register.php" class="nav-item nav-link">Register</a>
                        <?php endif; ?>

                    </div>
                    <a href="" class="btn btn-primary py-2 px-4">Book A Table</a>
                </div>
            </nav>