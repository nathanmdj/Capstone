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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>
    <script src="https://js.pusher.com/8.2.0/pusher.min.js"></script>
    @vite(['resources/sass/app.scss', 'resources/css/app.css', 'resources/js/app.js'])
</head>

<body>
    <div class="container-xl messaging">
        <div class="row">
            @include('include.left-sidebar')
            <div class="d-none d-md-block col-md-2 "></div>
            <div class="col-12 col-md-10  main-content vh-100 p-0">
                @yield('content')
            </div>


        </div>

    </div>




    <script>
        const pusher = new Pusher('{{ config('broadcasting.connections.pusher.key') }}', {
            cluster: 'ap1'
        });
        const channel = pusher.subscribe('public');


        channel.bind('chat', function(data) {
            console.log('Received chat event:', data);
            $.post("/messages/receive", {
                    _token: '{{ csrf_token() }}',
                    message: data.message,
                })
                .done(function(res) {
                    $(".chats-container > .chats").last().append(res);
                    $(document).scrollTop($(document).height());
                });
        });

        //Broadcast messages
        $("#send").submit(function(event) {
            event.preventDefault();

            $.ajax({
                url: "/messages/broadcast",
                method: 'POST',
                headers: {
                    'X-Socket-Id': pusher.connection.socket_id
                },
                data: {
                    _token: '{{ csrf_token() }}',
                    message: $("#message").val(),
                }
            }).done(function(res) {
                $(".chats-container > .chats").last().append(res);
                $("#message").val('');
                $(document).scrollTop($(document).height());
            });
        });
    </script>
</body>

</html>
