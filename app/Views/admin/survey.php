
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
                        <h4 class="panel-title">Form Survey</h4>
                        <p>Form ini dipergunakan untuk  <code>Verifikasi Database Lampu PJU</code> dilapangan.</p>
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
                    <form action="<?= base_url('admin/pju/savesurvey')?>" method="post" enctype="multipart/form-data">
                    <div class="panel-body">

                            <h4 class="panel-title mb10">Jalan</h4>
                            <div class="form-group">
                                <select id="select2" name="tipejalan" class="form-control" style="width: 100%" data-placeholder="Jenis Jalan" required>
                                    <option value="">&nbsp;</option>
                                    <option value="K">Kabupaten</option>
                                    <option value="P">Propinsi</option>
                                    <option value="N">Nasional</option>
                                </select>
                            </div>
                            <h4 class="panel-title mb10">Ruas Jalan</h4>
                            <div class="form-group">
                                <select id="ruasjalan" name="ruasjalan" class="form-control" style="width: 100%" data-placeholder="Ruas Jalan" required>

                                </select>
                            </div>
                            <h4 class="panel-title mb10">Titik Koordinat</h4>

                            <div class="input-group mb15">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-map-marker"></i></span>
                                <div class="timepicker">
                                    <input id="slat" type="text" name="lat" class="form-control" placeholder="Latitude" required/>
                                    <input id="slng" type="text" name="lng" placeholder="Longitude" class="form-control" required/></div>
                                <button id="setTimeButton" class="btn btn-primary ml5" type="button">Gunakan lokasi saat ini</button>
                            </div>
                            <h4 class="panel-title mb10">Posisi</h4>

                            <div class="input-group mb15">

                                <label class="rdiobox">
                                    <input type="radio" name="posisi" value="kanan" checked>
                                    <span>Kanan</span>
                                </label>
                                <label class="rdiobox">
                                    <input type="radio" name="posisi" value="tengah">
                                    <span>Tengah</span>
                                </label>
                                <label class="rdiobox">
                                    <input type="radio" name="posisi" value="kiri">
                                    <span>Kiri</span>
                                </label>
                            </div>
                            <h4 class="panel-title mb-10">Kebutuhan / Terpasang</h4>
                            <div class="form-group">
                                <div class="toggle-wrapper toggle-kebutuhan">
                                    <div class="toggle toggle-modern primary"></div>
                                    <input type="hidden" name="kebutuhan" id="fkeb" value="0">
                                </div>
                            </div>

                            <div id="terpasang" class="terpasang mb10" hidden>
                                <h4 class="panel-title mb10">Catu Daya</h4>
                                <div class="form-group">
                                    <select id="catudaya" name="catudaya" class="form-control" style="width: 100%" data-placeholder="Catu Daya" placeholder="Catu Daya">
                                        <option value="">&nbsp;</option>
                                        <option value="M">Listrik Mandiri</option>
                                        <option value="T">Listrik Tersuplai</option>
                                    </select>
                                </div>

                                <!--  listrik mandiri-->
                                <div id="lmandiri"  class="mb10" hidden>
                                    <h4 class="panel-title mb10">Sumber Listrik</h4>
                                    <div class="form-group">
                                        <select id="listrikmandiri" name="jenissumber" class="form-control" style="width: 100%" data-placeholder="Jenis Sumber Listrik">
                                            <option value="">&nbsp;</option>
                                            <option value="Solar">Solar</option>
                                            <option value="Lainnya">Lainnya</option>
                                        </select>
                                    </div>
                                    <h4 class="panel-title mb10">Daya Panel Solar</h4>
                                    <div class="form-group">
                                        <input type="number" class="form-control" name="dayasolar" placeholder="Daya Panel">
                                    </div>
                                    <h4 class="panel-title mb10">Jenis Charger</h4>
                                    <div class="form-group">
                                        <select id="jcharger" name="charger" class="form-control" style="width: 100%" placeholder="Jenis Charger">
                                            <option value="">&nbsp;</option>
                                            <option value="MPPT">MPPT</option>
                                            <option value="PWM">PWM</option>
                                        </select>
                                    </div>
                                    <h4 class="panel-title mb10">Jenis Baterai</h4>
                                    <div class="form-group">
                                        <select id="jbat" name="baterai" class="form-control" style="width: 100%" data-placeholder="Jenis Baterai">
                                            <option value="">&nbsp;</option>
                                            <option value="MF">MF</option>
                                            <option value="VRLA">VRLA</option>
                                            <option value="AGM">AGM</option>
                                            <option value="Lithium">Lithium</option>
                                            <option value="Lainnya">Lainnya</option>
                                        </select>
                                    </div>
                                    <h4 class="panel-title mb10">Kapasistas Baterai</h4>
                                    <div class="form-group">
                                        <input type="number" name="cap" class="form-control" placeholder="Kapasitas Baterai">
                                    </div>
                                </div>
<!--                                l Tersuplai-->
                                <div id="ltersuplai" hidden>
                                    <h4 class="panel-title mb10">Asal Suplai</h4>
                                    <div class="form-group">
                                        <select id="ltrs" name="ltersuplai" class="form-control" style="width: 100%" data-placeholder="Suplai Listrik">
                                            <option value="">&nbsp;</option>
                                            <option value="kwh">kWh Meters</option>
                                            <option value="nkwh">Non kWh Meter</option>
                                        </select>
                                    </div>
<!--                                    kwh Meter-->
                                    <div id="kwhmeter" class="mb10" hidden>
                                    <h4 class="panel-title mb10">ID Pelanggan PLN</h4>
                                        <div class="form-group">
                                            <input type="text" class="form-control" id="idpelanggankwh" name="idpelanggan" placeholder="Id Pelanggan">
                                        </div>
                                        <h4 class="panel-title mb10">Nama Pelanggan PLN</h4>
                                        <div class="form-group">
                                            <input type="text" class="form-control" name="namaidpelk" id="namaidpelk" placeholder="Nama Pelanggan">
                                        </div>

                                        <h4 class="panel-title mb10">Daya Tersambung</h4>
                                        <div class="form-group">
                                            <input type="text" class="form-control" id="dayatersambung" name="dayakwh" placeholder="Daya Tersambung">
                                        </div>
                                        <h4 class="panel-title mb10">Tanggal Nyala</h4>
                                        <div class="form-group">
                                            <input type="date" class="datepicker form-control" id="tglnyalakwh" name="tglnyalakwh" placeholder="Tanggal Nyala">
                                        </div>
                                        <h4 class="panel-title mb10">Merk kWh Meter</h4>
                                        <div class="form-group">
                                            <input type="text" class="form-control" name="merkkwh" id="mkwh" placeholder="Merk kWh Meter">
                                        </div>
                                        <h4 class="panel-title mb10">No Seri kWh Meter</h4>
                                        <div class="form-group">
                                            <input type="text" class="form-control" name="noseri" id="nserikwh" placeholder="No Seri KWH">
                                        </div>
                                        <h4 class="panel-title mb10">No PAL PLN</h4>
                                        <div class="form-group">
                                            <input type="text" class="form-control" name="nopalkwh" id="nopalkwh" placeholder="No PAL PLN">
                                        </div>
                                    </div>
<!--                                    non kwh-->
                                    <div id="nkwhmeter"  class="mb10" hidden>
                                        <h4 class="panel-title mb10">ID Pelanggan PLN</h4>
                                        <div class="form-group">
                                            <input type="text" class="form-control" id="idplnnon" name="idplnnon" placeholder="Id Pelanggan">
                                        </div>
                                        <h4 class="panel-title mb10">Nama Pelanggan PLN</h4>
                                        <div class="form-group">
                                            <input type="text" class="form-control" name="namaidpeln" id="namaidpeln" placeholder="Nama Pelanggan">
                                        </div>

                                        <h4 class="panel-title mb10">Daya Tersambung</h4>
                                        <div class="form-group">
                                            <input type="daya" class="form-control" name="dayanon" id="dayanon" placeholder="Daya">
                                        </div>
                                        <h4 class="panel-title mb10">Tanggal Nyala</h4>
                                        <div class="form-group">
                                            <input type="date" class="datepicker form-control" name="tglnyalanon" id="tglnyalanon" placeholder="Tanggal Nyala">
                                        </div>
                                        <h4 class="panel-title mb10">No PAL PLN</h4>
                                        <div class="form-group">
                                            <input type="text" class="form-control" id="nopalnon" name="nopalnon" placeholder="No PAL PLN">
                                        </div>
                                    </div>
                                </div>
                                <h4 class="panel-title mb10 mt10">Jenis Lampu</h4>
                                <div class="form-group">
                                    <select id="select1" name="jenislampu" class="form-control" style="width: 100%" data-placeholder="Jenis Lampu..">
                                        <option value="">&nbsp;</option>
                                        <option value="LED">LED</option>
                                        <option value="SON">SON</option>
                                        <option value="MH">MH</option>
                                        <option value="MERK">MERK</option>
                                        <option value="TL">TL</option>
                                        <option value="CFL">CFL</option>

                                    </select>
                                </div>
                                <h4 class="panel-title mb10">Daya Lampu</h4>

                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="Daya Lampu" name="dayalampu" id="dayalamp">
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
                           <textarea name="keterangan" class="form-control" placeholder="Keterangan"></textarea>
                        </div>
                        <h4 class="panel-title mb10">Lokasi</h4>

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
