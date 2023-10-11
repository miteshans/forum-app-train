<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

    </head>
    <body class="antialiased">
        <div>
              <h2>All Threads by User</h2>
              {{$threads}}
              <hr>
              @foreach ($threads as $thread)
                  <p><a href="#">{{ $thread->title }}</a></p>
                  {{$thread->body}}
                  <hr>
              @endforeach
              <h2>All Posts by User</h2>
              {{$posts}}
              <hr>
              @foreach ($posts as $post)
                  <a href="#">{{$post->body}}</a>
                  <hr>
              @endforeach
        </div>
    </body>
</html>
