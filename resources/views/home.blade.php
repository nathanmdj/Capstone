@extends('layouts.homeLayout')
@section('content')
    <div class="home mt-4">
        @include('include.submit-post')
        @foreach ($posts as $post)
            <div class="post-container card text-info bg-primary rounded-0 p-3">
                <div class="post-header d-flex align-items-start  ">
                    <span class="bi bi-person-circle"></span>

                    <div class="post-content card-body p-1">
                        <div class="d-flex justify-content-between ">
                            <p id="postCreatedAt">{{ \Carbon\Carbon::parse($post->created_at)->diffForHumans() }}</p>

                            <div class="btn-group">
                                <button type="button" class="btn btn-primary rounded-circle" data-bs-toggle="dropdown"
                                    aria-expanded="false">
                                    <i class="bi bi-three-dots"></i>
                                </button>
                                <ul class="dropdown-menu dropdown-menu-end bg-primary">
                                    <li>
                                        <form method="POST" action="{{ route('post.destroy', $post->id) }}">
                                            @csrf
                                            @method('DELETE')

                                            <button class="menu-item" type="submit"><span class="bi bi-trash"></span>Delete
                                                post</button>
                                        </form>
                                    </li>
                                    <li>
                                        <form>
                                            <button class="menu-item">Unfollow</button>
                                        </form>
                                    </li>

                                </ul>
                            </div>
                        </div>
                        <p>{!! nl2br(e($post->content)) !!}</p>
                    </div>

                </div>
            </div>
        @endforeach
    </div>
@endsection
