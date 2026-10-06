
<div class="mainpanel">

    <div class="contentpanel">

        <ol class="breadcrumb breadcrumb-quirk">
            <li><a href="#"><i class="fa fa-home mr5"></i> Home</a></li>
            <li><a href="#">Perlengkapan Jalan</a></li>
            <li class="active">Perlengkapan</li>
        </ol>
        <div class="panel panel-site-traffic">
            <div class="panel-heading">
                <ul class="panel-options">
                    <li><a href="/admin/export/perlengkapan/<?=$jenis?>" class="btn btn-success"><i class="fa fa-download"></i>Download Excel</a></li>
                </ul>
                <h4 class="panel-title text-success">Perlengkapan Jalan <?= $jenisperlengkapan?></h4>
                <p class="nomargin">Terakhir Update tanggal <?= date("d M, Y", strtotime($last->tgl_insert))?></p>
            </div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-xs-6 col-sm-3">
                        <div class="pull-left">
                            <div class="icon icon ion-stats-bars"></div>
                        </div>
                        <div class="pull-left">
                            <h4 class="panel-title">Total Perlengkapan</h4>
                            <h3><?= $total->total?></h3>

                        </div>
                    </div>
                    <div class="col-xs-6 col-sm-3">
                        <div class="pull-left">
                            <div class="icon icon ion-eye"></div>
                        </div>
                        <h4 class="panel-title">Kebutuhan</h4>
                        <h3><?= $kebutuhan->total?></h3>

                    </div>
                    <div class="col-xs-6 col-sm-3">
                        <div class="pull-left">
                            <div class="icon icon ion-clock"></div>
                        </div>
                        <h4 class="panel-title">Perlengkapan Rusak</h4>
                        <h3><?=$rusak->total?></h3>

                    </div>

                    <div class="col-xs-6 col-sm-3">
                        <div class="pull-left">
                            <div class="icon icon ion-clock"></div>
                        </div>
                        <h4 class="panel-title">Perlengkapan Hilang</h4>
                        <h3><?= $hilang->total?></h3>

                    </div>
                </div><!-- row -->
            </div><!-- panel-body -->
            <?php
                if ($jenis==4){

            ?>
            <div class="table-responsive">
                <table class="table table-bordered table-default table-striped nomargin">
                    <thead class="success">
                    <tr>
                        <th>Jenis Rambu</th>
                        <th class="text-right">Kodisi Baik</th>
                        <th class="text-right">Rusak</th>
                        <th class="text-right">Hilang</th>
                        <th class="text-right">Total</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    foreach ($rambu as $item) {
                        ?>
                        <tr>
                            <td><?=$item->nama?></td>
                            <td class="text-right"><?=$item->kondisibaik?></td>
                            <td class="text-right"><?=$item->kondisirusak?></td>
                            <td class="text-right"><?=$item->kondisihilang?></td>
                            <td class="text-right"><?=$item->total?></td>
                        </tr>
                        <?php
                    }
                    ?>
                    </tbody>
                </table>
            </div><!-- table-responsive -->
            <?php } ?>
        </div><!-- panel -->


        <div class="panel">
            <div class="panel-heading">
                <h4 class="panel-title">Data Perlengkapan Jenis <b><?= $jenisperlengkapan; ?></b></h4>
                <p>List Data perlengkapan jalan jenis</p>
            </div>
            <div class="panel-body">
                <div class="table-responsive">
                    <?php if($jenis!=3){
                        if ($jenis==4){?>
                    <table id="exRowTable" class="table table-bordered table-striped-col">
                        <thead>
                        <tr>
                            <th></th>
                            <th>Nama</th>

                            <th>Jenis Rambu</th>
                            <th>Ruas Jalan</th>
                            <th>Kondisi</th>
                            <th>Lokasi</th>
                            <th>Posisi</th>
                            <th>Koordinat</th>
                            <th>Aksi</th>
                        </tr>
                        </thead>
                    </table>
                    <?php }else{
                            ?>
                            <table id="exRowTable" class="table table-bordered table-striped-col">
                                <thead>
                                <tr>
                                    <th></th>
                                    <th>Nama</th>
                                    <th>Ruas Jalan</th>
                                    <th>Kondisi</th>
                                    <th>Lokasi</th>
                                    <th>Posisi</th>
                                    <th>Koordinat</th>
                                    <th>Aksi</th>
                                </tr>
                                </thead>
                            </table>
                            <?php
                        }
                        
                    }else{
                    ?>
                        <table id="exRowTable" class="table table-bordered table-striped-col">
                            <thead>
                            <tr>
                                <th></th>
                                <th>Nama</th>
                                <th>Ruas Jalan</th>
                                <th>Kondisi</th>
                                <th>Lokasi</th>
                                <th>Posisi</th>
                                <th>Suplai Listrik</th>
                                <th>Id Pelanggan</th>
                                <th>Koordinat</th>
                                <th>Aksi</th>
                            </tr>
                            </thead>
                        </table>
                        <?php
                    }?>
                </div>
            </div>
        </div><!-- panel -->

    </div><!-- contentpanel -->
</div><!-- mainpanel -->