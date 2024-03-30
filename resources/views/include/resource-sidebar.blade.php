<nav class="navbar nav-resources flex-column navbar-expand-lg bg-body-primary">
    <div class="container-fluid justify-content-center align-items-center">

        <button class="navbar-toggler bg-info justify-content-center align-items-center" type="button"
            data-bs-toggle="offcanvas" data-bs-target="#offcanvasScrolling" aria-expanded="false" data-bs-backdrop="static"
            aria-controls="offcanvasScrolling">
            <span class="navbar-toggler-icon"></span></button>

        <div class="offcanvas offcanvas-top h-100" data-bs-scroll="true" data-bs-backdrop="false" tabindex="-1"
            id="offcanvasScrolling" aria-labelledby="offcanvasScrollingLabel">
            <div class="offcanvas-header">
                <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>
            <div class="offcanvas-body bg-primary">
                <ul class="navbar-nav flex-column me-auto mb-2 mb-lg-0 mx-md-3 rounded-5">

                    <li class="nav-item">
                        <a href="{{ route('resources') }}" class="nav-link text-white form-control form-control-lg">
                            <span class="resource-link fs-4 d-sm-inline ms-3">All</span>
                        </a>
                    </li>

                    @php
                        $uniqueCategories = [];
                        foreach ($resources as $resource) {
                            if (!in_array($resource->category, $uniqueCategories)) {
                                $uniqueCategories[] = $resource->category;
                            }
                        }
                    @endphp
                    @foreach ($uniqueCategories as $category)
                        <li class="nav-item">
                            <a href="{{ route('resources.filter', $category) }}"
                                class="nav-link text-white form-control form-control-lg">
                                <span class="resource-link fs-4 d-sm-inline ms-3">{{ $category }}</span>
                            </a>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>

    </div>
</nav>
