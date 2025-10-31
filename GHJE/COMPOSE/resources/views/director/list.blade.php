
@extends('templates.main')

@section('title', 'Список режиссеров')
@section('header', 'Список режиссеров')

@section('content')
    <ul>
       
        <li><a href="{{ route('director.index', ['id' => 1]) }}">Кристофер Нолан</a></li>
        <li><a href="{{ route('director.index', ['id' => 2]) }}">Стивен Спилберг</a></li>
    </ul>
@endsection