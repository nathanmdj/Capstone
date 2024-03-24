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

                    @if ($showing ?? false)
                    @else
                        <p id="postCreatedAt">{{ \Carbon\Carbon::parse($post->created_at)->diffForHumans() }}</p>
                    @endif

                </div>
                @if ($post->user_id == auth()->id())
                    @include('include.post-dropdown')
                @endif
            </div>
            @if ($editing ?? false)
                @include('include.post-update')
            @else
                @if ($showing ?? false)
                    <p>
                        <pre>{!! htmlspecialchars($post->content) !!}</pre>
                    </p>
                @else
                    <p>
                        <pre id="content" style="max-height: 400px;">{!! htmlspecialchars($post->content) !!}</pre>
                    </p>
                    <p id="see-more" style="display: none;" class="text-success">See More . . .</p>
                @endif
            @endif
        </div>

    </div>



    @if ($showing ?? false)
        <div class="date-time mb-2">
            <p>
                {{ $post->created_at->timezone('Asia/Manila')->format('h:i A') }}
                <span class="bi bi-dot m-0  fs-6"></span>
                {{ $post->created_at->timezone('Asia/Manila')->format('M d, Y') }}

            </p>
        </div>
        <div class="post-actions-2 py-2 d-flex justify-content-between pe-5">
            <span class="bi bi-chat"></span>
            <span class="bi bi-hand-thumbs-up"></span>
            <span class="bi bi-eye"></span>
            <span class="bi bi-bookmark"></span>
        </div>
        @include('include.comment-create')
    @else
        <div class="post-actions d-flex justify-content-between pe-5">
            <span class="bi bi-chat"></span>
            <span class="bi bi-hand-thumbs-up"></span>
            <span class="bi bi-eye"></span>
            <span class="bi bi-bookmark"></span>
        </div>
    @endif

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            var pre = document.getElementById("content");
            var seeMoreLink = document.getElementById("see-more");

            if (pre.scrollHeight > 400) {
                seeMoreLink.style.display = "block";
            }

            seeMoreLink.addEventListener("click", function(event) {
                event.preventDefault();
                pre.style.maxHeight = "none";
                seeMoreLink.style.display = "none";
            });
        });
    </script>
</div>
