@foreach ($post->comments as $comment)
    <div class="post-container card text-info bg-primary rounded-0 p-3">
        <div class="post-header d-flex align-items-start  ">
            <span class="bi bi-person-circle"></span>

            <div class="post-content card-body p-1">
                <div class="d-flex justify-content-between ">
                    <p id="postCreatedAt">{{ \Carbon\Carbon::parse($comment->created_at)->diffForHumans() }}</p>

                    @include('include.post-dropdown')
                </div>

                <p>
                    <pre>{!! htmlspecialchars($comment->content) !!}</pre>
                </p>

            </div>

        </div>


        <div class="post-actions">
            <span class="bi bi-chat"></span>
            <span class="bi bi-hand-thumbs-up"></span>
        </div>

    </div>
@endforeach
