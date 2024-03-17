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

    @vite(['resources/sass/app.scss', 'resources/css/app.css', 'resources/js/app.js'])
</head>

<body>
    <div class="container-lg home-page">
        <div class="fixed-top ">
            <div class="container-lg">
                <div class="header row">
                    <div class="col-3 pt-3">
                        <h1>BRAND</h1>
                    </div>
                    <div class="col-6 main-header">

                    </div>
                    <div class="col-3 pt-3">
                        <input type="text" class="form-control bg-secondary border-0 text-info search-bar">
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-3 sidebar-nav position-fixed ">
                <h1>Home</h1>
            </div>
            <div class="col-3"></div>
            <div class="col-6 main-content min-vh-100 p-0">
                @yield('content')
            </div>
            <div class="col-3 sidebar-search">
                <h1>Home</h1>
            </div>

        </div>

    </div>





</body>

</html>
