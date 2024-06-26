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
            <h1>{{ $project->title }}</h1>
            <p>{{ $project->body }}</p>
        </div>
        <div class="delete">
            <form method="POST" action="/projects/{{ $project->id }}" id="form_{{ $project->id }}">
                @csrf
                @method("DELETE")
                <input type="button" onclick="deleteProject({{ $project->id }})" value="投稿を削除" />
            </form>
        </div>
        <div class="footer">
            <a href="/">一覧に戻る</a>
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