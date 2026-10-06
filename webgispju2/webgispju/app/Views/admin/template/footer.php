
</section>
easdasd

<script src="<?= base_url()?>/assets/admin/lib/jquery/jquery.js"></script>
<script src="<?= base_url()?>/assets/admin/lib/jquery-ui/jquery-ui.js"></script>
<script src="<?= base_url()?>/assets/admin/lib/bootstrap/js/bootstrap.js"></script>
<script src="<?= base_url()?>/assets/admin/lib/jquery-toggles/toggles.js"></script>

<script src="<?= base_url()?>/assets/admin/lib/datatables/jquery.dataTables.js"></script>
<script src="<?= base_url()?>/assets/admin/lib/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.js"></script>
<script src="<?=base_url()?>/assets/admin/lib/select2/select2.js"></script>
<script src="<?= base_url()?>/assets/admin/lib/morrisjs/morris.js"></script>
<script src="<?= base_url()?>/assets/admin/lib/raphael/raphael.js"></script>



<script src="<?= base_url()?>/assets/admin/lib/flot/jquery.flot.js"></script>
<script src="<?= base_url()?>/assets/admin/lib/flot/jquery.flot.resize.js"></script>
<script src="<?= base_url()?>/assets/admin/lib/flot/jquery.flot.pie.js"></script>
<script src="<?= base_url()?>/assets/admin/lib/flot-spline/jquery.flot.spline.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/webcamjs/1.0.26/webcam.min.js"></script>
<script src="<?= base_url()?>/assets/admin/lib/jquery-knob/jquery.knob.js"></script>
<script src="<?= base_url()?>/assets/admin/lib/jquery-toggles/toggles.js"></script>
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBq9ofC7xDgClYrfAgWbzAEW9Z_4rYKDLg"></script>
<script src="https://unpkg.com/location-picker/dist/location-picker.min.js"></script>
<script src="http://malsup.github.com/jquery.form.js"></script>
<script src="<?= base_url()?>/assets/admin/js/quirk.js"></script>

<script>
    <?php
    if (isset($page)=='addruas'){?>

    var locationPicker = new locationPicker('selectMapss', {
        setCurrentPosition: false, // You can omit this, defaults to true

    }, {
        zoom: 15, // You can set any google map options here, zoom defaults to 15
        center: { lat: -7.3932652, lng: 109.7097441 },
    });
    var setawal = document.getElementById('SetAwalRuas');
    var setAkhir = document.getElementById('SetAkhirRuas');
    <?php } ?>
    $(document).ready(function() {

        'use strict';
        //

        $("#setawal").click(function () {
            // Get current location and show it in HTML
            var locations = locationPicker.getMarkerPosition();

            $("#awlat").val(locations.lat);
            $("#awlng").val(locations.lng);
        })
        $("#setakhir").click(function () {
            // alert("asds")
            // Get current location and show it in HTML
            var location = locationPicker.getMarkerPosition();
            $("#aklat").val(location.lat);
            $("#aklng").val(location.lng);

        })
        // $('#dataTable1').DataTable();

        //console.log(<?//= $jenis?>//)
        var exRowTable = $('#exRowTable').DataTable({

            responsive: true,
            'fnDrawCallback': function(oSettings) {
                $('#exRowTable_paginate ul').addClass('pagination-active-success');
            },
            'ajax': {
                "url": "<?php if (!empty($jeniss)){echo base_url('/admin/perlengkapan/get_jenisperlengkapan/'.$jeniss); }else{ echo base_url('/admin/perlengkapan/get_jenisperlengkapan/');}?>",
                "type": "POST"
            },
            'columns': [{
                'class': 'details-control',
                'orderable': false,
                'data': null,
                'defaultContent': ''
            },
                { 'data': [1] },
                { 'data': [2] },
                { 'data': [3] },
                { 'data': [4]},
                { 'data': [5]},
                { 'data': [6] },
                { 'data': [7] }
            ],
            'order': [[1, 'asc']],


        });

        // Add event listener for opening and closing details
        $('#exRowTable tbody').on('click', 'td.details-control', function () {
            var tr = $(this).closest('tr');
            var row = exRowTable.row( tr );

            if ( row.child.isShown() ) {
                // This row is already open - close it
                row.child.hide();
                tr.removeClass('shown');
            } else {
                // Open this row
                row.child( format(row.data()) ).show();
                tr.addClass('shown');
            }
        });

        var pengaduan = $('#table-pengaduan').DataTable({
            responsive: true,

            'ajax': {
                "url": "<?= base_url('/admin/pengaduan/datapengaduan') ?>",
                "type": "POST"
            },
            'fnDrawCallback': function(oSettings) {
                $('#exRowTable_paginate ul').addClass('pagination-active-success');
            },
            'columns': [{
                'class': 'details-control',
                'orderable': false,
                'data': null,
                'defaultContent': ''
            },
                { 'data': [1] },
                { 'data': [2] },
                { 'data': [3] },
                { 'data': [4] },
                { 'data': [5] },
                { 'data': [6] },
                { 'data': [7] },
                { 'data': [8] },
            ],
            'order': [[6, 'desc']],
        });

        var Ruas = $('#tableRuas').DataTable({
            responsive: true,

            'ajax': {
                "url": "<?= base_url('/admin/ruas/getruas/') ?>",
                "type": "POST"
            },
            'fnDrawCallback': function(oSettings) {
                $('#exRowTable_paginate ul').addClass('pagination-active-success');
            },
            'columns': [{
                'class': 'details-control',
                'orderable': false,
                'data': null,
                'defaultContent': ''
            },
                { 'data': [2] },
                { 'data': [3] },
                { 'data': [4] },
                { 'data': [5] },
                { 'data': [6] },
                { 'data': [7] },
                { 'data': [8] },
                { 'data': [9] },
            ],
            'order': [[2, 'asc']],
        });

        // Add event listener for opening and closing details
        $('#tableRuas tbody').on('click', 'td.details-control', function () {
            var tr = $(this).closest('tr');
            var row = Ruas.row( tr );

            if ( row.child.isShown() ) {
                // This row is already open - close it
                row.child.hide();
                tr.removeClass('shown');
            } else {
                // Open this row
                if ( Ruas.row( '.shown' ).length ) {
                    $('.details-control', Ruas.row( '.shown' ).node()).click();
                }
                let dataa=row.data();
                row.child( druas(dataa) ).show();
                console.log(dataa[10])
                maps(dataa[10], dataa[11]);
                tr.addClass('shown');
            }
        });
        function druas (d) {
            return '' +
                '                                <div class="btn-group pull-right" role="group">' +
                '                                    <button type="button" class="btn btn-info disabled"><i class="fa fa-pencil"></i> Edit</button>' +
                '                                    <button type="button" class="btn btn-danger disabled"><i class="fa fa-trash"></i> Delete</button>' +
                '                                </div>' +
                '<h4>'+d[4]+'<small>Titik : '+d[5]+'-'+d[6]+'</small></h4>'+

                '<hr class="border-0">'+
                '<div class="map-wrapper" id="direct"></div>';

                // '<>Duis aute irures dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</>';
        }
        function maps(or, dir){

            var directionsService = new google.maps.DirectionsService();
            var directionsDisplay = new google.maps.DirectionsRenderer();
            var mapOptions = {
                zoom:12,
            }

            var map = new google.maps.Map(document.getElementById('direct'), mapOptions);
            directionsDisplay.setMap(map);
            // directionsDisplay.setPanel(document.getElementById('direct'));

            var start = or;
            var end = dir;
            var request = {
                origin: start,
                destination: end,
                travelMode: 'DRIVING'
            };
            directionsService.route(request, function(result, status) {
                if (status == 'OK') {
                    directionsDisplay.setDirections(result);
                }
            });
        }

        if ("geolocation" in navigator){ //check Geolocation available
            //things to do
            // alert("sd")
            navigator.geolocation.getCurrentPosition(function(position){
                // alert("Found your location \nLat : "+position.coords.latitude+" \nLang :"+ position.coords.longitude);
                $("#slat").val(position.coords.latitude);
                $("#slng").val(position.coords.longitude);
            }, console.log('error'));
        }else{
            alert("Geolocation Tidak Tersedia");
        }

        $('.toggle').toggles({
            on: false,
            height: 30,
            width: 100,
            text: {
                // text for the ON/OFF position
                'on': 'T',
                'off': 'K'
            },
            checkbox: true

        });
        $('.toggle').on('toggle', function(e, active) {
            if (active) {
                $("#terpasang").show();
                $("#fkeb").val(1);
            } else {

                $("#terpasang").hide();
                $("#fkeb").val(0);

                // console.log('Toggle is now OFF!');
            }
        });
        $("#catudaya").change(function (){
            if ($(this).val()=='M'){
                $("#lmandiri").show();
                $("#ltersuplai").hide();
            }else if($(this).val()=='T'){
                $("#lmandiri").hide();
                $("#ltersuplai").show();
            }else{
                $("#lmandiri").hide();
                $("#ltersuplai").hide();
            }
        })
        $("#ltrs").change(function (){
            if ($(this).val()=="kwh"){
                $("#kwhmeter").show();
                $("#nkwhmeter").hide();
            }else if($(this).val()=='nkwh'){
                $("#kwhmeter").hide();
                $("#nkwhmeter").show();
            }else{
                $("#kwhmeter").hide();
                $("#nkwhmeter").hide();
            }
        })
        $("#idpelanggankwh").change(function (){

            let data='idpel='+$(this).val();
            $.ajax({
                url:'<?=base_url('admin/pju/getIdpel')?>',
                data:data,
                type:'POST',
                dataType:'json',
                success:function(s){
                    $("#dayatersambung").val(s.daya);
                    $("#tglnyalakwh").val(s.tgl_nyala);
                    $("#mkwh").val(s.merk);
                        $("#nserikwh").val(s.type);
                    $("#nopalkwh").val(s.no_meter);
                }
            })
        })
        $("#idplnnon").change(function (){

            let data='idpel='+$(this).val();
            $.ajax({
                url:'<?=base_url('admin/pju/getIdpel')?>',
                data:data,
                type:'POST',
                dataType:'json',
                success:function(s){
                    $("#dayanon").val(s.daya);
                    $("#tglnyalanon").val(s.tgl_nyala);
                    $("#nopalnon").val(s.no_meter);
                }
            })
        })
        $("#tf").click(function (){
            Webcam.set({
                width: 640,
                height: 480,
                image_format: 'jpeg',
                jpeg_quality: 90
            });
            Webcam.attach( '#my_camera' );
        })
        function format (d) {
            // z`d` is the orig
            // inal data object for the row
            return '<h4>'+d[1]+'<small>'+d[2]+'</small></h4>'+
                '<p class="nomargin">Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>';
        }

        // Select2
        // $('select').select2({ minimumResultsForSearch: Infinity });
        // $('#ruasjalan').select2({ minimumResultsForSearch: Infinity });
        $('#ruasjalan').select2({
            placeholder: '--- Ruas Jalan ---',
            ajax: {
                url: '<?php echo base_url('admin/pju/getruas');?>',
                dataType: 'json',
                // delay: 250,
                processResults: function(data){
                    return {
                        results: data
                    };
                },
                cache: true
            }
        });
        $('#select1, #select2, #ltrs, #catudaya, #select2, #select3').select2();




        //ID PELANGGAN

        var idPel = $('#Idpel').DataTable({

            responsive: true,
            'fnDrawCallback': function(oSettings) {
                $('#Idpel_paginate ul').addClass('pagination-active-success');
            },
            'ajax': {
                "url": "<?=base_url('/admin/pju/loadidpelanggan')?>",
                "type": "POST"
            },
            'columns': [{
                'class': 'details-control',
                'orderable': false,
                'data': null,
                'defaultContent': ''
            },
                { 'data': [2] },
                { 'data': [3] },
                { 'data': [4] },
                { 'data': [5]},
                { 'data': [6]},
                { 'data': [7] },
                { 'data': [9] },
                { 'data': [10] }
            ],
            'order': [[1, 'asc']],


        });

        // Add event listener for opening and closing details
        $('#Idpel tbody').on('click', 'td.details-control', function () {
            var tr = $(this).closest('tr');
            var row = idPel.row( tr );

            if ( row.child.isShown() ) {
                // This row is already open - close it
                row.child.hide();
                tr.removeClass('shown');
            } else {
                // Open this row
                row.child( format(row.data()) ).show();
                tr.addClass('shown');
            }
        });
        var idPelta = $('#Idpelta').DataTable({

            responsive: true,
            'fnDrawCallback': function(oSettings) {
                $('#Idpelta_paginate ul').addClass('pagination-active-success');
            },
            'ajax': {
                "url": "<?=base_url('/admin/pju/loadtagihan')?>",
                "type": "POST"
            },
            'columns': [
                { 'data': [2] },
                { 'data': [4] },
                { 'data': [5] },
                { 'data': [6]},
                { 'data': [7]},
                { 'data': [9] },
                { 'data': [11] },
                { 'data': [12] },

            ],
            'order': [[1, 'asc']],


        });

        // Add event listener for opening and closing details
        $('#Idpelta tbody').on('click', 'td.details-control', function () {
            var tr = $(this).closest('tr');
            var row = idPelta.row( tr );

            if ( row.child.isShown() ) {
                // This row is already open - close it
                row.child.hide();
                tr.removeClass('shown');
            } else {
                // Open this row
                row.child( format(row.data()) ).show();
                tr.addClass('shown');
            }
        });
        var bar = $('.bar');
        var percent = $('.percent');
        var status = $('#status');

        $('#import').ajaxForm({
            beforeSend: function() {
                status.empty();
                var percentVal = '0%';
                bar.width(percentVal);
                percent.html(percentVal);
            },
            uploadProgress: function(event, position, total, percentComplete) {
                var percentVal = percentComplete + '%';
                bar.width(percentVal);
                percent.html(percentVal);
            },
            complete: function(xhr) {
                status.html(xhr.responseText);
                // alert('Import Berhasil');
                // $('#myModal').modal('hide');
                idPel.ajax.reload();
            }
        });

        $("#idkebutuhan").select(function (){
           alert("sds")
        });

    });
</script>
<script src="<?= base_url()?>/assets/admin/js/dashboard.js"></script>

</body>
</html>
