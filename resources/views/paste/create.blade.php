@extends('layouts.main')

@section('content')

    <form action="{{ route('pastes.store') }}" method="post" class="form">
        @csrf
        <label for="expiration_time">Язык</label>
        <select name="expiration_time">
            <option value="10">10 минут</option>
            <option value="60">1 час</option>
            <option value="180">3 часа</option>
            <option value="1440">1 день</option>
            <option value="10080">1 неделя</option>
            <option value="43200">3 часа</option>
            <option value="-1" selected>без ограничения</option>
        </select>
        @error('expiration_time')
            {{ $message }}
        @enderror

        <label for="title">Название</label>
        <input type="text" name="title" placeholder="Название">
        @error('title')
            {{ $message }}
        @enderror

        <label for="text">Паста</label>
        <textarea name="text" cols="100" rows="10" id="myTextarea"></textarea>
        @error('text')
            {{ $message }}
        @enderror

        <div>
            <label for="expiration_time">Время жизни</label>
            <select name="expiration_time">
                <option value="10">10 минут</option>
                <option value="60">1 час</option>
                <option value="180">3 часа</option>
                <option value="1440">1 день</option>
                <option value="10080">1 неделя</option>
                <option value="43200">3 часа</option>
                <option value="-1" selected>без ограничения</option>
            </select>
            @error('expiration_time')
                {{ $message }}
            @enderror
        </div>

        <label for="access_restriction">Доступ</label>
        <select name="access_restriction">
            <option value="public" selected>public -- доступна всем, видна в списках</option>
            <option value="unlisted">unlisted -- доступна только по ссылке</option>
            <option value="private">private -- доступна только автору</option>
        </select>
        @error('access_restriction')
            {{ $message }}
        @enderror

        <button type="submit">Сохранить</button>
        <script>
            var myTextarea = document.getElementById('myTextarea');
            var editor = CodeMirror.fromTextArea(myTextarea, {
                lineNumbers: true,
                mode: 'pascal',
            });
        </script>
    </form>
@endsection