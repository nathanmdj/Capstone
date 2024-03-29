@extends('layouts.signupLayout')
@section('content')
    <!---Main Container--->

    <div class="container d-flex justify-content-center align-items-center min-vh-100">

        <!---Login Container--->

        <div class="row border rounded-5 p-3 shadow box-area bg-info">

            <!---Left Box--->

            <div
                class="col-md-6 rounded-4 d-flex justify-content-center align-items-center flex-column bg-black left-box h-auto">
                <div class="featured-image mb-3">
                    <img src="images/devx.png" class="img-fluid h-auto" style="width: 250px;" alt="Left Icon">
                </div>
                <p class="text-white fs-2" style="font-family: 'Courier New', Courier, monospace; font-weight: 600;">Be
                    Verified</p>
                <small class="text-white text-wrap text-center mb-4"
                    style="width: 17rem; font-family: 'Courier New', Courier, monospace;">The Social Media for all
                    Developers.</small>
            </div>

            <!---Right Box--->

            <div class="col-md-6 right-box">
                <div class="row align-items-center">
                    <div class="header-text mb-4">
                        <h2>Create your account now!</h2>
                    </div>

                    <form action="{{ route('register') }}" method="POST">
                        @csrf
                        <div class="form-group mb-3">
                            <input name="username" type="text" class="form-control form-control-lg bg-light fs-6"
                                placeholder="Username" value="{{ old('username') }}">
                            @error('username')
                                <span class="d-block fs-6 text-danger mt-2">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group mb-3">
                            <input name="email" type="email" class="form-control form-control-lg bg-light fs-6"
                                placeholder="Email Address" value="{{ old('email') }}">
                            @error('email')
                                <span class="d-block fs-6 text-danger mt-2">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group mb-3">
                            <input name="password" type="password" class="form-control form-control-lg bg-light fs-6"
                                placeholder="Password" value="{{ old('password') }}">
                            @error('password')
                                <span class="d-block fs-6 text-danger mt-2">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group mb-4">
                            <input name="password_confirmation" type="password"
                                class="form-control form-control-lg bg-light fs-6" placeholder="Re-enter Password"
                                value="{{ old('password_confirmation') }}">
                        </div>

                        <div class="input-group mb-3">
                            <button class="btn btn-lg btn-danger w-100 fs-6">Create
                                Account</button>
                    </form>

                </div>
                <div class="input-group mb-3">
                    <button type="submit" class="btn btn-lg btn-light w-100 fs-6"><img src="images/google.png"
                            style="width: 20px" class="me-2"><small>Create account with Google</small></button>
                </div>
            </div>
        @endsection
