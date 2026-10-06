
<div class="mainpanel">

    <div class="contentpanel">

        <ol class="breadcrumb breadcrumb-quirk">
            <li><a href="<?= base_url('admin')?>"><i class="fa fa-home mr5"></i> Home</a></li>
<!--            <li><a href="buttons.html">Pages</a></li>-->
            <li class="active">Pengaduan</li>
        </ol>

        <div class="row">
            <div class="col-sm-12 col-md-12 col-lg-12 people-list">

               <div class="row">
                    <div class="col-md-4 col-lg-3">
                        <div class="panel panel-profile grid-view">
                            <div class="panel-heading">
                                <img class="img-responsive" src="<?= base_url()?>/assets/admin/images/mp3.png" alt="">
                                <div class="text-center">
                                    <h4 class="panel-profile-name"><?= $perlengkapan->nama ?></h4>
                                    <p class="media-usermeta"><i class="glyphicon glyphicon-briefcase"></i> Regional Finance Manager</p>
                                </div>
                                <ul class="panel-options">
                                    <li><a class="tooltips" href="" data-toggle="tooltip" title="View Options"><i class="glyphicon glyphicon-option-vertical"></i></a></li>
                                </ul>
                            </div><!-- panel-heading -->
                            <div class="panel-body people-info">

                                <div class="info-group">
                                    <label>Ruas Jalan</label>
                                    <?= $perlengkapan->nama_ruas ?>
                                </div>
                                <div class="info-group">
                                    <label>Posisi</label>
                                    <?= $perlengkapan->posisi ?>
                                </div>
                                <div class="info-group">
                                    <label>Keterangan</label>

                                    <?= $perlengkapan->keterangan ?>
                                </div>

                                <div class="row">
                                    <div class="col-xs-6">
                                        <div class="info-group">
                                            <label>Koordinate Lat</label>
                                            <h6><?= $perlengkapan->coordinate_lat ?></h6>
                                        </div>
                                    </div>
                                    <div class="col-xs-6">
                                        <div class="info-group">
                                            <label>Koordinate Long</label>
                                            <h6><?= $perlengkapan->coordinate_lng ?></h6>
                                        </div>
                                    </div>
                                </div>
                            </div><!-- panel-body -->
                        </div><!-- panel -->
                    </div><!-- col-md-6 -->


                    <div class="col-md-8 col-lg-3">
                        <div class="panel panel-profile grid-view">
                            <div class="panel-heading">
                                <div class="text-center">
                                    <h4 class="panel-profile-name">Laporan Masyarakat</h4>s
                                    <div class="maps"></div>
                                    <h4 class="panel-profile-name"><?=$pengaduan->nama ?></h4>
                                    <p class="media-usermeta"><i class="glyphicon glyphicon-key"></i><?=$pengaduan->nama ?></p>
                                </div>

                                <ul class="panel-options">
                                    <li><a class="tooltips" href="" data-toggle="tooltip" title="View Options"><i class="glyphicon glyphicon-option-vertical"></i></a></li>
                                </ul>
                            </div><!-- panel-heading -->
                            <div class="panel-body people-info">

                                <div class="info-group">
                                    <label>whatsapp</label>
                                    <?=$pengaduan->nama ?>
                                </div>
                                <div class="info-group">
                                    <label>Email</label>
                                    floyd.romero@email.com
                                </div>
                                <div class="info-group">
                                    <label>Phone</label>
                                    (012) 345 6789
                                </div>

                                <div class="row">
                                    <div class="col-xs-6">
                                        <div class="info-group">
                                            <label>Followers</label>
                                            <h4>1,921</h4>
                                        </div>
                                    </div>
                                    <div class="col-xs-6">
                                        <div class="info-group">
                                            <label>Following</label>
                                            <h4>1,232</h4>
                                        </div>
                                    </div>
                                </div>

                                <div class="info-group last">
                                    <label>Social</label>
                                    <div class="social-account-list">
                                        <i class="fa fa-facebook-official"></i>
                                        <i class="fa fa-twitter"></i>
                                        <i class="fa fa-dribbble"></i>
                                    </div>
                                </div>
                            </div><!-- panel-body -->
                        </div><!-- panel -->
                    </div><!-- col-md-6 -->


                </div><!-- row -->

            </div><!-- col-sm-8 -->

        </div><!-- row -->

    </div><!-- contentpanel -->

</div><!-- mainpanel -->
