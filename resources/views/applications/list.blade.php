<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="utf-8">
        <title>ProjectApp</title>
        <!-- Fonts -->
        <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    </head>
    <body>
        <h1><a href="{{ route('apps.list') }}">成果物一覧</a></h1>
        <div class="search_form">
            <form action="{{ route('apps.list') }}" method="GET">
                <div class="container">
                    <input type="text" class="form-control input-lg" placeholder="キーワードを入力" value="{{ request('keyword') }}" name="keyword"/>
                    <span class="input-group-btn">
                    <button class="btn btn-info btn-lg" type="submit">
                        <i class="glyphicon glyphicon-search">検索</i>
                    </button>
                </div>
            </form>
        </div>
        <p><a href="{{ route('index') }}">新規プロジェクト発案</a></p>
        @foreach($apps as $app)
            <div class="app">
                <h2><a href="/apps/{{$app->id}}/show">{{ $app->title }}</a></h2>
                <h3>{{ $app->explain }}</h3>
                <h3><a href={{ $app->app_url }}>{{ $app->app_url }}<a/></h3>
            </div>
        @endforeach
        <div class="pagination">
            {{ $apps->links() }}
        </div>
    </body>
</html>