

        <!--CONTENT CONTAINER-->
        <!--===================================================-->
        <div id="content-container" style="padding-top: 0">

            <!--Page Title-->
            <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
            <div id="page-title">
                <h1 class="page-header text-overflow">DASHBOARD <strong>SIMPEL</strong> JALAN</h1>

            </div>
            <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
            <!--End page title-->

            <div id="page-content">

                <div class="row">
                    <?php foreach ($jenis as $item) {?>
                    <div class="col-sm-6 col-lg-3" style="">
                        <a href="<?= base_url('peta/perkap/').'/'.$item->id?>">
                            <div class="panel panel-success panel-colorful no-border" style="background-image: url('/assets/images/jenis/<?=$item->gambar?>'); background-position: center; background-size: cover; padding-top: 100%; position: relative; border: none !important">
                                <div class="pad-all" style="position: absolute; top: 0;  left: 0;  bottom: 0;  right: 0;">
                                    <p class="text-lg text-semibold" style="font-size:16pt"> <?= $item->nama?></p>
                                    <p class="text-md mar-no">
                                        <span class="pull-right text-bold"><?= $item->ptotal.'  '.$item->nama?></span>
                                        Jumlah
                                    </p>
                                </div>
                            </div>
                        </a>
                    </div>
                    <?php }?>
                </div>
            </div>


        </div>
        <!--===================================================-->
        <!--END CONTENT CONTAINER-->




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

        <p class="pad-lft">&#0169; 2016 Your Company</p>



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



</body>

<!-- Mirrored from www.themeon.net/nifty/v2.5/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 05 Jul 2016 13:43:56 GMT -->
</html>
