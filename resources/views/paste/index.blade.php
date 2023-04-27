@extends('layouts.main')

@section('content')
Списко моих паст
    @foreach ($pastes as $paste)
        <p>{{ $paste->id }} <a href="{{ route('pastes.show', $paste->url) }}">{{ $paste->title }}</a></p>
    @endforeach
    {{ $pastes->withQueryString()->links() }}
@endsection
