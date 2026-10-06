
<div class="mainpanel">

    <div class="contentpanel">

        <ol class="breadcrumb breadcrumb-quirk">
            <li><a href="#"><i class="fa fa-home mr5"></i> Home</a></li>
            <li><a href="#">PJU</a></li>
            <li class="active">Survey Perlengkapan</li>
        </ol>

        <div class="row">
            <div class="col-sm-6">
                <div class="panel">
                    <div class="panel-heading">
                        <h4 class="panel-title">Form Survey Perlengkapan Jalan & rambu</h4>
                        <p>Form ini dipakai untuk Verifikasi pencocokan Database peralatan di aplikasi dan data real di lapangan.</p>
                    </div>
                    <form action="<?= base_url('admin/perlengkapan/saveedit/'.$perlengkapan->id)?>" method="post" enctype="multipart/form-data">
                        <div class="panel-body">
                            <input type="hidden" name="id" value="<?= $perlengkapan->id ?>">
                            <h4 class="panel-title mb10">Nama Perlengkapan</h4>
                            <div class="form-group">
                                <input type="text" name="nama" value="<?= $perlengkapan->nama ?>" class="form-control" placeholder="Nama Perlengkapan" required>
                            </div>
                            <h4 class="panel-title mb10">Ruas Jalan</h4>
                            <div class="form-group">
                                <select id="ruasjalan" name="ruasjalan" class="form-control" style="width: 100%" data-placeholder="Ruas Jalan" required>
                                    <option value="<?=  $perlengkapan->id_ruasjalan ?>" selected><?= $ruas?></option>
                                </select>
                            </div>
                            <h4 class="panel-title mb10">Titik Koordinat</h4>
                            <div class="input-group mb15">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-map-marker"></i></span>
                                <div class="timepicker">
                                    <input id="slat" type="text" name="lat" value="<?= $perlengkapan->coordinate_lat ?>" class="form-control" placeholder="Latitude" required/>
                                    <input id="slng" type="text" name="lng" value="<?= $perlengkapan->coordinate_lng ?>" placeholder="Longitude" class="form-control" required/></div>
                            </div>
                            <h4 class="panel-title mb10">Posisi</h4>

                            <div class="input-group mb15">

                                <label class="rdiobox">
                                    <input type="radio" name="posisi" value="kanan" <?php if($perlengkapan->posisi=='Kanan'){ echo "checked"; }?>>
                                    <span>Kanan</span>
                                </label>
                                <label class="rdiobox">
                                    <input type="radio" name="posisi" value="tengah" <?php if($perlengkapan->posisi=='Tengah'){ echo "checked"; }?>>
                                    <span>Tengah</span>
                                </label>
                                <label class="rdiobox">
                                    <input type="radio" name="posisi" value="kiri" <?php if($perlengkapan->posisi=='Kiri'){ echo "checked"; }?>>
                                    <span>Kiri</span>
                                </label>
                            </div>
                            <h4 class="panel-title mb10">Jenis Perlengkapan</h4>
                            <div class="form-group">
                                <select id="jenisperlengkapan" name="jenisperlengkapan" class="form-control " disabled style="width: 100%" data-placeholder="Jenis Perlengkapan" placeholder="Catu Daya">
                                    <option value="">&nbsp;</option>
                                    <?php
                                    foreach ($jenis as $item) {

                                        ?>
                                        <option value="<?= $item->id?>" <?php if ($perlengkapan->id_jenis == $item->id) {
                                            echo "selected";
                                        }else if($perlengkapan->id_jenis >= 9 and $item->id==4){echo "selected";} ?>><?= $item->nama;?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <?php if($perlengkapan->subs == 4){
                                ?>
                                <div class="mb10" id="jrambu">
                                    <h4 class="panel-title mb10">Jenis Rambu</h4>
                                    <div class="form-group">
                                        <select id="jenisrambu" name="jenisrambu" class="form-control" style="width: 100%" data-placeholder="Jenis Rambu" placeholder="Jenis Rambu">
                                            <?php
                                            foreach ($rambu as $item) {

                                                ?>
                                                <option value="<?= $item->id;?>" <?php if($item->id==$perlengkapan->id_jenis){ echo "selected";}?>><?= $item->nama;?></option>
                                            <?php } ?>
                                        </select>
                                    </div>

                                    <h4 class="panel-title mb10">Gambar Rambu</h4>
                                    <div class="form-group">

                                        <input type="hidden" name="id_grambu" id="id_grambu" value="<?= $perlengkapan->id_gambar?>">
                                        <label id="labe"></label>
                                        <buttonn class="btn btn-info" data-toggle="modal" data-target="#modalgambarrmabu">Pilih Gambar Rambu</buttonn>
                                        <div class="modal" tabindex="-1" role="dialog" id="modalgambarrmabu">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title">Gambar Rambu</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body" style="max-height:400px; overflow-y: scroll; background-color: #f0f0f0;">
                                                        <div class="row filemanager  bg-gray">
                                                            <?php foreach ($garambu as $grambu) {
                                                                ?>
                                                                <div class="col-xs-6 col-sm-4 col-md-3 col-lg-2 image" id="sssimages" data-id="<?=$grambu->id_gambar?>">
                                                                    <div class="thmb">
                                                                        <label class="ckbox" style="display: none;">
                                                                            <input type="checkbox"><span></span>
                                                                        </label>
                                                                        <div class="btn-group fm-group" style="display: none;">
                                                                            <button type="button" class="btn btn-default dropdown-toggle fm-toggle" data-toggle="dropdown">
                                                                                <span class="caret"></span>
                                                                            </button>
                                                                            <ul class="dropdown-menu pull-right fm-menu" role="menu">
                                                                                <li><a href="#"><i class="fa fa-share"></i> Share</a></li>
                                                                                <li><a href="#"><i class="fa fa-pencil"></i> Edit</a></li>
                                                                                <li><a href="#"><i class="fa fa-download"></i> Download</a></li>
                                                                                <li><a href="#"><i class="fa fa-trash-o"></i> Delete</a></li>
                                                                            </ul>
                                                                        </div><!-- btn-group -->
                                                                        <div class="thmb-prev" style="height: 100px; overflow: hidden; justify-content: center; align-content: center">
                                                                            <img src="/uploads/rambu/<?= $grambu->gambar_rambu?>" class="img-responsive" alt="" id="asda">
                                                                        </div>
                                                                    </div><!-- thmb -->
                                                                </div><!-- col-xs-6 -->
                                                            <?php } ?>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-primary">Save changes</button>
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>

                                <?php
                            }?>
                            <h4 class="panel-title mb10">Status</h4>
                            <div class="form-group">
                                <select id="pjstatus" name="status" class="form-control" style="width: 100%" placeholder="Status">
                                    <option value="T">Terpasang</option>
                                    <option value="K">Kebutuhan</option>
                                </select>
                            </div>
                            <div class="mb10" id="knd">
                                <h4 class="panel-title mb10">Kondisi</h4>
                                <div class="form-group">
                                    <select id="kondisi" name="kondisi" class="form-control" placeholder="Kondisi" >
                                        <option value="Baik" <?php if($perlengkapan->kondisi=='Baik'){echo "Selected";}?>>Baik</option>
                                        <option value="Rusak" <?php if($perlengkapan->kondisi=='Rusak'){echo "Selected";}?>>Rusak</option>
                                    </select>
                                </div>
                                <h4 class="panel-title mb10">Keterangan</h4>
                                <div class="form-group">
                                    <input type="text" name="keterangan" class="form-control" value="<?= $perlengkapan->keterangan ?>" placeholder="keterangan">
                                </div>
                                <h4 class="panel-title mb10">Gambar</h4>
                                <div class="form-group">
                                    <input type="file" name="fotolokasi" accept="image/*" capture class="form-control">
                                </div>
                                <h4 class="panel-title mb10">Lampiran</h4>
                                <div class="form-group">
                                    <input type="file" name="lampiran" accept="image/*" capture class="form-control">
                                </div>
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
                        <h4 class="panel-title">Peta</h4>
                        <p>Tetapkan titik Perlengkapan di peta</p>
                    </div>
                    <div class="panel-body">
                        <div  class="map-wrapper" id="mapadd" style="width: 100%; "></div>
                    </div>
                </div>

            </div><!-- col-sm-6 -->
        </div><!-- row -->

    </div><!-- contentpanel -->
</div><!-- mainpanel -->