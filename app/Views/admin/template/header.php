<!--
    - Dashboard
    - Perlengkapan Jalan
        - Ruas Jalan
        - Jenis Perlengkapan
        - Perlengkapan
            - masing masing (berapa Laporan Baru)
        - Laporan Masyarakat
    - Penerangan Jalan
        - List IDPEL
        - Tagihan
        - Grafik
        - Laporan Masyarakat
    - Aspirasi
    - Pengaturan
    - Logout
-->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="/favicon.ico"/>
    <title>Admin Dinas Perhubungan Kab Banjarnegara</title>

    <link rel="stylesheet" href="<?= base_url()?>/assets/admin/lib/Hover/hover.css">
    <link rel="stylesheet" href="<?= base_url()?>/assets/admin/lib/select2/select2.css">
    <link rel="stylesheet" href="<?= base_url()?>/assets/admin/lib/fontawesome/css/font-awesome.css">
    <link rel="stylesheet" href="<?= base_url()?>/assets/admin/lib/weather-icons/css/weather-icons.css">
    <link rel="stylesheet" href="<?= base_url()?>/assets/admin/lib/ionicons/css/ionicons.css">
    <link rel="stylesheet" href="<?= base_url()?>/assets/admin/lib/jquery-toggles/toggles-full.css">
    <link rel="stylesheet" href="<?= base_url()?>/assets/admin/lib/morrisjs/morris.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.css">
    <link rel="stylesheet" href="<?= base_url()?>/assets/admin/css/quirk.css">

    <script src="<?= base_url()?>/assets/admin/lib/modernizr/modernizr.js"></script>
    <link rel="stylesheet" href="<?= base_url()?>/assets/admin/lib/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.css">

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="<?= base_url()?>/assets/admin/lib/html5shiv/html5shiv.js"></script>
    <script src="<?= base_url()?>/assets/admin/lib/respond/respond.src.js"></script>
    <![endif]-->
</head>

<body>

<header>
    <div class="headerpanel">

        <div class="logopanel">
            <h2><a href="#">SIMPELJALAN</a></h2>
        </div><!-- logopanel -->

        <div class="headerbar">

            <a id="menuToggle" class="menutoggle"><i class="fa fa-bars"></i></a>

            <div class="searchpanel">
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="Cari data...">
                    <span class="input-group-btn">
            <button class="btn btn-default" type="button"><i class="fa fa-search"></i></button>
          </span>
                </div><!-- input-group -->
            </div>

            <div class="header-right">
                <ul class="headermenu">
                    <li>
                        <div id="noticePanel" class="btn-group">
                            <button class="btn btn-notice alert-notice" data-toggle="dropdown">
                                <i class="fa fa-globe"></i>
                            </button>
                            <div id="noticeDropdown" class="dropdown-menu dm-notice pull-right">
                                <div role="tabpanel">
                                    <!-- Nav tabs -->
                                    <ul class="nav nav-tabs nav-justified" role="tablist">
                                        <li class="active"><a data-target="#notification" data-toggle="tab">Notifications (2)</a></li>
                                        <li><a data-target="#reminders" data-toggle="tab">Pengingat (4)</a></li>
                                    </ul>

                                    <!-- Tab panes -->
                                    <div class="tab-content">
                                        <div role="tabpanel" class="tab-pane active" id="notification">
                                            <ul class="list-group notice-list">
                                                <li class="list-group-item unread">
                                                    <div class="row">
                                                        <div class="col-xs-2">
                                                            <i class="fa fa-envelope"></i>
                                                        </div>
                                                        <div class="col-xs-10">
                                                            <h5><a href="">Pengaduan baru dari Ibu Musringah</a></h5>
                                                            <small>4 Februari, 2021</small>
                                                            <span>Lampu penerangan di depan rumah saya mati...</span>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li class="list-group-item unread">
                                                    <div class="row">
                                                        <div class="col-xs-2">
                                                            <i class="fa fa-user"></i>
                                                        </div>
                                                        <div class="col-xs-10">
                                                            <h5><a href="">Pengaduan nomor 7 sudah diverifikasi!</a></h5>
                                                            <small>18 Januari, 2021</small>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li class="list-group-item">
                                                    <div class="row">
                                                        <div class="col-xs-2">
                                                            <i class="fa fa-user"></i>
                                                        </div>
                                                        <div class="col-xs-10">
                                                            <h5><a href="">Pengaduan nomor 5 sudah selesai ditangani.</a></h5>
                                                            <small>7 Februari, 2021</small>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li class="list-group-item">
                                                    <div class="row">
                                                        <div class="col-xs-2">
                                                            <i class="fa fa-thumbs-up"></i>
                                                        </div>
                                                        <div class="col-xs-10">
                                                            <h5><a href="">Pengaduan baru dari Bp. Tarmidi!</a></h5>
                                                            <small>6 Februari, 2021</small>
                                                            <span>lampu PJU jalan sutoyo mati 5 unit...</span>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li class="list-group-item">
                                                    <div class="row">
                                                        <div class="col-xs-2">
                                                            <i class="fa fa-comment"></i>
                                                        </div>
                                                        <div class="col-xs-10">
                                                            <h5><a href="">Data laporan 8 diverifikasi!</a></h5>
                                                            <small>15 Januari, 2021</small>
                                                            <span>Laporan tidak valid, lampu masih baik...</span>
                                                        </div>
                                                    </div>
                                                </li>
                                            </ul>
                                            <a class="btn-more" href="">Lihat lainnya.. <i class="fa fa-long-arrow-right"></i></a>
                                        </div><!-- tab-pane -->

                                        <div role="tabpanel" class="tab-pane" id="reminders">
                                            <h1 id="todayDay" class="today-day">...</h1>
                                            <h3 id="todayDate" class="today-date">...</h3>

                                            <h5 class="today-weather"><i class="wi wi-hail"></i> 23 Derajat Celcius</h5>
                                            <p>Sore hari diperkirakan hujan petir.</p>

                                            <h4 class="panel-title">Agenda Tim</h4>
                                            <ul class="list-group">
                                                <li class="list-group-item">
                                                    <div class="row">
                                                        <div class="col-xs-2">
                                                            <h4>20</h4>
                                                            <p>Feb.</p>
                                                        </div>
                                                        <div class="col-xs-10">
                                                            <h5><a href="">Konsolidasi Verifikasi Database</a></h5>
                                                            <small>Kantor Dinhub BNA</small>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li class="list-group-item">
                                                    <div class="row">
                                                        <div class="col-xs-2">
                                                            <h4>05</h4>
                                                            <p>Maret</p>
                                                        </div>
                                                        <div class="col-xs-10">
                                                            <h5><a href="">Coklit PJU di lapangan</a></h5>
                                                            <small>Kecamatan Punggelan, BNA</small>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li class="list-group-item">
                                                    <div class="row">
                                                        <div class="col-xs-2">
                                                            <h4>25</h4>
                                                            <p>Maret</p>
                                                        </div>
                                                        <div class="col-xs-10">
                                                            <h5><a href="">Verifikasi hasil Coklit Kec. Punggelan</a></h5>
                                                            <small>Kantor Dinhub BNA.</small>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li class="list-group-item">
                                                    <div class="row">
                                                        <div class="col-xs-2">
                                                            <h4>10</h4>
                                                            <p>April</p>
                                                        </div>
                                                        <div class="col-xs-10">
                                                            <h5><a href="">Rapat Tim Surveyor</a></h5>
                                                            <small>Aula Dinhub BNA</small>
                                                        </div>
                                                    </div>
                                                </li>
                                            </ul>
                                            <a class="btn-more" href="">Lihat Agenda Lainnya <i class="fa fa-long-arrow-right"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li>
                        <div class="btn-group">
                            <button type="button" class="btn btn-logged" data-toggle="dropdown">
                                <img src="/assets/admin/images/photos/loggeduser.png" alt="" />
                                <?=$_SESSION['nama'];?>
                                <span class="caret"></span>
                            </button>
                            <ul class="dropdown-menu pull-right">
                               
                                <li><a href="<?= base_url('admin/auth/logout')?>"><i class="glyphicon glyphicon-log-out"></i> Log Out</a></li>
                            </ul>
                        </div>
                    </li>
                    <li>
                        <button id="chatview" class="btn btn-chat alert-notice">
                            <span class="badge-alert"></span>
                            <i class="fa fa-comments-o"></i>
                        </button>
                    </li>
                </ul>
            </div><!-- header-right -->
        </div><!-- headerbar -->
    </div><!-- header-->
</header>

<section>

    <div class="leftpanel">
        <div class="leftpanelinner">

            <!-- ################## LEFT PANEL PROFILE ################## -->

            <div class="media leftpanel-profile">
                <div class="media-left">
                    <a href="#">
                        <img src="<?= base_url()?>/assets/admin/images/photos/loggeduser1.png" alt="" class="media-object img-circle">
                    </a>
                </div>
                <div class="media-body">
                    <h4 class="media-heading"><?=$_SESSION['nama']?> <a data-toggle="collapse" data-target="#loguserinfo" class="pull-right"><i class="fa fa-angle-down"></i></a></h4>
                    <span><?= $_SESSION['jabatan']?></span>
                </div>
            </div><!-- leftpanel-profile -->


            <ul class="nav nav-tabs nav-justified nav-sidebar">
                <li class="tooltips active" data-toggle="tooltip" title="Main Menu"><a data-toggle="tab" data-target="#mainmenu"><i class="tooltips fa fa-ellipsis-h"></i></a></li>
                <li class="tooltips" data-toggle="tooltip" title="Log Out"><a href="<?= base_url('admin/auth/logout')?>"><i class="fa fa-sign-out"></i></a></li>
            </ul>

            <div class="tab-content">

                <!-- ################# MAIN MENU ################### -->
                <?php if($_SESSION['loginas']==1){ ?>
                <div class="tab-pane active" id="mainmenu">
                    <h5 class="sidebar-title">Data Utama</h5>
                    <ul class="nav nav-pills nav-stacked nav-quirk">
                        <li class="active"><a href="/admin"><i class="fa fa-home"></i> <span>Dashboard</span></a></li>

                    </ul>

                    <h5 class="sidebar-title">Perlengkapan Jalan</h5>
                    <ul class="nav nav-pills nav-stacked nav-quirk">
                        <li><a href="/admin/ruas"><i class="fa fa-home"></i> <span>Ruas Jalan</span></a></li>
                        <li><a href="/admin/perlengkapan/survey"><i class="fa fa-home"></i> <span>Survey Perlengkapan</span></a></li>
                        <li><a href="/admin/perlengkapan/jenis"><i class="fa fa-home"></i> <span>Jenis Perlengkapan</span></a></li>

                        <li class="nav-parent">
                            <a href=""><i class="fa fa-check-square"></i> <span>Perlengkapan Jalan</span></a>
                            <ul class="children">
                                <?php
                                foreach ($jenis as $jeni) {
                                    ?>
                                    <li><a href="<?= base_url('admin/perlengkapan/data/'.$jeni->id)?>"><?= $jeni->nama?></a></li>

                                    <?php
                                }
                                ?>
                            </ul>
                        </li>
                        <li><a href="/admin/pengaduan"><i class="fa fa-home"></i> <span>Laporan Masyarakat</span></a></li>
                    </ul>

                    <h5 class="sidebar-title">Penerangan Jalan</h5>
                    <ul class="nav nav-pills nav-stacked nav-quirk">
                        <li><a href="/admin/pju/survey"><i class="fa fa-home"></i> <span>Survey PJU</span></a></li>
                        <li><a href="/admin/pju/idpelanggan"><i class="fa fa-home"></i> <span>List ID Pelanggan</span></a></li>
                        <li><a href="/admin/pju/tagihan"><i class="fa fa-home"></i> <span>Tagihan</span></a></li>
<!--                        <li><a href="/admin/pju/grafik"><i class="fa fa-home"></i> <span>Grafik</span></a></li>-->
                    </ul>
                    <h5 class="sidebar-title">Lainnya</h5>
                    <ul class="nav nav-pills nav-stacked nav-quirk">
<!--                        <li><a href="/admin"><i class="fa fa-home"></i> <span>Aspirasi</span></a></li>-->
                        <li><a href="/admin/user"><i class="fa fa-home"></i> <span>Pengguna</span></a></li>
                        <li><a href="/admin/auth/logout"><i class="fa fa-home"></i> <span>Logout</span></a></li>
                    </ul>
                </div><!-- tab-pane -->
                <?php }else{
                ?>
                
                <div class="tab-pane active" id="mainmenu">
                    <h5 class="sidebar-title">Data Utama</h5>
                  

                    <h5 class="sidebar-title">Perlengkapan Jalan</h5>
                    <ul class="nav nav-pills nav-stacked nav-quirk">
                        <li class="active"><a href="/admin/perlengkapan/survey"><i class="fa fa-home"></i> <span>Survey Perlengkapan</span></a></li>
                        <li class="nav-parent">
                            <a href=""><i class="fa fa-check-square"></i> <span>Perlengkapan Jalan</span></a>
                            <ul class="children">
                                <?php
                                foreach ($jenis as $jeni) {
                                    ?>
                                    <li><a href="<?= base_url('admin/perlengkapan/data/'.$jeni->id)?>"><?= $jeni->nama?></a></li>

                                    <?php
                                }
                                ?>
                            </ul>
                        </li>
                    </ul>
                    

                    <h5 class="sidebar-title">Penerangan Jalan</h5>
                    <ul class="nav nav-pills nav-stacked nav-quirk">
                        <li><a href="/admin/pju/survey"><i class="fa fa-home"></i> <span>Survey PJU</span></a></li>
                    </ul>
                    <h5 class="sidebar-title">Lainnya</h5>
                    <ul class="nav nav-pills nav-stacked nav-quirk">
                        <li><a href="/admin/auth/logout"><i class="fa fa-home"></i> <span>Logout</span></a></li>
                    </ul>
                </div>
                <?php
                }
                ?>


            </div><!-- tab-content -->

        </div><!-- leftpanelinner -->
    </div><!-- leftpanel -->