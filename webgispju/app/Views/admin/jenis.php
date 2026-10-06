
<div class="mainpanel">

    <div class="contentpanel">

        <ol class="breadcrumb breadcrumb-quirk">
            <li><a href="#"><i class="fa fa-home mr5"></i> Perlengkapan</a></li>
            <li class="active">Jenis Perlengkapan</li>

        </ol>

        <div class="panel">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-md-12">

                        <div class="btn-toolbar btn-toolbar-media-manager pull-right" role="toolbar">
                            <div class="btn-group" role="group">
                                <a type="button" class="btn btn-primary" href="<?= base_url('admin/perlengkapan/addjenis') ?>"><i class="fa fa-plus-circle"></i>Tambah</a>&nbsp;
                                <a type="button" class="btn btn-success" disabled="disable"> <i class="fa fa-download"></i> Download Excel </a>
                            </div>
                        </div>
                        <h4 class="panel-title">Jenis Perlengkapan</h4>
                        <p>Jenis Perlengkapan Jalan yang tersebar</p>
                    </div>

            </div>
            <div class="panel-body">
                <div class="table-responsive">
                    <table id="dataTable1" class="table table-bordered table-striped-col">
                        <thead>
                        <tr>
                            <th>Nomor</th>
                            <th>Nama</th>
                            <th>Gambar</th>
                            <th>Keterangan</th>
                            <th>Sub Bagian</th>
                            <th>Aksi</th>
                        </tr>
                        </thead>
                        <tfoot>
                        <tr>
                            <th>Nomor</th>
                            <th>Nama</th>
                            <th>Gambar</th>
                            <th>Keterangan</th>
                            <th>Sub Bagian</th>
                            <th>Aksi</th>
                        </tr>
                        </tfoot>

                        <tbody>
                        <?php
                        $n=1;
                        foreach ($jenis as $jenis_item) {


                        ?>
                        <tr>
                            <td><?=$n++?></td>
                            <td><?= $jenis_item->nama?></td>
                            <td><?= $jenis_item->gambar?></td>
                            <td><?= $jenis_item->keterangan?></td>
                            <td><?= $jenis_item->sub?></td>
                            <td>--</td>
                        </tr>
                        <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div><!-- panel -->

    </div><!-- contentpanel -->
</div><!-- mainpanel -->