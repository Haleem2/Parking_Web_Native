<!DOCTYPE html>
<html lang="en">


<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Parking Online </title>

  <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">

  <link rel="stylesheet" type="text/css" href="assets/fonts/line-icons.css">

  <link rel="stylesheet" type="text/css" href="assets/css/slicknav.css">

  <link rel="stylesheet" type="text/css" href="assets/css/color-switcher.css">

  <link rel="stylesheet" type="text/css" href="assets/css/animate.css">

  <link rel="stylesheet" type="text/css" href="assets/css/owl.carousel.css">

  <link rel="stylesheet" type="text/css" href="assets/css/main.css">

  <link rel="stylesheet" type="text/css" href="assets/css/responsive.css">
  <!-- boking styling page -->
  <link rel="stylesheet" type="text/css" href="assets/css/booking.css" />
  <script src="assets/js/jquery-min.js"></script>

</head>

<body>

  <header id="header-wrap">
    <!-- sticky top bar  -->
    <div class="top-bar">
      <div class="container">
        <div class="row">
          <div class="col-lg-6 col-md-6 col-xs-12">
            <div class="header-top-right">
              <a href="login.php" class="header-top-button"><i class="lni-lock"></i> Log In</a> |
              <a href="register.php" class="header-top-button"><i class="lni-pencil"></i> Register</a>
            </div>

            <!-- <ul class="list-inline">
              <li><i class="lni-phone"></i> +0123 456 789</li>
              <li><i class="lni-envelope"></i> <a href="http://preview.uideck.com/cdn-cgi/l/email-protection"
                  class="__cf_email__" data-cfemail="5e2d2b2e2e312c2a1e39333f3732703d3133">[email&#160;protected]</a>
              </li>
            </ul> -->

          </div>
          <!-- <div class="col-lg-6 col-md-6 col-xs-12">
            <div class="roof-social float-right">
              <a class="facebook" href="logout.php"><i class="lni-facebook-filled"></i></a>
              <a class="twitter" href="#"><i class="lni-twitter-filled"></i></a>
              <a class="instagram" href="#"><i class="lni-instagram-filled"></i></a>
              <a class="linkedin" href="#"><i class="lni-linkedin-fill"></i></a>
              <a class="google" href="#"><i class="lni-google-plus"></i></a>
            </div>

          </div> -->
        </div>
      </div>
    </div> <!-- stiky top bar ended-->

    <!-- nav bar  -->
    <nav class="navbar navbar-expand-lg bg-white fixed-top scrolling-navbar">
      <div class="container">

        <div class="navbar-header">
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main-navbar" aria-controls="main-navbar" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            <span class="lni-menu"></span>
            <span class="lni-menu"></span>
            <span class="lni-menu"></span>
          </button>
          <a href="index.php" class="navbar-brand">
          <img src="assets/img/logo.png" alt="">
          </a>
        </div>
        <div class="collapse navbar-collapse" id="main-navbar">
          <ul class="navbar-nav mr-auto w-100 justify-content-center">
            <li class="nav-item  active">
              <a class="nav-link " href="index.php"  aria-haspopup="true" aria-expanded="false">
                Home
              </a>
              <!-- <div class="dropdown-menu">
                <a class="dropdown-item active" href="index.php">Home</a>
                
              </div> -->
            </li>
            <!-- <li class="nav-item">
              <a class="nav-link" href="Cities.php">
                Categories
              </a>
            </li> -->
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Cities
              </a>
              <div class="dropdown-menu">

                <?php
                include_once "City.php";
                $city = new City();
                $data = $city->GetAll();

                while ($row = mysqli_fetch_assoc($data)) {

                ?>
                  <a class="dropdown-item" href="City_details.php?id=<?php echo ($row["City_Id"]); ?>"><?php echo ($row["City_Name"]); ?></a>
                <?php
                }
                ?>
              </div>
            </li>
            <!-- <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" aria-haspopup="true"
                aria-expanded="false">
                Pages
              </a>
              <div class="dropdown-menu">
                <a class="dropdown-item" href="about.html">About Us</a>
                <a class="dropdown-item" href="services.html">Services</a>
                <a class="dropdown-item" href="ads-details.html">Ads Details</a>
                <a class="dropdown-item" href="post-ads.html">Ads Post</a>
                <a class="dropdown-item" href="pricing.html">Packages</a>
                <a class="dropdown-item" href="testimonial.html">Testimonial</a>
                <a class="dropdown-item" href="faq.html">FAQ</a>
                <a class="dropdown-item" href="404.html">404</a>
              </div>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" aria-haspopup="true"
                aria-expanded="false">
                Blog
              </a>
              <div class="dropdown-menu">
                <a class="dropdown-item" href="blog.html">Blog - Right Sidebar</a>
                <a class="dropdown-item" href="blog-left-sidebar.html">Blog - Left Sidebar</a>
                <a class="dropdown-item" href="blog-grid-full-width.html"> Blog full width </a>
                <a class="dropdown-item" href="single-post.html">Blog Details</a>
              </div>
            </li> -->
            <li class="nav-item">
              <a class="nav-link" href="login.php">
                Delivery
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="login.php">
                Rent
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="contact.php">
                Contact
              </a>
            </li>
          </ul>
          <!-- <div class="post-btn">
            <a class="btn btn-common" href="post-ads.html"><i class="lni-pencil-alt"></i> Post an Ad</a>
          </div> -->
        </div>
      </div>

      <ul class="mobile-menu">
        <li>
          <a class="active" href="index.php">
            Home
          </a>
          <!-- <ul class="dropdown">
            <li><a class="active" href="index.php">Home</a></li>
          </ul> -->
        </li>
        <!-- <li>
          <a href="Cities.php">Categories</a>
        </li> -->
        <li>
          <a href="#">
            Cities
          </a>
          <ul class="dropdown">
            <?php
            include_once "City.php";
            $city = new City();
            $data = $city->GetAll();

            while ($row = mysqli_fetch_assoc($data)) {

            ?>
              <a class="dropdown-item" href="adlistinggrid.html"><?php echo ($row["City_Name"]); ?></a>
            <?php
            }
            ?>
          </ul>
        </li>
        <!-- <li>
          <a href="#">Pages</a>
          <ul class="dropdown">
            <li><a href="about.html">About Us</a></li>
            <li><a href="services.html">Services</a></li>
            <li><a href="ads-details.html">Ads Details</a></li>
            <li><a href="post-ads.html">Ads Post</a></li>
            <li><a href="pricing.html">Packages</a></li>
            <li><a href="testimonial.html">Testimonial</a></li>
            <li><a href="faq.html">FAQ</a></li>
            <li><a href="404.html">404</a></li>
          </ul>
        </li> -->
        <!-- <li>
          <a href="#">Blog</a>
          <ul class="dropdown">
            <li><a href="blog.html">Blog - Right Sidebar</a></li>
            <li><a href="blog-left-sidebar.html">Blog - Left Sidebar</a></li>
            <li><a href="blog-grid-full-width.html"> Blog full width </a></li>
            <li><a href="single-post.html">Blog Details</a></li>
          </ul>
        </li> -->
        <li>
          <a href="contact.php">Contact Us</a>
        </li>
      </ul>

    </nav>
  </header>