
<div class="mainpanel">

    <div class="contentpanel">

        <ol class="breadcrumb breadcrumb-quirk">
            <li><a href="index.html"><i class="fa fa-home mr5"></i> Home</a></li>
            <li><a href="general-forms.html">PJU</a></li>
            <li class="active">Survey PJU</li>
        </ol>

        <div class="row">
            <div class="col-sm-6">
                <div class="panel">
                    <div class="panel-heading">
                        <h4 class="panel-title">Form Tambah Jenis Perlengkapan</h4>
                        <p>Individual form controls automatically receive some global styling with <code>.form-control</code> class that are set to 100% width by default.</p>
                    </div>
                    <form action="<?= base_url('admin/perlengkapan/savejenis')?>" method="post" enctype="multipart/form-data">
                        <div class="panel-body">

                            <h4 class="panel-title mb10">Jenis</h4>
                            <div class="form-group">
                                <input type="text" name="jenis" class="form-control" placeholder="Jenis Perlengkapan">
                            </div>

                            <h4 class="panel-title mb10">Sub</h4>
                            <div class="form-group">
                                <select id="bentukrambu" name="sub" class="form-control" style="width: 100%" data-placeholder="Catu Daya" placeholder="Catu Daya">
                                    <option value="">&nbsp;</option>
                                    <?php foreach ($jenis as $jeni) {
                                    ?>
                                    <option value="<?=$jeni->id?>"><?= $jeni->nama?></option>
                                    <?php } ?>
                                </select>
                            </div>

                            <h4 class="panel-title mb10">Keterangan</h4>
                            <div class="form-group">
                                <input type="text" name="keterangan" class="form-control" placeholder="Keterangan Perlengkapan">
                            </div>

                            <h4 class="panel-title mb10">Gambar</h4>
                            <div class="form-group">
                                <!--                                <buttonn class="btn btn-info" data-toggle="modal" data-target="#takephoto" id="tf">Ambil Gambar</buttonn>-->
                                <input type="file" name="lampiran" accept="image/*"    class="form-control">
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
