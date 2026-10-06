<!-- ### $App Screen Content ### -->
<main class='main-content bgc-grey-100'>
    <div id='mainContent'>
        <div class="container-fluid">
            <h4 class="c-grey-900 mT-10 mB-30"></h4>
            <div class="row">
                <div class="col-md-3">
                    <div class="bgc-white bd bdrs-3 p-20 mB-20">
                        <h6 class="c-grey-900 mB-20 text-center">Fiter Peta</h6>
                        <form action="#" id="filter">
                            <div class="form-group">
                                <label for="">Ruas Jalan</label>
<!--                                <input type="hidden" id="selectruasjalan" name="selectruasjalan" style="width: 100%;" />-->

                                <select name="ruasjalan" id="selectruasjalan" class="form-control" placeholder="Ruas Jalan">
                                    <option value="">Semua</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="">Jenis Perlengkapan</label>
<!--                                <input type="hidden" id="selectjenisperlengkapan" name="jenisperlengkapan" style="width: 100%;" />-->

                                <select name="jenisperlengkapan" id="selectjenisperlengkapan" class="form-control">
                                 </select>
                            </div>
                            <div class="form-group">
                                <button class="btn btn-info" id="btnsetmaps"><i class="fa fa-search"></i>Terapkan</button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-md-9">
                    <div class="bgc-white bd bdrs-3 p-20 mB-20">
                        <h6 class="c-grey-900 mB-20">Peta Perlengkapan Jalan</h6>
                        <div class="filter">
                            <h6>Filter Peta</h6>
                        </div>
                        <div id="google-map" style="padding-bottom: 75%;"></div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</main>

