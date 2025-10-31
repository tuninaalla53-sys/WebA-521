@extends('templates.main')

@section('title', 'Список актеров')
@section('header', 'Список актеров')

@section('content')
    <ul>
        <li><a href="{{ route("actor.index", ["id" => 1]) }}">Данила Козловский</a></li>
        <li><a href="{{ route("actor.index", ["id" => 2]) }}">Джони Депп</a></li>
    </ul>
@endsection