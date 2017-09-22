@extends('layouts.master')

@section('title')
    {{ $post->title }}
@endsection

@section('content')
    <h1 class="blog-post-title">{{ $post->title }}</h1>
    <p>{{ $post->body }}</p>
@endsection