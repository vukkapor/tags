<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>All posts</title>
    </head>
    <body>
        <h1>Posts</h1>
        <ul>
            @foreach($posts as $post)
                <li><a href="{{ route('single-post', ['id' => $post->id]) }}">{{ $post->title }}</a></li>
            @endforeach
        </ul>
    </body>
</html>
