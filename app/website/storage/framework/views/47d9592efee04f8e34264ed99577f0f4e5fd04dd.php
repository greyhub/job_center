<!DOCTYPE html>
<html lang="en">
    <head>
        <title><?php echo e(trans('message.title')); ?></title>
        <link rel="stylesheet" type="text/css" href="<?php echo e(asset('css/app.css')); ?>">
        <link rel="stylesheet" type="text/css" href="<?php echo e(asset('bower_components/bootstrap/dist/css/bootstrap.min.css')); ?>">
        <link rel="stylesheet" type="text/css" href="<?php echo e(asset('bower_components/lato-font/index')); ?>">
        <link rel="stylesheet" type="text/css" href="<?php echo e(asset('bower_components/Font-Awesome/css/all.min.css')); ?>">
    </head>
    <body>
        <div class="container">
            <nav class="navbar navbar-default">
                <div class="panel-heading">
                    <a class="btn btn-success active" href="<?php echo e(route('tasks.index')); ?>"><?php echo e(trans('message.task_list')); ?></a>
                    <a class="btn btn-danger active" href="<?php echo e(route('users.index')); ?>"><?php echo e(trans('message.user_list')); ?></a>
                </div>
                <div class="nav navbar-right" id="lang">
                    <a class="btn btn-success active" href="<?php echo e(route('lang', 'vi')); ?>"><?php echo e(trans('message.vietnamese')); ?></a>
                    <a class="btn btn-danger active" href="<?php echo e(route('lang', 'en')); ?>"><?php echo e(trans('message.english')); ?></a>
                </div>
            </nav>
        </div>

        <?php echo $__env->yieldContent('content'); ?>
    </body>
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('bower_components/jquery/dist/jquery.min.js')); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('bower_components/bootstrap/dist/js/bootstrap.min.js')); ?>">
</html>
<?php /**PATH /home/dinhmanh/laravel_quicktask/resources/views/layouts/app.blade.php ENDPATH**/ ?>