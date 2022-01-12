<?php $__env->startSection('content'); ?>
<div class="hero-wrap js-fullheight" style="background-image: url('images/bg_5.jpg');">
    <div class="overlay"></div>
    <div class="container">
        <div class="row no-gutters slider-text js-fullheight align-items-center justify-content-center" data-scrollax-parent="true">
            <div class="col-md-9 ftco-animate text-center" data-scrollax=" properties: { translateY: '70%' }">
                <p class="breadcrumbs" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }"><span class="mr-2"><a href="<?php echo e(route('home')); ?>">Trang chủ</a></span><span>Hotel</span></p>
            </div>
        </div>
    </div>
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
                <div class="sidebar-wrap bg-light ftco-animate">
                    <h3 class="heading mb-4">Sắp xếp khách sạn</h3>
                    <form action="<?php echo e(route('hotel-index')); ?>" method="GET">
                        <div class="fields">
                            <div class="form-group">
                                <div class="select-wrap one-third">
                                    <div class="icon"><span class="ion-ios-arrow-down"></span></div>
                                    <select name="sort_price" id="" class="form-control" placeholder="Keyword search" defaultValue="1">
                                        <option value="" >Sắp xếp</option>
                                        <option value="1" >Sắp xếp theo giá tăng dần</option>
                                        <option value="2">Sắp xếp theo giá giảm dần</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="user" class="">Khoảng giá</label>
                                <div class="range-slider">
                                    <input name="price_min" type="number" class="form-control" placeholder="Giá min" value="<?php echo e($price_min); ?>" >
                                    <input name="price_max" type="number" class="form-control" placeholder="Giá max" value="<?php echo e($price_max); ?>">
                                </div>
                            </div>
                            <div class="form-group">
                                <input type="submit" value="Lọc" class="btn btn-primary py-3 px-5 search">
                            </div>
                            <h3 class="heading mb-4">Star: <?php echo e(implode(", ",$star)); ?></h3>
                            <div class="form-check">
                                <input name = "star1" type="checkbox" class="form-check-input" id="exampleCheck1">
                                <label class="form-check-label" for="exampleCheck1">
                                    <p class="rate"><span><i class="icon-star"></i><i class="icon-star"></i><i class="icon-star"></i><i class="icon-star"></i><i class="icon-star"></i></span></p>
                                </label>
                            </div>
                            <div class="form-check">
                                <input name = "star2" type="checkbox" class="form-check-input" id="exampleCheck1">
                                <label class="form-check-label" for="exampleCheck1">
                                    <p class="rate"><span><i class="icon-star"></i><i class="icon-star"></i><i class="icon-star"></i><i class="icon-star"></i><i class="icon-star-o"></i></span></p>
                                </label>
                            </div>
                            <div class="form-check">
                                <input name = "star3" type="checkbox" class="form-check-input" id="exampleCheck1">
                                <label class="form-check-label" for="exampleCheck1">
                                    <p class="rate"><span><i class="icon-star"></i><i class="icon-star"></i><i class="icon-star"></i><i class="icon-star-o"></i><i class="icon-star-o"></i></span></p>
                                </label>
                            </div>
                            <div class="form-check">
                                <input name = "star4" type="checkbox" class="form-check-input" id="exampleCheck1">
                                <label class="form-check-label" for="exampleCheck1">
                                    <p class="rate"><span><i class="icon-star"></i><i class="icon-star"></i><i class="icon-star-o"></i><i class="icon-star-o"></i><i class="icon-star-o"></i></span></p>
                                </label>
                            </div>
                            <div class="form-check">
                                <input name = "star5" type="checkbox" class="form-check-input" id="exampleCheck1">
                                <label class="form-check-label" for="exampleCheck1">
                                    <p class="rate"><span><i class="icon-star"></i><i class="icon-star-o"></i><i class="icon-star-o"></i><i class="icon-star-o"></i><i class="icon-star-o"></i></span></p>
                                </label>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-lg-9">
                <div class="row">
                    <?php $__currentLoopData = $hotels; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $hotel): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="col-md-4 ftco-animate">
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
                                            <span><?php echo e($hotel->stars); ?> Stars</span>
                                            <span><?php echo e($hotel->rating); ?> Rating</span>
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
                <div class="row mt-5">
                    <div class="col text-center">
                        <?php echo e($hotels->appends(Request::all())->links()); ?>

                    </div>
                </div>
                </div> <!-- .col-md-8 -->
            </div>
        </div>
        </section> <!-- .section -->
        <?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/dinhmanh/Desktop/booking/resources/views/common/hotels.blade.php ENDPATH**/ ?>