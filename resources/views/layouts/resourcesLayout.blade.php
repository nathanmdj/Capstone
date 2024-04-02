<!-- resources/views/layouts/app.blade.php -->

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name') }}</title>
    <!-- Include Bootstrap CSS -->
    {{-- <link href="{{ asset('build/assets/app-Cw0PtBnJ.css') }}" rel="stylesheet"> --}}

    @vite(['resources/sass/app.scss', 'resources/css/app.css', 'resources/js/app.js'])
</head>

<body>

    <div class="bg-primary vh-100 resources">
        <div class="row">

            <div class="col-lg-3">
                @include('include.resource-sidebar')
            </div>

            <div class="col-lg-9">
                @yield('content')
            </div>

        </div>
    </div>

    {{-- <!-- Include Bootstrap JavaScript and jQuery -->
    <script src="{{ asset('path/to/jquery.min.js') }}"></script>
    <script src="{{ asset('path/to/bootstrap.bundle.min.js') }}"></script> --}}
</body>

</html>
