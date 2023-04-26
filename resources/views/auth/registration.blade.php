<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Регистрация</title>
</head>
<body>
    <form action="{{ route('custom-registration') }}" method="POST">
        @csrf
        <label for="name">Логин</label>
        <input type="login" name="name" placeholder="Логин" value="{{ old('name') ? old('name') : null }}">
        @error('name')
            {{ $message }}
        @enderror

        <label for="password">Пароль</label>
        <input type="password" name="password" placeholder="Пароль">
        @error('password')
            {{ $message }}
        @enderror

        <button type="submit">Зарегистрироваться</button>
    </form>
</body>
</html>