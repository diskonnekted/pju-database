
    <!-- ### $App Screen Content ### -->
    <main class='main-content bgc-grey-100'>
        <div id='mainContent'>
            <div class="row gap-20 masonry pos-r">
                <div class="masonry-sizer col-md-6"></div>
                <div class="masonry-item  w-100">
                    <div class="row gap-20">
                        <!-- #Toatl Visits ==================== -->
                        <?php
                        
                        foreach ($jenis as $item) {
                        ?>
                        <div class='col-md-3'>
                            <div class="layers bd bgc-white p-20 shadow-md theme-overlay" style="background-image: url('/assets/images/jenis/<?=$item->gambar?>'); background-size: cover; background-position: center;
                             box-shadow: inset 0 0 0 50vw rgba(0,0,0,0.3);">

                                <div class="layer w-100 mB-10 ">
                                    <h5 class="lh-1 text-white text-uppercase"><?= $item->id?></h5>
                                </div>
                                <div class="w-100 pt-5">
                                    <div class="peers ai-sb fxw-nw">
                                        <div class="peer peer-greed">
                                            <span id="sparklinedash"></span>
                                        </div>
                                        <div class="peer">
                                            <span class="d-ib lh-1 va-m fw-400 bdrs-10em pX-15 pY-15 bgc-green-50 c-green-500" style="font-size: 9pt"><?php if($item->id == 4){ echo $r4; }else{ echo $item->ptotal; ?> Titik</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php }?>
                    </div>
                </div>
            </div>
        </div>
    </main>
