@extends('layouts.loginLayout')
@section('content')
    <!---Main Container--->

    <div class="container d-flex justify-content-center align-items-center min-vh-100">

        <!---Login Container--->

        <div class="row border rounded-5 p-3 shadow box-area bg-info">

            <!---Left Box--->

            <div
                class="col-md-6 rounded-4 d-flex justify-content-center align-items-center flex-column left-box bg-black h-auto">
                <div class="featured-image mb-3">
                    <img src="images/devx.png" class="img-fluid" style="width: 250px;" alt="Left Icon">
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
                        <h2>Hello, Again</h2>
                        <p>We're happy to have you back.</p>
                    </div>
                    <form action="{{ route('login') }}" method="POST">
                        @csrf
                        <div class="form-group mb-3">
                            <input name="email" type="text" class="form-control form-control-lg bg-light fs-6"
                                placeholder="Email Address" value="{{ old('email') }}">
                            @error('email')
                                <span class="d-block fs-6 text-danger mt-2">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group mb-1 group-password">
                            <input name="password" id="password" type="password"
                                class="form-control form-control-lg bg-light fs-6" placeholder="Password"
                                value="{{ request('password', '') }}">
                            <button type="button" id="togglePassword" class="border-0 btn"><span
                                    class="bi bi-eye-slash-fill" id="toggleIcon"></span></button>
                            @error('password')
                                <span class="d-block fs-6 text-danger mt-2">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="input-group mb-5 d-flex justify-content-between">
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="formCheck">
                                <label for="formCheck" class="form-check-label text-secondary"><small>Remember
                                        Me</small></label>
                            </div>
                            <div class="forgot">
                                <small><a href='#'>Forgot Password?</a></small>
                            </div>
                        </div>
                        <div class="input-group mb-3">
                            <button class="btn btn-lg btn-danger w-100 fs-6">Login</button>
                        </div>
                    </form>
                    <div class="input-group mb-3">
                        <button class="btn btn-lg btn-light w-100 fs-6"><img src="images/google.png" style="width: 20px"
                                class="me-2"><small>Sign In with Google</small></button>
                    </div>
                    <div class="row">
                        <small>Don't have account? <a href="{{ route('register') }}">Sign Up</a></small>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const passwordField = document.getElementById('password');
            const toggleButton = document.getElementById('togglePassword');
            const toggleIcon = document.getElementById('toggleIcon');

            toggleButton.addEventListener('click', function() {
                if (passwordField.type === 'password') {
                    passwordField.type = 'text';
                    toggleIcon.classList.remove('bi-eye-slash-fill');
                    toggleIcon.classList.add('bi-eye-fill');

                } else {
                    passwordField.type = 'password';
                    toggleIcon.classList.remove('bi-eye-fill');
                    toggleIcon.classList.add('bi-eye-slash-fill');
                }
            });
        });
    </script>
@endsection
