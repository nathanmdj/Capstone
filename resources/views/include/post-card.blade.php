<div class="post-container card text-info bg-primary rounded-0 p-3">
    <div class="post-header d-flex align-items-start  ">
        <span class="bi bi-person-circle"></span>

        <div class="post-content card-body p-1">
            <div class="d-flex justify-content-between ">
                <div class="d-flex">
                    @if ($post->user)
                        <p class="me-3 fw-bold">{{ '@' . $post->user->username }}</p>
                    @else
                        <p class="me-3 fw-bold">{{ unknown }}</p>
                    @endif
                    <p id="postCreatedAt">{{ \Carbon\Carbon::parse($post->created_at)->diffForHumans() }}</p>

                </div>

                @include('include.post-dropdown')
            </div>
            @if ($editing ?? false)
                @include('include.post-update')
            @else
                <p>
                    <pre>{!! htmlspecialchars($post->content) !!}</pre>
                </p>
            @endif
        </div>

    </div>



    @if ($showing ?? false)
        <div class="post-actions-2 py-2">
            <span class="bi bi-chat"></span>
            <span class="bi bi-hand-thumbs-up"></span>
        </div>
        @include('include.comment-create')
    @else
        <div class="post-actions">
            <span class="bi bi-chat"></span>
            <span class="bi bi-hand-thumbs-up"></span>
        </div>
    @endif
</div>
