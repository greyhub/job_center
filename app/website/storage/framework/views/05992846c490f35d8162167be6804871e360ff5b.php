<!DOCTYPE html>
<html class="no-js" lang="zxx">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>Job Project 3 </title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="manifest" href="site.webmanifest">
        <link rel="shortcut icon" type="image/x-icon" href="<?php echo e(asset('assets/img/favicon.ico')); ?>">
        <link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/css/bootstrap.min.css')); ?>">
        <link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/css/owl.carousel.min.css')); ?>">
        <link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/css/flaticon.css')); ?>">
        <link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/css/price_rangs.css')); ?>">
        <link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/css/slicknav.css')); ?>">
        <link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/css/animate.min.css')); ?>">
        <link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/css/magnific-popup.css')); ?>">
        <link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/css/fontawesome-all.min.css')); ?>">
        <link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/css/themify-icons.css')); ?>">
        <link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/css/slick.css')); ?>">
        <link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/css/nice-select.css')); ?>">
        <link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/css/style.css')); ?>">
    </head>
    <body>
        <!-- Preloader Start -->
        <div id="preloader-active">
            <div class="preloader d-flex align-items-center justify-content-center">
                <div class="preloader-inner position-relative">
                    <div class="preloader-circle"></div>
                    <div class="preloader-img pere-text">
                        <h2> Job </h2>
                    </div>
                </div>
            </div>
        </div>
        <!-- Preloader Start -->
        <header>
            <!-- Header Start -->
            <div class="header-area header-transparrent">
                <div class="headder-top header-sticky">
                    <div class="container">
                        <div class="row align-items-center">
                            <div class="col-lg-3 col-md-2">
                                <!-- Logo -->
                                <div class="logo">
                                    <a href="<?php echo e(route('home')); ?>"><h2><strong> Job Project 3</strong></h2></a>
                                </div>
                            </div>
                            <div class="col-lg-9 col-md-9">
                                <div class="menu-wrapper">
                                    <!-- Main-menu -->
                                    <div class="main-menu">
                                        <nav class="d-none d-lg-block">
                                            <ul id="navigation">
                                                <li><a href="<?php echo e(route('home')); ?>">Trang chủ</a></li>
                                                <li><a href="<?php echo e(route('job-index')); ?>">Danh sách việc làm</a></li>
                                                <li><a href="<?php echo e(route('about')); ?>">Về chúng tôi</a></li>
                                                <li><a href="<?php echo e(route('contact')); ?>">Liên hệ </a></li>
                                            </ul>
                                        </nav>
                                    </div>
                                    <!-- Header-btn -->
                                </div>
                            </div>
                            <!-- Mobile Menu -->
                            <div class="col-12">
                                <div class="mobile_menu d-block d-lg-none"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Header End -->
        </header>
        <?php echo $__env->yieldContent('content'); ?>
    </html>
    <footer>
        <!-- Footer Start-->
        <div class="footer-area footer-bg footer-padding">
            <div class="container">
                <div class="row d-flex justify-content-between">
                    <div class="col-xl-3 col-lg-3 col-md-4 col-sm-6">
                        <div class="single-footer-caption mb-50">
                            <div class="single-footer-caption mb-30">
                                <div class="footer-tittle">
                                    <h4>Về chúng tôi</h4>
                                    <div class="footer-pera">
                                        <p>Trang web thông tin tổng hợp việc làm</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-3 col-md-4 col-sm-5">
                        <div class="single-footer-caption mb-50">
                            <div class="footer-tittle">
                                <h4>Contact Info</h4>
                                <ul>
                                    <li>
                                        <p>Address : BKHN</p>
                                    </li>
                                    <li><a href="#">Phone : +123456</a></li>
                                    <li><a href="#">Email : info@gmail.com</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-3 col-md-4 col-sm-5">
                        <div class="single-footer-caption mb-50">
                            <div class="footer-tittle">
                                <h4>Important Link</h4>
                                <ul>
                                    <li><a href="#">Tất cả việc làm</a></li>
                                    <li><a href="#">Contact Us</a></li>
                                    <li><a href="#">About</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <!--  -->
            </div>
        </div>
        <!-- footer-bottom area -->
        <!-- Footer End-->
    </footer>
    <script src="<?php echo e(asset('assets/js/vendor/modernizr-3.5.0.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/js/vendor/jquery-1.12.4.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/js/popper.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/js/bootstrap.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/js/jquery.slicknav.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/js/owl.carousel.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/js/slick.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/js/price_rangs.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/js/wow.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/js/animated.headline.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/js/jquery.magnific-popup.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/js/jquery.scrollUp.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/js/jquery.nice-select.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/js/jquery.sticky.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/js/contact.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/js/jquery.form.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/js/jquery.validate.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/js/mail-script.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/js/jquery.ajaxchimp.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/js/plugins.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/js/main.js')); ?>"></script>
</body>
</html>
<?php /**PATH /home/dinhmanh/Desktop/Project3_Job (copy)/resources/views/layouts/app.blade.php ENDPATH**/ ?>