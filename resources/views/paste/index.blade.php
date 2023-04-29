@extends('layouts.main')

@section('content')
    <h4>Список моих паст</h4>
    @foreach ($pastes as $paste)
        <p>{{ $paste->id }} <a href="{{ route('pastes.show', $paste->url) }}">{{ $paste->title }}</a></p>
    @endforeach
    {{ $pastes->withQueryString()->links() }}
@endsection
