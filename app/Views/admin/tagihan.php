
<div class="mainpanel">

    <div class="contentpanel">

        <ol class="breadcrumb breadcrumb-quirk">
            <li><a href="index.html"><i class="fa fa-home mr5"></i> Home</a></li>
            <li><a href="basic-tables.html">Tables</a></li>
            <li class="active">Data Tables</li>
        </ol>
        <div class="row row-col-join panel-earnings">
            <div class="col-xs-3 col-sm-4 col-lg-3">
                <div class="panel">
                    <ul class="panel-options">
                        <li><a><i class="glyphicon glyphicon-option-vertical"></i></a></li>
                    </ul>
                    <div class="panel-heading">
                        <h4 class="panel-title">Tagihan Bulan Ini</h4>
                    </div>
                    <div class="panel-body">
                        <h3 class="earning-amount">Rp. <?=  number_format($tagihan->totall, 2);?></h3>
                        <h4 class="earning-today">Total Tagihan</h4>

                        <ul class="list-group">
                            <li class="list-group-item">non kWh meter <span class="pull-right">Rp. <?=  number_format($tagihan->nonkwh, 2);?></span></li>
                            <li class="list-group-item">kWh Meter <span class="pull-right">Rp. <?=  number_format($tagihan->kwh, 2);?></span></li>
                        </ul>
                        <hr class="invisible">
<!--                        <p>Total items sold this month: 325</p>-->
                    </div>
                </div><!-- panel -->
            </div>
            <div class="col-xs-9 col-sm-8 col-lg-9">
                <div class="panel">
                    <div class="panel-heading">
                        <h4 class="panel-title">Grafik Tagihan 12 bulan terakhir</h4>
                    </div>
                    <div class="panel-body">
                        <div id="line-chart" class="body-chart"></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12 col-sm-12">
                <div class="panel">
                    <div class="panel">
                        <div class="panel-heading">
                            <h4 class="panel-title">Pilih Bulan</h4>
                        </div>
                        <div class="panel-body">
                            <div class="form-group col-sm-4">
                                <input type="month" class="form-control">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-8 col-sm-12">
                    <!-- Nav tabs -->
                    <ul class="nav nav-tabs nav-primary">
                        <li class="active"><a href="#popular5" data-toggle="tab"><strong>Perbandingan Jumlah Id Pel</strong></a></li>
                        <li><a href="#recent5" data-toggle="tab"><strong>Pemakaian Listrik PJU</strong></a></li>
                        <li><a href="#comments5" data-toggle="tab"><strong>Pembayaran</strong></a></li>
                    </ul>
                    <!-- Tab panes -->
                    <div class="tab-content mb20">
                        <div class="tab-pane active" id="popular5">
                            <div id="pjmlpju" class="flot-chart"></div>
                        </div>
                        <div class="tab-pane" id="recent5">
                            <div id="pppju" class="flot-chart"></div>
                        </div>
                        <div class="tab-pane" id="comments5">
                            <div id="ppempju" class="flot-chart"></div>
                        </div>
                    </div>

            </div>

            <div class="col-sm-4 col-lg-3 gritter-demo">
                    <div role="alert" class="gritter-item-wrapper with-icon send-o success mb10">
                        <div class="gritter-item">
                            <div class="gritter-without-image">
                                <span class="gritter-title">Jumlah Id Pelanggan</span>
                                <p>A new rating has been received for Quirk...</p>
                            </div>
                            <div style="clear:both"></div>
                        </div>
                    </div><!-- gritter-item-wrapper -->
                    <div role="alert" style="" class="gritter-item-wrapper with-icon exclamation-circle send-o warning mb10">
                        <div class="gritter-item">
                            <div class="gritter-without-image">
                                <span class="gritter-title">Daya Tersambung</span>
                                <p>Having a class name warning applied to it.</p>
                            </div>
                            <div style="clear:both"></div>
                        </div>
                    </div><!-- gritter-item-wrapper -->
                    <div role="alert" style="" class="gritter-item-wrapper with-icon times-circle danger">
                        <div class="gritter-item">
                            <div class="gritter-without-image">
                                <span class="gritter-title">Pemakaian</span>
                                <p>asd</p>
                            </div>
                            <div style="clear:both"></div>
                        </div>
                    </div><!-- gritter-item-wrapper -->


            </div>
        </div>
        <!-- col-sm-6 -->
        <div class="panel">
            <div class="panel-heading">
                <h4 class="panel-title">Tabel Tagihan Rekening Listrik</h4>
                <p>This can be used to show additional information about a row, useful for cases where you wish to convey more information about a row than there is space for in the host table.</p>

                <div class="well bg-white">
                    <div class="btn-toolbar btn-toolbar-media-manager pull-left" role="toolbar">
                        <div class="btn-group" role="group">
                            <button type="button" class="btn btn-secondary"><i class="fa fa-plus-circle"></i>Tambah</button>
                            <button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#myModal"><i class="fa fa-upload"></i>Import</button>
                            <button type="button" class="btn btn-success"><i class="fa fa-download"></i> Download</button>
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
                    <table id="Idpelta" class="table table-bordered table-striped-col">
                        <thead>
                        <tr>
                            <th>ID PEL</th>
                            <th>Tarip</th>
                            <th>Daya</th>
                            <th>kwh</th>
                            <th>Rpptl</th>
                            <th>tagihan</th>
                            <th>Total Bayar</th>
                            <th></th>

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
                    <form action="<?= base_url('admin/pju/importtagihan')?>" method="post" id="import" enctype="multipart/form-data">
                        <div class="modal-body">

                            <div class="form-group">
                                <input type="month" name="bulan" class="form-control form-control-file mb-5" required>
                            </div>
                            <div class="form-group">
                                <input type="file" id="excelimport" name="excelimport" class="form-control form-control-file mb-5" required>
                            </div>
                            <div class="progress mt-3">
                                <div aria-valuemax="100" aria-valuemin="0"  role="progressbar" class="bar progress-bar progress-bar-success">
                                    <span class="percent">0%</span>
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