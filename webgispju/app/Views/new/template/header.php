<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from www.themeon.net/nifty/v2.5/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 05 Jul 2016 13:43:07 GMT -->
<!-- Added by HTTrack --><meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard | SIMPEL JALN - DINHUB BANJARNEGARA</title>


    <!--STYLESHEET-->
    <!--=================================================-->

    <!--Open Sans Font [ OPTIONAL ]-->
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700' rel='stylesheet' type='text/css'>


    <!--Bootstrap Stylesheet [ REQUIRED ]-->
    <link href="<?=base_url()?>/assets/new/css/bootstrap.min.css" rel="stylesheet">


    <!--Nifty Stylesheet [ REQUIRED ]-->
    <link href="<?=base_url()?>/assets/new/css/nifty.min.css" rel="stylesheet">


    <!--Nifty Premium Icon [ DEMONSTRATION ]-->
    <link href="<?=base_url()?>/assets/new/css/demo/nifty-demo-icons.min.css" rel="stylesheet">


    <!--Demo [ DEMONSTRATION ]-->
    <link href="<?=base_url()?>/assets/new/css/demo/nifty-demo.min.css" rel="stylesheet">


    <!--DataTables [ OPTIONAL ]-->
    <link href="<?=base_url()?>/assets/new/plugins/datatables/media/css/dataTables.bootstrap.css" rel="stylesheet">
    <link href="<?=base_url()?>/assets/new/plugins/datatables/extensions/Responsive/css/dataTables.responsive.css" rel="stylesheet">


    <!--Morris.js [ OPTIONAL ]-->
    <link href="<?=base_url()?>/assets/new/plugins/morris-js/morris.min.css" rel="stylesheet">


    <!--Magic Checkbox [ OPTIONAL ]-->
    <link href="<?=base_url()?>/assets/new/plugins/magic-check/css/magic-check.min.css" rel="stylesheet">



    <link rel="stylesheet" href="<?= base_url()?>/assets/admin/lib/select2/select2.css">


    <!--JAVASCRIPT-->
    <!--=================================================-->

    <!--Pace - Page Load Progress Par [OPTIONAL]-->
    <link href="<?=base_url()?>/assets/new/plugins/pace/pace.min.css" rel="stylesheet">
    <script src="<?=base_url()?>/assets/new/plugins/pace/pace.min.js"></script>


    <!--jQuery [ REQUIRED ]-->
    <script src="<?=base_url()?>/assets/new/js/jquery-2.2.4.min.js"></script>


    <!--BootstrapJS [ RECOMMENDED ]-->
    <script src="<?=base_url()?>/assets/new/js/bootstrap.min.js"></script>


    <!--NiftyJS [ RECOMMENDED ]-->
    <script src="<?=base_url()?>/assets/new/js/nifty.min.js"></script>






    <!--=================================================-->

    <!--Demo script [ DEMONSTRATION ]-->
    <script src="<?=base_url()?>/assets/new/js/demo/nifty-demo.min.js"></script>


    <!--Morris.js [ OPTIONAL ]-->
    <script src="<?=base_url()?>/assets/new/plugins/morris-js/morris.min.js"></script>
    <script src="<?=base_url()?>/assets/new/plugins/morris-js/raphael-js/raphael.min.js"></script>


    <!--Sparkline [ OPTIONAL ]-->
    <script src="<?=base_url()?>/assets/new/plugins/sparkline/jquery.sparkline.min.js"></script>


    <!--Specify page [ SAMPLE ]-->
    <script src="<?=base_url()?>/assets/new/js/demo/dashboard.js"></script>





    <!--=================================================

    REQUIRED
    You must include this in your project.


    RECOMMENDED
    This category must be included but you may modify which plugins or components which should be included in your project.


    OPTIONAL
    Optional plugins. You may choose whether to include it in your project or not.


    DEMONSTRATION
    This is to be removed, used for demonstration purposes only. This category must not be included in your project.


    SAMPLE
    Some script samples which explain how to initialize plugins or components. This category should not be included in your project.


    Detailed information and more samples can be found in the document.

    =================================================-->
    <style media="screen">

    </style>

</head>

<!--TIPS-->
<!--You may remove all ID or Class names which contain "demo-", they are only used for demonstration. -->
<body style="font-family: Sans-serif">
<div id="container" class="effect aside-float aside-bright mainnav-lg">

    <!--NAVBAR-->
    <!--===================================================-->
    <header id="navbar">
        <div id="navbar-container" class="boxed">

            <!--Brand logo & name-->
            <!--================================-->
            <div class="navbar-header">
                <a href="/dashboard" class="navbar-brand text-center">
<!--                    <img src="--><?//=base_url()?><!--/assets/new/img/logo.png" alt="Nifty Logo" class="brand-icon">-->
                    <div class="brand-title">
                        <span class="brand-text">SIMPEL<span class="text-muted">JALAN</span></span>
                    </div>
                </a>
            </div>
            <!--================================-->
            <!--End brand logo & name-->


        </div>
    </header>
    <!--===================================================-->
    <!--END NAVBAR-->
    <div class="boxed">

        <!--MAIN NAVIGATION-->
        <!--===================================================-->
        <nav id="mainnav-container">
            <div id="mainnav">

                <!--Menu-->
                <!--================================-->
                <div id="mainnav-menu-wrap">
                    <div class="nano">
                        <div class="nano-content">

                            <!--Profile Widget-->
                            <!--================================-->
                            <div id="mainnav-profile" class="mainnav-profile text-center">
                                <div class="profile-wrap">
                                    <div class="pad-btm">

                                        <img class="img-circle img-sm img-border" src="<?=base_url()?>/assets/new/img/profile-photos/1.png" alt="Profile Picture">
                                    </div>
                                    <a href="#profile-nav" class="box-block" data-toggle="collapse" aria-expanded="false">

                                        <p class="mnp-name">DINHUB BNA</p>
                                        <span class="mnp-desc">DINHUB Banjarnegara</span>
                                    </a>
                                </div>
                            </div>
                            <ul id="mainnav-menu" class="list-group">

                                <!--Category name-->
                                <li class="list-header">Navigasi</li>

                                <!--Menu list item-->
                                <li class="active-link">
                                    <a href="index.html">
                                        <i class="demo-psi-home"></i>
                                        <span class="menu-title">
                                        <strong>Halaman Utama</strong>
                                      </span>
                                    </a>
                                </li>
                                <li class="active-link">
                                    <a href="/dashboard">
                                        <i class="demo-psi-inbox-full"></i>
                                        <span class="menu-title">
        												<strong>Dashboard</strong>
        											</span>
                                    </a>
                                </li>

                                <!--Menu list item-->
                                <li>
                                    <a href="/peta">
                                        <i class="demo-psi-gear-2"></i>
                                        <span class="menu-title">
        												<strong>Peta</strong>
        												<span class="pull-right badge badge-warning">new</span>
        											</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <i class="demo-psi-split-vertical-2"></i>
                                        <span class="menu-title">
        												<strong>Perlengkapan Jalan</strong>
        											</span>
                                        <i class="arrow"></i>
                                    </a>

                                    <!--Submenu-->
                                    <ul class="collapse">
                                        <?php foreach ($jenis as $menujenis){?>

                                        <li><a href="<?= base_url().'/peta/perkap/'.$menujenis->id;?>"><?= $menujenis->nama?></a></li>
                                        <?php } ?>

                                    </ul>
                                </li>


                                <!--Menu list item-->
                                <li>
                                    <a href="<?= base_url().'/datajalan'?>">
                                        <i class="demo-psi-boot-2"></i>
                                        <span class="menu-title">Data Jalan</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="<?= base_url('home/pengaduan')?>" target="_blank">
                                        <i class="demo-psi-speech-bubble-3"></i>
                                        <span class="menu-title">Pengaduan</span>
                                    </a>
                                </li>
                            </ul>


                            <!--Widget-->
                            <!--================================-->
                            <div class="mainnav-widget">

                                <!-- Show the button on collapsed navigation -->
                                <div class="show-small">
                                    <a href="#" data-toggle="menu-widget" data-target="#demo-wg-server">
                                        <i class="demo-pli-monitor-2"></i>
                                    </a>
                                </div>

                                <!-- Hide the content on collapsed navigation -->
                                <div id="demo-wg-server" class="hide-small mainnav-widget-content">
                                    <ul class="list-group">

                                        <li class="pad-ver"><a href="#" class="btn btn-success btn-bock">View Details</a></li>
                                    </ul>
                                </div>
                            </div>
                            <!--================================-->
                            <!--End widget-->

                        </div>
                    </div>
                </div>
                <!--================================-->
                <!--End menu-->

            </div>
        </nav>
        <!--===================================================-->
        <!--END MAIN NAVIGATION-->
