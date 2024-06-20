<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="utf-8">
        <title>ProjectApp</title>
        <!-- Fonts -->
        <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    </head>
    <body>
        <h1>投稿</h1>
        <div class="contents">
            <form method="POST" action="/projects">
                @csrf
                <div class="content_title">
                    <h2>プロジェクト名：</h2>
                    <input type="text" name=project[title] placeholder="タイトルを入力" />
                </div>
                <div class="content_body">
                    <h2>概要:</h2>
                    <textarea name="project[body]" placeholder="プロジェクトの概要"></textarea>
                </div>
                <div class="store">
                    <input type="submit" value="投稿"/>
                </div>
            </form>
        </div>
    </body>
</html>