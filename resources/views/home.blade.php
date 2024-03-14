@extends('layouts.homeLayout')
@section('content')
    <div class="home mt-4">
        @include('include.submit-post')
        @foreach ($posts as $post)
            <div class="post-container card text-info bg-primary rounded-0 p-3">
                <p>{{ $post->content }}</p>
                <p>{{ $post->created_at }}</p>
            </div>
        @endforeach
    </div>
@endsection
