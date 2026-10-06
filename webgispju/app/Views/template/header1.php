<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>BizLand Bootstrap Template - Index</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="<?= base_url('assets/');?>/img/favicon.png" rel="icon">
    <link href="<?= base_url('assets/');?>/img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Roboto:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="<?= base_url('assets/');?>/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?= base_url('assets/');?>/vendor/icofont/icofont.min.css" rel="stylesheet">
    <link href="<?= base_url('assets/');?>/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="<?= base_url('assets/');?>/vendor/owl.carousel/<?= base_url('assets/');?>/owl.carousel.min.css" rel="stylesheet">
    <link href="<?= base_url('assets/');?>/vendor/venobox/venobox.css" rel="stylesheet">
    <link href="<?= base_url('assets/');?>/vendor/aos/aos.css" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="<?= base_url('assets/');?>/css/style.css" rel="stylesheet">

    <!-- =======================================================
    * Template Name: BizLand - v2.0.2
    * Template URL: https://bootstrapmade.com/bizland-bootstrap-business-template/
    * Author: BootstrapMade.com
    * License: https://bootstrapmade.com/license/
    ======================================================== -->
</head>

<body>

<!-- ======= Top Bar ======= -->
<div id="topbar" class="d-none d-lg-flex align-items-center fixed-top">
    <div class="container d-flex">
        <div class="contact-info mr-auto">
            <i class="icofont-envelope"></i> <a href="mailto:contact@example.com">Email</a>
            <i class="icofont-phone"></i> +62 899999999
        </div>
        <div class="social-links">
            <a href="#" class="twitter"><i class="icofont-twitter"></i></a>
            <a href="#" class="facebook"><i class="icofont-facebook"></i></a>
            <a href="#" class="instagram"><i class="icofont-instagram"></i></a>
            <a href="#" class="skype"><i class="icofont-skype"></i></a>
            <a href="#" class="linkedin"><i class="icofont-linkedin"></i></i></a>
        </div>
    </div>
</div>

<!-- ======= Header ======= -->
<header id="header" class="fixed-top">
    <div class="container d-flex align-items-center">

        <h1 class="logo mr-auto"><a href="index.html">BizLand<span>.</span></a></h1>
        <!-- Uncomment below if you prefer to use an image logo -->
        <!-- <a href="index.html" class="logo mr-auto"><img src="<?= base_url('assets/');?>/img/logo.png" alt=""></a>-->

        <nav class="nav-menu d-none d-lg-block">
            <ul>
                <li <?php if(empty($aktif)){echo 'class="active"';}?>><a href="/">Home</a></li>
                <li><a href="<?= base_url();?>/dashboard">Peta Perlengkapan Jalan</a></li>
                <li <?php if($aktif=='peng'){echo 'class="active"';}?>><a href="<?= base_url();?>/home/pengaduan">Pengaduan</a></li>
                <li><a href="#aspirasi">Aspirasi</a></li>
                <li <?php if($aktif=='kontak'){echo 'class="active"';}?>><a href="/home/contact">Kontak</a></li>

            </ul>
        </nav><!-- .nav-menu -->

    </div>
</header><!-- End Header -->
