@extends('layouts.homeLayout')
@section('content')
    <div class="home" id="home">
        @include('include.submit-post')
        @foreach ($posts as $post)
            @include('include.post-card')
        @endforeach
    </div>
@endsection
