@extends('layouts.profileLayout')
@section('content')
    <div class="profile">

        @if ($editing ?? false)
            @include('profile.edit')
        @else
            <div class="cover-photo">
                <div class="cover-img">
                    <img id="upload2" src="{{ $user->info->getCoverUrl() }}" alt="">
                </div>
                @if ($user->info->getImageUrl() ?? false)
                    <div class="profile-img">
                        <img id="upload" src="{{ $user->info->getImageUrl() }}" alt="">
                    </div>
                @else
                    <span class="bi bi-person-circle"></span>
                @endif
            </div>
            <div class="edit-profile d-flex justify-content-end mt-3 me-3">
                @if ($user->id == auth()->id())
                    <form action="{{ route('profile.edit', auth()->id()) }}">
                        @csrf
                        <div class="btn-container d-flex justify-content-end ">
                            <button class="btn rounded-5 text-white">Edit Profile</button>
                        </div>
                    </form>
                @elseif (auth()->user()->follows($user))
                    <form action="{{ route('user.unfollow', $user->id) }}" method="POST">
                        @csrf
                        <div class="btn-container d-flex justify-content-end ">
                            <button class="btn rounded-5 text-white">Unfollow</button>
                        </div>
                    </form>
                @else
                    <form action="{{ route('user.follow', $user->id) }}" method="POST">
                        @csrf
                        <div class="btn-container d-flex justify-content-end ">
                            <button class="btn rounded-5 text-white">Follow</button>
                        </div>
                    </form>
                @endif
            </div>
            <div class="info">
                <h2>{{ $user->info->name }}</h2>
                <p>{{ '@' . $user->username }}</p>
                <p>{{ $user->info->bio }}</p>
                <p>{{ $user->info->location }}</p>
                <a href="{{ $user->info->portfolio_url }}" target="_blank">
                    <p style="color: green;">{{ $user->info->portfolio_url }}</p>
                </a>

                <p><span class="bi bi-calendar3"> Joined</span>
                    {{ $user->created_at->timezone('Asia/Manila')->format('F d, Y') }}</p>

                <div class="follows d-flex gap-3">
                    <p>
                        <span class="counter">{{ $user->followers()->count() }}</span>
                        Following
                    </p>
                    <p>
                        <span class="counter">{{ $user->followings()->count() }}</span>
                        Followers
                    </p>
                </div>
            </div>
            @foreach ($posts as $post)
                <a href="{{ route('post.show', $post->id) }}">
                    @include('include.user-post')
                </a>
            @endforeach
        @endif
    </div>
    <script>
        $(document).ready(function() {
            $('#upload-photo').click(function() {
                $('#photo').click();
            });

            $('#upload-cover').click(function() {
                $('#cover').click();
            });
        });

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

        const imageInput2 = document.getElementById('cover');
        const uploadedImage2 = document.getElementById('upload2');

        // Listen for changes in the file input
        imageInput2.addEventListener('change', function() {
            // Get the selected file
            const file = this.files[0];

            // Create a URL for the selected file
            const imageUrl = URL.createObjectURL(file);

            // Update the src attribute of the image element with the URL
            uploadedImage2.src = imageUrl;
        });
    </script>

@endsection
