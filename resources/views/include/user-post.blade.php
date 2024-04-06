<div class="post-container card text-info bg-primary rounded-0 p-3">
    <div class="post-header d-flex align-items-start  ">
        @if ($post->user->info->getImageUrl() ?? false)
            <div class="profile-img">
                <img src="{{ $post->user->info->getImageUrl() }}" alt="">
            </div>
        @else
            <span class="bi bi-person-circle"></span>
        @endif

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
                    <a href="{{ route('post.show', $post->id) }}">
                        <p>
                            <pre id="content" style="max-height: 400px;">{!! htmlspecialchars($post->content) !!}</pre>
                        </p>
                        <p id="see-more" style="display: none;" class="text-success fw-bold fs-6">Show More . . .</p>
                    </a>
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
            <button class="like-btn btn px-2 py-0" data-post-id="{{ $post->id }}"
                data-liked="{{ $post->isLike() ? 'true' : 'false' }}" onclick="handleLike(this)">
                <span
                    class="bi  {{ $post->isLike() ? 'bi-hand-thumbs-up-fill' : 'bi-hand-thumbs-up' }}">{{ $post->likes()->count() }}</span>
            </button>
            <span class="bi bi-eye"></span>
            <span class="bi bi-bookmark"></span>
        </div>
        @include('include.comment-create')
    @else
        <a href="{{ route('post.show', $post->id) }}">
            <img src="{{ $post->getImageUrl() }}" alt="" class="w-100 mb-3">
        </a>
        <div class="post-actions d-flex justify-content-between pe-5">
            <span class="bi bi-chat"></span>
            <button class="like-btn btn px-2 py-0" data-post-id="{{ $post->id }}"
                data-liked="{{ $post->isLike() ? 'true' : 'false' }}" onclick="handleLike(this)">
                <span
                    class="bi  {{ $post->isLike() ? 'bi-hand-thumbs-up-fill' : 'bi-hand-thumbs-up' }}">{{ $post->likes()->count() }}</span>
            </button>
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

        function handleLike(button) {
            const postId = button.getAttribute('data-post-id');
            const isLiked = button.getAttribute('data-liked') === 'true';

            // Send Ajax request
            fetch(`/like/${postId}`, {
                    method: isLiked ? 'DELETE' : 'POST', // Use DELETE to unlike, POST to like
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}',
                        'Content-Type': 'application/json'
                    }
                })
                .then(response => response.json())
                .then(data => {
                    // Update UI based on response
                    const span = button.querySelector('span');
                    let counter = Number(span.textContent);
                    data.liked ? counter++ : counter--;
                    span.textContent = counter;
                    span.classList.remove(data.liked ? 'bi-hand-thumbs-up' : 'bi-hand-thumbs-up-fill');
                    span.classList.add(data.liked ? 'bi-hand-thumbs-up-fill' : 'bi-hand-thumbs-up');

                    // Update data-liked attribute
                    button.setAttribute('data-liked', data.liked ? 'true' : 'false');
                })
                .catch(error => {
                    console.error('Error:', error);
                });
        }
    </script>
</div>
