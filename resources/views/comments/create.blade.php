<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="utf-8">
        <title>ProjectApp</title>
        <!-- Fonts -->
        <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    </head>
    <body>
        <h1>コメント</h1>
        <div class="contents">
            <form method="POST" action="{{ route('comments.store') }}">
                @csrf
                <div class="comment">
                    <input name="comment[project_id]" type="hidden" value="{{ $project->id }}"/>
                    <textarea name="comment[comment]" placeholder="コメントを入力">{{ old('comment.comment') }}</textarea>
                </div>
                <div class="comment_error">
                    <p class="body_error" style="color:red">{{ $errors->first('comment.comment') }}</p>
                </div>
                <div class="store">
                    <input type="submit" value="送信"/>
                </div>
            </form>
        </div>
        <div class="footer">
            <a href="/projects/{{ $project->id }}">投稿詳細に戻る</a></br>
            <a href="/">一覧に戻る</a>
        </div>
    </body>
</html>