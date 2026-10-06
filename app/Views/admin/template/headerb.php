
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
    <!--<link rel="shortcut icon" href="<?= base_url()?>/assets/admin/images/favicon.png" type="image/png">-->

    <title>Simpel-Jalan Dinhub Kab. Banjarnegara</title>

    <link rel="stylesheet" href="<?= base_url()?>/assets/admin/lib/Hover/hover.css">
    <link rel="stylesheet" href="<?= base_url()?>/assets/admin/lib/select2/select2.css">
    <link rel="stylesheet" href="<?= base_url()?>/assets/admin/lib/fontawesome/css/font-awesome.css">
    <link rel="stylesheet" href="<?= base_url()?>/assets/admin/lib/weather-icons/css/weather-icons.css">
    <link rel="stylesheet" href="<?= base_url()?>/assets/admin/lib/ionicons/css/ionicons.css">
    <link rel="stylesheet" href="<?= base_url()?>/assets/admin/lib/jquery-toggles/toggles-full.css">
    <link rel="stylesheet" href="<?= base_url()?>/assets/admin/lib/morrisjs/morris.css">

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
            <h2><a href="#">Dinhub BNA</a></h2>
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
                                        <li class="active"><a data-target="#notification" data-toggle="tab">Notifikasi (2)</a></li>
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
                                                            <h5><a href="">Pengaduan baru dari masyarakat</a></h5>
                                                            <small>2 Desember, 2020</small>
                                                            <span>Lampu jalan depan smp 1 mati...</span>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li class="list-group-item unread">
                                                    <div class="row">
                                                        <div class="col-xs-2">
                                                            <i class="fa fa-user"></i>
                                                        </div>
                                                        <div class="col-xs-10">
                                                            <h5><a href="">Operator satu memperbaharui tanggapan!</a></h5>
                                                            <small>4 Desember, 2020</small>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li class="list-group-item">
                                                    <div class="row">
                                                        <div class="col-xs-2">
                                                            <i class="fa fa-user"></i>
                                                        </div>
                                                        <div class="col-xs-10">
                                                            <h5><a href="">Admin memberi anda pesan!</a></h5>
                                                            <small>7 Desember, 2020</small>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li class="list-group-item">
                                                    <div class="row">
                                                        <div class="col-xs-2">
                                                            <i class="fa fa-thumbs-up"></i>
                                                        </div>
                                                        <div class="col-xs-10">
                                                            <h5><a href="">Admin memperbaharui sistim!</a></h5>
                                                            <small>8 Desember, 2020</small>
                                                            <span>Update HTML5</span>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li class="list-group-item">
                                                    <div class="row">
                                                        <div class="col-xs-2">
                                                            <i class="fa fa-comment"></i>
                                                        </div>
                                                        <div class="col-xs-10">
                                                            <h5><a href="">Operator 2 mengirim pesan!</a></h5>
                                                            <small>10 Desember, 2020</small>
                                                            <span>Mohon ditanggapi keluhan dari saudara...</span>
                                                        </div>
                                                    </div>
                                                </li>
                                            </ul>
                                            <a class="btn-more" href="">Lihat notifikasi lainnya <i class="fa fa-long-arrow-right"></i></a>
                                        </div><!-- tab-pane -->

                                        <div role="tabpanel" class="tab-pane" id="reminders">
                                            <h1 id="todayDay" class="today-day">...</h1>
                                            <h3 id="todayDate" class="today-date">...</h3>

                                            <h5 class="today-weather"><i class="wi wi-hail"></i> Mendung 27 Derajat</h5>
                                            <p>Hujan badai akan berlangsung hingga malam</p>

                                            <h4 class="panel-title">Agenda Acara</h4>
                                            <ul class="list-group">
                                                <li class="list-group-item">
                                                    <div class="row">
                                                        <div class="col-xs-2">
                                                            <h4>8</h4>
                                                            <p>Des</p>
                                                        </div>
                                                        <div class="col-xs-10">
                                                            <h5><a href="">Pelatihan Operator CCTV</a></h5>
                                                            <small>Aula Dinhub</small>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li class="list-group-item">
                                                    <div class="row">
                                                        <div class="col-xs-2">
                                                            <h4>05</h4>
                                                            <p>Des</p>
                                                        </div>
                                                        <div class="col-xs-10">
                                                            <h5><a href="">Pelatihan Pengujian</a></h5>
                                                            <small>Dinhub, Banjarnegara</small>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li class="list-group-item">
                                                    <div class="row">
                                                        <div class="col-xs-2">
                                                            <h4>25</h4>
                                                            <p>Des</p>
                                                        </div>
                                                        <div class="col-xs-10">
                                                            <h5><a href="">Libur Natal</a></h5>
                                                            <small>Nasional</small>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li class="list-group-item">
                                                    <div class="row">
                                                        <div class="col-xs-2">
                                                            <h4>10</h4>
                                                            <p>Jan</p>
                                                        </div>
                                                        <div class="col-xs-10">
                                                            <h5><a href="">Pelatihan Admin Web</a></h5>
                                                            <small>Dinas Perhubungan Pusat</small>
                                                        </div>
                                                    </div>
                                                </li>
                                            </ul>
                                            <a class="btn-more" href="">Lihat agenda lainnya <i class="fa fa-long-arrow-right"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li>
                        <div class="btn-group">
                            <button type="button" class="btn btn-logged" data-toggle="dropdown">
                                <img src="images/photos/loggeduser.png" alt="" />
                                <?=$_SESSION['nama'];?>
                                <span class="caret"></span>
                            </button>
                            <ul class="dropdown-menu pull-right">
                                <li><a href="#"><i class="glyphicon glyphicon-user"></i> Profil Saya</a></li>
                                <li><a href="#"><i class="glyphicon glyphicon-cog"></i> Seting Saya</a></li>
                                <li><a href="#"><i class="glyphicon glyphicon-question-sign"></i> Bantuan</a></li>
                                <li><a href="<?= base_url('admin/auth/logout')?>"><i class="glyphicon glyphicon-log-out"></i> Keluar</a></li>
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
                        <img src="<?= base_url()?>/assets/admin/images/photos/loggeduser.png" alt="" class="media-object img-circle">
                    </a>
                </div>
                <div class="media-body">
                    <h4 class="media-heading"><?=$_SESSION['nama']?> <a data-toggle="collapse" data-target="#loguserinfo" class="pull-right"><i class="fa fa-angle-down"></i></a></h4>
                    <span><?= $_SESSION['jabatan']?></span>
                </div>
            </div><!-- leftpanel-profile -->

            <div class="leftpanel-userinfo collapse" id="loguserinfo">
                <h5 class="sidebar-title">Alamat</h5>
                <address>
                    Jl. Selamanik No. 1, Semampir
                    Kec. Banjarnegara, Banjarnegara 53418
                </address>
                <h5 class="sidebar-title">Kontak</h5>
                <ul class="list-group">
                    <li class="list-group-item">
                        <label class="pull-left">Email</label>
                        <span class="pull-right">admin@pju.com</span>
                    </li>
                    <li class="list-group-item">
                        <label class="pull-left">Telp. Kantor</label>
                        <span class="pull-right">(0286) 591331</span>
                    </li>
                    <li class="list-group-item">
                        <label class="pull-left">Handphone</label>
                        <span class="pull-right">+62 123 456 789</span>
                    </li>
                    <li class="list-group-item">
                        <label class="pull-left">Medsos</label>
                        <div class="social-icons pull-right">
                            <a href="#"><i class="fa fa-facebook-official"></i></a>
                            <a href="#"><i class="fa fa-twitter"></i></a>
                            <a href="#"><i class="fa fa-pinterest"></i></a>
                        </div>
                    </li>
                </ul>
            </div><!-- leftpanel-userinfo -->

            <ul class="nav nav-tabs nav-justified nav-sidebar">
                <li class="tooltips active" data-toggle="tooltip" title="Main Menu"><a data-toggle="tab" data-target="#mainmenu"><i class="tooltips fa fa-ellipsis-h"></i></a></li>
                <li class="tooltips" data-toggle="tooltip" title="Settings"><a data-toggle="tab" data-target="#settings"><i class="fa fa-cog"></i></a></li>
                <li class="tooltips" data-toggle="tooltip" title="Log Out"><a href="<?= base_url('admin/auth/logout')?>"><i class="fa fa-sign-out"></i></a></li>
            </ul>

            <div class="tab-content">

                <!-- ################# MAIN MENU ################### -->

                <div class="tab-pane active" id="mainmenu">
                    <h5 class="sidebar-title">Favorites</h5>
                    <ul class="nav nav-pills nav-stacked nav-quirk">
                        <li class="active"><a href="/admin"><i class="fa fa-home"></i> <span>Dashboard</span></a></li>

                    </ul>

                    <h5 class="sidebar-title">Perlengkapan Jalan</h5>
                    <ul class="nav nav-pills nav-stacked nav-quirk">
                        <li><a href="/admin/ruas"><i class="fa fa-home"></i> <span>Ruas Jalan</span></a></li>
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
                        <li><a href="/admin/perlengkapan/laporan"><i class="fa fa-home"></i> <span>Laporan Masyarakat</span></a></li>
                    </ul>

                    <h5 class="sidebar-title">Penerangan Jalan</h5>
                    <ul class="nav nav-pills nav-stacked nav-quirk">
                        <li><a href="/admin/pju/survey"><i class="fa fa-home"></i> <span>Survey PJU</span></a></li>
                        <li><a href="/admin/pju/idpelanggan"><i class="fa fa-home"></i> <span>List ID Pelanggan</span></a></li>
                        <li><a href="/admin/pju/tagihan"><i class="fa fa-home"></i> <span>Tagihan</span></a></li>
                        <li><a href="/admin/pju/grafik"><i class="fa fa-home"></i> <span>Grafik</span></a></li>
                        <li><a href="/admin/pju/laporan"><i class="fa fa-home"></i> <span>laporan Masyarakat</span></a></li>
                    </ul>
                    <h5 class="sidebar-title">Lainnya</h5>
                    <ul class="nav nav-pills nav-stacked nav-quirk">
                        <li><a href="/admin"><i class="fa fa-home"></i> <span>Aspirasi</span></a></li>
                        <li><a href="/admin"><i class="fa fa-home"></i> <span>Pengaturan</span></a></li>
                        <li><a href="/admin"><i class="fa fa-home"></i> <span>Logout</span></a></li>
                    </ul>
                </div><!-- tab-pane -->

                <!-- ######################## EMAIL MENU ##################### -->

                <div class="tab-pane" id="emailmenu">
                    <div class="sidebar-btn-wrapper">
                        <a href="compose.html" class="btn btn-danger btn-block">Susun</a>
                    </div>

                    <h5 class="sidebar-title">Kotak Surat</h5>
                    <ul class="nav nav-pills nav-stacked nav-quirk nav-mail">
                        <li><a href="email.html"><i class="fa fa-inbox"></i> <span>Inbox (3)</span></a></li>
                        <li><a href="email.html"><i class="fa fa-pencil"></i> <span>Draft (2)</span></a></li>
                        <li><a href="email.html"><i class="fa fa-paper-plane"></i> <span>Terkirim</span></a></li>
                    </ul>

                    <h5 class="sidebar-title">Tags</h5>
                    <ul class="nav nav-pills nav-stacked nav-quirk nav-label">
                        <li><a href="#"><i class="fa fa-tags primary"></i> <span>Komunikasi</span></a></li>
                        <li><a href="#"><i class="fa fa-tags success"></i> <span>Update</span></a></li>
                        <li><a href="#"><i class="fa fa-tags warning"></i> <span>Promosi</span></a></li>
                        <li><a href="#"><i class="fa fa-tags danger"></i> <span>Sosial</span></a></li>
                    </ul>
                </div><!-- tab-pane -->

                <!-- ################### CONTACT LIST ################### -->

                <div class="tab-pane" id="contactmenu">
                    <div class="input-group input-search-contact">
                        <input type="text" class="form-control" placeholder="Search contact">
                        <span class="input-group-btn">
              <button class="btn btn-default" type="button"><i class="fa fa-search"></i></button>
            </span>
                    </div>
                    <h5 class="sidebar-title">Kontak Saya</h5>
                    <ul class="media-list media-list-contacts">
                        <li class="media">
                            <a href="#">
                                <div class="media-left">
                                    <img class="media-object img-circle" src="<?= base_url()?>/assets/admin/images/photos/user1.png" alt="">
                                </div>
                                <div class="media-body">
                                    <h4 class="media-heading">Admin Hosting</h4>
                                    <span><i class="fa fa-phone"></i> 0876-752-1860</span>
                                </div>
                            </a>
                        </li>
                        <li class="media">
                            <a href="#">
                                <div class="media-left">
                                    <img class="media-object img-circle" src="<?= base_url()?>/assets/admin/images/photos/user2.png" alt="">
                                </div>
                                <div class="media-body">
                                    <h4 class="media-heading">Programmer</h4>
                                    <span><i class="fa fa-mobile"></i> 0814-650-8281</span>
                                </div>
                            </a>
                        </li>
                        <li class="media">
                            <a href="#">
                                <div class="media-left">
                                    <img class="media-object img-circle" src="<?= base_url()?>/assets/admin/images/photos/user3.png" alt="">
                                </div>
                                <div class="media-body">
                                    <h4 class="media-heading">Jennie S. Gray</h4>
                                    <span><i class="fa fa-phone"></i> 310-757-8444</span>
                                </div>
                            </a>
                        </li>
                        <li class="media">
                            <a href="#">
                                <div class="media-left">
                                    <img class="media-object img-circle" src="<?= base_url()?>/assets/admin/images/photos/user4.png" alt="">
                                </div>
                                <div class="media-body">
                                    <h4 class="media-heading">Maintenance</h4>
                                    <span><i class="fa fa-mobile"></i> 0827-386-0059</span>
                                </div>
                            </a>
                        </li>
                        <li class="media">
                            <a href="#">
                                <div class="media-left">
                                    <img class="media-object img-circle" src="<?= base_url()?>/assets/admin/images/photos/user5.png" alt="">
                                </div>
                                <div class="media-body">
                                    <h4 class="media-heading">Admin web</h4>
                                    <span><i class="fa fa-skype"></i> admin.web</span>
                                </div>
                            </a>
                        </li>
                        <li class="media">
                            <a href="#">
                                <div class="media-left">
                                    <img class="media-object img-circle" src="<?= base_url()?>/assets/admin/images/photos/user6.png" alt="">
                                </div>
                                <div class="media-body">
                                    <h4 class="media-heading">Admin</h4>
                                    <span><i class="fa fa-phone"></i> 089-270-2425</span>
                                </div>
                            </a>
                        </li>
                        <li class="media">
                            <a href="#">
                                <div class="media-left">
                                    <img class="media-object img-circle" src="<?= base_url()?>/assets/admin/images/photos/user7.png" alt="">
                                </div>
                                <div class="media-body">
                                    <h4 class="media-heading">Operator Data</h4>
                                    <span><i class="fa fa-mobile"></i> 087-879-2491</span>
                                </div>
                            </a>
                        </li>
                        <li class="media">
                            <a href="#">
                                <div class="media-left">
                                    <img class="media-object img-circle" src="<?= base_url()?>/assets/admin/images/photos/user8.png" alt="">
                                </div>
                                <div class="media-body">
                                    <h4 class="media-heading">Operator 1</h4>
                                    <span><i class="fa fa-mobile"></i> +62 816-627-7184</span>
                                </div>
                            </a>
                        </li>
                        <li class="media">
                            <a href="#">
                                <div class="media-left">
                                    <img class="media-object img-circle" src="<?= base_url()?>/assets/admin/images/photos/user9.png" alt="">
                                </div>
                                <div class="media-body">
                                    <h4 class="media-heading">Operator 2</h4>
                                    <span><i class="fa fa-skype"></i> op.two</span>
                                </div>
                            </a>
                        </li>
                        <li class="media">
                            <a href="#">
                                <div class="media-left">
                                    <img class="media-object img-circle" src="<?= base_url()?>/assets/admin/images/photos/user10.png" alt="">
                                </div>
                                <div class="media-body">
                                    <h4 class="media-heading">Operator 3</h4>
                                    <span><i class="fa fa-phone"></i> 087-630-0132</span>
                                </div>
                            </a>
                        </li>
                    </ul>
                </div><!-- tab-pane -->

                <!-- #################### SETTINGS ################### -->

                <div class="tab-pane" id="settings">
                    <h5 class="sidebar-title">Setelan Umum</h5>
                    <ul class="list-group list-group-settings">
                        <li class="list-group-item">
                            <h5>Berita Harian</h5>
                            <small>Dapatkan notifikasi bila ada yang menggunakan akun Anda.</small>
                            <div class="toggle-wrapper">
                                <div class="leftpanel-toggle toggle-light success"></div>
                            </div>
                        </li>
                        <li class="list-group-item">
                            <h5>Panggilan Telpon</h5>
                            <small>Panggilan telpon dari akun Anda.</small>
                            <div class="toggle-wrapper">
                                <div class="leftpanel-toggle-off toggle-light success"></div>
                            </div>
                        </li>
                    </ul>
                    <h5 class="sidebar-title">Setelan Keamanan</h5>
                    <ul class="list-group list-group-settings">
                        <li class="list-group-item">
                            <h5>Notifikasi Login</h5>
                            <small>beritahukan apabila ada yang mencoba login akun Anda.</small>
                            <div class="toggle-wrapper">
                                <div class="leftpanel-toggle toggle-light success"></div>
                            </div>
                        </li>
                        <li class="list-group-item">
                            <h5>Verifikasi Telpon</h5>
                            <small>Gunakan smartphone Anda sebagai pengaman login.</small>
                            <div class="toggle-wrapper">
                                <div class="leftpanel-toggle toggle-light success"></div>
                            </div>
                        </li>
                    </ul>
                </div><!-- tab-pane -->


            </div><!-- tab-content -->

        </div><!-- leftpanelinner -->
    </div><!-- leftpanel -->