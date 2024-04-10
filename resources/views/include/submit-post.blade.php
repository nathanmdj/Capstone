<div class="status-container h-auto pb-3">
    <form action="{{ route('post.create') }}" method="POST" class="p-3" enctype="multipart/form-data">
        @csrf
        <div class="text-area d-flex justify-content-evenly ">
            @if (auth()->user()->info->getImageUrl() ?? false)
                <a href="{{ route('profile.show', auth()->id()) }}">
                    <div class="profile-img">
                        <img src="{{ auth()->user()->info->getImageUrl() }}" alt="">
                    </div>
                </a>
            @else
                <span class="bi bi-person-circle"></span>
            @endif

            <textarea name="content"class="form-control bg-primary text-info border-0 "
                style="resize: none; overflow-y: hidden;"oninput="autoAdjust(this)" placeholder="Need help? Ask!"></textarea>
        </div>
        <img id="upload" alt="" class="w-100 mb-3">
        <div class="post-btn d-flex justify-content-between px-3">
            <input type="file" id="photo" name="photo" accept="image/*" style="display: none;">
            <button type="button" onclick="$('#photo').click();" class="btn"><span
                    class="bi bi-image"></span></button>
            <button type="submit" class="btn btn-danger">Post</button>
        </div>

    </form>
</div>

<script>
    const imageInput = document.getElementById('photo');
    const uploadedImage = document.getElementById('upload');

    // Listen for changes in the file input
    imageInput.addEventListener('change', function() {
        // Get the selected file
        const file = this.files[0];

        // Create a URL for the selected file
        const imageUrl = URL.createObjectURL(file);

        // Update the src attribute of the image element with the URL
        uploadedImage.src = imageUrl;
    });

    function autoAdjust(textarea) {
        textarea.style.height = ''; // Reset the height to auto
        textarea.style.height = textarea.scrollHeight + 'px'; // Set the height to match the content
    }
</script>
