<div class="post-container card text-info bg-primary rounded-0 p-3">
    <div class="post-header d-flex align-items-start  ">
        <span class="bi bi-person-circle"></span>

        <div class="post-content card-body p-1">
            <div class="d-flex justify-content-between ">
                <p id="postCreatedAt">{{ \Carbon\Carbon::parse($post->created_at)->diffForHumans() }}</p>

                @include('include.post-dropdown')
            </div>
            @if ($editing ?? false)
                <div class=" pb-3">
                    <form action="{{ route('post.update', $post->id) }}" method="POST" class="p-0"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="text-area d-flex ">
                            <textarea name="content" id="content" class="form-control bg-primary text-info border-0 p-0"
                                style="resize: none; overflow-y: hidden;"oninput="autoAdjust(this)">{{ $post->content }}</textarea>
                        </div>

                        <div class="post-btn d-flex justify-content-end px-3">
                            <button type="submit" class="btn btn-danger">Update</button>
                        </div>
                    </form>
                </div>

                <script>
                    function autoAdjust(textarea) {
                        textarea.style.height = ''; // Reset the height to auto
                        textarea.style.height = textarea.scrollHeight + 'px'; // Set the height to match the content
                    }
                </script>
            @else
                <p>{!! nl2br(e($post->content)) !!}</p>
            @endif
        </div>

    </div>
</div>
