@extends('layouts.app')
@section('content')
<style>
a.change-password {
color: black;
}
</style>
<main>
    <!-- Hero Area Start-->
    <div class="slider-area ">
        <div class="single-slider section-overly slider-height2 d-flex align-items-center" data-background="{{ asset('assets/img/hero/about.jpg') }}">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="hero-cap text-center">
                            <h2>Thông tin cá nhân</h2>
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
            <div class="container" id="wrapper_masonry">
                <div class="row">
                    <div class="col-md-8 grid-sidebar" id="content">
                        @if (session('message'))
                        <div class="alert alert-success">{{ session('message') }}</div>
                        @endif
                        @if (session('error'))
                        <div class="alert alert-danger text-center">{{ session('error') }}</div>
                        @endif
                        <form class="edit-user" method="POST" action="{{ route('user.update') }}">
                            @csrf
                            <div class="form-group row">
                                <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Địa chỉ E-Mail*') }}</label>
                                <div class="col-md-6">
                                    {{ $user->email }}
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="last_name" class="col-md-4 col-form-label text-md-right">{{ __('Họ và tên đệm*') }}</label>
                                <div class="col-md-6">
                                    <input id="last_name" type="text" class="form-control @error('last_name') is-invalid @enderror" name="last_name" value="{{ $user->last_name }}" required autocomplete="last_name">
                                    @error('last_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="first_name" class="col-md-4 col-form-label text-md-right">{{ __('Tên*') }}</label>
                                <div class="col-md-6">
                                    <input id="first_name" type="text" class="form-control @error('first_name') is-invalid @enderror" name="first_name" value="{{ $user->first_name }}" required autocomplete="first_name">
                                    @error('first_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="birthday" class="col-md-4 col-form-label text-md-right">{{ __('Ngày Sinh') }}</label>
                                <div class="col-md-6">
                                    <input id="birthday" class="form-control @error('birthday') is-invalid @enderror" name="birthday" type="date" data-date-split-input="true"  placeholder="dd-mm-yyyy" min="1900-01-01"/ value="{{ $user->birthday }}">
                                    @error('birthday')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="city" class="col-md-4 col-form-label text-md-right">{{ __('Thành phố') }}</label>
                                <div class="col-md-6">
                                    <select name="city" id="city">
                                        <option value="{{ $user->city_id }}">{{ $user->city->name ?? 'Không có' }}</option>
                                        @foreach($cities as $city)
                                        <option value="{{ $city->id }}">{{ $city->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('city')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="gender" class="col-md-4 col-form-label text-md-right">{{ __('Giới tính') }}</label>
                                <div class="col-md-6">
                                    <select name="gender" id="gender" lass="form-control @error('gender') is-invalid @enderror" name="gender" value="{{ $user->gender }}">
                                        @if(is_null($user->gender))
                                        <option value="{{ null }}">Không có</option>
                                        @else
                                        <option value="{{ null }}">Không có</option>
                                        @endif
                                        <option value="{{ 'Nam' }}">Nam</option>
                                        <option value="{{ 'Nữ' }}">Nữ</option>
                                        <option value="{{ 'Khác' }}">Khác</option>
                                    </select>
                                    @error('gender')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="sector" class="col-md-4 col-form-label text-md-right">{{ __('Ngành Nghề') }}</label>
                                <div class="col-md-6">
                                    <input id="sector" type="text" class="form-control @error('sector') is-invalid @enderror" name="sector" value="{{ $user->sector }}">
                                    @error('sector')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="username" class="col-md-4 col-form-label text-md-right">
                                    <a class="change-password" data-toggle="collapse" color="black" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
                                        Thay đổi mật khẩu >
                                    </a>
                                </label>
                                <input id="change-password" type="text" name="changePassword" value="Thay đổi mật khẩu" hidden="true">
                            </div>
                            <div class="collapse" id="collapseExample">
                                <div class="form-group row">
                                    <label for="password-confirm" class="col-md-4 col-form-label text-md-right">Mật khẩu cũ * </label>
                                    <div class="col-md-6">
                                        <input id="password-confirm" type="password" class="form-control required" name="oldPassword">
                                        @error('oldPassword')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="password-confirm" class="col-md-4 col-form-label text-md-right">Mật khẩu mới * </label>
                                    <div class="col-md-6">
                                        <input id="password-confirm" type="password" class="form-control required" name="password">
                                        @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                                 <div class="form-group row">
                                    <label for="password-confirm" class="col-md-4 col-form-label text-md-right" >Xác minh mật khẩu * </label>
                                    <div class="col-md-6">
                                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation">
                                        @error('password_confirm')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4 float-left">
                                    <button id='edit-user' type="submit" class="btn wpforms-submit">
                                    Thay đổi
                                    </button>
                                    <a class="btn" href="">Hủy bỏ</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- job post company End -->
</main>
@endsection
