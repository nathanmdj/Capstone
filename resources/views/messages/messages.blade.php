@extends('layouts.messagingLayout')
@section('content')
    <div class="messages-container text-white row">
        <div class="chat-rooms col-12 p-3 col-sm-5">
            <div class="header  d-flex justify-content-between">
                <h3 class="fw-bolder">Messages</h3>
                <button id="newMessage" class="btn text-white " data-bs-toggle="modal" data-bs-target="#newMessageModal">
                    <span class="bi bi-envelope-plus"></span>
                </button>
                @include('messages.newMessageModal')
            </div>
            <div class="threads mt-3">

                @foreach ($myThreads as $thread)
                    @foreach ($thread->participants->where('id', '!=', auth()->id()) as $participant)
                        <div class="user-info d-flex" onclick="handleThreadClick({{ $thread->id }})">
                            <div class="img-container">
                                <img src="{{ $participant->info->getImageUrl() }}" alt="">
                            </div>
                            <div class="name ms-3">
                                {{ $participant->info->name }}
                                <p>{{ '@' . $participant->username }}</p>

                            </div>
                        </div>
                    @endforeach
                @endforeach
            </div>

        </div>
        <div class="conversation d-none d-md-block col-sm-7 p-0 ">
            <div class="empty d-flex flex-column justify-content-between  ">
                <div class="empty-message d-flex flex-column justify-content-center vh-100">
                    <div class="p-5">
                        <h1>Select a message</h1>
                        <p>Choose from your existing conversations, start a new one, or just keep exploring.</p>
                    </div>

                </div>

            </div>

        </div>
    </div>
    <script>
        const handleThreadClick = (id) => {
            $.ajax({
                url: `/messages/thread`,
                method: 'GET',
                data: {
                    _token: '{{ csrf_token() }}',
                    thread: id,
                }
            }).done(function(res) {
                $(".empty").last().html(res);
                const chatsContainer = $(".empty");
                chatsContainer.scrollTop(chatsContainer[0].scrollHeight);
            });
        }
    </script>
@endsection
