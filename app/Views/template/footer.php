
        <!-- ### $App Screen Footer ### -->
        <footer class="bdT ta-c pT-10 pB-10 pL-40 pR-40 fsz-sm c-grey-600">
            <p class="pb-0 mb-0 lh-3/2">Copyright © 2020  <a href="https://dinhub.pju.com" target='_blank' title="Dinhub">Dinhub BNA</a>. All rights reserved.</p>
        </footer>
    </div>
</div>

<script src="<?= base_url('assets')?>/adminator/js/perfect-scrollbar/perfect-scrollbar.min.js"></script>
        <script src="<?= base_url()?>/assets/admin/lib/jquery/jquery.js"></script>

<!--<script src="--><?//= base_url('assets')?><!--/adminator/js/jquery.min.js"></script>-->
        <script src="<?=base_url()?>/assets/admin/lib/select2/select2.js"></script>

        <script src="<?= base_url('assets')?>/adminator/js/bootstrap.bundle.js"></script>
        
  <script src="<?= base_url('assets')?>/vendor/owl.carousel/owl.carousel.min.js"></script>
<script src="<?= base_url('assets')?>/adminator/js/common.js"></script>
<!--<script src="<?= base_url('assets')?>/adminator/js/googleMaps/load-google-maps-api.js"></script>-->

<script async defer
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBq9ofC7xDgClYrfAgWbzAEW9Z_4rYKDLg&callback=initMap">
</script>
<script src="<?= base_url('assets')?>/adminator/js/googleMaps/index.js"></script>

        <script>

            $(document).ready(function() {

                'use strict';
                //
                // $('#selectjenisperlengkapan').select2();
                $("#selectruasjalan").select2({
                    placeholder: '--- Cari Ruas ---',
                    ajax: {
                        url: '<?= base_url() ?>peta/getruas',
                        dataType: 'json',
                        delay: 250,
                        processResults: function(data){
                            return {
                                results: data
                            };
                        },
                        cache: true
                    }
                });
            })
        </script>
</body>
</html>

