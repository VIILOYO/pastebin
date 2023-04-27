@extends('layouts.main')

@section('content')
    <h4>{{ $paste->title }}</h4>
    <small id="language">{{ $paste->language }}</small>
    <textarea name="text" id="myTextarea" cols="100" rows="10">{{ $paste->text }}</textarea>

    <script>
        const myTextarea = document.getElementById('myTextarea');

        const editor = CodeMirror.fromTextArea(myTextarea, {
            mode: document.getElementById('language').textContent,
            readOnly: true,
        });
    </script>
@endsection

