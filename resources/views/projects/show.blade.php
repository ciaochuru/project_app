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
    </body>
</html>