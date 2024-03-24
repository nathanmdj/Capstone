@extends('layouts.resourcesLayout')
@section('content')
    <div class="container-fluid">
        <div class="row">

            <nav class="navbar nav-resources flex-column col-md-4 navbar-expand-lg bg-body-primary">
                <div class="container-fluid justify-content-center align-items-center">

                    <button class="navbar-toggler bg-white justify-content-center align-items-center" type="button"
                        data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
                        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav flex-column me-auto mb-2 mb-lg-0 mx-md-3 rounded-5">

                            <li class="nav-item">
                                <a href="#" class="nav-link text-white form-control form-control-lg">
                                    <span class="fs-4 d-sm-inline ms-3">All</span>
                                </a>
                            </li>
                            @foreach ($resources as $resource)
                                <li class="nav-item">
                                    <a href="#" class="nav-link text-white form-control form-control-lg">
                                        <span class="fs-4 d-sm-inline ms-3">{{ $resource->category }}</span>
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </nav>


            @foreach ($resources as $resource)
                <div class="col-md-8 main px-4 py-4">
                    <!--Card-->
                    <div>
                        <a href="{{ $resource->url }}" target="_blank">
                            <div class="card mb-3" style="max-width: 540px;">
                                <div class="row g-0">
                                    <div class="col-md-4">
                                        <img src="{{ $resource->img_url }}" class="img-fluid rounded-start" alt="...">
                                    </div>

                                    <div class="col-md-8">
                                        <div class="card-body">
                                            <h5 class="card-title">{{ $resource->name }}</h5>
                                            <p class="card-text">This is a wider card with supporting text below as a
                                                natural
                                                lead-in
                                                to
                                                additional content. This content is a little bit longer.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            @endforeach

        </div>
    </div>
@endsection
