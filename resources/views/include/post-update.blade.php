<div class=" pb-3">
    <form action="{{ route('post.update', $post->id) }}" method="POST" class="p-0" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="text-area d-flex mb-3">
            <textarea name="content" id="content" class="form-control bg-primary text-info border-0 p-0 px-1"
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
