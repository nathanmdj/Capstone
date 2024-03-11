<!-- resources/views/layouts/app.blade.php -->

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Laravel Project</title>
    <!-- Include Bootstrap CSS -->
    {{-- <link href="{{ asset('resources/sass/app.scss') }}" rel="stylesheet"> --}}

    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>

<body>

    @yield('content')

    <!-- Include Bootstrap JavaScript and jQuery -->
    <script src="{{ asset('path/to/jquery.min.js') }}"></script>
    <script src="{{ asset('path/to/bootstrap.bundle.min.js') }}"></script>
</body>

</html>
