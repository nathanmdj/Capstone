<div class="status-container h-auto pb-3">
    <form action="{{ route('post.create') }}" method="POST">
        @csrf
        <textarea name="posts" id="posts" class="form-control bg-primary text-info border-0 "
            style="resize: none; overflow-y: hidden;"oninput="autoAdjust(this)"></textarea>
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
