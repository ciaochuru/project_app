<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="utf-8">
        <title>ProjectApp</title>
        <!-- Fonts -->
        <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    </head>
    <body>
        <h1>ProjectApp</h1>
        <p><a href="/projects/create">投稿作成</a></p>
        @foreach($projects as $project)
            <div class="project">
                <h2><a href="/projects/{{ $project->id }}">{{ $project->title }}</h2></a>
                <p>{{ $project->body }}</p>
            </div>
        @endforeach
        <div class="pagination">
            {{ $projects->links('pagination::semantic-ui') }}
        </div>
    </body>
</html>