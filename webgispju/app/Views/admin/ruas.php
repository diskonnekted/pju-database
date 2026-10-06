
<div class="mainpanel">

    <div class="contentpanel">

        <ol class="breadcrumb breadcrumb-quirk">
            <li><a href="<?=base_url('admin')?>"><i class="fa fa-home mr5"></i> Home</a></li>
            <li class="active">Ruas Jalan</li>
        </ol>

        <div class="panel">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-lg-12">
                            <div class="btn-toolbar btn-toolbar-media-manager pull-right" role="toolbar">
                                <div class="btn-group" role="group">
                                    <a type="button" class="btn btn-primary" href="<?= base_url('admin/ruas/tambah') ?>"><i class="fa fa-plus-circle"></i>Tambah</a>&nbsp;
                                    <a type="button" class="btn btn-success" disabled="disable"> <i class="fa fa-download"></i> Download Excel </a>
                                </div>

                        </div>

                        <h4 class="panel-title">Data Ruas Jalan</h4>
                        <p>Tabel data ruas jalan di kabupaten banjarnegara</p>

                    </div>
                </div>
            </div>
            <div class="panel-body">
                <div class="table-responsive">
                    <table id="tableRuas" class="table table-bordered table-striped-col">
                        <thead>
                            <tr>
                                <th></th>
                                <th>Nomor</th>
                                <th>Jenis</th>
                                <th>Ruas Jalan</th>
                                <th>Titik Awal</th>
                                <th>Titik Akhir</th>
                                <th>Panjang</th>
                                <th>Lebar</th>
                                <th>Kelas</th>
                            </tr>
                        </thead>
                        <tbody></tbody>
                    </table>
                </div>
            </div>
        </div><!-- panel -->

    </div><!-- contentpanel -->
</div><!-- mainpanel -->