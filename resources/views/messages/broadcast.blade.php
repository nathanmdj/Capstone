<div class="right text-white">
    <div class="display-right rounded-4 mb-2 ">
        <p>{{ $message }}</p>
    </div>
</div>
<p class="date-right">{{ \Carbon\Carbon::now()->diffForHumans() }}</p>
