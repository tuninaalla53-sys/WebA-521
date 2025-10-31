
@extends('templates.main')

@section('title', 'Список фильмов')
@section('header', 'Список фильмов')

@section('content')
    <ul>
      
        <li><a href="{{ route('movie.index', ['id' => 1]) }}">Матрица</a></li>
        <li><a href="{{ route('movie.index', ['id' => 2]) }}">Побег из Шоушенка</a></li>
    </ul>
@endsection