<?php $__env->startSection('content'); ?>
<main>
    <!-- Hero Area Start-->
    <div class="slider-area ">
        <div class="single-slider section-overly slider-height2 d-flex align-items-center" data-background="<?php echo e(asset('assets/img/hero/about.jpg')); ?>">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="hero-cap text-center">
                            <h2><?php echo e($job->title); ?></h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Hero Area End -->
    <!-- job post company Start -->
    <div class="job-post-company pt-120 pb-120">
        <div class="container">
            <div class="row justify-content-between">
                <!-- Left Content -->
                <div class="col-xl-7 col-lg-8">
                    <!-- job single -->
                    <div class="single-job-items mb-50">
                        <div class="job-items">
                            <div class="company-img company-img-details">
                                <a href="<?php echo e(route('job-show', ['slug' => $job->slug])); ?>"><img src="<?php echo e($job->image_url); ?>" width="100" height="100" alt=""></a>
                            </div>
                            <div class="job-tittle">
                                <a href="<?php echo e(route('job-show', ['slug' => $job->slug])); ?>">
                                    <h4><?php echo e($job->title); ?></h4>
                                </a>
                                <ul>
                                    <li><?php echo e(str_replace('"', ' ', str_replace('["', ' ', str_replace('"]', ' ', $job->sector)))); ?></li>
                                    <li><i class="fas fa-map-marker-alt"></i><?php echo e($job->city->name); ?></li>
                                    <li><?php echo e($job->salary); ?></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <!-- job single End -->
                    <div class="job-post-details">
                        <div class="post-details1 mb-50">
                            <!-- Small Section Tittle -->
                            <div class="small-section-tittle">
                                <h4>Mô tả chi tiết</h4>
                            </div>
                            <p><?php echo str_replace("\\r\\n", '', str_replace('"', ' ', str_replace('["', ' ', str_replace('"]', ' ', $job->description)))); ?></p>
                        </div>
                        <div class="post-details2  mb-50">
                            <!-- Small Section Tittle -->
                            <div class="small-section-tittle">
                                <h4>Yêu cầu </h4>
                            </div>
                            <p><?php echo str_replace("\\r\\n", '', str_replace('"', ' ', str_replace('["', ' ', str_replace('"]', ' ', $job->requirements)))); ?></p>
                        </div>
                        <div class="post-details2  mb-50">
                            <!-- Small Section Tittle -->
                            <div class="small-section-tittle">
                                <h4>Quyền lợi</h4>
                            </div>
                            <p><?php echo str_replace("\\r\\n", '', str_replace('"', ' ', str_replace('["', ' ', str_replace('"]', ' ', $job->benefits)))); ?></p>
                        </div>
                        <div class="post-details2  mb-50">
                            <!-- Small Section Tittle -->
                            <div class="small-section-tittle">
                                <h4>Kỹ năng</h4>
                            </div>
                            <p><?php echo str_replace("\\r\\n", '', str_replace('"', ' ', str_replace('["', ' ', str_replace('"]', ' ', $job->skills)))); ?></p>
                        </div>
                        <div class="post-details2  mb-50">
                            <!-- Small Section Tittle -->
                            <div class="small-section-tittle">
                                <h4>Thông tin khác</h4>
                            </div>
                            <p><?php echo str_replace("\\r\\n", '', str_replace("'", ' ', str_replace("['", ' ', str_replace("']", ' ', $job->other_info)))); ?></p>
                        </div>
                        <?php if($job->url1 != ''): ?>
                        <div class="apply-btn2">
                            <a href="<?php echo e($job->url1); ?>" class="btn">TimViecNhanh</a>
                        </div>
                        <?php endif; ?>
                        <?php if($job->url2 != ''): ?>
                        <div class="apply-btn2">
                            <a href="<?php echo e($job->url2); ?>" class="btn">CareerBuilder  </a>
                        </div>
                        <?php endif; ?>
                        <?php if($job->url3 != ''): ?>
                        <div class="apply-btn2">
                            <a href="<?php echo e($job->url3); ?>" class="btn">TimViecNhanh</a>
                        </div>
                        <?php endif; ?>
                        <?php if($job->url4 != ''): ?>
                        <div class="apply-btn2">
                            <a href="<?php echo e($job->url4); ?>" class="btn">Apply Now</a>
                        </div>
                        <?php endif; ?>
                    </div>
                </div>
                <!-- Right Content -->
                <div class="col-xl-4 col-lg-4">
                    <div class="post-details3  mb-50">
                        <!-- Small Section Tittle -->
                        <div class="small-section-tittle">
                            <h4>Thông tin việc làm</h4>
                        </div>
                        <ul>
                            <li>Ngày đăng<span><?php echo e($job->application_deadline); ?></span></li>
                            <li>Thành phố : <span><?php echo e($job->application_deadline); ?></span></li>
                            <li>Nhu cầu : <span><?php echo e($job->number_available); ?></span></li>
                            <li>Cấp bậc : <span><?php echo e($job->level); ?></span></li>
                            <li>Kinh nghiệm : <span><?php echo e($job->experience_years); ?></span></li>
                            <li>Lương :  <span><?php echo e($job->salary); ?></span></li>
                            <li>Hạn nộp cv : <span><?php echo e($job->application_deadline); ?></span></li>
                            <li>Giới tính : <span><?php echo e($job->required_gender_specific); ?></span></li>
                            <li>Tuổi : <span><?php echo e($job->required_age_specific); ?></span></li>
                            <li>Đặc tính : <span><?php echo e($job->attributes); ?></span></li>
                            <li>Thời gian thử việc : <span><?php echo e($job->trial_period); ?></span></li>
                            <li>Hình thức : <span><?php echo e($job->formality); ?></span></li>
                        </ul>

                    </div>
                    <div class="post-details4  mb-50">
                        <!-- Small Section Tittle -->
                        <div class="small-section-tittle">
                            <h4>Thông tin công ty</h4>
                        </div>
                        <span><?php echo e($job->company_name); ?></span>
                        <p><?php echo e($job->company_info); ?></p>
                        <ul>
                            <li>Địa chỉ: <span><?php echo e($job->company_address); ?></span></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- job post company End -->
</main>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/dinhmanh/Desktop/Project3_Job/resources/views/job_show.blade.php ENDPATH**/ ?>