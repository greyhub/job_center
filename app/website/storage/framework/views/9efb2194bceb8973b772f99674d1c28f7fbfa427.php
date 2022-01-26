<?php $__env->startSection('content'); ?>
<main>
    <div class="slider-area ">
        <div class="single-slider section-overly slider-height2 d-flex align-items-center" data-background="<?php echo e(asset('assets/img/hero/about.jpg')); ?>">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="hero-cap text-center">
                            <h2>Tìm kiếm việc làm theo từ khóa "<?php echo e($search); ?>"</h2>
                            <?php if(isset($city)): ?>
                            <h4>Thành phố <?php echo e($city->name); ?></h4>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="job-listing-area pt-120 pb-120">
        <div class="container">
            <div class="row">
                <div class="col-xl-3 col-lg-3 col-md-4">
                    <div class="row">
                        <div class="col-12">
                            <div class="small-section-tittle2 mb-45">
                                <div class="ion"> <svg
                                    xmlns="http://www.w3.org/2000/svg"
                                    xmlns:xlink="http://www.w3.org/1999/xlink"
                                    width="20px" height="12px">
                                    <path fill-rule="evenodd"  fill="rgb(27, 207, 107)"
                                        d="M7.778,12.000 L12.222,12.000 L12.222,10.000 L7.778,10.000 L7.778,12.000 ZM-0.000,-0.000 L-0.000,2.000 L20.000,2.000 L20.000,-0.000 L-0.000,-0.000 ZM3.333,7.000 L16.667,7.000 L16.667,5.000 L3.333,5.000 L3.333,7.000 Z"/>
                                    </svg>
                                </div>
                                <h4>Lọc việc làm</h4>
                            </div>
                        </div>
                    </div>
                    <div class="job-category-listing mb-50">
                        <form action="<?php echo e(route('search')); ?>" method="GET">
                            <div class="single-listing">
                                <div class="small-section-tittle2">
                                </div>
                                <div class="small-section-tittle2">
                                    <h4>Sắp xếp</h4>
                                </div>
                                <div class="select-job-items">
                                    <select name="sort_job" defaultValue="1" value = "<?php echo e($sort_job); ?>">
                                        <option value="" >Sắp xếp</option>
                                        <option value="1">Tên A-Z</option>
                                        <option value="2">Tên Z-A</option>
                                        <option value="3">Lương tăng</option>
                                        <option value="4">Lương giảm</option>
                                    </select>
                                </div>
                            </div>
                            <div class="single-listing">
                                <div class="small-section-tittle2">
                                    <input type="submit" value="Lọc" class="btn btn-primary py-3 px-5 search">
                                </div>
                            </div>
                        </form>
                    </div>
                    <!-- Job Category Listing End -->
                </div>
                <!-- Right content -->
                <div class="col-xl-9 col-lg-9 col-md-8">
                    <!-- Featured_job_start -->
                    <section class="featured-job-area">
                        <div class="container">
                            <!-- Count of Job list Start -->
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="count-job mb-35">
                                        <span><?php echo e($jobs->count()); ?> việc làm được tìm thấy</span>
                                        <!-- Select job items start -->
                                        <!--  Select job items End-->
                                    </div>
                                </div>
                            </div>
                            <!-- Count of Job list End -->
                            <!-- single-job-content -->
                            <?php $__currentLoopData = $jobs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $job): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="single-job-items mb-30">
                                <div class="job-items">
                                    <div class="company-img">
                                        <a href="<?php echo e(route('job-show', ['slug' => $job->slug])); ?>"><img src="assets/img/icon/job-list1.png" alt=""></a>
                                    </div>
                                    <div class="job-tittle">
                                        <a href="<?php echo e(route('job-show', ['slug' => $job->slug])); ?>"><h4><?php echo e($job->title); ?></h4></a>
                                        <ul>
                                            <li><?php echo e(str_replace('"', ' ', str_replace('["', ' ', str_replace('"]', ' ', $job->sector)))); ?></li>
                                            <li><i class="fas fa-map-marker-alt"></i><?php echo e($job->city->name); ?></li>
                                            <li><?php echo e($job->salary); ?></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="items-link f-right">
                                    <a href="<?php echo e(route('job-show', ['slug' => $job->slug])); ?>">Xem chi tiết</a>
                                    <span><?php echo e(str_replace(' 00:00:00', "", $job->update_time)); ?></span>
                                </div>
                            </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <!-- single-job-content -->
                        </div>
                    </section>
                    <!-- Featured_job_end -->
                    <div class="pagination-area pb-115 text-center">
                        <div class="container">
                            <div class="row">
                                <div class="col-xl-12">
                                    <div class="single-wrap d-flex justify-content-center">
                                        <nav aria-label="Page navigation example">
                                            <ul class="pagination justify-content-start">
                                                <?php echo e($jobs->appends(Request::all())->links()); ?>

                                            </ul>
                                        </nav>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--Pagination End  -->
</main>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/dinhmanh/Desktop/Project3_Job/resources/views/search.blade.php ENDPATH**/ ?>