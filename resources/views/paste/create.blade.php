@extends('layouts.main')

@section('content')

    <form action="{{ route('pastes.store') }}" method="post" class="form">
        @csrf
        <label for="language">Язык</label>
        <select name="language" class="language">
            <option value="text/javascript">JavaScript</option>
            <option value="xml">HTML</option>
            <option value="python">Python</option>
            <option value="css">CSS</option>
            <option value="pascal">Pascal</option>
            <option value="text/x-c++sr">C++</option>
            <option value="text/x-java">Java</option>
        </select>
        @error('language')
            {{ $message }}
        @enderror

        <label for="title">Название</label>
        <input type="text" name="title" placeholder="Название" value="{{ old('title') ? old('title') : null}}">
        @error('title')
            {{ $message }}
        @enderror

        <label for="text">Паста</label>
        <textarea name="text" cols="100" rows="10" id="myTextarea">{{ old('text') ? old('text') : null}}</textarea>
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
                <option value="0">без ограничения</option>
            </select>
            @error('expiration_time')
                {{ $message }}
            @enderror
        </div>

        <label for="access_restriction">Доступ</label>
        <select name="access_restriction">
            <option value="1" selected>public -- доступна всем, видна в списках</option>
            <option value="2">unlisted -- доступна только по ссылке</option>
            <option value="3">private -- доступна только автору</option>
        </select>
        @error('access_restriction')
            {{ $message }}
        @enderror

        <button type="submit">Сохранить</button>
    </form>

    <script>
        const selectElement = document.querySelector(".language");
        selectElement.addEventListener("change", (event) => {
            editor.setOption('mode', event.target.value);
        });
        
        const myTextarea = document.getElementById('myTextarea');
        let editor = CodeMirror.fromTextArea(myTextarea, {
            lineNumbers: true,
            mode: `text/javascript`,
        });
    </script>
@endsection