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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    @vite(['resources/sass/app.scss', 'resources/css/app.css', 'resources/js/app.js'])
</head>

<body>
    <div class="container-xl home-page">
        <div class="fixed-top">
            <div class="container-xl">
                <div class="header row">
                    <div class="col-2 pt-2 logo">
                        <a href="{{ route('home') }}"> <img src="{{ asset('images/devX.png') }}" alt=""></a>

                    </div>
                    <div class="col-7 main-header">

                    </div>
                    <div class="col-3 col-xl-2 pt-2">
                        @include('include.search-bar')
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-1 sidebar-nav position-fixed">
                <div class="d-flex flex-column justify-content-between vh-100">

                    <h1>Home</h1>
                    @include('include.user-button')
                </div>
            </div>
            <div class="col-2 "></div>
            <div class="col-7 main-content min-vh-100 p-0">
                @yield('content')
            </div>
            <div class="col-3 col-xl-2 sidebar-search">
                <h1>Home</h1>
            </div>

        </div>

    </div>





</body>

</html>
