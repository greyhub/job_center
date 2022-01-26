<?php $__env->startSection('content'); ?>
<div class="hero-wrap js-fullheight" style="background-image: url(https://www.flynow.vn/blog/wp-content/uploads/2017/01/ha-noi-qua-ong-kinh-dan-du-lich-bui-4.jpg);">
    <div class="overlay"></div>
    <div class="container">
        <div class="row no-gutters slider-text js-fullheight align-items-center justify-content-start" data-scrollax-parent="true">
            <div class="col-md-9 ftco-animate" data-scrollax=" properties: { translateY: '70%' }">
                <h1 class="mb-4" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }"><strong>Khám phá <br></strong> Việt Nam</h1>
                <p data-scrollax="properties: { translateY: '30%', opacity: 1.6 }">Hãy tìm những Hotels tuyệt vời cho chuyến đi của bạn với so sánh giá</p>
                <div class="block-17 my-4">
                    <form action="<?php echo e(route('search')); ?>" method="GET" class="d-block d-flex">
                        <?php echo csrf_field(); ?>
                        <div class="fields d-block d-flex">
                            <div class="textfield-search one-third">
                                <input type="text" name = "search" class="form-control" placeholder="Ex: Nhà nghỉ, Thành phố, Tiện ích" />
                            </div>
                            <div class="select-wrap one-third">
                                <div class="icon"><span class="ion-ios-arrow-down"></span></div>
                                <select name="city" id="" class="form-control" placeholder="Keyword search">
                                    <option value="">Nơi đến</option>
                                    <?php $__currentLoopData = $cities; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $city): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($city->slug); ?>"><?php echo e($city->name); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>
                        </div>
                        <button type="submit" class="search-submit btn btn-primary">Tìm kiếm</button>
                    </form>
                </div>
                <p>Hoặc tiện ích của khách sạn</p>
                <p class="browse d-md-flex">
                    <span class="d-flex justify-content-md-center align-items-md-center"><a href="#"><i class="flaticon-fork"></i>Ăn uống</a></span>
                    <span class="d-flex justify-content-md-center align-items-md-center"><a href="#"><i class="flaticon-hotel"></i>Nghỉ ngơi</a></span>
                    <span class="d-flex justify-content-md-center align-items-md-center"><a href="#"><i class="flaticon-meeting-point"></i>Địa điểm nổi tiếng</a></span>
                    <span class="d-flex justify-content-md-center align-items-md-center"><a href="#"><i class="flaticon-shopping-bag"></i>Shopping</a></span>
                </p>
            </div>
        </div>
    </div>
</div>
<section class="ftco-section services-section bg-light">
    <div class="container">
        <div class="row d-flex">
            <div class="col-md-3 d-flex align-self-stretch ftco-animate">
                <div class="media block-6 services d-block text-center">
                    <div class="d-flex justify-content-center"><div class="icon"><span class="flaticon-guarantee"></span></div></div>
                    <div class="media-body p-2 mt-2">
                        <h3 class="heading mb-3">Lựa chọn giá tốt nhất</h3>
                        <p>So sánh giá từ Booking, Traveloka, Agoda, Ebooking.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-3 d-flex align-self-stretch ftco-animate">
                <div class="media block-6 services d-block text-center">
                    <div class="d-flex justify-content-center"><div class="icon"><span class="flaticon-like"></span></div></div>
                    <div class="media-body p-2 mt-2">
                        <h3 class="heading mb-3">Yêu du lịch</h3>
                        <p>Hãy tận hưởng kỳ nghỉ tuyệt vời.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-3 d-flex align-self-stretch ftco-animate">
                <div class="media block-6 services d-block text-center">
                    <div class="d-flex justify-content-center"><div class="icon"><span class="flaticon-detective"></span></div></div>
                    <div class="media-body p-2 mt-2">
                        <h3 class="heading mb-3">Nhiều không gian nghỉ dưỡng tuyệt vời </h3>
                        <p>Rất nhiều lựa chọn hấp dẫn các căn hộ và biệt thự trên Travel Hotels.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-3 d-flex align-self-stretch ftco-animate">
                <div class="media block-6 services d-block text-center">
                    <div class="d-flex justify-content-center"><div class="icon"><span class="flaticon-support"></span></div></div>
                    <div class="media-body p-2 mt-2">
                        <h3 class="heading mb-3">Mong được góp ý</h3>
                        <p>Mời các bạn góp ý cùng chúng tôi.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="ftco-section ftco-destination">
    <div class="container">
        <div class="row justify-content-start mb-5 pb-3">
            <div class="col-md-7 heading-section ftco-animate">
                <span class="subheading">Featured</span>
                <h2 class="mb-4"><strong>Những điểm đến nổi tiếng</strong></h2>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="destination-slider owl-carousel ftco-animate">
                    <?php $__currentLoopData = $cities; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $city): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="item">
                        <div class="destination">
                            <a href="<?php echo e(route('city', ['slug' => $city->slug])); ?>" class="img d-flex justify-content-center align-items-center" style="background-image: url(<?php echo e($city->image_url); ?>);">
                                <div class="icon d-flex justify-content-center align-items-center">
                                    <span class="icon-search2"></span>
                                </div>
                            </a>
                            <div class="text p-3">
                                <h3><a href="<?php echo e(route('city', ['slug' => $city->slug])); ?>"><?php echo e($city->name); ?></a></h3>
                                <span class="listing">Việt Nam</span>
                            </div>
                        </div>
                    </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="ftco-section bg-light">
    <div class="container">
        <div class="row justify-content-start mb-5 pb-3">
            <div class="col-md-7 heading-section ftco-animate">
                <span class="subheading">Special Offers</span>
                <h2 class="mb-4"><strong>Top</strong> Khách sạn dành cho bạn</h2>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row">
            <?php $__currentLoopData = $hotels; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $hotel): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="col-sm col-md-6 col-lg ftco-animate">
                <div class="destination">
                    <a href="<?php echo e(route('hotel-show', ['slug' => $hotel->slug])); ?>" class="img img-2 d-flex justify-content-center align-items-center" style="background-image: url(<?php echo e($hotel->img_url1); ?>);">
                        <div class="icon d-flex justify-content-center align-items-center">
                            <span class="icon-search2"></span>
                        </div>
                    </a>
                    <div class="text p-3">
                        <div class="d-flex">
                            <div class="one">
                                <h3><a href="<?php echo e(route('hotel-show', ['slug' => $hotel->slug])); ?>"><?php echo e($hotel->name); ?></a></h3>
                                <p class="rate">
                                    <?php if($hotel->stars != -1): ?>
                                    <span><?php echo e($hotel->stars); ?> Stars</span>
                                    <?php endif; ?>
                                    <?php if($hotel->rating != -1): ?>
                                    <span><?php echo e($hotel->rating); ?> Rating</span>
                                    <?php endif; ?>
                                    <span>Rank <?php echo e($hotel->rank); ?></span>
                                </p>
                            </div>
                            <div class="two">
                                <span class="price"><?php echo e(number_format($hotel->price, 0, '', ',')); ?>  VND</span>
                            </div>
                        </div>
                        <p><?php echo e($hotel->address); ?></p>
                        <p class="days"><span><?php echo e($hotel->number_review); ?> reviews</span></p>
                        <hr>
                        <p class="bottom-area d-flex">
                            <span><i class="icon-map-o"></i><?php echo e($hotel->city->name); ?></span>
                            <span class="ml-auto"><a href="<?php echo e(route('hotel-show', ['slug' => $hotel->slug])); ?>">Chi tiết</a></span>
                        </p>
                    </div>
                </div>
            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>
</section>
<section class="ftco-section">
    <div class="container">
        <div class="row justify-content-start mb-5 pb-3">
            <div class="col-md-7 heading-section ftco-animate">
                <span class="subheading">Special Offers</span>
                <h2 class="mb-4"><strong>Popular Hotels</strong>  tại Hà Nội</h2>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row">
            <?php $__currentLoopData = $hotels1; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $hotel): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="col-sm col-md-6 col-lg ftco-animate">
                <div class="destination">
                    <a href="<?php echo e(route('hotel-show', ['slug' => $hotel->slug])); ?>" class="img img-2 d-flex justify-content-center align-items-center" style="background-image: url(<?php echo e($hotel->img_url1); ?>);">
                        <div class="icon d-flex justify-content-center align-items-center">
                            <span class="icon-search2"></span>
                        </div>
                    </a>
                    <div class="text p-3">
                        <div class="d-flex">
                            <div class="one">
                                <h3><a href="<?php echo e(route('hotel-show', ['slug' => $hotel->slug])); ?>"><?php echo e($hotel->name); ?></a></h3>
                                <p class="rate">
                                    <?php if($hotel->stars != -1): ?>
                                    <span><?php echo e($hotel->stars); ?> Stars</span>
                                    <?php endif; ?>
                                    <?php if($hotel->rating != -1): ?>
                                    <span><?php echo e($hotel->rating); ?> Rating</span>
                                    <?php endif; ?>
                                    <span>Rank <?php echo e($hotel->rank); ?></span>
                                </p>
                            </div>
                            <div class="two">
                                <span class="price"><?php echo e(number_format($hotel->price, 0, '', ',')); ?>  VND</span>
                            </div>
                        </div>
                        <p><?php echo e($hotel->address); ?></p>
                        <p class="days"><span><?php echo e($hotel->number_review); ?> reviews</span></p>
                        <hr>
                        <p class="bottom-area d-flex">
                            <span><i class="icon-map-o"></i><?php echo e($hotel->city->name); ?></span>
                            <span class="ml-auto"><a href="<?php echo e(route('hotel-show', ['slug' => $hotel->slug])); ?>">Chi tiết </a></span>
                        </p>
                    </div>
                </div>
            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>
</section>
<section class="ftco-section">
    <div class="container">
        <div class="row justify-content-start mb-5 pb-3">
            <div class="col-md-7 heading-section ftco-animate">
                <span class="subheading">Special Offers</span>
                <h2 class="mb-4"><strong>Popular Hotels</strong>  tại Hồ Chí Minh</h2>
            </div>
        </div>
        <div class="row">
            <?php $__currentLoopData = $hotels3; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $hotel): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="col-md-6 col-lg-3 ftco-animate">
                <div class="destination">
                    <a href="<?php echo e(route('hotel-show', ['slug' => $hotel->slug])); ?>" class="img img-2 d-flex justify-content-center align-items-center" style="background-image: url(<?php echo e($hotel->img_url1); ?>);">
                        <div class="icon d-flex justify-content-center align-items-center">
                            <span class="icon-search2"></span>
                        </div>
                    </a>
                    <div class="text p-3">
                        <div class="d-flex">
                            <div class="one">
                                <h3><a href="<?php echo e(route('hotel-show', ['slug' => $hotel->slug])); ?>"><?php echo e($hotel->name); ?></a></h3>
                                <p class="rate">
                                    <?php if($hotel->stars != -1): ?>
                                    <span><?php echo e($hotel->stars); ?> Stars</span>
                                    <?php endif; ?>
                                    <?php if($hotel->rating != -1): ?>
                                    <span><?php echo e($hotel->rating); ?> Rating</span>
                                    <?php endif; ?>
                                    <span>Rank <?php echo e($hotel->rank); ?></span>
                                </p>
                            </div>
                            <div class="two">
                                <span class="price"><?php echo e(number_format($hotel->price, 0, '', ',')); ?>  VND</span>
                            </div>
                        </div>
                        <p><?php echo e($hotel->address); ?></p>
                        <p class="days"><span><?php echo e($hotel->number_review); ?> reviews</span></p>
                        <hr>
                        <p class="bottom-area d-flex">
                            <span><i class="icon-map-o"></i><?php echo e($hotel->city->name); ?></span>
                            <span class="ml-auto"><a href="<?php echo e(route('hotel-show', ['slug' => $hotel->slug])); ?>">Chi tiết</a></span>
                        </p>
                    </div>
                </div>
            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>
</section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/dinhmanh/Desktop/booking (copy)/resources/views/common/home.blade.php ENDPATH**/ ?>