@if ($message ?? false)
    <div class="left">
        <div class="display-left rounded-4 mb-2 ">

            <p>{{ $message }}</p>

        </div>
    </div>
    <p class="date-left">{{ now()->timezone('Asia/Manila')->format('M d, Y, h:i A') }}</p>
@endif
