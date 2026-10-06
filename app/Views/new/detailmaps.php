<!--===================================================-->
<div id="content-container">


    <!--Page content-->
    <!--===================================================-->
    <div id="page-content">

        <div class="fixed-fluid">
            <div class="fixed-sm-200 fixed-lg-250 pull-sm-left">
                <div class="panel">
                    <!-- Simple profile -->
                    <div class="text-center pad-all bord-btm">
                        <div class="pad-ver">
                            <img src="<?=base_url('assets/new/')?>/img/profile-photos/1.png" class="img-lg img-border img-circle" alt="Profile Picture">
                        </div>
                        <input type="hidden" id="idperlengkapan" value="<?= $perlengkapan->idperl; ?>">
                        <h4 class="text-lg text-overflow mar-no"><?= $perlengkapan->nama; ?></h4>
                        <p class="text-sm text-muted"><?= $perlengkapan->jenis?></p>

                        <a href="/home/inputpengaduan/<?=$perlengkapan->idperl?>" ><button class="btn btn-block btn-success">Laporkan</button></a>
                    </div>
                    <p class="text-semibold text-main pad-all mar-no">Detail</p>
                    <ul class="list-group bg-trans text-md text-black-50">

                        <!-- Profile Details -->
                        <li class="list-group-item list-item-sm">
                           Ruas Jalan:      <label class="pull-right"><?= $perlengkapan->nama_ruas?></label>
                        </li>
                        <li class="list-group-item list-item-sm">
                            Kondisi:     <label class="pull-right"><?= $perlengkapan->kondisi?></label>
                        </li>
                        <li class="list-group-item list-item-sm">
                            <label for=""></label>Posisi:      <label class="pull-right"><?= $perlengkapan->posisi?></label>
                        </li>
                    </ul>
                    <div class="pad-hor mar-btm">
                        <label>Keterangan</label>
                        <label class="text-muted"><?= $perlengkapan->keterangan?></label>
                    </div>


                </div>
            </div>
            <div class="fluid">
                <div class="fixed-fluid">
                    <div class="fixed-lg-300 pull-lg-right">
                        <div class="panel">
                            <div class="panel-heading">
                                <h5 class="panel-title">Laporan Masyarakat</h5>
                            </div>
                            <div class="panel-body">

                                <!-- Newsfeed Content -->
                                <!--===================================================-->
                                <div class="media-block">

                                    <div class="media-body">
                                        <?php
                                        if(!empty($pengaduan)){?>
                                        <div class="pad-btm">
                                            <a href="#" class="btn-link text-semibold media-heading box-inline"><?php  echo $pengaduan->nama;?></a>
                                            <p class="text-muted text-sm"><i class="demo-pli-smartphone-3 icon-lg"></i> - 11 min ago</p>
                                        </div>
                                        <img class="img-responsive" src="<?=base_url('assets/new/')?>/img/shared-img.jpg" alt="Image">
                                        <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut.</p>

                                        <!-- Comments -->
                                        <div class="mar-top pad-top bord-top">
                                            <div class="media pad-btm">
                                                <a class="media-left" href="#"><img class="img-circle img-xs" alt="Profile Picture" src="<?=base_url('assets/new/')?>/img/profile-photos/5.png"></a>
                                                <div class="media-body">
                                                    <div>
                                                        <a href="#" class="btn-link text-semibold media-heading box-inline">Bobby Marz</a>
                                                        <small class="text-muted pad-lft">7 min ago</small>
                                                    </div>
                                                    Sed diam nonummy nibh euismod.
                                                </div>
                                            </div>

                                            <div class="media pad-btm">
                                                <a class="media-left" href="#"><img class="img-circle img-xs" alt="Profile Picture" src="<?=base_url('assets/new/')?>/img/profile-photos/7.png"></a>
                                                <div class="media-body">
                                                    <div>
                                                        <a href="#" class="btn-link text-semibold media-heading box-inline">Lucy Moon</a>
                                                        <small class="text-muted pad-lft">2 Hours ago</small>
                                                    </div>
                                                    Duis autem vel eum iriure dolor in vulputate ?
                                                </div>
                                            </div>

                                            <div class="media pad-btm">
                                                <a class="media-left" href="#"><img class="img-circle img-xs" alt="Profile Picture" src="<?=base_url('assets/new/')?>/img/profile-photos/4.png"></a>
                                                <div class="media-body">
                                                    <div>
                                                        <a href="#" class="btn-link text-semibold media-heading box-inline">Jacky Lore</a>
                                                        <small class="text-muted pad-lft">1 Days ago</small>
                                                    </div>
                                                    Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh.
                                                </div>
                                            </div>
                                        </div>
                                        <?php } ?>
                                    </div>
                                </div>
                                <!--===================================================-->
                                <!-- End Newsfeed Content -->

                            </div>
                        </div>
                    </div>
                    <div class="fluid">

                        <!-- End Status Form -->

                        <div class="panel">
                            <div class="panel-heading">
                                <p class="panel-title">
                                    Peta
                                </p>
                            </div>
                            <div class="panel-body" style="padding:0 !important;">
                                <div class="map-detail" id="map-detail" style="padding-bottom: 75%"></div>
                            </div>
                        </div>

                        <div class="panel">
                            <div class="panel-heading">
                                <h3 class="panel-title"><i class="demo-pli-file-jpg icon-fw"></i> Gambar</h3>
                            </div>
                            <div class="panel-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <img class="img-responsive" src="/uploads/perlengkapan/<?=$perlengkapan->foto?>" alt="Image">
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <!--===================================================-->
    <!--End page content-->


</div>

<!-- FOOTER -->
<!--===================================================-->
<footer id="footer">

    <!-- Visible when footer positions are fixed -->
    <!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
    <div class="show-fixed pull-right">
        You have <a href="#" class="text-bold text-main"><span class="label label-danger">3</span> pending action.</a>
    </div>



    <!-- Visible when footer positions are static -->
    <!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
    <div class="hide-fixed pull-right pad-rgt">
        14GB of <strong>512GB</strong> Free.
    </div>



    <!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
    <!-- Remove the class "show-fixed" and "hide-fixed" to make the content always appears. -->
    <!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->

    <p class="pad-lft">&#0169; 2021 Dinhub BNA</p>



</footer>
<!--===================================================-->
<!-- END FOOTER -->


<!-- SCROLL PAGE BUTTON -->
<!--===================================================-->
<button class="scroll-top btn">
    <i class="pci-chevron chevron-up"></i>
</button>
<!--===================================================-->



</div>
<!--===================================================-->
<!-- END OF CONTAINER -->


<script src="<?=base_url()?>/assets/admin/lib/select2/select2.js"></script>

<script async defer
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBq9ofC7xDgClYrfAgWbzAEW9Z_4rYKDLg&callback=initMap&libraries=geometry">
</script>


<script src="<?= base_url('assets')?>/adminator/js/googleMaps/detailsmap.js"></script>

<!---->
</body>
</html>