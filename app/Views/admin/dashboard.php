
<div class="mainpanel">

    <!--<div class="pageheader">
      <h2><i class="fa fa-home"></i> Dashboard</h2>
    </div>-->

    <div class="contentpanel">

        <div class="row">
            <div class="col-md-9 col-lg-8 dash-left">
                <div class="panel panel-announcement">
                    <ul class="panel-options">
                        <li><a><i class="fa fa-refresh"></i></a></li>
                        <li><a class="panel-remove"><i class="fa fa-remove"></i></a></li>
                    </ul>
                    <div class="panel-heading">
                        <h4 class="panel-title">Informasi terkini</h4>
                    </div>
                    <div class="panel-body">
                        <h2>Update perkembagan terbaru dari <span class="text-primary">Aplikasi SIMPEL-Jalan</span> </h2>
                        <h4>Update terus Berlanjut <a href="">perbaikan database dan proses import database lama!</a></h4>
                    </div>
                </div><!-- panel -->
                <div class="row row-col-join panel-earnings">
                    <div class="col-xs-3 col-sm-4 col-lg-3">
                        <div class="panel">
                            <ul class="panel-options">
                                <li><a><i class="glyphicon glyphicon-option-vertical"></i></a></li>
                            </ul>
                            <div class="panel-heading">
                                <h4 class="panel-title">Tagihan Bulan Ini</h4>
                            </div>
                            <div class="panel-body">
                                <h3 class="earning-amount" style="font-size: 18pt">Rp. <?= number_format($tagihan->totall)?></h3>
                                <h4 class="earning-today">Total</h4>

                                <ul class="list-group">
                                    <li class="list-group-item">Non KWH <span class="pull-right">Rp. <?= number_format($tagihan->nonkwh)?></span></li>
                                    <li class="list-group-item">KWH <span class="pull-right">Rp. <?= number_format($tagihan->kwh)?></span></li>
                                </ul>
                                <hr class="invisible">
                                <p>Total IDPel di Tagihan: <?= $idpel->total_idpel?></p>
                            </div>
                        </div><!-- panel -->
                    </div>
                    <div class="col-xs-9 col-sm-8 col-lg-9">
                        <div class="panel">
                            <div class="panel-heading">
                                <h4 class="panel-title">Grafik Tagihan PLN</h4>
                            </div>
                            <div class="panel-body">
                                <div id="line-chart" class="body-chart"></div>
                            </div>
                        </div>
                    </div>
                </div>
                RECENT USER ACTIVITY
                <div class="row panel-statistics">
                    <div class="col-sm-6">
                        <div class="panel panel-updates">
                            <div class="panel-body">
                                <div class="row">
                                    <div class="col-xs-12 col-lg-12">
                                        <h4 class="panel-title text-success">IDPEL Terpasang</h4>
                                        <h3><?= number_format($idpell->total_idpel); ?></h3>
                                        <div class="progress">
                                            <div style="width: 75.7%" aria-valuemax="100" aria-valuemin="0" aria-valuenow="75.7" role="progressbar" class="progress-bar progress-bar-success">
                                                <span class="sr-only">75.7% Complete (success)</span>
                                            </div>
                                        </div>

                                    </div>

                                </div>
                            </div>
                        </div><!-- panel -->
                    </div><!-- col-sm-6 -->

                    <div class="col-sm-6">
                        <div class="panel panel-danger-full panel-updates">
                            <div class="panel-body">
                                <div class="row">
                                    <div class="col-xs-12">
                                        <h4 class="panel-title text-warning">Laporan Masyarakat</h4>
                                        <h3><?= number_format($laporan->tpeng)?></h3>
                                        <div class="progress">
                                            <div style="width: <?= ((($laporan->tpeng)-($laporan->bverif))/($laporan->tpeng ?: 1))*100?>%" aria-valuemax="100" aria-valuemin="0" aria-valuenow="<?= ((($laporan->tpeng)-($laporan->bverif))/($laporan->tpeng ?: 1))*100?>" role="progressbar" class="progress-bar progress-bar-warning">
                                                <span class="sr-only">39.9% Complete (success)</span>
                                            </div>
                                        </div>
                                        <p>Laporan Belum Diverifikasi : <?= number_format($laporan->bverif)?></p>
                                    </div>
                                </div>
                            </div>
                        </div><!-- panel -->
                    </div><!-- col-sm-6 -->

                    <div class="col-sm-6">
                        <div class="panel panel-success-full panel-updates">
                            <div class="panel-body">
                                <div class="row">
                                    <div class="col-xs-12">
                                        <h4 class="panel-title text-success">Jenis Perlengkapan</h4>
                                        <h3><?= number_format($jenis->tjenis)?></h3>
                                        <div class="progress">
                                            <div style="width: 100%" aria-valuemax="100" aria-valuemin="0" aria-valuenow="100" role="progressbar" class="progress-bar progress-bar-info">
                                                <span class="sr-only">100% Complete (success)</span>
                                            </div>
                                        </div>
<!--                                        <p>Sold products for this month: 1,203</p>-->
                                    </div>
                                </div>
                            </div>
                        </div><!-- panel -->
                    </div><!-- col-sm-6 -->

                    <div class="col-sm-6">
                        <div class="panel panel-updates">
                            <div class="panel-body">
                                <div class="row">
                                    <div class="col-xs-12">
                                        <h4 class="panel-title text-danger">Perlengkapan Rusak</h4>
                                        <h3> <?= $rusak->rusak?></h3>
                                        <div class="progress">
                                            <div style="width:100%" aria-valuemax="100" aria-valuemin="0" aria-valuenow="100" role="progressbar" class="progress-bar progress-bar-danger">
                                                <span class="sr-only">Rusak</span>
                                            </div>
                                        </div>
<!--                                        <p>Returned products this month: 22</p>-->
                                    </div>
                                </div>
                            </div>
                        </div><!-- panel -->
                    </div><!-- col-sm-6 -->

                </div><!-- row -->

              <div class="row panel-quick-page">
                    <div class="col-xs-4 col-sm-5 col-md-4 page-user">
                        <div class="panel">
                            <div class="panel-heading">
                                <h4 class="panel-title">Jenis Perlengkapan</h4>
                            </div>
                            <div class="panel-body">
                                <div class="page-icon"><i class="icon ion-cube"></i></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-4 col-sm-4 col-md-4 page-products">
                        <div class="panel">
                            <div class="panel-heading">
                                <h4 class="panel-title">Perlengkapan Jalan</h4>
                            </div>
                            <div class="panel-body">
                                <div class="page-icon"><i class="icon ion-android-compass"></i></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-4 col-sm-3 col-md-2 page-events">
                        <div class="panel">
                            <div class="panel-heading">
                                <h4 class="panel-title">Ruas Jalan</h4>
                            </div>
                            <div class="panel-body">
                                <div class="page-icon"><i class="icon ion-android-navigate"></i></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-4 col-sm-3 col-md-2 page-messages">
                        <div class="panel">
                            <div class="panel-heading">
                                <h4 class="panel-title">Pengaduan</h4>
                            </div>
                            <div class="panel-body">
                                <div class="page-icon"><i class="icon ion-email"></i></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-4 col-sm-5 col-md-2 page-reports">
                        <div class="panel">
                            <div class="panel-heading">
                                <h4 class="panel-title">ID Pel</h4>
                            </div>
                            <div class="panel-body">
                                <div class="page-icon"><i class="icon ion-arrow-graph-up-right"></i></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-4 col-sm-4 col-md-2 page-statistics">
                        <div class="panel">
                            <div class="panel-heading">
                                <h4 class="panel-title">Tagihan</h4>
                            </div>
                            <div class="panel-body">
                                <div class="page-icon"><i class="icon ion-ios-list"></i></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-4 col-sm-4 col-md-4 page-support">
                        <div class="panel">
                            <div class="panel-heading">
                                <h4 class="panel-title">Survey Perlengkapan</h4>
                            </div>
                            <div class="panel-body">
                                <div class="page-icon"><i class="icon ion-ios-list-outline"></i></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-4 col-sm-4 col-md-2 page-privacy">
                        <div class="panel">
                            <div class="panel-heading">
                                <h4 class="panel-title">Survey PJU</h4>
                            </div>
                            <div class="panel-body">
                                <div class="page-icon"><i class="icon ion-ios-list-outline"></i></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-4 col-sm-4 col-md-2 page-settings">
                        <div class="panel">
                            <div class="panel-heading">
                                <h4 class="panel-title">Settings</h4>
                            </div>
                            <div class="panel-body">
                                <div class="page-icon"><i class="icon ion-gear-a"></i></div>
                            </div>
                        </div>
                    </div>
                </div><!-- row -->
            </div><!-- col-md-9 -->
            <div class="col-md-3 col-lg-4 dash-right">
                <div class="row">
                    <div class="col-sm-5 col-md-12 col-lg-6">
                        <div class="panel panel-info panel-weather">
                            <div class="panel-heading">
                                <h4 class="panel-title">Prakiraan Cuaca</h4>
                            </div>
                            <div class="panel-body inverse">
                                <div class="row mb10  bg-gray-dark">
                                    <div class="col-xs-6 ">
                                        <?php $hari=array('','SENIN', 'SELASA', 'RABU', 'KAMIS', 'JUM\'AT', 'SABTU', 'MINGGU');?>
                                        <h2 class="today-day"><?= $hari[date('N')];?></h2>
                                        <h3 class="today-date"><?= date('F Y');?></h3>
                                    </div>
                                    <div class="col-xs-6">
<!--                                        <i class="wi wi-hail today-cloud"></i>-->
                                        <img id="weaicon" src="http://openweathermap.org/img/wn/10d@2x.png" class="icon" alt="">
                                    </div>

                                </div>
                                <p class="nomargin" id="wdescm" style="font-size: 14pt; "></p>
                                <p class="nomargin" id="wdesc"  style="margin-top:0 !important; "></p>
                                <div class="row mt10">
                                    <div class="col-xs-7">
                                        <strong>Temperature:</strong>  <temp id="tmperatur">0</temp>&#176; C
                                    </div>
                                    <div class="col-xs-5">
                                        <strong>Kecepatan Angin:</strong> <air id="air">0</air> m/s
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div><!-- col-md-12 -->
                    <div class="col-sm-5 col-md-12 col-lg-6">
                        <div class="panel panel-primary list-announcement">
                            <div class="panel-heading">
                                <h4 class="panel-title">Laporan Masyarakat</h4>
                            </div>
                            <div class="panel-body">
                                <ul class="list-unstyled mb20">
                                    <?php foreach ($pengaduan as $itempengaduan) {

                                    ?>
                                    <li>
                                        <a href="/admin/pengaduan/detail/<?= $itempengaduan->id_pengaduan?>"><?php if(strlen($itempengaduan->isilaporan)<= 35){ echo $itempengaduan->isilaporan;}else{echo substr($itempengaduan->isilaporan, 0, 30).'...';}?></a>
                                        <?php $date=date_create($itempengaduan->tgl_pengaduan);
                                            $tgl=date_format($date, 'd, M Y');
                                        ?>
                                        <small><?php echo $tgl; ?> <a href="/admin/pengaduan/detail/<?= $itempengaduan->id_pengaduan?>"><?=$itempengaduan->nama?></a></small>
                                    </li>
                                    <?php } ?>
                                </ul>
                            </div>
                            <div class="panel-footer">
                                <a href="/admin/pengaduan" class="btn btn-primary btn-block">Lihat Selengkapnya <i class="fa fa-arrow-right"></i></a>
                            </div>
                        </div>
                    </div><!-- col-md-12 -->
                </div><!-- row -->


            </div><!-- col-md-3 -->
        </div><!-- row -->

    </div><!-- contentpanel -->

</div><!-- mainpanel -->
