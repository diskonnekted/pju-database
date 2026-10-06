<!--CONTENT CONTAINER-->
<!--===================================================-->
<div id="content-container">

    <!--Page Title-->
    <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
    <div id="page-title">
        <h1 class="page-header text-overflow">Data Tables</h1>

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


    <!--Breadcrumb-->
    <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
    <ol class="breadcrumb">
        <li><a href="#">Home</a></li>
        <li><a href="#">Tables</a></li>
        <li class="active">Data Tables</li>
    </ol>
    <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
    <!--End breadcrumb-->




    <!--Page content-->
    <!--===================================================-->
    <div id="page-content">

        <!-- Basic Data Tables -->
        <!--===================================================-->
        <div class="panel">
            <div class="panel-heading">
                <h3 class="panel-title">Basic Data Tables with responsive plugin</h3>
            </div>
            <div class="panel-body">
                <table id="tb-ruas" class="table table-striped table-bordered" cellspacing="0" width="100%">
                    <thead>
                    <tr>
                        <th>Nomor</th>
                        <th>Nomor Ruas</th>
                        <th>Nama Ruas</th>
                        <th>Panjang</th>
                        <th>Lebar</th>
                        <th>s</th>
                    </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </div>
        </div>
        <!--===================================================-->
        <!-- End Striped Table -->


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
<script src="<?=base_url()?>/assets/new/plugins/datatables/media/js/jquery.dataTables.js"></script>
<script src="<?=base_url()?>/assets/new/plugins/datatables/media/js/dataTables.bootstrap.js"></script>
<script src="<?=base_url()?>/assets/new/plugins/datatables/extensions/Responsive/js/dataTables.responsive.min.js"></script>


<script src="<?= base_url('assets')?>/adminator/js/googleMaps/maps.js"></script>
<script>

    $(document).ready(function() {

        'use strict';
        alert('')
        var dt = $("#tb-ruas").DataTable({
            responsive: true,
            'ajax': {
                "url": "<?= base_url('/datajalan/getruas') ?>",
                "type": "POST"
            },
            'fnDrawCallback': function(oSettings) {
                $('#exRowTable_paginate ul').addClass('pagination-active-success');
            },
            'columns': [

                { 'data': [0] },
                { 'data': [2] },
                { 'data': [4] },
                { 'data': [7] },
                { 'data': [8] },
                { 'data': [12] },

            ],
            'order': [[0, 'asc']],
        });

        // Add event listener for opening and closing details

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