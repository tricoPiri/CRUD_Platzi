<html>
<head>
</head>
<body>
    @foreach($posts as $post)
        {{ $post->title }}
        <br/>
        {{ $post->get_excerpt }}
        <br/>
        <a href="{{ route('post.get', $post) }}">Leer mas...</a>
        <br/>
        {{ $post->user->name }}
        <br/>
        {{ $post->created_at->format('d M Y') }}
        <br/>
    @endforeach
</body>
</html>
