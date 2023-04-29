<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pastebin</title>
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
    @vite(['resources/js/app.js'])
    <!-- CodeMirror -->
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
</head>

<body>
    <div class="container-fluid mt-3">
        <div class="row">
            <div class="col-1">
                <a href="{{ route('pastes.create') }}">Создать пасту</a>
                <h4>Новые пасты</h4>
                @foreach ($publicPastes as $paste)
                    <p><a href="{{ route('pastes.show', $paste->url) }}">{{ $paste->title }}</a></p>
                @endforeach
            </div>
        
            <div class="col-10">
                @yield('content')
            </div>

            <div class="col-1">
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
        </div>
    </div>
</body>

</html>