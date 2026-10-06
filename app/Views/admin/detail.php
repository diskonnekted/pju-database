
<div class="mainpanel">

    <div class="contentpanel">

        <ol class="breadcrumb breadcrumb-quirk">
            <li><a href="/admin"><i class="fa fa-home mr5"></i> Home</a></li>
            <li><a href="/admin/tagihan">Tagihan</a></li>
            <li class="active">Detail Tagihan</li>
        </ol>
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
                        <input type="hidden" id="idpeldet" value="<?=$idpel?>">
                        <h3 class="earning-amount">Rp. <?=  number_format($tagihan->totall, 2);?></h3>
                        <h4 class="earning-today">Total Tagihan</h4>

                        <ul class="list-group">
                            <li class="list-group-item">Status <span class="pull-right"><?=$terpasang?></span></li>
                            <li class="list-group-item">Info Perlengkapans <span class="pull-right">#</span></li>
                        </ul>
                        <hr class="invisible">
                        <!--                        <p>Total items sold this month: 325</p>-->
                    </div>
                </div><!-- panel -->
            </div>
            <div class="col-xs-9 col-sm-8 col-lg-9">
                <div class="panel">
                    <div class="panel-heading">
                        <h4 class="panel-title">Grafik Tagihan 12 bulan terakhir</h4>
                    </div>
                    <div class="panel-body">
                        <div id="line-chart2" class="body-chart"></div>
                    </div>
                </div>
            </div>
        </div>
        <?php
        if($info!=null){
        ?>
        <div class="row">
            <div class="col-md-8 col-lg-6">

                <div class="panel panel-map-sidebar">
                    <div class="row">

                        <div class="col-md-7 col-lg-8 main">
                            <input type="hidden" id="lngDet" value="<?= $info->coordinate_lng?>">
                            <input type="hidden" id="latDet" value="<?= $info->coordinate_lat?>">
                            <div id="mapMapBox" class="map-wrapper"></div>
                        </div>
                        <div class="col-md-5 col-lg-4 map-sidebar">
                            <div class="panel-body">
                                <h4 class="panel-title mb20">Detail Id Pelanggan</h4>
                                <form class="form" action="#">
                                    <div class="form-group">
                                        <label class="control-label">ID Pelanggan:</label>
                                        <h6><?= $idpel?></h6>
                                        <!--                                        <input type="text" class="form-control" placeholder="San Francisco, CA, USA">-->
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label">Ruas Jalan:</label>
                                        <h6><?= $info->nama_ruas?></h6>
<!--                                        <input type="text" class="form-control" placeholder="San Francisco, CA, USA">-->
                                    </div>

                                    <div class="form-group">
                                        <label class="control-label">Nama Perlengkapan:</label>
                                        <h6><?= $info->nama?></h6>
                                        <!--                                        <input type="text" class="form-control" placeholder="San Francisco, CA, USA">-->
                                    </div>

                                    <div class="form-group">
                                        <label class="control-label">Koordinat:</label>
                                        <h6><?= "lat : ".$info->coordinate_lat."<br>lng : ".$info->coordinate_lng?></h6>
                                        <!--                                        <input type="text" class="form-control" placeholder="San Francisco, CA, USA">-->
                                    </div>

                                    <hr>
                                </form>
                            </div>
                        </div>
                    </div>

                </div><!-- panel -->

            </div><!-- col-md-6 -->
            <div class="col-md-4 col-lg-3">

                <div class="panel panel-map-location">
<!--                    <div id="mapApple" class="map-wrapper"></div>-->
                    <img src="/uploads/perlengkapan/<?= $info->foto?>" style="width: 100%" alt="Company Logo">
                    <div class="panel-body">
                        <div class="media">
                            <?php
                                if ($info->id_jenis==4){


                            ?>
                            <div class="media-left">
                                <img src="/uploads/perlengkapan/<?= $info->foto?>" class="width80" alt="Company Logo">
                            </div>
                            <?php } ?>
                            <div class="media-body">
                                <address>
                                    <strong><?= $info->nama ?></strong>
                                    <?= $info->nama_jenis?><br>
                                    <?= $info->keterangan?><br>

                                </address>
                            </div><!-- media-body -->
                        </div><!-- media -->

                        <div class="btn-group pull-right">
                            <a href="/admin/pengaduan" class="btn btn-success" type="button"> Lihat Laporan</a>
                        </div>

                    </div><!-- panel-body -->
                </div><!-- panel -->

            </div><!-- col-md-4 -->
        </div><!-- row -->
        <?php } ?>
    </div><!-- contentpanel -->
</div><!-- mainpanel -->