<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Nhóm 9 Travel Hotles</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" type="text/css" href="<?php echo e(asset('css/open-iconic-bootstrap.min.css')); ?>">
        <link rel="stylesheet" type="text/css" href="<?php echo e(asset('css/animate.css')); ?>">
        <link rel="stylesheet" type="text/css" href="<?php echo e(asset('css/owl.carousel.min.css')); ?>">
        <link rel="stylesheet" type="text/css" href="<?php echo e(asset('css/css/owl.theme.default.min.css')); ?>">
        <link rel="stylesheet" type="text/css" href="<?php echo e(asset('css/magnific-popup.css')); ?>">
        <link rel="stylesheet" type="text/css" href="<?php echo e(asset('css/aos.css')); ?>">
        <link rel="stylesheet" type="text/css" href="<?php echo e(asset('css/ionicons.min.css')); ?>">
        <link rel="stylesheet" type="text/css" href="<?php echo e(asset('css/bootstrap-datepicker.css')); ?>">
        <link rel="stylesheet" type="text/css" href="<?php echo e(asset('css/jquery.timepicker.css')); ?>">
        <link rel="stylesheet" type="text/css" href="<?php echo e(asset('css/flaticon.css')); ?>">
        <link rel="stylesheet" type="text/css" href="<?php echo e(asset('css/icomoon.css')); ?>">
        <link rel="stylesheet" type="text/css" href="<?php echo e(asset('css/style.css')); ?>">
        <link rel="stylesheet" type="text/css" href="<?php echo e(asset('css/app.css')); ?>">

        <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Alex+Brush" rel="stylesheet">
    </head>
    <body>
        <nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
            <div class="container">
                <a class="navbar-brand" href="<?php echo e(route('home')); ?>">Travel Hotels</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="oi oi-menu"></span> Menu
                </button>
                <div class="collapse navbar-collapse" id="ftco-nav">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item active"><a href="<?php echo e(route('home')); ?>" class="nav-link">Trang chủ </a></li>
                        <li class="nav-item"><a href="<?php echo e(route('about')); ?>" class="nav-link">Về chúng tôi</a></li>
                        <li class="nav-item"><a href="<?php echo e(route('hotel-index')); ?>" class="nav-link">Khách sạn</a></li>
                        <li class="nav-item"><a href="<?php echo e(route('contact')); ?>" class="nav-link">Liên lạc</a></li>
                        <li class="nav-item cta"><a href="<?php echo e(route('contact')); ?>" class="nav-link"><span>Luôn luôn lắng nghe</span></a></li>
                    </ul>
                </div>
            </div>
        </nav>
        <!-- END nav -->
        <?php echo $__env->yieldContent('content'); ?>
        <footer class="ftco-footer ftco-bg-dark ftco-section footer1">
            <div class="container ">
                <div class="row mb-5">
                    <div class="col-md">
                        <div class="ftco-footer-widget mb-4">
                            <h2 class="ftco-heading-2">Travel Hotels</h2>
                            <ul class="ftco-footer-social list-unstyled float-md-left float-lft mt-5">
                                <li class="ftco-animate"><a href="#"><span class="icon-twitter"></span></a></li>
                                <li class="ftco-animate"><a href="#"><span class="icon-facebook"></span></a></li>
                                <li class="ftco-animate"><a href="#"><span class="icon-instagram"></span></a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md">
                        <div class="ftco-footer-widget mb-4 ml-md-5">
                            <h2 class="ftco-heading-2">Thông tin</h2>
                            <ul class="list-unstyled">
                                <li><a href="#" class="py-2 d-block">Về chúng tôi</a></li>
                                <li><a href="#" class="py-2 d-block">Dịch vụ</a></li>
                                <li><a href="#" class="py-2 d-block">Điều khoản</a></li>
                                <li><a href="#" class="py-2 d-block">Giá tốt nhất</a></li>
                                <li><a href="#" class="py-2 d-block">Chính sách và bảo mật</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md">
                        <div class="ftco-footer-widget mb-4">
                            <h2 class="ftco-heading-2">Chăm sóc khách hàng</h2>
                            <ul class="list-unstyled">
                                <li><a href="#" class="py-2 d-block">FAQ</a></li>
                                <li><a href="#" class="py-2 d-block">Mẹo book khách sạn</a></li>
                                <li><a href="#" class="py-2 d-block">Liên hệ với chúng tôi</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md">
                        <div class="ftco-footer-widget mb-4">
                            <h2 class="ftco-heading-2">Bạn có câu hỏi?</h2>
                            <div class="block-23 mb-3">
                                <ul>
                                    <li><span class="icon icon-map-marker"></span><span class="text">Nhóm 9 Đại học Bách khoa Hà Nội</span></li>
                                    <li><a href="#"><span class="icon icon-phone"></span><span class="text">+84 123 444555</span></a></li>
                                    <li><a href="#"><span class="icon icon-envelope"></span><span class="text">info@bkhn.com</span></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
        <!-- loader -->
        <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>
        <script src="<?php echo e(asset('js/jquery.min.js')); ?>"></script>
        <script src="<?php echo e(asset('js/jquery-migrate-3.0.1.min.js')); ?>"></script>
        <script src="<?php echo e(asset('js/popper.min.js')); ?>"></script>
        <script src="<?php echo e(asset('js/bootstrap.min.js')); ?>"></script>
        <script src="<?php echo e(asset('js/jquery.easing.1.3.js')); ?>"></script>
        <script src="<?php echo e(asset('js/jquery.waypoints.min.js')); ?>"></script>
        <script src="<?php echo e(asset('js/jquery.stellar.min.js')); ?>"></script>
        <script src="<?php echo e(asset('js/owl.carousel.min.js')); ?>"></script>
        <script src="<?php echo e(asset('js/jquery.magnific-popup.min.js')); ?>"></script>
        <script src="<?php echo e(asset('js/aos.js')); ?>"></script>
        <script src="<?php echo e(asset('js/jquery.animateNumber.min.js')); ?>"></script>
        <script src="<?php echo e(asset('js/bootstrap-datepicker.js')); ?>"></script>
        <script src="<?php echo e(asset('js/jquery.timepicker.min.js')); ?>"></script>
        <script src="<?php echo e(asset('js/scrollax.min.js')); ?>"></script>
        <script src="<?php echo e(asset('js/google-map.js')); ?>"></script>
        <script src="<?php echo e(asset('js/main.js')); ?>"></script>
        <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
    </body>
</html>
<?php /**PATH /home/dinhmanh/Desktop/booking (copy)/resources/views/layouts/app.blade.php ENDPATH**/ ?>