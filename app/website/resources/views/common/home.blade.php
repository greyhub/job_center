@extends('layouts.app')
@section('content')
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
                            <form action="{{ route('search') }}" method="GET" class="search-box">
                                @csrf
                                <div class="input-form">
                                    <input type="text" name = "search" placeholder="Tìm kiếm theo tên, công ty, địa chỉ">
                                </div>
                                <div class="select-form">
                                    <div class="select-itms">
                                        <select name="city" id="select1">
                                            <option value="">Thành phố</option>
                                            @foreach($cities as $city)
                                            <option value="{{ $city->slug }}">{{ $city->name }}</option>
                                            @endforeach
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
                @foreach($cities as $city)
                <div class="col-xl-3 col-lg-3 col-md-4 col-sm-6">
                    <div class="single-services text-center mb-30">
                        <div class="services-ion">
                            <span class="flaticon-tour"></span>
                        </div>
                        <div class="services-cap">
                            <h5><a href="{{ route('city', ['slug' => $city->slug]) }} ">{{ $city->name }}</a></h5>
                            <span>({{$city->jobs->count()}})</span>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="browse-btn2 text-center mt-50">
                        <a href="{{ route('job-index') }}" class="border-btn2">Tất cả các việc làm </a>
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
                    @foreach($jobs as $job)
                    <div class="single-job-items mb-30">
                        <div class="job-items">
                            <div class="company-img">
                                <a href="{{ route('job-show', ['slug' => $job->slug]) }}"><img src="assets/img/icon/job-list1.png" alt=""></a>
                            </div>
                            <div class="job-tittle">
                                <a href="{{ route('job-show', ['slug' => $job->slug]) }}"><h5>{{ $job->title }}</h5></a>
                                <ul>
                                    <li>{{ str_replace('"]', '', str_replace('["', '', $job->sectors)) }}</li>
                                    <li><i class="fas fa-map-marker-alt"></i>{{ $job->city->name }}</li>                                    <li>{{ $job->salary }}</li>
                                </ul>
                            </div>
                        </div>
                        <div class="items-link f-right">
                            <a href="{{ route('job-show', ['slug' => $job->slug]) }}">Xem chi tiết</a>
                            <span>{{ str_replace(' 00:00:00', "", $job->update_time) }}</span>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
</main>
@endsection
