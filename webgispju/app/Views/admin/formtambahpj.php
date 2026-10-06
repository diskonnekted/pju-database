
<div class="mainpanel">

    <div class="contentpanel">

        <ol class="breadcrumb breadcrumb-quirk">
            <li><a href="index.html"><i class="fa fa-home mr5"></i> Home</a></li>
            <li><a href="general-forms.html">PJU</a></li>
            <li class="active">Survey Perlengkapan</li>
        </ol>

        <div class="row">
            <div class="col-sm-6">
                <div class="panel">
                    <div class="panel-heading">
                        <h4 class="panel-title">Form Survey Perlengkapan Jalan & rambu</h4>
                        <p>Individual form controls automatically receive some global styling with <code>.form-control</code> class that are set to 100% width by default.</p>
                    </div>
                    <form action="<?= base_url('admin/perlengkapan/savesurvey')?>" method="post" enctype="multipart/form-data">
                        <div class="panel-body">

                            <h4 class="panel-title mb10">Nama Perlengkapan</h4>
                            <div class="form-group">
                                <input type="text" name="nama" class="form-control">
                            </div>
                            <h4 class="panel-title mb10">Ruas Jalan</h4>
                            <div class="form-group">
                                <select id="ruasjalan" name="ruasjalan" class="form-control" style="width: 100%" data-placeholder="Ruas Jalan">

                                </select>
                            </div>
                            <h4 class="panel-title mb10">Titik Koordinat</h4>

                            <div class="input-group mb15">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-map-marker"></i></span>
                                <div class="timepicker">
                                    <input id="slat" type="text" name="lat" class="form-control" placeholder="Latitude"/>
                                    <input id="slng" type="text" name="lng" placeholder="Longitude" class="form-control"/></div>
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
                            <h4 class="panel-title mb10">Jenis Perlengkapan</h4>
                            <div class="form-group">
                                <select id="jenisperlengkapan" name="jenisperlengkapan" class="form-control" style="width: 100%" data-placeholder="Catu Daya" placeholder="Catu Daya">
                                    <option value="">&nbsp;</option>
                                    <?php
                                    foreach ($jenis as $item) {

                                    ?>
                                    <option value="<?= $item->id?>"><?= $item->nama;?></option>
                                    <?php } ?>
                                </select>
                            </div>

                                <h4 class="panel-title mb10">Jenis Rambu</h4>
                                <div class="form-group">
                                    <select id="jenisrambu" name="jenisrambu" class="form-control" style="width: 100%" data-placeholder="Catu Daya" placeholder="Catu Daya">
                                        <option value="">&nbsp;</option>
                                        <?php
                                        foreach ($rambu as $item) {

                                            ?>
                                            <option value="<?= $item->id;?>"><?= $item->nama;?></option>
                                        <?php } ?>
                                    </select>
                                </div>

                            <h4 class="panel-title mb10">Kondisi</h4>
                            <div class="form-group">
                                <select id="bentukrambu" name="kondisi" class="form-control" style="width: 100%" data-placeholder="" placeholder="Kondisi">
                                    <option value="">&nbsp;</option>
                                    <option value="Baik">Baik</option>
                                    <option value="Rusak">Rusak</option>
                                </select>
                            </div>
                            <h4 class="panel-title mb10">Status</h4>
                            <div class="form-group">
                                <select id="bentukrambu" name="status" class="form-control" style="width: 100%" data-placeholder="" placeholder="Kondisi">
                                    <option value="">&nbsp;</option>
                                    <option value="T">Terpasang</option>
                                    <option value="K">Kebutuhan</option>
                                </select>
                            </div>


                            <h4 class="panel-title mb10">Keterangan</h4>
                            <div class="form-group">
                                <input type="text" name="keterangan" class="form-control" placeholder="keterangan">
                            </div>
                            <h4 class="panel-title mb10">Gambar</h4>
                            <div class="form-group">
                                <!--                                <buttonn class="btn btn-info" data-toggle="modal" data-target="#takephoto" id="tf">Ambil Gambar</buttonn>-->
                                <input type="file" name="fotolokasi" accept="image/*" capture class="form-control">
                            </div>


                            <h4 class="panel-title mb10">Lampiran</h4>
                            <div class="form-group">
                                <!--                                <buttonn class="btn btn-info" data-toggle="modal" data-target="#takephoto" id="tf">Ambil Gambar</buttonn>-->
                                <input type="file" name="lampiran" accept="image/*" capture class="form-control">
                            </div>
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
                        <h4 class="panel-title">Survey Form</h4>
                        <p>Set widths by wrapping inputs using column sizes.</p>
                    </div>
                    <div class="panel-body">
                    </div>
                </div>

            </div><!-- col-sm-6 -->
        </div><!-- row -->

    </div><!-- contentpanel -->
</div><!-- mainpanel -->
