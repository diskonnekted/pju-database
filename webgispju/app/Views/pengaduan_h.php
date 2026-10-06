
<main id="main" data-aos="fade-up">

    <!-- ======= Breadcrumbs ======= -->
    <section class="breadcrumbs">
        <div class="container">

            <div class="d-flex justify-content-between align-items-center">
                <h2>Pengaduan</h2>
                <ol>
                    <li><a href="/">Home</a></li>
                    <li>Inner Page</li>
                </ol>

            </div>

        </div>
    </section><!-- End Breadcrumbs -->

    <!-- ======= Services Section ======= -->
    <section id="services" class="services">
        <div class="container" data-aos="fade-up">

            <div class="section-title">
                <h2>Pengaduan</h2>
                <h3>Semua Pengaduan Dari masyarakat</h3>
                <p class="mb-1">Pengaduan Pengaduan dari masyarakat</p>
                <a class="btn btn-info" href="<?= base_url('home/inputpengaduan')?>">Buat Pengaduan</a>
            </div>

            <div class="row">
                <?php foreach ($pengaduan as $item) {
                    ?>
                <div class="col-lg-4 col-md-6 d-flex align-items-stretch" data-aos="zoom-in" data-aos-delay="100">
                    <div class="icon-box pb-4 pt-4">
                        <div class="img-fluid">
                            <img src="<?= base_url('uploads/pengaduan/'.$item->foto)?>" class="img-thumbnail figure-img" alt="Tidak Ada Foto"></div>
                        <h4><a href="<?= base_url('home/pengaduan/'.$item->id_pengaduan)?>"><?=$item->nama?></a></h4>
                        <p><?= $item->isilaporan?></p>

                        <div class="progress mt-4" style="height: 5px;">
                            <div class="progress-bar bg-success" role="progressbar" style="width: 75%" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>

                        <div class="btn-wrap mt-3 mb-0">
                            <a href="#" class="btn btn-primary">Lihat Pengaduan</a>
                        </div>
                    </div>
                </div>
                <?php } ?>
            </div>
            <div class="row justify-content-center mt-4">
                <div class="col-lg-6 text-center">
                    <?= $pager->links()?>
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
                    <h4>Join Our Newsletter</h4>
                    <p>Lorem Ipsum Dollor smith amet</p>
                    <form action="" method="post">
                        <input type="email" name="email"><input type="submit" value="Subscribe">
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="footer-top">
        <div class="container">
            <div class="row">

                <div class="col-lg-3 col-md-6 footer-contact">
                    <h3>BizLand<span>.</span></h3>
                    <p>
                        A108 Adam Street <br>
                        New York, NY 535022<br>
                        United States <br><br>
                        <strong>Phone:</strong> +1 5589 55488 55<br>
                        <strong>Email:</strong> info@example.com<br>
                    </p>
                </div>

                <div class="col-lg-3 col-md-6 footer-links">
                    <h4>Useful Links</h4>
                    <ul>
                        <li><i class="bx bx-chevron-right"></i> <a href="#">Home</a></li>
                        <li><i class="bx bx-chevron-right"></i> <a href="#">About us</a></li>
                        <li><i class="bx bx-chevron-right"></i> <a href="#">Services</a></li>
                        <li><i class="bx bx-chevron-right"></i> <a href="#">Terms of service</a></li>
                        <li><i class="bx bx-chevron-right"></i> <a href="#">Privacy policy</a></li>
                    </ul>
                </div>

                <div class="col-lg-3 col-md-6 footer-links">
                    <h4>Our Services</h4>
                    <ul>
                        <li><i class="bx bx-chevron-right"></i> <a href="#">Web Design</a></li>
                        <li><i class="bx bx-chevron-right"></i> <a href="#">Web Development</a></li>
                        <li><i class="bx bx-chevron-right"></i> <a href="#">Product Management</a></li>
                        <li><i class="bx bx-chevron-right"></i> <a href="#">Marketing</a></li>
                        <li><i class="bx bx-chevron-right"></i> <a href="#">Graphic Design</a></li>
                    </ul>
                </div>

                <div class="col-lg-3 col-md-6 footer-links">
                    <h4>Our Social Networks</h4>
                    <p>Cras fermentum odio eu feugiat lide par naso tierra videa magna derita valies</p>
                    <div class="social-links mt-3">
                        <a href="#" class="twitter"><i class="bx bxl-twitter"></i></a>
                        <a href="#" class="facebook"><i class="bx bxl-facebook"></i></a>
                        <a href="#" class="instagram"><i class="bx bxl-instagram"></i></a>
                        <a href="#" class="google-plus"><i class="bx bxl-skype"></i></a>
                        <a href="#" class="linkedin"><i class="bx bxl-linkedin"></i></a>
                    </div>
                </div>

            </div>
        </div>
    </div>

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
<script src="<?= base_url('assets/')?>/vendor/jquery/jquery.min.js"></script>
<script src="<?= base_url('assets/')?>/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="<?= base_url('assets/')?>/vendor/jquery.easing/jquery.easing.min.js"></script>
<script src="<?= base_url('assets/')?>/vendor/php-email-form/validate.js"></script>
<script src="<?= base_url('assets/')?>/vendor/waypoints/jquery.waypoints.min.js"></script>
<script src="<?= base_url('assets/')?>/vendor/counterup/counterup.min.js"></script>
<script src="<?= base_url('assets/')?>/vendor/owl.carousel/owl.carousel.min.js"></script>
<script src="<?= base_url('assets/')?>/vendor/isotope-layout/isotope.pkgd.min.js"></script>
<script src="<?= base_url('assets/')?>/vendor/venobox/venobox.min.js"></script>
<script src="<?= base_url('assets/')?>/vendor/aos/aos.js"></script>

<!-- Template Main JS File -->
<script src="<?= base_url('assets/')?>/js/main.js"></script>

</body>

</html>