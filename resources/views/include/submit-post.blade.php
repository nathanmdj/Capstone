<div class="status-container h-auto pb-3">
    <form action="{{ route('post.create') }}" method="POST" class="p-3" enctype="multipart/form-data">
        @csrf
        <div class="text-area d-flex ">
            <span class="bi bi-person-circle"></span>
            <textarea name="content"class="form-control bg-primary text-info border-0 "
                style="resize: none; overflow-y: hidden;"oninput="autoAdjust(this)" placeholder="Need help? Ask!"></textarea>
        </div>

        <div class="post-btn d-flex justify-content-between px-3">
            <input type="file" id="image" name="image" accept="image/*" style="display: none;">
            <button type="button" onclick="$('#image').click();" class="btn"><span
                    class="bi bi-image"></span></button>
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
