@extends('layouts.homeLayout')
@section('content')
    <div class="home mt-4">
        @include('include.submit-post')
        @foreach ($posts as $post)
            <a href="{{ route('post.show', $post->id) }}">
                @include('include.post-card')
            </a>
        @endforeach
    </div>
@endsection
