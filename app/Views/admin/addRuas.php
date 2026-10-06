
<div class="mainpanel">

    <div class="contentpanel">

        <ol class="breadcrumb breadcrumb-quirk">
            <li><a href="<?=base_url('admin')?>"><i class="fa fa-home mr5"></i> Home</a></li>
            <li><a href="<?=base_url('admin/ruas')?>">Ruas Jalan</a></li>
            <li class="active">Ruas Jalan</li>
        </ol>

        <div class="row">
            <div class="col-sm-6">
                <div class="panel">
                    <div class="panel-heading">
                        <h4 class="panel-title">Tambah Ruas Jalan</h4>
                        <p>Form Tambah Ruas Jalan yang ada di Kabupaten Banjarnegara</p>
                    </div>
                    <form action="simpan" method="post">

                    <div class="panel-body">
                            <h4 class="panel-title mb10">No Urut</h4>
                            <div class="form-group">
                                <input type="text" name="norut" class="form-control" placeholder="Nomer Urut"/>
                            </div>

                            <h4 class="panel-title mb10">Jenis Jalan</h4>
                            <div class="form-group">
                                <select name="jenisjalan" id="" class="form-control">
                                    <option value="1">Jalan Nasional</option>
                                    <option value="2">Jalan Provinsi</option>
                                    <option value="3">Jalan Kabupaten</option>
                                </select>
                            </div>
                            <h4 class="panel-title mb10 mt20">No Ruas</h4>
                            <div class="form-group">
                                <input type="text" name="noruas" class="form-control" placeholder="Nomer Ruas"/>
                            </div>

                            <h4 class="panel-title mb10 mt20">Nama Ruas</h4>
                            <div class="form-group">
                                <input type="text" name="namaruas" class="form-control" placeholder="Nama Ruas"/>
                            </div>
                            <h4 class="panel-title mb10 mt20">Titik Awal</h4>
                            <div class="form-group">
                                <input type="text" name="tawal" class="form-control" placeholder="Titik Awal Ruas"/>
                            </div>

                            <h4 class="panel-title mb10 mt20">Nama Ruas</h4>
                            <div class="form-group">
                                <input type="text" name="takhir" class="form-control" placeholder="Titik Akhir Ruas"/>
                            </div>

                            <h4 class="panel-title mb10">Titik Koordinat Awal</h4>
                            <div class="input-group mb15">
                                <span class="input-group-addon">
                                    <i class="glyphicon glyphicon-map-marker"></i></span>
                                <div class="timepicker">
                                    <input id="awlat" type="text" name="awlat" class="form-control" placeholder="Latitude"/>
                                    <input id="awlng" type="text" name="awlng" placeholder="Longitude" class="form-control"/>
                                </div>
<!--                                <button id="set" class="btn btn-primary ml5">Gunakan lokasi saat ini</button>-->
                            </div>

                            <h4 class="panel-title mb10">Titik Koordinat Akhir</h4>
                            <div class="input-group mb15">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-map-marker"></i></span>
                                <div class="timepicker">
                                    <input id="aklat" type="text" name="aklat" class="form-control" placeholder="Latitude"/>
                                    <input id="aklng" type="text" name="aklng" placeholder="Longitude" class="form-control"/>
                                </div>
<!--                                <button id="setTimeButton" class="btn btn-primary ml5">Gunakan lokasi saat ini</button>-->
                            </div>

                            <h4 class="panel-title mb10 mt20">Panjang Ruas</h4>
                            <div class="form-group">
                                <input type="number" name="panjang" class="form-control" placeholder="Titik Akhir Ruas"/>
                            </div>

                            <h4 class="panel-title mb10 mt20">Lebar Jalan</h4>
                            <div class="form-group">
                                <input type="number" name="lebar" class="form-control" placeholder="Titik Akhir Ruas"/>
                            </div>

                            <h4 class="panel-title mb10 mt20">Kelas Jalan</h4>
                            <div class="form-group">
                                <input type="text" name="kelasjalan" class="form-control" placeholder="Titik Akhir Ruas"/>
                            </div>


                    </div>
                    <div class="panel-footer align-items-end">
                        <button class="btn btn-primary" type="submit">Simpan</button>
                        <button class="btn btn-default" type="reset">Batal</button>
                    </div>
                    </form>

                </div><!-- panel -->



            </div><!-- col-sm-6 -->

            <!-- ####################################################### -->

            <div class="col-sm-6">
                <div class="panel sticky sticky-top fixed-top"  style="position: sticky;">
                    <div class="panel-heading">
                        <h4 class="panel-title">Pilih Titik Maps</h4>
                        <p>Tetapkan titik menggunakan peta yang tersedia dibawah ini dengan cara pilih titik yang akan dijadikan <b>titik awal</b> atau <b>Titik Akhir</b> ruas kemudian klik tombol <b>Set Titik Awal Ruas</b> atau tombol <b>Set Titik Akhir Ruas</b></p>
                    </div>
                    <div class="panel-body">
                        <div class="row mb20">
                            <div class="col-sm-12">
                                <div id="selectMapss" class="map-wrapper"></div>
                            </div>
                        </div>
                    </div>
                    <div class="panel-footer">
                        <button class="btn btn-primary" id="setawal"> Set titik Awal Ruas</button>
                        <button class="btn btn-info" id="setakhir"> Set titik Akhir Ruas</button>
                    </div>
                </div>
            </div><!-- col-sm-6 -->
        </div><!-- row -->

    </div><!-- contentpanel -->
</div><!-- mainpanel -->
