<html>
<head>
</head>
<body>
@if (Route::has('login'))
                <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
                    @auth
                        <a href="{{ url('/home') }}" class="text-sm text-gray-700 underline">Home</a>
                    @else
                        <a href="{{ route('login') }}" class="text-sm text-gray-700 underline">Log in</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 underline">Register</a>
                        @endif
                    @endauth
                </div>
@endif

    @foreach($posts as $post)
        {{ $post->title }}
        <br/>
        {{ $post->get_excerpt }}
        <br/>
        <a href="{{ route('post.get', $post) }}">Leer mas...</a>
        <br/>
        {{ $post->get_excerpt  }}
        <br/>
        {{ $post->user->name }}
        <br/>
        {{ $post->created_at->format('d M Y') }}
        <br/>
    @endforeach
    {{ $posts->links() }}
</body>
</html>
