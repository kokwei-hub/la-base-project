@extends('layouts.app')

@section('title', 'Login')

@section('content')
<div class="h-100 d-flex align-items-center justify-content-center">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-7 col-lg-5">
                <div class="wrap">
                    <div class="img login-form-bg"></div>
                    <div class="login-wrap p-4 p-md-5">
                        <div class="d-flex">
                            <div class="w-100">
                                <h3 class="mb-4">{{ __('Sign In') }}</h3>
                            </div>
                            <div class="w-100">
                                <p class="social-media d-flex justify-content-end">
                                    <a href="#" class="social-icon d-flex align-items-center justify-content-center">
                                        <span class="fa fa-facebook"></span>
                                    </a>
                                    <a href="#" class="social-icon d-flex align-items-center justify-content-center">
                                        <span class="fa fa-twitter"></span>
                                    </a>
                                </p>
                            </div>
                        </div>
                        <form action="#" class="form-signin">
                            <div class="form-group mt-3">
                                <input type="text" class="form-control" id="username" name="username" 
                                    maxlength="50" required />
                                <label class="form-control-placeholder" for="username">{{ __('Username') }}</label>
                            </div>
                            <div class="form-group">
                                <input type="password" class="form-control" id="password" name="password"  
                                    minlength="6" maxlength="255" required />
                                <label class="form-control-placeholder" for="password">{{ __('Password') }}</label>
                                <span toggle="#password" class="fa fa-fw fa-eye field-icon toggle-password"></span>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="form-control btn btn-primary rounded submit px-3">
                                    {{ __('Sign In') }}
                                </button>
                            </div>
                            <div class="form-group d-none">
                                <div class="w-50 text-left">
                                    <label class="checkbox-wrap checkbox-primary mb-0">{{ __('Remember Me') }}
                                        <input type="checkbox" checked="">
                                        <span class="checkmark"></span>
                                    </label>
                                </div>
                                <div class="w-50 text-md-right">
                                    <a href="#">{{ __('Forgot Password') }}</a>
                                </div>
                            </div>
                            <div class="error-alert alert alert-danger alert-dismissible fade show">
                                <h6 class="invalid-title">Wrong Credentials</h6>
                                <span class="invalid-font">{{ session()->get('error') }}</span>
                                <button type="button" class="btn-close invalid-btn" 
                                    data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        </form>
                        <p class="text-center d-none">
                            {{ __('Not a member?') }} <a data-toggle="tab" href="#signup">{{ __('Sign Up') }}</a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('page-css')
<link rel="stylesheet" type="text/css" href="{{ cdn('assets/css/page/login/login.min.css') }}" />
@endsection

@section('page-script')
<script type="text/javascript" src="{{ cdn('assets/js/page/login.min.js') }}" id="page-script"></script>
@endsection