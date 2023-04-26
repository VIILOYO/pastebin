<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pastebin</title>
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
            width:100%;
            padding:20px;
            box-sizing: border-box;
        }
        input {
            padding: 10px;
        }
        textarea {
            padding: 10px;
            width: 1200px;
            float: left;
        }
        select {
            padding: 10px;
        }
        button {
            margin-top: 10px;
        }
        h4 {
            width:200px;
            padding-left: 20px;
            padding-top: 20px;
            box-sizing: border-box;
        }
        .auth {
            margin-right: 10px;
            text-align: right;
        }
    </style>
</head>
<body>
    <div class="auth">
    @guest
        <p><a href="{{ route('login') }}">Вход</a> | <a href="{{ route('registration') }}">Регистрация</a></p>
    @endguest

    @auth
        <p> {{ auth()->user()->name }} | <a href="{{ route('signout') }}">Выход</a></p>
    @endauth
    </div>
    @yield('content')
</body>
</html>