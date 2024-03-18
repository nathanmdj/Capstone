<div class="btn-group">
    <button type="button" class="btn btn-primary rounded-circle" data-bs-toggle="dropdown" aria-expanded="false">
        <i class="bi bi-three-dots"></i>
    </button>
    <ul class="dropdown-menu dropdown-menu-end bg-primary">
        <li>
            <form method="POST" action="{{ route('post.destroy', $post->id) }}">
                @csrf
                @method('DELETE')
                <button class="menu-item" type="submit"><span class="bi bi-trash"></span> Delete
                    post</button>
            </form>
        </li>
        <li>
            <form method="GET" action="{{ route('post.edit', $post->id) }}">
                <button class="menu-item"><span class="bi bi-pencil"></span> Edit</button>
                @csrf

            </form>
        </li>

    </ul>
</div>
