@foreach ($post->comments->reverse() as $comment)
    <div class="post-container card text-info bg-primary rounded-0 p-3">
        <div class="post-header d-flex align-items-start  ">
            @if ($comment->user->info->getImageUrl() ?? false)
                <div class="profile-img">
                    <img src="{{ $comment->user->info->getImageUrl() }}" alt="">
                </div>
            @else
                <span class="bi bi-person-circle"></span>
            @endif
            <div class="post-content card-body p-1">
                <div class="d-flex justify-content-between ">
                    <div class="d-flex">
                        @if ($comment->user)
                            <p class="me-3 fw-bold">{{ '@' . $comment->user->username }}</p>
                        @else
                            <p class="me-3 fw-bold">unknown</p>
                        @endif

                        <p id="commentDate">{{ \Carbon\Carbon::parse($comment->created_at)->diffForHumans() }}</p>
                    </div>


                    <div class="btn-group">
                        <button type="button" class="btn btn-primary rounded-circle" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            <i class="bi bi-three-dots"></i>
                        </button>
                        <ul class="dropdown-menu dropdown-menu-end bg-primary">
                            <li>
                                <form method="POST" action="{{ route('post.comments.destroy', $comment->id) }}">
                                    @csrf
                                    @method('DELETE')
                                    <button class="menu-item" type="submit"><span class="bi bi-trash"></span>
                                        Delete
                                        comment</button>
                                </form>
                            </li>
                        </ul>
                    </div>



                </div>

                <p>
                    <pre>{!! htmlspecialchars($comment->content) !!}</pre>
                </p>

            </div>

        </div>


        <div class="post-actions">
            <button class="like-btn btn px-2 py-0" data-post-id="{{ $comment->id }}"
                data-liked="{{ $comment->isLike() ? 'true' : 'false' }}" onclick="handleLikeComment(this)">
                <span
                    class="bi  {{ $comment->isLike() ? 'bi-hand-thumbs-up-fill' : 'bi-hand-thumbs-up' }}">{{ $comment->likes_comment()->count() }}</span>
            </button>
        </div>

    </div>
@endforeach

<script>
    function handleLikeComment(button) {
        const commentId = button.getAttribute('data-post-id');
        const isLiked = button.getAttribute('data-liked') === 'true';

        // Send Ajax request
        fetch(`/likeComment/${commentId}`, {
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
