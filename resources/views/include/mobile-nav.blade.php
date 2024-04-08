<div class="nav navbar d-block ">
    <ul class="nav d-flex justify-content-between ">
        <li class="nav-item">
            <a href="{{ route('home') }}" class="nav-link {{ request()->is('/') ? 'active' : '' }} ">
                <span class="bi {{ request()->is('/') ? 'bi-house-door-fill' : 'bi-house-door' }}"></span>
                <span class="d-none d-xl-inline ">Home</span>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('profile.show', auth()->id()) }}"
                class="nav-link {{ request()->is('profile/*') ? 'active' : '' }}">
                <span class="bi {{ request()->is('profile/*') ? 'bi-person-fill' : 'bi-person' }}"></span>
                <span class="d-none d-xl-inline ">Profile</span>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('messages.show') }}" class="nav-link {{ request()->is('messages') ? 'active' : '' }}">
                <span class="bi {{ request()->is('messages') ? 'bi-envelope-fill' : 'bi-envelope' }}"></span>
                <span class="d-none d-xl-inline ">Messages</span>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('bookmarks.show') }}" class="nav-link {{ request()->is('bookmarks') ? 'active' : '' }}">
                <span class="bi {{ request()->is('bookmarks') ? 'bi-bookmark-fill' : 'bi-bookmark' }}"></span>
                <span class="d-none d-xl-inline ">Bookmarks</span>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('resources') }}" target="_blank" class="nav-link">
                <span class="bi {{ request()->is('resources') ? 'bi-database-fill' : 'bi-database' }}"></span>
                <span class="d-none d-xl-inline ">Resources</span>
            </a>
        </li>
    </ul>
</div>
