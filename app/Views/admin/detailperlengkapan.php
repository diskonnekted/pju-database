
<div class="mainpanel">

    <div class="contentpanel">

        <ol class="breadcrumb breadcrumb-quirk">
            <li><a href="/admin"><i class="fa fa-home mr5"></i> Home</a></li>
            <li><a href="/admin/tagihan">Tagihan</a></li>
            <li class="active">Detail Tagihan</li>
        </ol>

        <div class="panel panel-profile list-view">
            <div class="panel-heading">
                <div class="media">
                    <div class="media-left">
                        <a href="#">
                            <img class="media-object img-circle" src="<?=base_url()?>/assets/admin/images/photos/user1.png" alt="">
                        </a>
                    </div>
                    <div class="media-body">
                        <h4 class="media-heading"><?= $info->nama?></h4>
                        <p class="media-usermeta"><i class="glyphicon glyphicon-list"></i> <?= $info->nama_jenis?></p>
                    </div>
                </div><!-- media -->
                <ul class="panel-options">
                    <li><a class="tooltips" href="" data-toggle="tooltip" title="View Options"><i class="glyphicon glyphicon-option-vertical"></i></a></li>
                </ul>
            </div><!-- panel-heading -->
            <?php if (empty($pju)){

            }else{

            ?>
            <div class="panel-body people-info">
                <div class="row">
                    <div class="col-sm-4">
                        <div class="info-group">
                            <label>Catu Daya</label>
                            <?php if($pju->catudaya=='T'){
                                echo 'Tersuplai';
                            }else{
                                echo 'Listrik Mandiri';
                            }?>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="info-group">
                            <label>Jenis Lampu </label>
                            <?= $pju->jenis_lampu?>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="info-group">
                            <label>Daya Lampu</label>
                            <?= $pju->daya_lampu?>
                        </div>
                    </div>
                </div><!-- row -->
                <?php if($pju->catudaya=='T'){
                ?>

                    <div class="row">
                        <div class="col-sm-4">
                            <div class="info-group">
                                <label>ID Pelanggan</label>
                                <h4><?= $pju->id_pel?></h4>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="info-group">
                                <label>Jenis</label>
                                <h4><?= $pju->jenis?></h4>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="info-group">
                                <label>Nomor Tiang</label>
                                <h4><?=$pel->no_tiang ?></h4>
                            </div>
                        </div>
                    </div><!-- row -->


                    <?php
                }else{
                    ?>

                    <div class="row">
                        <div class="col-sm-4">
                            <div class="info-group">
                                <label>SUMBER LISTRIK</label>
                                <h4><?= $mandiri->sumber?></h4>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="info-group">
                                <label>DAYA SUMBER</label>
                                <h4><?= $mandiri->daya_panel?></h4>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="info-group">
                                <label>Jenis Charger</label>
                                <h4><?= $mandiri->charger?></h4>
                            </div>
                        </div>
                    </div><!-- row -->

                    <div class="row">
                        <div class="col-sm-4">
                            <div class="info-group">
                                <label>Jenis Baterai</label>
                                <h4><?= $mandiri->baterai?></h4>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="info-group">
                                <label>Daya Baterai</label>
                                <h4><?= $mandiri->kapasitas_baterai?></h4>
                            </div>
                        </div>
                    </div><!-- row -->

                    <?php
                }?>
            </div>
            <?php } ?>
        </div><!-- panel -->

        <div class="row">
                <div class="col-md-8 col-lg-6">

                    <div class="panel panel-map-sidebar">
                        <div class="row">

                            <div class="col-md-7 col-lg-8 main">
                                <input type="hidden" id="lngDet" value="<?= $info->coordinate_lng?>">
                                <input type="hidden" id="latDet" value="<?= $info->coordinate_lat?>">
                                <div id="mboox" class="map-wrapper"></div>
                            </div>
                            <?php if($info->id_jenis ==3){?>
                            <div class="col-md-5 col-lg-4 map-sidebar">
                                <div class="panel-body">
                                    <h4 class="panel-title mb20">Detail Perlengkapan</h4>
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
                                            <label class="control-label">Kondisi:</label>
                                            <h6><?= $info->kondisi?></h6>
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
                            <?php }else if($info->sub==4){
                                ?>
                                <div class="col-md-5 col-lg-4 map-sidebar">
                                <div class="panel-body">
                                    <h4 class="panel-title mb20">Detail Perlengkapan</h4>
                                    <form class="form" action="#">
                                        <div class="form-group">
                                            <label class="control-label">Jenis Rambu :</label>
                                            <h6><?= $info->nama_jenis?></h6>
                                            <!--                                        <input type="text" class="form-control" placeholder="San Francisco, CA, USA">-->
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label">Kondisi:</label>
                                            <h6><?= $info->kondisi?></h6>
                                            <!--                                        <input type="text" class="form-control" placeholder="San Francisco, CA, USA">-->
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label">Ruas Jalan:</label>
                                            <h6><?= $info->nama_ruas?></h6>
                                            <!--                                        <input type="text" class="form-control" placeholder="San Francisco, CA, USA">-->
                                        </div>

                                        <div class="form-group">
                                            <label class="control-label">Nama Perlengkapan:</label>
                                            <h6><?= $info->nperleng?></h6>
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
                            </div><?php
                            }else{
                            ?>
                             <div class="col-md-5 col-lg-4 map-sidebar">
                                <div class="panel-body">
                                    <h4 class="panel-title mb20">Detail Perlengkapan</h4>
                                    <form class="form" action="#">
                                        <div class="form-group">
                                            <label class="control-label">Nama Perlengkapan:</label>
                                            <h6><?= $info->nama?></h6>
                                            <!--                                        <input type="text" class="form-control" placeholder="San Francisco, CA, USA">-->
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label">Kondisi:</label>
                                            <h6><?= $info->kondisi?></h6>
                                            <!--                                        <input type="text" class="form-control" placeholder="San Francisco, CA, USA">-->
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label">Ruas Jalan:</label>
                                            <h6><?= $info->nama_ruas?></h6>
                                            <!--                                        <input type="text" class="form-control" placeholder="San Francisco, CA, USA">-->
                                        </div>

                                        <div class="form-group">
                                            <label class="control-label">Nama Perlengkapan:</label>
                                            <h6><?= $info->nperleng?></h6>
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
                            <?php } ?>
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
                                if ($icons!=null){

                                    ?>
                                    <div class="media-left">
                                        <img src="/uploads/rambu/<?= $icons?>" class="width80" alt="Company Logo">
                                    </div>
                                <?php } ?>
                                <div class="media-body">
                                    <address>
                                        <strong><?= $info->nama ?></strong>
                                        <?= $info->nama_jenis?><br>
                                        <h4><?= $info->nket?></h4><br>

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

    </div><!-- contentpanel -->
</div><!-- mfvterpasangsainpanel -->