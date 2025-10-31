
@extends('templates.main')

@section('title', $movie['title'])
@section('header', $movie['title'])

@section('content')
    <table>
        <caption>Информация о фильме</caption>
        <tbody>
            <tr>
                <td>Название</td>
                <td>{{ $movie['title'] }}</td>
            </tr>
            <tr>
                <td>Год выпуска</td>
                <td>{{ $movie['year'] }}</td>
            </tr>
            <tr>
                <td>Жанр</td>
                <td>{{ $movie['genre'] }}</td>
            </tr>
            <tr>
                <td>Продолжительность</td>
                <td>{{ $movie['duration'] }}</td>
            </tr>
            <tr>
                <td>Рейтинг</td>
                <td>{{ $movie['rating'] }}/10</td>
            </tr>
            <tr>
                <td>Режиссер</td>
                <td>{{ $movie['director'] }}</td>
            </tr>
            <tr>
                <td>Бюджет</td>
                <td>{{ $movie['budget'] }}</td>
            </tr>
            <tr>
                <td colspan="2">Описание: {{ $movie['description'] }}</td>
            </tr>
        </tbody>
    </table>
@endsection