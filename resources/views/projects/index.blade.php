<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="utf-8">
        <title>ProjectApp</title>
        <!-- Fonts -->
        <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
        <!--css-->
        <link href="{{ asset('/css/main.css') }}" rel="stylesheet">
    </head>
    <body>
        @include('common.menu')
        <div class="search_form">
            <form action="{{ route('projects.search') }}" method="GET">
                <div class="container">
                    <input type="text" class="form-control input-lg" placeholder="キーワードを入力" value="{{ request('keyword') }}" name="keyword"/>
                    <span class="input-group-btn">
                    <button class="btn btn-info btn-lg" type="submit">
                        <i class="glyphicon glyphicon-search">検索</i>
                    </button>
                </div>
            </form>
        </div>
        <div class="create">
            <a href="{{ route('projects.create') }}"><p>新規作成</p></a>
        </div>
        <main>
            @foreach($projects as $project)
                <div class="project">
                    <div class="project_head">
                        <div class="post_user">
                            <x-user-icon>
                                <img src="{{ $project->user->image_path }}" alt="アイコン" />
                            </x-user-icon>
                            {{ $project->user->name }}
                        </div>
                        <div class="project_title">
                            <h2><a href="/projects/{{ $project->id }}">{{ $project->title }}</a></h2>
                        </div>
                    </div>
                    <div class="project_body">
                        <h3>{{ $project->body }}</h3>
                    </div>
                    <div class="tag">
                        @if($project->tags->isNotEmpty())
                            <h5>タグ：</h5>
                            @foreach($project->tags as $tag)
                                <h5><span>{{ $tag->tag_name }}</span></h5>
                            @endforeach
                        @endif
                    </div>
                </div>
            @endforeach
        </main>
        <div class="pagination">
            {{ $projects->links() }}
        </div>
    </body>
</html>