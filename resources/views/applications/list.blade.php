<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="utf-8">
        <title>ProjectApp</title>
        <!-- Fonts -->
        <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
        <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
        <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
        <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
        
    </head>
    <body>
        <h1><a href="{{ route('apps.list') }}">完成プロジェクト一覧</a></h1>
        <div class="search_form">
            <form action="{{ route('apps.list') }}" method="GET">
                <div class="container">
                	<div class="row">
                        <div class="col-md-6">
                    		<h2>検索</h2>
                            <div id="custom-search-input">
                                <div class="input-group col-md-12">
                                    <input type="text" class="form-control input-lg" placeholder="キーワードを入力" value="{{ request('keyword') }}" name="keyword"/>
                                    <span class="input-group-btn">
                                        <button class="btn btn-info btn-lg" type="submit">
                                            <i class="glyphicon glyphicon-search"></i>
                                        </button>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
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