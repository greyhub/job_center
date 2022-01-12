<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <title>JOB TKHTTT - Admin</title>
        <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    <link rel="shortcut icon" type="image/x-icon" href="<?php echo e(asset('assets/img/favicon.ico')); ?>">
        <!-- Stylesheets-->
        <link href="<?php echo e(asset('adminas/css/styles.css')); ?>" rel="stylesheet" type="text/css" media="all" />
        <link href="<?php echo e(asset('adminas/css/main.css')); ?>" rel="stylesheet" type="text/css" media="all" />
        <link href="<?php echo e(asset('adminas/css/dataTables.bootstrap4.min.css')); ?>" rel="stylesheet" type="text/css" media="all" crossorigin="anonymous"/>
        <link href="<?php echo e(asset('adminas/css/sweet-alert.css')); ?>" rel="stylesheet" type="text/css" media="all" />
        <link href="<?php echo e(asset('adminas/css/sweetalert2.css')); ?>" rel="stylesheet" type="text/css" media="all" />


        <script src="<?php echo e(asset('adminas/js/all.min.js')); ?>"></script>
        <script src="<?php echo e(asset('adminas/js/sweetalert2.js')); ?>"></script>
        <script src="<?php echo e(asset('adminas/js/sweet-alert.min.js')); ?>"></script>

    </head>
    <body class="sb-nav-fixed">
        <?php echo $__env->make('layouts.header_admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <div id="layoutSidenav">
            <?php echo $__env->make('layouts.sidebar_admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <div id="layoutSidenav_content">
                <?php echo $__env->yieldContent('main_content'); ?>
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted"></div>
                            <div>
                                <a href="#"></a>
                                &middot;
                            </div>
                            <div>
                                <a href="#"></a>
                                &middot;
                            </div>
                            <div>
                                <a href="#"></a>
                                &middot;
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
            <div id="go-top">
            <a href="#go-top"><i class="fa fa-angle-up"></i></a>
        </div>
        </div>
        <script src="<?php echo e(asset('adminas/js/jquery-3.5.1.min.js')); ?>"></script>
        <script src="<?php echo e(asset('adminas/js/bootstrap.bundle.min.js')); ?>"></script>
        <script src="<?php echo e(asset('adminas/js/scripts.js')); ?>"></script>
        <script src="<?php echo e(asset('adminas/js/Chart.min.js')); ?>"></script>
        <script src="<?php echo e(asset('adminas/js/chart-area-demo.js')); ?>"></script>
        <script src="<?php echo e(asset('adminas/js/chart-bar-demo.js')); ?>"></script>
        <script src="<?php echo e(asset('adminas/js/cjquery.dataTables.min.js')); ?>"></script>
        <script src="<?php echo e(asset('adminas/js/dataTables.bootstrap4.min.js')); ?>"></script>
        <script src="<?php echo e(asset('adminas/js/datatables-demo.js')); ?>"></script>
        <script src="<?php echo e(asset('adminas/js/main.js')); ?>"></script>
    </body>
</html>
<?php /**PATH /home/dinhmanh/Desktop/JOB_TKHTTT/resources/views/layouts/admin.blade.php ENDPATH**/ ?>