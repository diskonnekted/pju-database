
<!-- ======= Hero Section ======= -->
<section id="hero" class="d-flex align-items-center">
    <div class="container" data-aos="zoom-out" data-aos-delay="100">
        <h1>Selamat Datang di Webgis <span>PJU</span>
        </h1>
        <h2>Lampu Mati Siap Dilaju, Pantang Pulang Sebelum Terang</h2>

    </div>
</section><!-- End Hero -->

<main id="main">

    <!-- ======= Featured Services Section ======= -->
    <section id="featured-services" class="featured-services">
        <div class="container" data-aos="fade-up">

            <div class="row">
                <div class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0">
                    <div class="icon-box" data-aos="fade-up" data-aos-delay="100">
                        <div class="icon"><i class="bx bxl-dribbble"></i></div>
                        <h4 class="title"><a href="">Peta Perlengkapan Jalan</a></h4>
                        <p class="description">Lihat dimana saya letak perlengkapan jalan yang ada di Banjarnegara</p>
                    </div>
                </div>

                <div class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0">
                    <div class="icon-box" data-aos="fade-up" data-aos-delay="200">
                        <div class="icon"><i class="bx bx-file"></i></div>
                        <h4 class="title"><a href="#pengaduan">Pengaduan</a></h4>
                        <p class="description">Adukan apabila terdapat lampu penerangan jalan umum atau Perlengkapan jalan rusak / hilang</p>
                    </div>
                </div>

                <div class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0">
                    <div class="icon-box" data-aos="fade-up" data-aos-delay="300">
                        <div class="icon"><i class="bx bx-tachometer"></i></div>
                        <h4 class="title"><a href="">Aspirasi</a></h4>
                        <p class="description">Berikan Aspirasi anda mengenai lampu penerangan jalan umum</p>
                    </div>
                </div>

                <div class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0">
                    <div class="icon-box" data-aos="fade-up" data-aos-delay="400">
                        <div class="icon"><i class="bx bx-world"></i></div>
                        <h4 class="title"><a href="">Kontak</a></h4>
                        <p class="description">Tim PJU Dinas Perhubungan Kabupaten Banjarnegara

                        </p>
                    </div>
                </div>

            </div>

        </div>
    </section><!-- End Featured Services Section -->
  <!-- ======= Counts Section ======= -->

    <!-- ======= Services Section ======= -->
    <section id="pengaduan" class="services">
        <div class="container" data-aos="fade-up">

            <div class="section-title">
                <h2>Pengaduan</h2>
                <h3>Pengaduan Terbaru dari <span>Masyarakat</span></h3>
                <p>Ut possimus qui ut temporibus culpa velit eveniet modi omnis est adipisci expedita at voluptas atque vitae autem.</p>
            </div>

            <div class="row">
                <?php
                foreach ($pengaduan as $item) {

                ?>
                <div class="col-lg-4 col-md-6 d-flex align-items-stretch" data-aos="zoom-in" data-aos-delay="100">
                    <div class="icon-box pb-4 pt-4">
                        <div class="img-fluid">
                            <img src="<?= base_url('uploads/pengaduan/'.$item->foto)?>" class="img-thumbnail figure-img" alt="Tidak Ada Foto"></div>
                        <h4><a href="<?= base_url('home/pengaduan/'.$item->id_pengaduan); ?>"><?= $item->nama?></a></h4>
                        <p><?= $item->isilaporan?></p>

                        <div class="progress mt-4" style="height: 5px;">
                            <div class="progress-bar bg-success" role="progressbar" style="width: 75%" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>

                        <div class="btn-wrap mt-3 mb-0">
                            <a href="<?= base_url('home/pengaduan/'.$item->id_pengaduan); ?>" class="btn btn-primary">Lihat Pengaduan</a>
                        </div>
                    </div>
                </div>
                <?php }?>
            </div>
            <div class="row justify-content-center mt-4">
                <div class="col-lg-6 text-center">
                    <a href="<?= base_url('home/pengaduan')?>" class="btn btn-primary"> Lihat Selengkapnya </a>
                </div>
            </div>
        </div>
    </section><!-- End Services Section -->
</main><!-- End #main -->

<!-- ======= Footer ======= -->
<footer id="footer">

    <div class="footer-newsletter">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6">
                    <h4>Dapatkan Info Terbaru</h4>
                    <p>Masukkan emaul disini untuk mendapatkan update info terbaru dari kami</p>
                    <form action="" method="post">
                        <input type="email" name="email"><input type="submit" value="Subscribe">
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="container py-4">
        <div class="copyright">
            &copy; Copyright <strong><span>Dinas Perhubungan Banjarnegara</span></strong>. All Rights Reserved
        </div>
        <div class="credits">
            <!-- All the links in the footer should remain intact. -->
            <!-- You can delete the links only if you purchased the pro version. -->
            <!-- Licensing information: https://bootstrapmade.com/license/ -->
            <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/bizland-bootstrap-business-template/ -->
            Designed by <a href="https://teknosmart.co/">Teknosmart</a>
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

</body>

</html>