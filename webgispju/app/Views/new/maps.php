<div id="content-container" style="padding-top: 0">

    <!--Page Title-->
    <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
    <div id="page-title">
        <h1 class="page-header text-overflow">PETA SEBARAN ALAT PERLENGKAPAN JALAN</h1>

        <!--Searchbox-->
        <div class="searchbox">
            <div class="input-group custom-search-form">
                <input type="text" class="form-control" placeholder="Search..">
                <span class="input-group-btn">
                                <button class="text-muted" type="button"><i class="demo-pli-magnifi-glass"></i></button>
                            </span>
            </div>
        </div>
    </div>
    <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
    <!--End page title-->

    <!--Page content-->
    <!--===================================================-->
    <div id="page-content">


        <div class="row">
            <div class="col-xs-12">
                <div class="panel">
                    <div class="panel-heading">
                        <h5 class="panel-title"   >Peta Perlengkapan Jalan</h5>
                    </div>
                    <!--Data Table-->
                    <!--===================================================-->
                    <div class="panel-body">
                        <div class="pad-btm form-inline">
                            <div class="row">
                                <div class="col-sm-6 table-toolbar-left">
                                    <h5>Filter</h5>
                                    <div class="form-group">
                                        <label for="ruasjalans">Ruas Jalan</label><br>
                                        <select class="select2 form-control" style="width: 250px;" name="ruasjalan" id="ruasjalans" data-placeholder="----- Pilih Ruas Jalan -----">
                                            <option value="">ruas Jalan</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="jenis-perlengkapan">Jenis Perlengkapan</label><br>
                                        <select class="form-control" id="jenis-perlengkapan" name="perlengkapan">
                                            <option value="">Perlengkapan Jalan</option>
                                            <option value="">1</option>
                                            <option value="">1</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="" style="color:#fff">1</label>
                                        <br>
                                        &nbsp;<button class="btn btn-purple" id="setmaps"><i class="demo-pli-add icon-fw"></i>Terapkan</button>
                                    </div>
                                </>

                            </div>
                        </div>
                        <div class="maps-baru" id="maps-baru" style="padding-bottom: 75%; height: 600px !important;">
                        </div>
                    </div>
                    <!--===================================================-->
                    <!--End Data Table-->

                </div>
            </div>
        </div>




    </div>
    <!--===================================================-->
    <!--End page content-->


</div>


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


<script src="<?=base_url()?>/assets/admin/lib/select2/select2.js"></script>

<script async defer
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBq9ofC7xDgClYrfAgWbzAEW9Z_4rYKDLg&callback=initMap&libraries=geometry">
</script>


<script src="<?= base_url('assets')?>/adminator/js/googleMaps/maps.js"></script>
<script>

    $(document).ready(function() {

        'use strict';
        // $('#selectjenisperlengkapan').select2();
        $("#ruasjalans").select2({
            placeholder: '--- Cari Ruas ---',
            ajax: {
                url: '<?= base_url() ?>/peta/getruas',
                dataType: 'json',
                processResults: function(data){

                    return {
                        results: data
                    };
                },
                cache: true
            }
        });
        var jenip;
        $.ajax({
            url:'<?= base_url() ?>/peta/getJenis',
            dataType:'Json',
            type:'get',
            success:function(r){
                jenip=r.results;
                $("#jenis-perlengkapan").select2({
                    placeholder: '--- Pilih Perlengkapan ---',
                    data: jenip,
                });
            }
        })
    })
</script>
<!---->
</body>
</html>