<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="utf-8">
        <title>ProjectApp</title>
        <!-- Fonts -->
        <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    </head>
    <body>
        <div class="show_project">
            <h1>{{ $app->title }}</h1>
            <p>{{ $app->explain }}</p>
            <p><a href={{ $app->app_url }}>{{ $app->app_url }}<a/></p>
        </div>
        <div class="footer">
        <div class="delete">
            <form method="POST" action="/apps/{{ $app->id }}" id="form_{{ $app->id }}">
                @csrf
                @method("DELETE")
                <input type="button" onclick="deleteProject({{ $app->id }})" value="投稿を削除" />
            </form>
        </div>
            <a href="{{ route('apps.list') }}">成果物一覧に戻る</a>
        </div>
        <script>
            function deleteProject(id) {
                'use strict'
                if(confirm('一度削除すると復元できません。\n本当に削除しますか？')){
                    document.getElementById(`form_${id}`).submit();
                }
            }
        </script>
    </body>
</html>