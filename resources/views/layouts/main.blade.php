<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pastebin</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.62.0/codemirror.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.62.0/codemirror.js"></script>
    <!-- Подключение языков -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.26.0/mode/javascript/javascript.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.26.0/mode/xml/xml.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.26.0/mode/python/python.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.26.0/mode/css/css.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.26.0/mode/clike/clike.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.26.0/mode/pascal/pascal.js"></script>
    <!----------------------->
    <style>
        .form {
            width: 100%;
            padding: 20px;
            box-sizing: border-box;
        }

        input {
            padding: 10px;
        }

        textarea {
            padding: 10px;
            width: auto;
            float: left;
        }

        select {
            padding: 10px;
        }

        button {
            margin-top: 10px;
        }

        h4 {
            width: 200px;
            padding-left: 20px;
            padding-top: 20px;
            box-sizing: border-box;
        }

        .auth {
            width: 200px;
            float: right;
            margin-right: 10px;
            text-align: right;
        }
        .sidebar {
            width: 200px;
            float: left;
            margin-right: 10px;
            text-align: left;
        }
        .content {
            position: absolute;
            margin-left: 200px;
            margin-top: 0px;
        }
    </style>
</head>

<body>
    <div>
        <div class="auth">
            @guest
                <p><a href="{{ route('login') }}">Вход</a> | <a href="{{ route('registration') }}">Регистрация</a></p>
            @endguest

            @auth
                <p> <a href="{{ route('pastes.user', auth()->user()->id) }}">{{ auth()->user()->name }}</a> | <a href="{{ route('signout') }}">Выход</a></p>
                <h4>Мои пасты</h4>
                @foreach ($personalPastes as $paste)
                    <p><a href="{{ route('pastes.show', $paste->url) }}">{{ $paste->title }}</a></p>
                @endforeach
            @endauth
        </div>
        <a href="{{ route('pastes.create') }}">Создать пасту</a>
    </div>
    <div class="content">
        @yield('content')
    </div>
    <div class="sidebar">
        <h4>Новые пасты</h4>
        @foreach ($publicPastes as $paste)
            <p><a href="{{ route('pastes.show', $paste->url) }}">{{ $paste->title }}</a></p>
        @endforeach
    </div>
</body>

</html>