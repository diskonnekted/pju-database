
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
                                <img class="img-responsive" src="<?= base_url()?>/uploads/perlengkapan/<?=$perlengkapan->foto?>" alt="">
                                <div class="text-center">
                                    <h4 class="panel-profile-name"><?= $perlengkapan->nama ?></h4>
<!--                                    <p class="media-usermeta"><i class="glyphicon glyphicon-briefcase"></i> Regional Finance Manager</p>-->
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
                                    <h4 class="panel-profile-name">Laporan Masyarakat</h4>
                                    <div class="maps"></div>
                                    <center>
                                    </center>

                                    <h4 class="panel-profile-name"><?=$pengaduan->nama ?></h4>
                                    <p class="media-usermeta"><i class="glyphicon glyphicon-key"></i><?=$pengaduan->nik ?></p>
                                </div>

                                <ul class="panel-options">
                                    <li><a class="tooltips" href="" data-toggle="tooltip" title="View Options"><i class="glyphicon glyphicon-option-vertical"></i></a></li>
                                </ul>
                            </div><!-- panel-heading -->
                            <div class="panel-body people-info">
                                <div class="row">
                                    <div class="col-md-5 col-xs-12">
                                        <img class="img-responsive" src="<?= base_url()?>/uploads/pengaduan/<?=$pengaduan->foto?>" style="max-height: 400px" alt="">
                                    </div>
                                    <div class="col-md-7 col-xs-12">
                                        <div class="info-group">
                                            <label>whatsapp</label>
                                            <?=$pengaduan->wa ?>
                                        </div>
                                        <div class="info-group">
                                            <label>Isi Laporan</label>
                                            <strong><?= $pengaduan->isilaporan ?></strong>
                                        </div>
                                        <div class="info-group">
                                            <label>Progres Laporan</label>
                                            <?php if ($pengaduan->status==0){
                                                ?>
                                                <span class="label label-warning">Belum Terverifikasi</span><br>
                                                <br>
                                                <a onclick="return confirm('Lanjutkan ?')" href='/admin/pengaduan/ubah/<?= $pengaduan->id_pengaduan?>' class="btn btn-warning"> Verifikasi Sekarang</a>
                                                
                                                <a onclick="return confirm('Lanjutkan ?')" href='/admin/pengaduan/hapus/<?= $pengaduan->id_pengaduan?>' class="btn btn-dabger"> Hapus Pengaduan</a>
                                                <?php
                                            }else if ($pengaduan->status==99){
                                                ?>
                                                <span class="label label-danger">Tidak Terverifikasi</span>
                                                <?php
                                            }else if ($pengaduan->status==1){
                                                ?>
                                                <span class="label label-info">Terverifikasi</span><br><br>
                                                <a onclick="return confirm('Lanjutkan ?')" href='/admin/pengaduan/ubah/<?= $pengaduan->id_pengaduan?>' class="btn btn-primary"> Ubah status menjadi proses</a>
                                                <?php
                                            }else if($pengaduan->status==2){
                                                ?>
                                                <span class="label label-info">Proses</span><br><br>
                                                <a onclick="return confirm('Lanjutkan ?')" href='/admin/pengaduan/ubah/<?= $pengaduan->id_pengaduan?>' class="btn btn-primary"> Ubah Menjadi selesai</a>
                                                <?php
                                            }else{
                                                ?>
                                                <span class="label label-info">Laporan Selesai</span>
                                                <?php
                                            }
                                            ?>
                                        </div>
                                    </div>
                                </div>


                                <!--<div class="row">-->
                                <!--    <div class="col-xs-12 mt-3">-->
                                <!--        <div class="info-group">-->
                                <!--            <label>Progres Penanganan</label>-->
                                <!--            <h4>1,921</h4>-->
                                <!--        </div>-->
                                <!--    </div>-->
                                <!--</div>-->

                                <!--<div class="info-group last">-->
                                <!--    <label>Social</label>-->
                                <!--    <div class="social-account-list">-->
                                <!--        <i class="fa fa-facebook-official"></i>-->
                                <!--        <i class="fa fa-twitter"></i>-->
                                <!--        <i class="fa fa-dribbble"></i>-->
                                <!--    </div>-->
                                <!--</div>-->
                            </div><!-- panel-body -->
                        </div><!-- panel -->
                    </div><!-- col-md-6 -->


                </div><!-- row -->

            </div><!-- col-sm-8 -->

        </div><!-- row -->

    </div><!-- contentpanel -->

</div><!-- mainpanel -->
