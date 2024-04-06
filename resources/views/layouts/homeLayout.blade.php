<!-- resources/views/layouts/app.blade.php -->

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name') }}</title>
    <!-- Include Bootstrap CSS -->
    {{-- <link href="{{ asset('build/assets/app-Cw0PtBnJ.css') }}" rel="stylesheet"> --}}
    <!-- In your Blade layout -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    @vite(['resources/sass/app.scss', 'resources/css/app.css', 'resources/js/app.js'])
</head>

<body>
    <div class="container-xl header fixed-top">
        <div class="row">

            <div class="pt-2 logo col-2 d-flex justify-content-center d-lg-block">
                <a href="{{ route('home') }}"> <img src="{{ asset('images/devx.png') }}" alt=""></a>
            </div>
            <div class="main-header col-7 col-xl-8">

            </div>
            <div class="sidebar-search col-3 col-xl-2 mt-3">
                @include('include.search-bar')
            </div>
        </div>
    </div>
    </div>
    <div class="container-xl home-page">
        <div class="row">
            @include('include.left-sidebar')
            <div class="col-2 "></div>
            <div class="col-7 col-xl-8 main-content min-vh-100 p-0">
                @yield('content')
            </div>
            <div class="col-3 col-xl-2 right-sidebar">
                @include('include.right-sidebar')
            </div>

        </div>





</body>

</html>
