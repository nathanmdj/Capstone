<div class="cover-photo">
    <div class="upload-cover" id="upload-cover">
        <img src="{{ asset('images/icons8-add-camera-48.png') }}" alt="">
    </div>
    <div class="cover-img">
        <img id="upload2" src="{{ $user->info->getCoverUrl() }}" alt="">
    </div>
    @if (auth()->user()->info->getImageUrl() ?? false)
        <div class="profile-img">
            <img id="upload" src="{{ $user->info->getImageUrl() }}" alt="">
        </div>
    @else
        <span class="bi bi-person-circle"></span>
    @endif
    <div class="upload-photo" id="upload-photo">
        <img src="{{ asset('images/icons8-add-camera-48.png') }}" alt="">
    </div>
</div>
<div class="edit-profile ">
    <form method="POST" action="{{ route('profile.update', auth()->id()) }}" enctype="multipart/form-data" novalidate>
        @csrf
        @method('PUT')
        <input type="file" id="photo" name="photo" accept="image/*" style="display: none;">
        <input type="file" id="cover" name="cover" accept="image/*" style="display: none;">
        <div class="btn-container d-flex justify-content-end mt-3 me-3">
            <button class="btn rounded-5 text-white">Save</button>
        </div>
        <label>
            <input name="name" class="input" type="text" placeholder="" required=""
                value="{{ auth()->user()->info->name }}">
            <span>Name</span>
        </label>
        <label>
            <textarea name="bio" class="input" type="text" placeholder="" required="" rows="3">{{ auth()->user()->info->bio }}</textarea>
            <span>Bio</span>
        </label>
        <label>
            <input name="location" class="input" type="text" placeholder="" required=""
                value=" {{ auth()->user()->info->location }}">
            <span>Location</span>
        </label>
        <label>
            <input name="portfolio_url" class="input" type="text" placeholder="" required=""
                value="{{ auth()->user()->info->portfolio_url }}">
            <span>Portfolio Url</span>
        </label>
    </form>
</div>
