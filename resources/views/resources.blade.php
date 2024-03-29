@extends('layouts.resourcesLayout')
@section('content')
    <div class="container-fluid">
        <div class="row">

            @foreach ($resources as $resource)
                <div class="col-md-4 main px-4 py-4">
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
                                            <p class="card-text" style="max-height: 300px; overflow:hidden">
                                                {{ $resource->description }}</p>
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
