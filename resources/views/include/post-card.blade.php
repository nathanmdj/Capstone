<div id="posts-container" class="post-container card text-info bg-primary rounded-0 p-3">
    {{-- {{ dump($editing ?? false) }} --}}
    <div class="post-header d-flex align-items-start  ">
        @if ($post->user->info->getImageUrl() ?? false)
            <a href="{{ route('profile.show', $post->user->id) }}">
                <div class="profile-img">
                    <img src="{{ $post->user->info->getImageUrl() }}" alt="">
                </div>
            </a>
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
            @elseif ($showing ?? false)
                <p>
                    <pre>{!! htmlspecialchars($post->content) !!}</pre>
                </p>
            @else
                <a href="{{ route('post.show', $post->id) }}">
                    <div class="post-with-more">

                        <p>
                            <pre class="content" style="max-height: 400px;">{!! htmlspecialchars($post->content) !!}</pre>
                        </p>
                        <p style="display: none;" class="see-more text-success fw-bold fs-6">Show More . . .</p>
                    </div>
                </a>
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
            <span class="bi bi-chat"> {{ $post->comments()->count() }}</span>
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
        <div class="post-actions d-flex justify-content-between pe-5">
            <span class="bi bi-chat"> {{ $post->comments()->count() }}</span>

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
            var preElements = document.querySelectorAll(".content");
            var seeMoreLinks = document.querySelectorAll(".see-more");

            preElements.forEach(function(pre, index) {
                var seeMoreLink = seeMoreLinks[index];

                if (pre.scrollHeight > 400) {
                    seeMoreLink.style.display = "block";
                }

                seeMoreLink.addEventListener("click", function(event) {
                    event.preventDefault();
                    pre.style.maxHeight = "none"; // Set maxHeight for individual pre element
                    seeMoreLink.style.display = "none";
                });
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
