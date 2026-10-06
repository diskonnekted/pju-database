
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard | SIMPEL JALAN - DINHUB BANJARNEGARA</title>


    <!--STYLESHEET-->
    <!--=================================================-->

    <!--Open Sans Font [ OPTIONAL ]-->
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700' rel='stylesheet' type='text/css'>


    <!--Bootstrap Stylesheet [ REQUIRED ]-->
    <link href="<?=base_url()?>/assets/new/css/bootstrap.min.css" rel="stylesheet">


    <!--Nifty Stylesheet [ REQUIRED ]-->
    <link href="<?=base_url()?>/assets/new/css/nifty.min.css" rel="stylesheet">


    <link href="<?=base_url()?>/assets/new/themify-icons/themify-icons.min.css" rel="stylesheet">


    <link href="<?=base_url()?>/assets/new/css/themes/type-c/theme-ocean.min.css" rel="stylesheet">



    <link rel="stylesheet" href="<?= base_url()?>/assets/admin/lib/select2/select2.css">
    <link href="<?=base_url()?>/assets/new/plugins/datatables/media/css/dataTables.bootstrap.css" rel="stylesheet">
    <link href="<?=base_url()?>/assets/new/css/pace.min.css" rel="stylesheet">

    <script src="<?=base_url()?>/assets/new/js/pace.min.js"></script>
    <!--jQuery [ REQUIRED ]-->
    <script src="<?=base_url()?>/assets/new/js/jquery-2.2.4.min.js"></script>


    <!--BootstrapJS [ RECOMMENDED ]-->
    <script src="<?=base_url()?>/assets/new/js/bootstrap.min.js"></script>

    <!--Nifty Admin [ RECOMMENDED ]-->
    <script src="<?=base_url()?>/assets/new/js/nifty.min.js"></script>
    <script src="<?=base_url()?>/assets/new/plugins/datatables/media/js/jquery.dataTables.js"></script>
    <script src="<?=base_url()?>/assets/new/plugins/datatables/media/js/dataTables.bootstrap.js"></script>

</head>


<body>
<div id="container" class="effect mainnav-lg">

    <!--NAVBAR-->
    <!--===================================================-->
    <header id="navbar">
        <div id="navbar-container" class="boxed">

            <!--Brand logo & name-->
            <!--================================-->
            <div class="navbar-header">
                <a href="/dashboard" class="navbar-brand text-center">

                    <div class="brand-title">
                        <span class="brand-text">SIMPEL<span class="text-muted">JALAN</span></span>
                    </div>
                </a>
            </div>
            <!--Navbar Dropdown-->
            <!--================================-->
            <div class="navbar-content clearfix">
                <ul class="nav navbar-top-links pull-left">

                    <!--Navigation toogle button-->
                    <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                    <li class="tgl-menu-btn">
                        <a class="mainnav-toggle" href="#">
                            <i class="ti-view-list icon-lg"></i>
                        </a>
                    </li>
                    <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                    <!--End Navigation toogle button-->


                </ul>
                <ul class="nav navbar-top-links pull-right">
                    <!--User dropdown-->
                    <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                    <li id="dropdown-user" class="dropdown">
                        <a href="#" data-toggle="dropdown" class="dropdown-toggle text-right">
                                <span class="pull-right">
                                    <i class="ti-face-smile ic-user"></i>
                                </span>
                            <div class="username hidden-xs">Surveyor</div>
                        </a>


                        <div class="dropdown-menu dropdown-menu-md dropdown-menu-right panel-default">
                            <!-- Dropdown footer -->
                            <div class="pad-all text-right">
                                <a href="/admin" class="btn btn-primary">
                                    <i class="ti-unlock icon-fw"></i> Login
                                </a>
                            </div>
                        </div>
                    </li>

                </ul>
            </div>
            <!--================================-->
            <!--End Navbar Dropdown-->
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
                <nav id="mainnav-menu-wrap">
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

                                        <p class="mnp-name">DINHUB BANJARNEGARA</p>
                                        <span class="mnp-desc">Sistim Informasi Pemeliharaan Database Rambu Dan Jalan</span>
                                    </a>
                                </div>
                            </div>
                            <ul id="mainnav-menu" class="list-group">

                                <!--Category name-->
                                <li class="list-header">Navigasi</li>

                                <!--Menu list item-->
                                <li class="active-link">
                                    <a href="/">
                                        <i class="ti-home"></i>
                                        <span class="menu-title">
                                        <strong>Halaman Utama</strong>
                                      </span>
                                    </a>
                                </li>
                                <li class="active-link">
                                    <a href="/dashboard">
                                        <i class="ti-dashboard"></i>
                                        <span class="menu-title">
        												<strong>Dashboard</strong>
        											</span>
                                    </a>
                                </li>

                                <!--Menu list item-->
                                <li>
                                    <a href="/peta">
                                        <i class="ti-map"></i>
                                        <span class="menu-title">
        												<strong>Peta</strong>
        												<span class="pull-right badge badge-warning">new</span>
        											</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <i class="ti-location-pin"></i>
                                        <span class="menu-title">
        												<strong>Perlengkapan Jalan</strong>
        											</span>
                                        <i class="arrow"></i>
                                    </a>

                                    <!--Submenu-->
                                    <ul class="collapse">
                                        <?php foreach ($jenis as $menujenis){
                                            if ($menujenis->sub==null){
                                            ?>

                                        <li><a href="<?= base_url().'/peta/perkap/'.$menujenis->id;?>"><?= $menujenis->nama?></a></li>
                                        <?php
                                            }
                                            } ?>

                                    </ul>
                                </li>


                                <!--Menu list item-->
                                <li>
                                    <a href="<?= base_url().'/datajalan'?>">
                                        <i class="ti-map-alt"></i>
                                        <span class="menu-title">Data Jalan</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="<?= base_url('home/pengaduan')?>" target="_blank">
                                        <i class="ti-headphone-alt"></i>
                                        <span class="menu-title">Pengaduan</span>
                                    </a>
                                </li>
                            </ul>


                            <!--Widget-->
                            <!--================================-->
                            <div class="mainnav-widget">

                                <!-- Show the button on collapsed navigation -->
                                <div class="show-small">
                                    <a href="#" data-toggle="menu-widget" data-target="#wg-server">
                                        <i class="pli-monitor-2"></i>
                                    </a>
                                </div>

                                <!-- Hide the content on collapsed navigation -->
                                <div id="wg-server" class="hide-small mainnav-widget-content">
                                    <ul class="list-group">

                                        <li class="pad-ver"><a href="/admin" class="btn btn-success btn-bock">Login Surveyor</a></li>
                                    </ul>
                                </div>
                            </div>
                            <!--================================-->
                            <!--End widget-->

                        </div>
                    </div>
                </nav>
                <!--================================-->
                <!--End menu-->

            </div>
        </nav>
        <!--===================================================-->
        <!--END MAIN NAVIGATION-->
