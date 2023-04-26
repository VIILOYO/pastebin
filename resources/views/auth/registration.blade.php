@extends('layouts.main')

@section('content')
    <h4>Регистрация</h4>
    <form action="{{ route('custom-registration') }}" method="post" class="form">
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

@endsection