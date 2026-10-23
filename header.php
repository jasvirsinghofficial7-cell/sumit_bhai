<?php
// 1. initialization
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>GenzDream - Career Guidance</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts for Normal Text (Poppins) -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">

    <!-- Adine Kirnberg Font Load & Apply -->
    <style>
        /* Adine Kirnberg Font Load karna */
        @font-face {
            font-family: 'AdineKirnberg';
            src: url('fonts/AdineKirnberg.ttf') format('truetype');
            font-weight: normal;
            font-style: normal;
        }

        /* Normal text aur buttons ke liye Poppins */
        body, p, a, div, span, button {
            font-family: 'Poppins', sans-serif !important;
        }

        /* Sirf Headings aur Logo ke liye Adine Kirnberg */
        h1, h2, h3, h4, h5, h6 {
            font-family: 'AdineKirnberg', cursive !important;
            font-weight: normal !important;
            font-size: 3.5rem;
        }
         /* Wave effect ko hatane ke liye force style */
        .owl-carousel-item::after, 
        .owl-carousel-item::before, 
        .header-carousel::after, 
        .header-carousel::before,
        .custom-shape-divider-bottom-1657800000 { /* Agar koi specific class hai */
            display: none !important;
            background-image: none !important;
            clip-path: none !important;
        }

        /* Agar background wave image ke roop mein hai */
        .owl-carousel-item {
            background-image: none !important;
        }
    </style>

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/animate/animate.min.css" rel="stylesheet">
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="css/style.css" rel="stylesheet">
</head>

<body>
    <div class="container-xxl bg-white p-0">
        <!-- Spinner Start -->
        <!-- <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
            <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div> -->
        <!-- Spinner End -->


        <!-- Navbar Start -->
        <nav class="navbar navbar-expand-lg bg-white navbar-light sticky-top px-4 px-lg-5 py-lg-0">
            <a href="index.php" class="navbar-brand">
                <h1 class="m-0" style="color: #4CAF50;"><i class="fa fa-book-reader me-3"></i>GenzDream</h1>
            </a>
            <button type="button" class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <div class="navbar-nav mx-auto">
                    <!-- Sirf Home aur About Us rakha gaya hai -->
                    <a href="index.php" class="nav-item nav-link active" style="font-size: 1.1rem; font-weight: 500;">Home</a>
                    <a href="about.php" class="nav-item nav-link" style="font-size: 1.1rem; font-weight: 500;">About Us</a>
                </div>
            </div>
        </nav>
        <!-- Navbar End -->