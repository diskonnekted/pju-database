
<div class="mainpanel">

    <div class="contentpanel">

        <ol class="breadcrumb breadcrumb-quirk">
            <li><a href="index.html"><i class="fa fa-home mr5"></i> Home</a></li>
            <li><a href="basic-tables.html">Tables</a></li>
            <li class="active">Data Tables</li>
        </ol>

        <div class="panel">
            <div class="panel-heading">
                <h4 class="panel-title">Data Nomor Rekening Listrik</h4>
                <p>Form daftar ID Pel Listrik dari database PLN.</p>

                <div class="well bg-white">
                    <div class="btn-toolbar btn-toolbar-media-manager pull-left" role="toolbar">
                        <div class="btn-group" role="group">
                            <button type="button" class="btn btn-secondary"><i class="fa fa-plus-circle"></i>Tambah</button>
                            <button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#myModal"><i class="fa fa-upload"></i>Import</button>
                            <a href="/admin/export/idpel" class="btn btn-success"><i class="fa fa-download"></i> Download</a>
                        </div>
                        <div class="btn-group" role="group">
                            <button type="button" class="btn btn-default disabled"><i class="fa fa-pencil"></i> Edit</button>
                            <button type="button" class="btn btn-default disabled"><i class="fa fa-trash"></i> Delete</button>
                        </div>
                    </div><!-- btn-toolbar -->

                </div>
            </div>
            <div class="panel-body">

                <div class="table-responsive">
                    <table id="Idpel" class="table table-bordered table-striped-col">
                        <thead>
                        <tr>
                            <th></th>
                            <th>TGL PDL</th>
                            <th>Tgl Nyala</th>
                            <th>IDPEL</th>
                            <th>Nama</th>
                            <th>Tarif</th>
                            <th>Daya</th>
                            <th>Tanggal Pasang</th>
                            <th>Merek</th>
                        </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div><!-- panel -->

        <!-- Modal -->
        <div class="modal bounceIn animated" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title" id="myModalLabel">Modal title</h4>
                    </div>
                    <form action="<?= base_url('admin/pju/import')?>" method="post" id="import" enctype="multipart/form-data">
                        <div class="modal-body">
                            <input type="file" id="excelimport" name="excelimport" class="form-control form-control-file mb-5">

                            <div class="progress">
                                <div aria-valuemax="100" aria-valuemin="0"  role="progressbar" class="bar progress-bar progress-bar-success">
                                    <span class="sr-only percent">123</span>
                                </div>
                            </div>


                            <div id="status"></div>

                        </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Import</button>
                    </div>

                    </form>
                </div><!-- modal-content -->
            </div><!-- modal-dialog -->
        </div><!-- modal -->


    </div><!-- contentpanel -->
</div><!-- mainpanel -->