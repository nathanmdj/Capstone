@foreach ($post->comments->reverse() as $comment)
    <div class="post-container card text-info bg-primary rounded-0 p-3">
        <div class="post-header d-flex align-items-start  ">
            <span class="bi bi-person-circle"></span>

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
                                <form method="POST" action="{{ route('comments.destroy', $comment->id) }}">
                                    @csrf
                                    @method('DELETE')
                                    <button class="menu-item" type="submit"><span class="bi bi-trash"></span> Delete
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
            <span class="bi bi-chat"></span>
            <span class="bi bi-hand-thumbs-up"></span>
        </div>

    </div>
@endforeach
