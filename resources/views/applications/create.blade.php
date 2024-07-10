<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="utf-8">
        <title>ProjectApp</title>
        <!-- Fonts -->
        <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    </head>
    <body>
        <h1>成果物投稿</h1>
        <div class="contents">
            <form method="POST" action="">
                @csrf
                <div class="content_title">
                    <h2>プロジェクト名：</h2>
                    <input type="text" name="app[title]" placeholder="プロジェクト名を入力" value="{{ old('app.title') }}" />
                </div>
                <div class="title_error">
                    <p class="title_error" style="color:red">{{ $errors->first('apps.title') }}</p>
                </div>
                <div class="content_explain">
                    <h2>説明:</h2>
                    <textarea name="app[explain]" placeholder="プロジェクトの概要">{{ old('app.explain') }}</textarea>
                </div>
                <div class="explain_error">
                    <p class="explain_error" style="color:red">{{ $errors->first('app.body') }}</p>
                </div>
                <div class='app_url'>
                    <h2>URL：</h2>
                    <input type="text" name="app[app_url]" placeholder="URLを入力" value="{{ old('app.app_url') }}" />
                </div>
                <div class="store">
                    <input type="submit" value="投稿"/>
                </div>
            </form>
        </div>
        <div class="footer">
            <a href="/">一覧に戻る</a>
        </div>
    </body>
</html>