<html>
<head>
</head>
<body>
        @foreach($posts as $post)
        @if($post->image)
            <img src="{{ $post->get_image }}" width="70px;" height="70px;">
        @elseif($post->iframe)
            {!! $post->iframe !!}
        @endif
        <br/>
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
