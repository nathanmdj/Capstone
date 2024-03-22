<div class="col-1 sidebar-nav position-fixed">
    <div class="d-flex flex-column vh-100">
        <div class="pt-2 logo">
            <a href="{{ route('home') }}"> <img src="{{ asset('images/devX.png') }}" alt=""></a>
        </div>
        <div class="d-flex flex-column justify-content-between vh-100 ">
            <div class="nav navbar ">
                <ul class="nav">
                    <li class="nav-item">
                        <a href="{{ route('home') }}"
                            class="nav-link {{ request()->is('/') ? 'active' : '' }} ">Home</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('profile') }}"
                            class="nav-link {{ request()->is('profile') ? 'active' : '' }}">Profile</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('messages') }}"
                            class="nav-link {{ request()->is('messages') ? 'active' : '' }}">Messages</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('bookmarks') }}"
                            class="nav-link {{ request()->is('bookmarks') ? 'active' : '' }}">Bookmarks</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('resources') }}" target="_blank" class="nav-link">Resources</a>
                    </li>
                </ul>
            </div>
            @include('include.user-button')
        </div>
    </div>
</div>
