<div class="status-container h-auto pb-3">
    <form action="{{ route('post.create') }}" method="POST" class="p-3" enctype="multipart/form-data">
        @csrf
        <div class="text-area d-flex ">
            <span class="bi bi-person-circle"></span>
            <textarea name="posts" id="posts" class="form-control bg-primary text-info border-0 "
                style="resize: none; overflow-y: hidden;"oninput="autoAdjust(this)"></textarea>
        </div>

        <div class="post-btn d-flex justify-content-end px-3">
            <button type="submit" class="btn btn-danger">Post</button>
        </div>
    </form>
</div>

<script>
    function autoAdjust(textarea) {
        textarea.style.height = ''; // Reset the height to auto
        textarea.style.height = textarea.scrollHeight + 'px'; // Set the height to match the content
    }
</script>
