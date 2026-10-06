
<div class="mainpanel">

    <div class="contentpanel">

        <ol class="breadcrumb breadcrumb-quirk">
            <li><a href="#"><i class="fa fa-home mr5"></i> Home</a></li>
            <li><a href="#">PJU</a></li>
            <li class="active">Survey PJU</li>
        </ol>

        <div class="row">
            <div class="col-sm-6">
                <div class="panel">
                    <div class="panel-heading">
                        <h4 class="panel-title">Form Survey PJU</h4>
                        <p>Form ini dipakai untuk Edit pencocokan Database peralatan di aplikasi dan data real di lapangan.</p>
                        <?php
                        if (!empty($_SESSION['success'])){
                            if  ($_SESSION['success']==1){
                                ?>

                                <div class="alert alert-success">
                                    Data Berahasil Disimpan
                                </div>
                                <?php
                            }else{


                                ?>
                                <div class="alert alert-danger">
                                    Terjadi Kesalahan saat menyimpan data
                                </div>
                            <?php } } ?>
                    </div>
                    <form action="<?= base_url('admin/pju/saveedit/'.$pju->id)?>" method="post" enctype="multipart/form-data">
                        <div class="panel-body">

                            <input type="hidden" value="<?= $pju->id ?>">
                            <h4 class="panel-title mb10">Jalan</h4>
                            <div class="form-group">
                                <select id="select2" name="tipejalan" class="form-control" style="width: 100%" data-placeholder="Jenis Jalan" required>
                                    <option value="">&nbsp;</option>
                                    <option value="K" <?php if($pju->tipe_jalan=='K'){ echo "selected";}?>>Kabupaten</option>
                                    <option value="P" <?php if($pju->tipe_jalan=='P'){ echo "selected";}?>>Propinsi</option>
                                    <option value="N" <?php if($pju->tipe_jalan=='N'){ echo "selected";}?>>Nasional</option>
                                </select>
                            </div>
                            <h4 class="panel-title mb10">Ruas Jalan</h4>
                            <div class="form-group">
                                <select id="ruasjalan" name="ruasjalan" class="form-control" style="width: 100%" data-placeholder="Ruas Jalan" required>
                                    <option value="<?= $pju->id_ruasjalan?>"> <?=$pju->nama_ruas?></option>
                                </select>
                            </div>
                            <h4 class="panel-title mb10">Titik Koordinat</h4>

                            <div class="input-group mb15">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-map-marker"></i></span>
                                <div class="timepicker">

                                    <input id="slat" type="text" name="lat" value="<?= $pju->coordinate_lat?>" class="form-control" placeholder="Latitude" required/>
                                    <input id="slng" type="text" name="lng" value="<?= $pju->coordinate_lng?>" placeholder="Longitude" class="form-control" required/>
                            </div>
                                <button id="setTimeButton" class="btn btn-primary ml5" type="button">Gunakan lokasi saat ini</button>
                            </div>
                            <h4 class="panel-title mb10">Posisi</h4>

                            <div class="input-group mb15">

                                <label class="rdiobox">
                                    <input type="radio" name="posisi" value="kanan" <?php if($pju->posisi=='kanan'){echo "checked";} ?>>
                                    <span>Kanan</span>
                                </label>
                                <label class="rdiobox">
                                    <input type="radio" name="posisi" value="tengah" <?php if($pju->posisi=='tengah'){echo "checked";} ?>>
                                    <span>Tengah</span>
                                </label>
                                <label class="rdiobox">
                                    <input type="radio" name="posisi" value="kiri" <?php if($pju->posisi=='kiri'){echo "checked";} ?>>
                                    <span>Kiri</span>
                                </label>
                            </div>
                            <h4 class="panel-title mb-10">Kebutuhan / Terpasang</h4>
                            <div class="form-group">
                                <div class="toggle-wrapper toggle-kebutuhan">
                                    <div class="toggle toggle-modern primary"></div>
                                    <input type="hidden" name="kebutuhan" id="fkeb" value="<?php if ($pju->status == 'K') {
                                        echo "0";
                                    }else{ echo '1';} ?>">
                                </div>
                            </div>

                            <div id="terpasang" class="terpasang mb10" hidden>
                                <h4 class="panel-title mb10">Catu Daya</h4>
                                <div class="form-group">
                                    <select id="catudaya" name="catudaya" class="form-control" style="width: 100%" data-placeholder="Catu Daya" placeholder="Catu Daya">
                                        <option value="">&nbsp;</option>
                                        <option value="M" <?php if($pju2->catudaya== 'M'){ echo 'selected';}?>>Listrik Mandiri</option>
                                        <option value="T" <?php if($pju2->catudaya== 'T'){ echo 'selected';}?>>Listrik Tersuplai</option>
                                    </select>
                                </div>

                                <!--  listrik mandiri-->
                                <div id="lmandiri"  class="mb10" <?php if($pju2->catudaya=='T'){ echo "hidden";} ?>>
                                    <h4 class="panel-title mb10">Sumber Listrik</h4>
                                    <div class="form-group">
                                        <select id="listrikmandiri" name="jenissumber" class="form-control" style="width: 100%" data-placeholder="Jenis Sumber Listrik">
                                            <option value="">&nbsp;</option>
                                            <option value="Solar" <?php if($pju3->sumber=='Solar'){ echo "selected";}?>>Solar</option>
                                            <option value="Lainnya" <?php if($pju3->sumber=='Lainnya'){ echo "selected";}?>>Lainnya</option>
                                        </select>
                                    </div>
                                    <h4 class="panel-title mb10">Daya Panel Solar</h4>
                                    <div class="form-group">
                                        <input type="number" value="<?= $pju3->daya_panel?>" class="form-control" name="dayasolar" placeholder="Daya Panel">
                                    </div>
                                    <h4 class="panel-title mb10">Jenis Charger</h4>
                                    <div class="form-group">
                                        <select id="jcharger" name="charger" class="form-control" style="width: 100%" placeholder="Jenis Charger">
                                            <option value="">&nbsp;</option>
                                            <option value="MPPT" <?php if($pju3->charger=='MPPT'){echo "selected";}?>>MPPT</option>
                                            <option value="PWM" <?php if($pju3->carger=='PWM'){echo "selected";}?>>PWM</option>
                                        </select>
                                    </div>
                                    <h4 class="panel-title mb10">Jenis Baterai</h4>
                                    <div class="form-group">
                                        <select id="jbat" name="baterai" class="form-control" style="width: 100%" data-placeholder="Jenis Baterai">
                                            <option value="">&nbsp;</option>
                                            <option value="MF" <?php if($pju3->baterai== 'MF'){ echo 'selected';}?>>MF</option>
                                            <option value="VRLA" <?php if($pju3->baterai== 'VRLA'){ echo 'selected';}?>>VRLA</option>
                                            <option value="AGM" <?php if($pju3->baterai== 'AGM'){ echo 'selected';}?>>AGM</option>
                                            <option value="Lithium" <?php if($pju3->baterai== 'Lithium'){ echo 'selected';}?>>Lithium</option>
                                            <option value="Lainnya" <?php if($pju3->baterai== 'Lainnya'){ echo 'selected';}?>>Lainnya</option>
                                        </select>
                                    </div>
                                    <h4 class="panel-title mb10">Kapasistas Baterai</h4>
                                    <div class="form-group">
                                        <input type="number" value="<?= $pju3->kapasitas_baterai?>" name="cap" class="form-control" placeholder="Kapasitas Baterai">
                                    </div>
                                </div>
                                <!--                                l Tersuplai-->
                                <div id="ltersuplai" <?php if($pju2->catudaya=='M'){ echo "hidden";} ?>>
                                    <h4 class="panel-title mb10">Asal Suplai</h4>
                                    <div class="form-group">
                                        <select id="ltrs" name="ltersuplai" class="form-control" style="width: 100%" data-placeholder="Suplai Listrik">
                                            <option value="">&nbsp;</option>
                                            <option value="kwh" <?php if($pju2->jenis=='kwh'){echo 'selected';}?>>kWh Meters</option>
                                            <option value="nkwh" <?php if($pju2->jenis=='nkwh'){echo 'selected';}?>>Non kWh Meter</option>
                                        </select>
                                    </div>
                                    <!--                                    kwh Meter-->
                                    <div id="kwhmeter" class="mb10" hidden>
                                        <h4 class="panel-title mb10">ID Pelanggan PLN</h4>
                                        <div class="form-group">
                                            <input type="text" class="form-control" value="<?= $pju4->idpel?>" id="idpelanggankwh" name="idpelanggan" placeholder="Id Pelanggan">
                                        </div>
                                        <h4 class="panel-title mb10">Nama Pelanggan PLN</h4>
                                        <div class="form-group">
                                            <input type="text" class="form-control" value="<?= $pju4->nama?>" name="namaidpelk" id="namaidpelk" placeholder="Nama Pelanggan">
                                        </div>

                                        <h4 class="panel-title mb10">Daya Tersambung</h4>
                                        <div class="form-group">
                                            <input type="text" class="form-control" id="dayatersambung"  value="<?= $pju4->daya ?>"  name="dayakwh" placeholder="Daya Tersambung">
                                        </div>
                                        <h4 class="panel-title mb10">Tanggal Nyala</h4>
                                        <div class="form-group">
                                            <input type="date" class="datepicker form-control"  value="<?= $pju4->tgl_nyala?>" id="tglnyalakwh" name="tglnyalakwh" placeholder="Tanggal Nyala">
                                        </div>
                                        <h4 class="panel-title mb10">Merk kWh Meter</h4>
                                        <div class="form-group">
                                            <input type="text" class="form-control" name="merkkwh" id="mkwh"  value="<?= $pju4->merk?>" placeholder="Merk kWh Meter">
                                        </div>
                                        <h4 class="panel-title mb10">No Seri kWh Meter</h4>
                                        <div class="form-group">
                                            <input type="text" class="form-control" name="noseri" id="nserikwh"  value="<?= $pju4->type?>" placeholder="No Seri KWH">
                                        </div>
                                        <h4 class="panel-title mb10">No PAL PLN</h4>
                                        <div class="form-group">
                                            <input type="text" class="form-control" name="nopalkwh" id="nopalkwh"   value="<?= $pju4->no_meter?>" placeholder="No PAL PLN">
                                        </div>
                                    </div>
                                    <!--                                    non kwh-->
                                    <div id="nkwhmeter"  class="mb10" hidden>
                                        <h4 class="panel-title mb10">ID Pelanggan PLN</h4>
                                        <div class="form-group">
                                            <input type="text" class="form-control" value="<?= $pju4->idpel?>" id="idplnnon" name="idplnnon" placeholder="Id Pelanggan">
                                        </div>
                                        <h4 class="panel-title mb10">Nama Pelanggan PLN</h4>
                                        <div class="form-group">
                                            <input type="text" class="form-control" value="<?= $pju4->nama?>"  name="namaidpeln" id="namaidpeln" placeholder="Nama Pelanggan">
                                        </div>

                                        <h4 class="panel-title mb10">Daya Tersambung</h4>
                                        <div class="form-group">
                                            <input type="daya" class="form-control" name="dayanon" value="<?= $pju4->daya?>"  id="dayanon" placeholder="Daya">
                                        </div>
                                        <h4 class="panel-title mb10">Tanggal Nyala</h4>
                                        <div class="form-group">
                                            <input type="date" class="datepicker form-control" value="<?= $pju4->tgl_nyala?>"  name="tglnyalanon" id="tglnyalanon" placeholder="Tanggal Nyala">
                                        </div>
                                        <h4 class="panel-title mb10">No PAL PLN</h4>
                                        <div class="form-group">
                                            <input type="text" class="form-control" id="nopalnon" name="nopalnon" value="<?= $pju4->no_meter?>"  placeholder="No PAL PLN">
                                        </div>
                                    </div>
                                </div>
                                <h4 class="panel-title mb10 mt10">Jenis Lampu</h4>
                                <div class="form-group">
                                    <select id="select1" name="jenislampu" class="form-control" style="width: 100%" data-placeholder="Jenis Lampu..">
                                        <option value="">&nbsp;</option>
                                        <option value="LED" <?php if($pju2->jenis_lampu== 'LED'){ echo 'selected';}?>>LED</option>
                                        <option value="SON" <?php if($pju2->jenis_lampu== 'SON'){ echo 'selected';}?>>SON</option>
                                        <option value="MH" <?php if($pju2->jenis_lampu== 'MH'){ echo 'selected';}?>>MH</option>
                                        <option value="MERK" <?php if($pju2->jenis_lampu== 'MERK'){ echo 'selected';}?>>MERK</option>
                                        <option value="TL" <?php if($pju2->jenis_lampu== 'TL'){ echo 'selected';}?>>TL</option>
                                        <option value="CFL" <?php if($pju2->jenis_lampu== 'CFL'){ echo 'selected';}?>>CFL</option>

                                    </select>
                                </div>
                                <h4 class="panel-title mb10">Daya Lampu</h4>

                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="Daya Lampu" value="<?= $pju2->daya_lampu?>" name="dayalampu" id="dayalamp">
                                </div>

                                <h4 class="panel-title mb10 mt-10">Kondisi</h4>

                                <div class="form-group mb10">
                                    <select name="kondisi" id="kondisi" class="form-control" placholder="Kodisi">
                                        <option value="Baik">Baik</option>
                                        <option value="Rusak">Rusak</option>
                                    </select>
                                </div>
                            </div>
                            <h4 class="panel-title mb10 mt-10">Keterangan</h4>

                            <div class="form-group">
                                <textarea name="keterangan" class="form-control" placeholder="Keterangan"><?=$pju->keterangan?></textarea>
                            </div>
                            <h4 class="panel-title mb10">Foto Lokasi</h4>

                            <div class="form-group">
                                <!--                                <buttonn class="btn btn-info" data-toggle="modal" data-target="#takephoto" id="tf">Ambil Gambar</buttonn>-->
                                <input type="file" name="fotolokasi" accept="image/*" capture class="form-control">
                            </div>
                            <!-- Modal -->
                            <div class="modal" id="takephoto" tabindex="-1" role="dialog" aria-labelledby="ambilGambar" aria-hidden="true">
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                            <h4 class="modal-title" id="myModalLabel">Ambil Gambar</h4>
                                        </div>
                                        <div class="modal-body" id="mcam">
                                            <div id="my_camera"></div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-primary">Import</button>
                                        </div>

                                    </div><!-- modal-content -->
                                </div><!-- modal-dialog -->
                            </div><!-- modal -->


                        </div>
                        <div class="panel-footer">
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                    </form>

                </div><!-- panel -->
            </div><!-- col-sm-6 -->

            <!-- ####################################################### -->

            <div class="col-sm-6">
                <div class="panel sticky-lg-top">
                    <div class="panel-heading">
                        <h4 class="panel-title">Peta</h4>
                        <p>Tetapkan Lokasi PJU melalui titik peta</p>
                    </div>
                    <div class="panel-body">

                        <div  class="map-wrapper" id="mapadd" style="width: 100%; "></div>
                    </div>
                </div>

            </div><!-- col-sm-6 -->
        </div><!-- row -->

    </div><!-- contentpanel -->
</div><!-- mainpanel -->
