@php
    $previousDate = null;
@endphp
@foreach ($messagesFromDB as $messages)
    @if ($messages->user_id == auth()->id())
        @php
            $currentDate = $messages->created_at->timezone('Asia/Manila')->format('M d, Y , h:i A');
        @endphp

        @if ($currentDate != $previousDate)
            <p class="date">{{ $messages->created_at->timezone('Asia/Manila')->format('M d, Y, h:i A') }}</p>
            @php
                $previousDate = $currentDate;
            @endphp
        @endif

        <div class="right text-white">
            <div class="display-right rounded-4 mb-2 ">
                <p>{{ $messages->content }}</p>
            </div>
        </div>
    @else
        <div class="left">
            <div class="display-left rounded-4 mb-2 ">

                <p>{{ $messages->content }}</p>

            </div>
        </div>
    @endif
@endforeach
