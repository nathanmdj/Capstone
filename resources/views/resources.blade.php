@extends('layouts.resourcesLayout')
@section('content')
    <div class="container-fluid">
        <div class="row">

            @foreach ($filter as $resource)
                <div class="resource-page col-md-auto main px-2 py-2">
                    <!--Card-->
                    <a href="{{ $resource->url }}" target="_blank">
                        <div class="card mb-1 h-100 mx-auto" style="max-width: 370px;">
                            <div class="row g-0">
                                <div class="col-md-4">
                                    <img src="{{ $resource->img_url }}" class="img-fluid rounded-start px-0"
                                        style="width: 100px; height: 100px;" alt="...">
                                </div>

                                <div class="col-lg-8">
                                    <div class="card-body">
                                        <h5 class="card-title">{{ $resource->name }}</h5>
                                        <p class="card-text" style="max-height: 90px; overflow:hidden">
                                            {{ $resource->description }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            @endforeach

        </div>
    </div>
@endsection
