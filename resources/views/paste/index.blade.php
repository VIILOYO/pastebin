@extends('layouts.main')

@section('content')
    {{ auth()->user(); }}
    @foreach ($pastes as $paste)
        <p>{{ $paste->title }}</p>
        <small>{{ $paste->language }}</small>
    @endforeach
@endsection
