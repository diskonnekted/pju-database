
<div class="mainpanel">

    <div class="contentpanel">

        <ol class="breadcrumb breadcrumb-quirk">
            <li><a href="/admin"><i class="fa fa-home mr5"></i> Home</a></li>
            <li><a href="/admin/tagihan">Tagihan</a></li>
            <li class="active">Detail Tagihan</li>
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
            <div class="col-md-8 col-lg-6">

                <div class="panel panel-map-sidebar">
                    <div class="row">
                        <div class="col-md-7 col-lg-8 main">
                            <div id="mapMapBox" class="map-wrapper"></div>
                        </div>
                        <div class="col-md-5 col-lg-4 map-sidebar">
                            <div class="panel-body">
                                <h4 class="panel-title mb20">Detail Id Pelanggan</h4>
                                <p>Type or click the map to enter your starting point and end point of your trip.</p>


                                <form class="form" action="#">
                                    <div class="form-group">
                                        <label class="control-label">Start:</label>
                                        <input type="text" class="form-control" placeholder="San Francisco, CA, USA">
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label">End:</label>
                                        <input type="text" class="form-control" placeholder="New York, NY, USA">
                                    </div>

                                    <div class="form-group">
                                        <label class="control-label">Transportation:</label>
                                        <div class="btn-group">
                                            <button class="btn btn-default" type="button"><i class="fa fa-bicycle"></i></button>
                                            <button class="btn btn-default active" type="button"><i class="fa fa-train"></i></button>
                                            <button class="btn btn-default" type="button"><i class="fa fa-bus"></i></button>
                                            <button class="btn btn-default" type="button"><i class="fa fa-ship"></i></button>
                                            <button class="btn btn-default" type="button"><i class="fa fa-plane"></i></button>
                                        </div>
                                    </div>

                                    <hr>

                                    <button class="btn btn-success btn-block">Get Directions</button>

                                </form>
                            </div>
                        </div>
                    </div>
                </div><!-- panel -->

            </div><!-- col-md-6 -->
            <div class="col-md-4 col-lg-3">

                <div class="panel panel-map-location">
                    <div id="mapApple" class="map-wrapper"></div>
                    <div class="panel-body">
                        <div class="media">
                            <div class="media-left">
                                <img src="/images/image.png" class="width80" alt="Company Logo">
                            </div>
                            <div class="media-body">
                                <address>
                                    <strong>ThemePixels, Inc.</strong>
                                    4975 Cambridge Road
                                    Miami Gardens, FL 33056<br>
                                    <abbr title="Phone">P:</abbr> (123) 456-7890
                                </address>
                            </div><!-- media-body -->
                        </div><!-- media -->

                        <div class="btn-group pull-left">
                            <button class="btn btn-primary" type="button"><i class="fa fa-phone mr5"></i> Call</button>
                            <button class="btn btn-primary" type="button"><i class="fa fa-envelope mr5"></i> Email</button>
                        </div>

                        <div class="btn-group pull-right">
                            <button class="btn btn-success" type="button"><i class="fa fa-star mr5"></i> 4.2 Rating</button>
                        </div>

                    </div><!-- panel-body -->
                </div><!-- panel -->

            </div><!-- col-md-4 -->
        </div><!-- row -->

    </div><!-- contentpanel -->
</div><!-- mainpanel -->