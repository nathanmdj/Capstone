@extends('layouts.homeLayout')
@section('content')
    <div class="view-post mt-4">

        <a href="{{ route('home') }}" class="back-btn rounded-circle ">
            <div class="back-group">
                <span class="bi bi-arrow-left"></span>
                <p>Post</p>
            </div>
        </a>

        @include('include.post-card')
        @include('include.comments')
    </div>
@endsection
