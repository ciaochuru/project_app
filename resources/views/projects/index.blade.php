<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="utf-8">
        <title>ProjectApp</title>
        <!-- Fonts -->
        <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
        <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
        <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
        <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
        
    </head>
    <body>
        <h1><a href="/">ProjectApp</a></h1>
        <div class="search_form">
            <form action="{{ route('projects.search') }}" method="GET">
                <div class="container">
                	<div class="row">
                        <div class="col-md-6">
                    		<h2>検索</h2>
                            <div id="custom-search-input">
                                <div class="input-group col-md-12">
                                    <input type="text" class="form-control input-lg" placeholder="キーワードを入力" value="{{ request('keyword') }}" name="keyword"/>
                                    <span class="input-group-btn">
                                        <button class="btn btn-info btn-lg" type="submit">
                                            <i class="glyphicon glyphicon-search"></i>
                                        </button>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
        <p><a href="{{ route('apps.list') }}">成果物一覧</a></p>
        <p><a href="{{ route('projects.create') }}">新規作成</a></p>
        @foreach($projects as $project)
            <div class="post_user">
                <x-user-icon>
                    <img src="{{ $project->user->image_path }}" alt="アイコン" />
                </x-user-icon>
                {{ $project->user->name }}
            </div>
            <div class="project">
                <h2><a href="/projects/{{ $project->id }}">{{ $project->title }}</a></h2>
                <h3>{{ $project->body }}</h3>
            </div>
            <div class="tag">
                @foreach($project->tags as $tag)
                    <h5>{{ $tag->tag_name }}</h5>
                @endforeach
            </div>
        @endforeach
        <div class="pagination">
            {{ $projects->links() }}
        </div>
    </body>
</html>