<?php $__env->startSection('content'); ?>
<main>
    <div class="slider-area ">
        <div class="slider-active">
            <div class="single-slider slider-height d-flex align-items-center" data-background="assets/img/hero/h1_hero.jpg">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-6 col-lg-9 col-md-10">
                            <div class="hero__caption">
                                <h1>Hãy tìm việc làm tốt nhất cho bạn</h1>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xl-8">
                            <form action="<?php echo e(route('search')); ?>" method="GET" class="search-box">
                                <?php echo csrf_field(); ?>
                                <div class="input-form">
                                    <input type="text" name = "search" placeholder="Tìm kiếm theo tên, công ty, địa chỉ">
                                </div>
                                <div class="select-form">
                                    <div class="select-itms">
                                        <select name="city" id="select1">
                                            <option value="">Thành phố</option>
                                            <?php $__currentLoopData = $cities; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $city): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($city->slug); ?>"><?php echo e($city->name); ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="search-form">
                                    <button type="submit" class="search-submit btn btn-primary">Tìm kiếm</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="our-services section-pad-t30">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-tittle text-center">
                        <span>Danh sách việc làm</span>
                        <h2>Theo các thành phố</h2>
                    </div>
                </div>
            </div>
            <div class="row d-flex justify-contnet-center">
                <?php $__currentLoopData = $cities; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $city): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="col-xl-3 col-lg-3 col-md-4 col-sm-6">
                    <div class="single-services text-center mb-30">
                        <div class="services-ion">
                            <span class="flaticon-tour"></span>
                        </div>
                        <div class="services-cap">
                            <h5><a href="<?php echo e(route('city', ['slug' => $city->slug])); ?> "><?php echo e($city->name); ?></a></h5>
                            <span>(<?php echo e($city->jobs->count()); ?>)</span>
                        </div>
                    </div>
                </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="browse-btn2 text-center mt-50">
                        <a href="<?php echo e(route('job-index')); ?>" class="border-btn2">Tất cả các việc làm </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <section class="featured-job-area ">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-tittle text-center">
                        <span>Các việc làm gần đây</span>
                        <h2>Việc làm mới</h2>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-xl-10">
                    <?php $__currentLoopData = $jobs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $job): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="single-job-items mb-30">
                        <div class="job-items">
                            <div class="company-img">
                                <a href="<?php echo e(route('job-show', ['slug' => $job->slug])); ?>"><img src="assets/img/icon/job-list1.png" alt=""></a>
                            </div>
                            <div class="job-tittle">
                                <a href="<?php echo e(route('job-show', ['slug' => $job->slug])); ?>"><h5><?php echo e($job->title); ?></h5></a>
                                <ul>
                                    <li><?php echo e(str_replace('"]', '', str_replace('["', '', $job->sector))); ?></li>
                                    <li><i class="fas fa-map-marker-alt"></i><?php echo e($job->city->name); ?></li>                                    <li><?php echo e($job->salary); ?></li>
                                </ul>
                            </div>
                        </div>
                        <div class="items-link f-right">
                            <a href="<?php echo e(route('job-show', ['slug' => $job->slug])); ?>">Xem chi tiết</a>
                            <span><?php echo e(str_replace(' 00:00:00', "", $job->update_time)); ?></span>
                        </div>
                    </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>
        </div>
    </section>
</main>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/dinhmanh/Desktop/Project3_Job/resources/views/common/home.blade.php ENDPATH**/ ?>