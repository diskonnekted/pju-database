
<main id="main" data-aos="fade-up">
<section class="breadcrumbs">
        <div class="container">

            <div class="d-flex justify-content-between align-items-center">
                <h2>Inner Page</h2>
                <ol>
                    <li><a href="#">Home</a></li>
                    <li>Input pengaduan</li>
                </ol>
            </div>

        </div>
    </section><!-- End Breadcrumbs -->
    <!-- ======= Contact Section =======     -->
    <section id="contact" class="contact">
        <div class="container" data-aos="fade-up">

            <div class="section-title">

                <h3><span>FORMULIR PENGADUAN LAMPU PJU</span></h3>
                <p>Ut possimus qui ut temporibus culpa velit eveniet modi omnis est adipisci expedita at voluptas atque vitae autem.</p>
                <?php
                    if(isset($_SESSION['success'])==2){
                        ?>
                        <div class="alert alert-danger  mt-5">Terjadi kesalahan saat memproses Pengaduan anda, Silakan coba beberapa saat lagi</div>
                        <?php
                    }else if(isset($_SESSION['success'])==1){

                            ?>
                        <div class="alert alert-success mt-5" >Pengaduan berhasil dikirim, Pengaduan anda akan segera diproses</div>
                        <?php
                    }
                ?>

            </div>

            <div class="row" data-aos="fade-up" data-aos-delay="100">

                <div class="col-lg-6 ">
                    <div class="text-white">
                        <div class="custom-control custom-radio custom-control-inline">
                            <input type="radio" id="1km" name="radius" value="1" class="custom-control-input" onclick="getRadius(this)">
                            <label class="custom-control-label" for="1km">1 Kilometer</label>
                        </div>
                        <div class="custom-control custom-radio custom-control-inline">
                            <input type="radio" id="2km" name="radius" value="2" class="custom-control-input" onclick="getRadius(this)">
                            <label class="custom-control-label" for="2km">2 Kilometer</label>
                        </div>
                        <div class="custom-control custom-radio custom-control-inline">
                            <input type="radio" id="4km" name="radius" value="4" class="custom-control-input" onclick="getRadius(this)">
                            <label class="custom-control-label" for="4km">4 Kilometer</label>
                        </div>
                        <div class="custom-control custom-radio custom-control-inline">
                            <input type="radio" id="7km" name="radius" value="7" class="custom-control-input" onclick="getRadius(this)">
                            <label class="custom-control-label" for="7km">7 Kilometer</label>
                        </div>
                    </div>
                    <div id="map" style="padding-bottom:70%; position: relative; overflow: hidden;"></div>
                    <p class="card-text text-white" id="output"></p>
                </div>

                <div class="col-lg-6">
                    <form action="<?= base_url();?>/home/savepengaduan" method="post" enctype="multipart/form-data" class="php-email-form">
                        <input type="hidden" name="id_perl" id="id_perl" value="0">
                        <input type="hidden" name="lat" id="laplat">
                        <input type="hidden" name="lng" id="laplng">
                        <div class="row">
                            <div class="col form-group">
                                <label class="label-info small">Nama Lengkap</label>
                                <input type="text" name="name" class="form-control" id="name" placeholder="Nama Lengkap" data-rule="minlen:4" data-msg="Tulis Nama minimal 4 Karakter" required/>
                                <div class="validate"></div>
                            </div>
                            <div class="col form-group">
                                <label class="label-info small">Nomor Whatsapp Aktif</label>
                                <input type="text" class="form-control" name="wa" id="wa" placeholder="Nomor Whatsapp Aktif" data-rule="phone" data-msg="Tuliskan Nomor Whatsapp aktif anda"  required/>
                                <div class="validate"></div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="label-info small">Nomor Nik Anda</label>
                            <input type="text" class="form-control" name="nik" id="subject" placeholder="NIK" data-rule="minlen:16;maxlen:16" data-msg="16 Digit NIK anda" required/>
                            <div class="validate"></div>
                        </div>

                        <div class="form-group">
                            <label class="label-info small">Laporan</label>
                            <textarea class="form-control" name="laporan" rows="5" data-rule="required" required data-msg="Isikan Laporan Anda" placeholder="Contoh : Lampu PJU mati di ruas jalan raya talang depan minimarket kita sampai pasar pesayangan desa talang kecamatan talang"></textarea>
                            <div class="validate"></div>
                        </div>

                        <div class="form-group">
                            <label class="label-info small">Lampiran Foto</label>
                            <input type="file" class="form-control" name="lampiran" id="lampiran" accept="image/*" capture required />
                            <div class="validate"></div>
                        </div>
                        <div class="text-center"><button type="submit">Kirim Pengaduan</button></div>
                    </form>
                </div>

            </div>

        </div>
    </section><!-- End Contact Section -->

</main><!-- End #main -->

<!-- ======= Footer ======= -->
<footer id="footer">

    <div class="container py-4">
        <div class="copyright">
            &copy; Copyright <strong><span>BizLand</span></strong>. All Rights Reserved
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

    $(document).ready(function(){

    })
</script>
</body>

</html>