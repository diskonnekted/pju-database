<!--CONTENT CONTAINER-->
<!--===================================================-->
<div id="content-container">

    <!--Page Title-->
    <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
    <div id="page-title">
        <h1 class="page-header text-overflow">Data Jalan</h1>

        <!--Searchbox-->

    </div>
    <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
    <!--End page title-->


    <!--Breadcrumb-->
    <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
    <ol class="breadcrumb">
        <li><a href="/dashboard">Home</a></li>
        <li><a href="active">Data Jalan</a></li>

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
                <h3 class="panel-title">Data Ruas Jalan di Kabupaten Banjarnegara</h3>
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
<script src="<?=base_url()?>/assets/new/plugins/datatables/media/js/jquery.dataTables.js"></script>
<script src="<?=base_url()?>/assets/new/plugins/datatables/media/js/dataTables.bootstrap.js"></script>
<script src="<?=base_url()?>/assets/new/plugins/datatables/extensions/Responsive/js/dataTables.responsive.min.js"></script>


<script src="<?= base_url('assets')?>/adminator/js/googleMaps/maps.js"></script>
<script>

    $(document).ready(function() {

        'use strict';
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
    })
</script>
<!---->
</body>
</html>