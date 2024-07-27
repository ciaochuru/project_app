<head>
    <style>
        nav {
            border-right: solid 3px #EEEEEE;
            display:block;
            position:fixed;
            top:0;
            left:0;
            width:250px;
            height:100%;
            z-index:9999;
        }
        
        ul {
            list-style:none;
        }
        
        .auth_user {
            position: relative;
            top: 400px;
        }
        
        .user_name {
            display: inline;
            position: relative;
            left: 1rem;
            bottom: 15px;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <div class="menu-wrapper">
        <nav>
            <h1>ProjectApp</h1>
            <h2>メニュー</h2>
            <ul>
                <li><a href="{{ route('index') }}">プロジェクト一覧</a></li>
                <li><a href="{{ route('apps.list') }}">成果物一覧</a></li>
                <li><a href="">menu</a></li>
                <li><a href="">menu</a></li>
            </ul>
            <div class="auth_user">
                <x-user-icon>
                    <img src="{{ Auth::user()->image_path }}" />
                </x-user-icon>
                <div class="user_name">
                    {{ Auth::user()->name }}
                </div>
            </div>
        </nav>
    </div>
</body>