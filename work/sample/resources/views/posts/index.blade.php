<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>掲示板</title>
    @vite(['resources/css/app.css'])
</head>

<body class="bg-gray-100">
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
            <div class="ms-auto">
                @auth
                    <span class="navbar-text me-3">
                        {{ Auth::user()->name }}
                    </span>
                    <form action="{{ route('logout') }}" method="POST" class="d-inline">
                        @csrf
                        <button type="submit" class="btn btn-outline-secondary">ログアウト</button>
                    </form>
                @else
                    <a href="{{ route('login') }}" class="btn btn-outline-primary me-2">ログイン</a>
                    <a href="{{ route('register') }}" class="btn btn-primary">新規登録</a>
                @endauth
            </div>
        </div>
    </nav>

    <div class="container mx-auto px-4 py-8">
        <div class="max-w-3xl mx-auto">
            <h1 class="text-3xl font-bold mb-8">掲示板</h1>

            @auth
                <div class="bg-white rounded-lg shadow-md p-6 mb-8">
                    <form action="{{ route('posts.store') }}" method="POST">
                        @csrf
                        <div class="mb-4">
                            <label for="content" class="block text-gray-700 text-sm font-bold mb-2">投稿内容</label>
                            <textarea name="content" id="content" rows="3" required
                                class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:border-blue-500"></textarea>
                        </div>
                        <div class="text-right">
                            <button type="submit"
                                class="bg-blue-500 text-white font-bold py-2 px-4 rounded-lg hover:bg-blue-600">
                                投稿する
                            </button>
                        </div>
                    </form>
                </div>
            @else
                <div class="bg-yellow-100 border border-yellow-400 text-yellow-700 px-4 py-3 rounded mb-8">
                    投稿するには<a href="{{ route('login') }}" class="underline">ログイン</a>してください。
                </div>
            @endauth

            <div class="space-y-6">
                @foreach($posts as $post)
                    <div class="bg-white rounded-lg shadow-md p-6">
                        <div class="mb-4">
                            <p class="whitespace-pre-wrap">{{ $post->content }}</p>
                        </div>
                        <div class="text-sm text-gray-600">
                            <span class="font-semibold">{{ $post->user->name }}</span>
                            <span class="mx-2">-</span>
                            <span>{{ $post->created_at->format('Y/m/d H:i:s') }}</span>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</body>

</html>