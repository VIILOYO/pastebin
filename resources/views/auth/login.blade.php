@extends('layouts.main')

@section('content')
    <h4>Авторизация</h4>
    <form action="{{ route('custom-login') }}" method="post" class="form">
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
        
        <button type="submit">Войти</button>
    </form>
    @if ( URL::previous() === URL::current() )
        <p>Неверные данные</p>
    @endif

@endsection