@extends('layouts.master')

@section('title')
    All posts
@endsection

@section('content')

    <a href="{{ route('create-post') }}" class="btn btn-primary">Create new post</a>

    <hr>

    <ul>
        @foreach($posts as $post)
            <h2 class="blog-post-title"><a href="{{ route('single-post', ['id' => $post->id]) }}">{{ $post->title }}</a></h2>
            @if($post->user)
                <a href="/users/{{$post->user->id}}">{{ $post->user->name}}</a>
            @endif
            <p>{{ $post->body }}</p>
        @endforeach
    </ul>
    <nav class="blog-pagination">
        <a 
            href="{{ $posts->previousPageUrl() }}" 
            class="btn btn-outline-{{ $posts->currentPage() === 1 ? 'disabled' : 'primary' }}"
        >
            Previous
        </a>
        <a 
            href="{{ $posts->nextPageUrl() }}" 
            class="btn btn-outline-{{ $posts->hasMorePages() ? 'primary' : 'disabled' }}"
        >
            Next
        </a>
        <hr>
        Page {{ $posts->currentPage() }} of {{ $posts->lastPage() }}
    </nav>
@endsection