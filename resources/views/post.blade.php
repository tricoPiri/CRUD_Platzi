<html>
<head>
</head>
<body>
        {{ $post->title }}
        <br/>
        {{ $post->body }}
        <br/>
        {{ $post->user->name }}
        <br/>
        {{ $post->created_at->format('d M Y') }}
        <br/>
</body>
</html>
