@extends('layouts.main')

@section('content')
    @foreach ($pastes as $paste)
        <p>{{ $paste->title }}</p>
        <a href="{{ route('pastes.show', $paste->url) }}">Смотреть полностью</a>
    @endforeach
@endsection
