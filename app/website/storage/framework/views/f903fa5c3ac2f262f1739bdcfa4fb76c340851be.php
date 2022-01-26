<?php $__env->startSection('content'); ?>
<div class="hero-wrap js-fullheight hotel" style="background-image: url(https://wallpaperaccess.com/full/30219.jpg);">
</div>
<section class="ftco-section ftco-degree-bg">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 sidebar">
                <div class="sidebar-wrap bg-light ftco-animate">
                    <h3 class="heading mb-4">Tìm kiếm khách sạn</h3>
                    <form action="<?php echo e(route('search')); ?>" method="GET">
                        <div id='css1' class="fields">
                            <div class="form-group">
                                <input type="text" name="search" class="form-control" placeholder="Từ khóa">
                            </div>
                            <div class="form-group">
                                <div class="select-wrap one-third">
                                    <div class="icon"><span class="ion-ios-arrow-down"></span></div>
                                    <select name="city" id="" class="form-control" placeholder="Keyword search">
                                        <option value="">Nơi đến</option>
                                        <?php $__currentLoopData = $cities; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $city1): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($city1->slug); ?>"><?php echo e($city1->name); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <input type="submit" value="Tìm kiếm" class="btn btn-primary py-3 px-5 search">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        <div class="col-lg-9">
            <div class="row">
                <div class="col-md-12 ftco-animate">
                    <div class="single-slider owl-carousel">
                        <div class="item">
                            <div class="hotel-img" style="background-image: url(<?php echo e($hotel->img_url1); ?>);"></div>
                        </div>
                        <div class="item">
                            <div class="hotel-img" style="background-image: url(<?php echo e($hotel->img_url2); ?>);"></div>
                        </div>
                        <div class="item">
                            <div class="hotel-img" style="background-image: url(<?php echo e($hotel->img_url3); ?>);"></div>
                        </div>
                    </div>
                </div>
                <div class="col-md-12 hotel-single mt-4 mb-5 ftco-animate">
                    <span>Hotel in <?php echo e($hotel->city->name); ?></span>
                    <h2><?php echo e($hotel->name); ?></h2>
                    <h4 class='hotel'><?php echo e(number_format($hotel->price, 0, '', ',')); ?> VND</h4>
                    <p class="rate mb-5">
                        <?php if($hotel->stars!= -1): ?>
                        <span class="star"><?php echo e($hotel->stars); ?> Stars</span>
                        <?php endif; ?>
                        <?php if($hotel->rating != -1): ?>
                        <span class="star"><?php echo e($hotel->rating); ?> Rating</span>
                        <?php endif; ?>
                        <span class="star">Xếp hạng: <?php echo e($hotel->rank); ?> </span>
                        <span class="loc"><a href="#"><i class="icon-map"></i> <?php echo e($hotel->address); ?></a></span>
                    </p>
                    <h3>Mô tả khách sạn</h3>
                    <p><?php echo e($hotel->description); ?></p>
                    <span><strong>Check in:</strong> <?php echo e($hotel->check_in); ?></span>
                    <span><strong>Check out:</strong> <?php echo e($hotel->check_out); ?></span>
                    <h3>Địa điểm gần nổi bật</h3>
                    <p><?php echo e($hotel->nearby_places); ?></p>
                    <h3>Tiện ích khách sạn</h3>
                    <p><?php echo e($hotel->facilities); ?></p>
                    <h3>Liên kết</h3>
                    <div id='nha1' class="row no-gutters slider-text align-items-center justify-content-start" data-scrollax-parent="true">
                        <div class="col-md-9 ftco-animate" data-scrollax=" properties: { translateY: '70%' }">
                            <p class="browse d-md-flex">
                                <?php if($hotel->url1 != ' '): ?>
                                <span class="d-flex justify-content-md-center align-items-md-center"><a href="<?php echo e($hotel->url1); ?>" target="_blank"><i class="flaticon-meeting-point"></i><strong>Booking.com</strong>  -  <?php echo e(number_format($hotel->price1, 0, '', ',')); ?> VND</a></span>
                                <?php endif; ?>
                                <?php if($hotel->url2 != ' '): ?>
                                <span class="d-flex justify-content-md-center align-items-md-center"><a href="<?php echo e($hotel->url2); ?>" target="_blank"><i class="flaticon-hotel"></i><strong>Agoda.com</strong>  -  <?php echo e(number_format($hotel->price2, 0, '', ',')); ?> VND</a></span>
                                <?php endif; ?>
                                <?php if($hotel->url3 != ' '): ?>
                                <span class="d-flex justify-content-md-center align-items-md-center"><a href="<?php echo e($hotel->url3); ?>" target="_blank"><i class="flaticon-meeting-point"></i><strong>Ebooking.com</strong>  -  <?php echo e(number_format($hotel->price3, 0, '', ',')); ?> VND</a></span>
                                <?php endif; ?>
                                <?php if($hotel->url4 != ' '): ?>
                                <span class="d-flex justify-content-md-center align-items-md-center"><a href="<?php echo e($hotel->url4); ?>" target="_blank"><i class="flaticon-hotel"></i><strong>Expedia.com.vn</strong>  -  <?php echo e(number_format($hotel->price4, 0, '', ',')); ?> VND</a></span>
                                <?php endif; ?>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-12 hotel-single ftco-animate mb-5 mt-5">
                    <h4 class="mb-4">Related Hotels</h4>
                    <div class="row">
                        <?php $__currentLoopData = $relatedHotels; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $relatedHotel): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="col-md-4">
                            <div class="destination">
                                <a href="<?php echo e(route('hotel-show', ['slug' => $relatedHotel->slug])); ?>" class="img img-2" style="background-image: url(<?php echo e($relatedHotel->img_url1); ?>);" target="_blank"></a>
                                <div class="text p-3">
                                    <div class="d-flex">
                                        <div class="one">
                                            <h3><a href="<?php echo e(route('hotel-show', ['slug' => $relatedHotel->slug])); ?>" target="_blank"><?php echo e($relatedHotel->name); ?></a></h3>
                                            <p class="rate">
                                                <?php if($relatedHotel->stars != -1): ?>
                                            <span><?php echo e($relatedHotel->stars); ?> Stars</span>
                                            <?php endif; ?>
                                            <?php if($relatedHotel->rating != -1): ?>
                                            <span><?php echo e($relatedHotel->rating); ?> Rating</span>
                                            <?php endif; ?>
                                            <span>Rank <?php echo e($relatedHotel->rank); ?></span>
                                            </p>
                                        </div>
                                        <div class="two">
                                            <span class="price"><?php echo e(number_format($relatedHotel->price, 0, '', ',')); ?>  VND</span>
                                        </div>
                                    </div>
                                    <p><?php echo e($relatedHotel->address); ?></p>
                                    <p class="days"><span><?php echo e($relatedHotel->number_review); ?> reviews</span></p>
                                    <hr>
                                    <p class="bottom-area d-flex">
                                        <span><i class="icon-map-o"></i><?php echo e($relatedHotel->city->name); ?></span>
                                        <span class="ml-auto"><a href="<?php echo e(route('hotel-show', ['slug' => $relatedHotel->slug])); ?>" target="_blank">Chi tiết</a></span>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                </div>
            </div>
            </div> <!-- .col-md-8 -->
        </div>
    </div>
    </section> <!-- .section -->
    <?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/dinhmanh/Desktop/booking/resources/views/hotel_show.blade.php ENDPATH**/ ?>