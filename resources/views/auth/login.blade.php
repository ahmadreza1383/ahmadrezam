
@extends('layouts.app')
@section('head')
<title> Login </title>
<link rel="stylesheet" href="{{ asset('assets/panel/login/style.css') }}">
@endsection
@section('main')
<section class="resume-section" id="about">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6 col-lg-5">
                <div class=" social-icons login-wrap p-4 p-md-5">
                    <div class="social-icon icon d-flex align-items-center justify-content-center">
                        <span class="fa-solid fa-user"></span>
                    </div>
                    <h3 class="text-center mb-4">Have an account?</h3>
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        <div class="form-group">
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror rounded-left" placeholder="Email"  name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group d-flex">
                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror rounded-left" placeholder="Password" name="password"  autocomplete="current-password">
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group d-md-flex">

                            {{-- <div class="w-50 text-md-right">
                                <a href="#">Forgot Password</a>
                            </div> --}}

                            <div class="w-50 text-md-right">
                                @if (Route::has('register'))
                                    <a  href="{{ route('register') }}">
                                        {{ __('Register') }}
                                    </a>
                                @endif
                            </div>

                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary rounded submit p-3 px-5">Get Started</button>

                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection


@section('script')
<!-- Core theme JS-->
<script src="{{ asset('assets/panel/login/js/jquery.min.js') }}"></script>
<script src="{{ asset('assets/panel/login/js/popper.js') }}"></script>
<script src="{{ asset('assets/panel/login/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('assets/panel/login/js/main.js') }}"></script>
@endsection


