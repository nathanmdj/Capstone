<div class="chat-header d-flex mt-3 justify-content-center ">
    @foreach ($selectedThread as $thread)
        @foreach ($thread->participants as $participant)
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
                        <p id="threadID" style="display:none;">{{ $thread->id }}</p>
                        <p>{{ $participant->info->location }}</p>
                        <p><span class="bi bi-calendar3"> Joined</span>
                            {{ $participant->created_at->timezone('Asia/Manila')->format('F d, Y') }}</p>
                    </div>
                </div>
            @endif
        @endforeach
    @endforeach

</div>
<div class="chat-app mt-3">
    <div class="chats-container">
        <div class="chats">
            @include('messages.receive')
            @include('messages.messagesFromDB')
        </div>
    </div>
    <div class="send-message fixed-bottom">
        <form id="send" class="d-flex">
            <input type="text" id="message" name="message" autocomplete="off" class="form-control">
            <button class="btn"><span class="bi bi-send"></span></button>
        </form>
    </div>
</div>

<script>
    channel.bind('chat', function(data) {
        console.log('Received chat event:', data);
        $.post("/messages/receive", {
                _token: '{{ csrf_token() }}',
                message: data.message,
            })
            .done(function(res) {
                $(".chats-container > .chats").last().append(res);
                const chatsContainer = $(".empty");
                chatsContainer.scrollTop(chatsContainer[0].scrollHeight);
            });
    });

    //Broadcast messages
    $("#send").submit(function(event) {
        event.preventDefault();
        var now = @json(\Carbon\Carbon::now()->diffForHumans());
        console.log("Current timestamp:", now);
        $.ajax({
            url: "/messages/broadcast",
            method: 'POST',
            headers: {
                'X-Socket-Id': pusher.connection.socket_id
            },
            data: {
                _token: '{{ csrf_token() }}',
                message: $("#message").val(),
                threadID: $("#threadID").text(),
            }
        }).done(function(res) {
            $(".chats-container > .chats").last().append(res);
            $("#message").val('');
            const chatsContainer = $(".empty");
            chatsContainer.scrollTop(chatsContainer[0].scrollHeight);
        });
    });
</script>
