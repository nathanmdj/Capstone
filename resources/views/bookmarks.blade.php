@extends('layouts.homeLayout')
@section('content')
    <div class="mt-5">

    </div>
    @foreach ($bookmarks as $post)
        @include('include.post-card')
    @endforeach
@endsection
