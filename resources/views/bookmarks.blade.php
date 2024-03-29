@extends('layouts.homeLayout')
@section('content')
    <div class="bookmarks">
        <div class="header p-3 text-white">
            <h2 class="fw-bolder">Bookmarks</h2>
        </div>
        @foreach ($bookmarks as $post)
            @include('include.post-card')
        @endforeach

    </div>
@endsection
