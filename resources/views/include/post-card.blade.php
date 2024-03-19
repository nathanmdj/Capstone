<div class="post-container card text-info bg-primary rounded-0 p-3">
    <div class="post-header d-flex align-items-start  ">
        <span class="bi bi-person-circle"></span>

        <div class="post-content card-body p-1">
            <div class="d-flex justify-content-between ">
                <p id="postCreatedAt">{{ \Carbon\Carbon::parse($post->created_at)->diffForHumans() }}</p>

                @include('include.post-dropdown')
            </div>
            @if ($editing ?? false)
                @include('include.post-update')
            @else
                <p>{!! nl2br(e($post->content)) !!}</p>
            @endif
        </div>

    </div>
    <div class="post-actions">
        <span class="bi bi-chat"></span>
        <span class="bi bi-hand-thumbs-up"></span>
    </div>
    @if ($showing ?? false)
        @include('include.comment-create')
    @endif
</div>
