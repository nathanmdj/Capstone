@auth
    <div class="user-btn mb-4 btn-group dropup">
        <button type="button" class="btn btn-primary rounded-5" data-bs-toggle="dropdown" aria-expanded="false">
            <div class="user-btn d-flex align-items-center w-100 ">
                <span class="bi bi-person-circle"></span>
                <div class="username">
                    <p>{{ Auth::user()->username }}</p>
                    <p>{{ '@' . Auth::user()->username }}</p>
                </div>
            </div>
        </button>
        <ul class="dropdown-menu dropdown-menu-top bg-primary">
            <li>
                <a class="dropdown-item " href="{{ route('logout') }}">Logout</a>
            </li>

        </ul>
    </div>

@endauth
