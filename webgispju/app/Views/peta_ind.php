<!-- ### $App Screen Content ### -->
<main class='main-content bgc-grey-100'>
    <div id='mainContent'>
        <div class="container-fluid">
            <h4 class="c-grey-900 mT-10 mB-30"></h4>
            <div class="row">
                <div class="col-md-12">
                    <div class="bgc-white bd bdrs-3 p-20 mB-20">
                        <div class="text-white">
                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" id="1km" name="radius" value="1" class="custom-control-input" onclick="getRadius(this)">
                                <label class="custom-control-label" for="1km">1 Kilometer</label>
                            </div>
                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" id="2km" name="radius" value="2" class="custom-control-input" onclick="getRadius(this)">
                                <label class="custom-control-label" for="2km">2 Kilometer</label>
                            </div>
                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" id="4km" name="radius" value="4" class="custom-control-input" onclick="getRadius(this)">
                                <label class="custom-control-label" for="4km">4 Kilometer</label>
                            </div>
                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" id="7km" name="radius" value="7" class="custom-control-input" onclick="getRadius(this)">
                                <label class="custom-control-label" for="7km">7 Kilometer</label>
                            </div>
                        </div>
                        <h6 class="c-grey-900 mB-20">Peta Persebaran Perlengkapan Jalan Jenis : <b><?= $jenis->nama;?></b></h6>
                        <div id="google-map" style="padding-bottom: 75%;"></div>
                    </div>
                    <input type="hidden" id="idperlengkapan" value="<?=$jenis->id?>">
                </div>
            </div>
        </div>

    </div>
</main>

