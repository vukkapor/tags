@extends('layouts.master')

@section('title')
    {{ $post->title }}
@endsection

@section('content')
    <h1 class="blog-post-title">{{ $post->title }}</h1>
    <p>{{ $post->body }}</p>
    @if(count($post->comments))
        <hr/>
        <h4>Comments:</h4>
        <ul class="list-unstyled">
            @foreach($post->comments as $comment)
                <li>
                    <p>
                        <strong>Author:</strong> {{ $comment->author }}
                    </p>
                    <p>
                        {{ $comment->text }}
                    </p>
                </li>
            @endforeach
        </ul>
    @endif
@endsection