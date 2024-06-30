<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="utf-8">
        <title>ProjectApp</title>
        <!-- Fonts -->
        <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    </head>
    <body>
        <h1>編集</h1>
        <div class="contents">
            <form method="PUT" action="/projects">
                @csrf
                <div class="content_title">
                    <h2>プロジェクト名：</h2>
                    <input type="text" name=project[title] placeholder="タイトルを入力" />
                </div>
                <div class="title_error">
                    <p class="title_error" style="color:red">{{ $errors->first('project.title') }}</p>
                </div>
                <div class="content_body">
                    <h2>概要:</h2>
                    <textarea name="project[body]" placeholder="プロジェクトの概要"></textarea>
                </div>
                <div class="body_error">
                    <p class="body_error" style="color:red">{{ $errors->first('project.body') }}</p>
                </div>
                <div class="edit">
                    <input type="submit" value="完了"/>
                </div>
            </form>
        </div>
        <div class="footer">
            <a href="/">一覧に戻る</a>
        </div>
    </body>
</html>