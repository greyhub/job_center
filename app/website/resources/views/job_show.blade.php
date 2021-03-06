@extends('layouts.app')
@section('content')
<main>
    <!-- Hero Area Start-->
    <div class="slider-area ">
        <div class="single-slider section-overly slider-height2 d-flex align-items-center" data-background="{{ asset('assets/img/hero/about.jpg') }}">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="hero-cap text-center">
                            <h2>{{ $job->title }}</h2>
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
                                <a href="{{ route('job-show', ['slug' => $job->slug]) }}"><img src="{{ $job->image_url }}" width="100" height="100" alt=""></a>
                            </div>
                            <div class="job-tittle">
                                <a href="{{ route('job-show', ['slug' => $job->slug]) }}">
                                    <h4>{{ $job->title }}</h4>
                                </a>
                                <ul>
                                    <li>{{ str_replace('"', ' ', str_replace('["', ' ', str_replace('"]', ' ', $job->sectors))) }}</li>
                                    <li><i class="fas fa-map-marker-alt"></i>{{ $job->city->name }}</li>
                                    <li>{{ $job->salary }}</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <!-- job single End -->
                    <div class="job-post-details">
                        <div class="post-details1 mb-50">
                            <!-- Small Section Tittle -->
                            <div class="small-section-tittle">
                                <h4>M?? t??? chi ti???t</h4>
                            </div>
                            <p>{!! str_replace("\\r\\n", '', str_replace('"', ' ', str_replace('["', ' ', str_replace('"]', ' ', $job->job_descriptions)))) !!}</p>
                        </div>
                        <div class="post-details2  mb-50">
                            <!-- Small Section Tittle -->
                            <div class="small-section-tittle">
                                <h4>Y??u c???u </h4>
                            </div>
                            <p>{!! str_replace("\\r\\n", '', str_replace('"', ' ', str_replace('["', ' ', str_replace('"]', ' ', $job->job_requirements)))) !!}</p>
                        </div>
                        <div class="apply-btn2">
                            <a href="{{ $job->url }}" class="btn">NGU???N</a>
                        </div>
                    </div>
                </div>
                <!-- Right Content -->
                <div class="col-xl-4 col-lg-4">
                    <div class="post-details3  mb-50">
                        <!-- Small Section Tittle -->
                        <div class="small-section-tittle">
                            <h4>Th??ng tin vi???c l??m</h4>
                        </div>
                        <ul>
                            <li>Ng??y ????ng<span>{{ $job->application_deadline }}</span></li>
                            <li>Th??nh ph??? : <span>{{ $job->city->name }}</span></li>
                            <li>Kinh nghi???m : <span>{{ $job->job_experience_years }}</span></li>
                            <li>L????ng :  <span>{{ $job->salary }}</span></li>
                            <li>H???n n???p cv : <span>{{ $job->application_deadline }}</span></li>
                            <li>Gi???i t??nh : <span>{{ $job->required_gender_specific }}</span></li>
                            <li>?????c t??nh : <span>{{ $job->job_attributes }}</span></li>
                            <li>H??nh th???c : <span>{{ $job->job_formality }}</span></li>
                        </ul>

                    </div>
                    <div class="post-details4  mb-50">
                        <!-- Small Section Tittle -->
                        <div class="small-section-tittle">
                            <h4>Th??ng tin c??ng ty</h4>
                        </div>
                        <span>{{ $job->company_name }}</span>
                        <p>{{ $job->company_url }}</p>
                        <ul>
                            <li>?????a ch???: <span>{{ $job->company_address }}</span></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- job post company End -->
</main>
@endsection
