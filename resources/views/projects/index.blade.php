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
        @foreach($projects as $project)
            <h2>{{ $project->title }}</h2>
            <p>{{ $project->body }}</p>
        @endforeach
    </body>
</html>