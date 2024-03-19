<div class="comment-create h-auto ">
    <form action="{{ route('post.comments.store', $post->id) }}" method="POST" class=""
        enctype="multipart/form-data">
        @csrf
        <div class="text-area d-flex ">
            <span class="bi bi-person-circle"></span>
            <textarea name="content" class="form-control bg-primary text-info border-0 "
                style="resize: none; overflow-y: hidden;"oninput="autoAdjust(this)" placeholder="Post your reply"></textarea>
        </div>

        <div class="post-btn d-flex justify-content-end px-3">
            <button type="submit" class="btn btn-danger rounded-5">Reply</button>
        </div>
    </form>
</div>

<script>
    function autoAdjust(textarea) {
        textarea.style.height = ''; // Reset the height to auto
        textarea.style.height = textarea.scrollHeight + 'px'; // Set the height to match the content
    }
</script>
