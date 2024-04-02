@extends('layouts.messagingLayout')
@section('content')
    <div class="messages-container text-white row">
        <div class="chat-rooms col-12 p-3 col-sm-5 vh-100">
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
                        <div class="user-info d-flex ">
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
        <div class="conversation col-sm-7 p-0 ">
            <div class="empty d-flex flex-column justify-content-between  ">
                {{-- <div class="empty-message d-flex align-items-center justify-content-center">
                    <h1>Select a message</h1>
                    <p>Choose from your existing conversations, start a new one, or just keep swimming.</p>
                </div> --}}

                <div class="chat-header d-flex mt-3 justify-content-center ">
                    @if ($latest ?? false)
                        @foreach ($latest->participants as $participant)
                            @if ($participant->id != auth()->id())
                                <div class="user-info">
                                    <div class="d-flex justify-content-center ">
                                        <div class="img-container">
                                            <img src="{{ $participant->info->getImageUrl() }}" alt="">
                                        </div>
                                        <div class="name ms-3">
                                            {{ $participant->info->name }}
                                            <p>{{ '@' . $participant->username }}</p>

                                        </div>
                                    </div>
                                    <div>
                                        <p>{{ $participant->info->bio }}</p>
                                        <p>{{ $participant->info->location }}</p>
                                        <p><span class="bi bi-calendar3"> Joined</span>
                                            {{ $participant->created_at->timezone('Asia/Manila')->format('F d, Y') }}</p>
                                    </div>
                                </div>
                            @endif
                        @endforeach
                    @endif

                </div>
                <div>
                    <div class="chats-container">
                        <div class="chats">
                            @include('messages.receive')
                        </div>
                    </div>
                </div>
            </div>
            <div class="send-message mb-3 ">
                <form id="send" class="d-flex">
                    <input type="text" id="message" name="message" autocomplete="off" class="form-control">
                    <button class="btn"><span class="bi bi-send"></span></button>
                </form>
            </div>
        </div>
    </div>
@endsection
