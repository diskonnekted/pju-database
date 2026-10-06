
<main id="main" data-aos="fade-up" onload="getRadius(this)">
    <section class="breadcrumbs">
        <div class="container">

            <div class="d-flex justify-content-between align-items-center">
                <h2>Pengaduan</h2>
                <ol>
                    <li><a href="#">Home</a></li>
                    <li>Detail Pengaduan</li>
                </ol>
            </div>

        </div>
    </section><!-- End Breadcrumbs -->
    <!-- ======= Contact Section =======     -->
    <section id="contact" class="contact">
        <div class="container" data-aos="fade-up">

            <div class="section-title">

                <h3><span>Pengaduan Masyarakat</span></h3>
                <p>Data yang ditampilkan di halaman ini merupakan data yang sudah diverifikasi oleh petugas. Status dan progres penanganan gangguan dapat dipantau disini..</p>
            </div>

            <div class="row" data-aos="fade-up" data-aos-delay="100">
                <div class="col-lg-6">
                    <div class="info-box mb-4">
                        <h3>Detail Alat</h3>
                        <table class="table table-responsive no-border">

                            <tr>
                                <td class="text-left">Nama Pengadu</td>
                                <td class="text-left">:</td>
                                <td class="text-left"><?=$pengaduan->nama?></td>
                            </tr>

                            <tr>
                                <td class="text-left">Tanggal Pengaduan</td>
                                <td class="text-left">:</td>
                                <td class="text-left"><?=$pengaduan->tgl_pengaduan?></td>
                            </tr>
                            <tr>
                                <td class="text-left">Nama Alat</td>
                                <td class="text-left">:</td>
                                <td class="text-left"><?=$pengaduan->nama_perlengkapan?></td>
                            </tr>
                            <tr>
                                <td class="text-left">Ruas Jalan </td>
                                <td class="text-left">:</td>
                                <td class="text-left"><?=$pengaduan->nama_ruas?></td>
                            </tr>
                            <tr>
                                <td class="text-left">Isi Laporan</td>
                                <td class="text-left">:</td>
                                <td class="text-left"><?=$pengaduan->isilaporan?></td>
                            </tr>

                        </table>
                    </div>
                </div>

                <div class="col-lg-6 col-md-6">
                    <div class="info-box  mb-4">
                        <h3>Foto/ Lampiran Pengaduan</h3>
                        <p>
                            <center>
                                <img src="<?=base_url()?>/uploads/pengaduan/<?= $pengaduan->fotolap?>" class="img-thumbnail figure-img" style="max-height: 320px" alt="Tidak Ada Foto">
                            </center>
                        </p>
                    </div>
                </div>
            </div>


            <div class="row" data-aos="fade-up" data-aos-delay="100">

                <div class="col-lg-6 ">
                    <input type="hidden" id="coordinate_lng" value="<?= $pengaduan->coordinate_lng?>">
                    <input type="hidden" id="coordinate_lat" value="<?= $pengaduan->coordinate_lat?>">
                    <div id="maps" style="padding-bottom:70%; position: relative; overflow: hidden;"></div>
                    <p class="card-text text-white" id="output"></p>
                </div>

                <div class="col-lg-6">
                    <div class="info-box mb-4 skills-content">
                        <h4>Status Pengaduan</h4>
                        <div class="p-3">
                            <?php
                                if ($pengaduan->statuspengaduan==1){

                                    ?>
                                    <div class="alert alert-info">Pengaduan Diverifikasi</div>
                                    <?php
                                }else if($pengaduan->statuspengaduan==2){

                                    ?>
                                    <div class="alert alert-info">Perlengkapan dalam proses perbaikan</div>
                                    <?php
                                }else{

                                    ?>
                                    <div class="alert alert-info">Perlengkapan Telah diperbaiki</div>
                                    <?php
                            }
                                ?>
                        </div>
                    </div>

                </div>

            </div>

        </div>
    </section><!-- End Contact Section -->

</main><!-- End #main -->

<!-- ======= Footer ======= -->
<footer id="footer">

    <div class="container py-4">
        <div class="copyright">
            &copy; Copyright <strong><span>Teknosmart</span></strong>. All Rights Reserved
        </div>
        <div class="credits">
            <!-- All the links in the footer should remain intact. -->
            <!-- You can delete the links only if you purchased the pro version. -->
            <!-- Licensing information: https://bootstrapmade.com/license/ -->
            <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/bizland-bootstrap-business-template/ -->
            Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
        </div>
    </div>
</footer><!-- End Footer -->

<div id="preloader"></div>
<a href="#" class="back-to-top"><i class="icofont-simple-up"></i></a>

<!-- Vendor JS Files -->
<script src="<?= base_url('assets/');?>/vendor/jquery/jquery.min.js"></script>
<script src="<?= base_url('assets/');?>/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="<?= base_url('assets/');?>/vendor/jquery.easing/jquery.easing.min.js"></script>
<script src="<?= base_url('assets/');?>/vendor/php-email-form/validate.js"></script>
<script src="<?= base_url('assets/');?>/vendor/waypoints/jquery.waypoints.min.js"></script>
<script src="<?= base_url('assets/');?>/vendor/counterup/counterup.min.js"></script>
<script src="<?= base_url('assets/');?>/vendor/owl.carousel/owl.carousel.min.js"></script>
<script src="<?= base_url('assets/');?>/vendor/isotope-layout/isotope.pkgd.min.js"></script>
<script src="<?= base_url('assets/');?>/vendor/venobox/venobox.min.js"></script>
<script src="<?= base_url('assets/');?>/vendor/aos/aos.js"></script>

<!-- Template Main JS File -->
<script src="<?= base_url('assets/');?>/js/main.js"></script>
<script async="" defer="" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBq9ofC7xDgClYrfAgWbzAEW9Z_4rYKDLg&callback=initMap&libraries=geometry"></script>
<script src="<?= base_url('assets')?>/adminator/js/googleMaps/mapshome.js"></script>
<script>

    function initMap() {
        let lang=$("#coordinate_lng").val();
        let lat=$("#coordinate_lat").val();
        const myLatLng =new google.maps.LatLng(lat, lang);
        const map = new google.maps.Map(document.getElementById("maps"), {
            zoom: 15,
            center: myLatLng,
        });
        new google.maps.Marker({
            position: myLatLng,
            map,
            title: "Hello World!",
        });
    }
</script>
</body>

</html>
