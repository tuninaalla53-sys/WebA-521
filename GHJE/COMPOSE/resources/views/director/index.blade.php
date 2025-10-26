
@extends('templates.main')

@php
    $fullName = $director['name'] . ' ' . $director['surname'];
@endphp

@section('title', $fullName)
@section('header', $fullName)

@section('content')
    <table>
        <caption>Биография режиссера</caption>
        <tbody>
            <tr>
                <td>Имя</td>
                <td>{{ $director['name'] }}</td>
            </tr>
            <tr>
                <td>Фамилия</td>
                <td>{{ $director['surname'] }}</td>
            </tr>
            <tr>
                <td>Год рождения</td>
                <td>{{ $director['birth_year'] }}</td>
            </tr>
            <tr>
                <td>Страна</td>
                <td>{{ $director['country'] }}</td>
            </tr>
            <tr>
                <td>Стиль</td>
                <td>{{ $director['style'] }}</td>
            </tr>
            <tr>
                <td>Статус</td>
                <td>{{ $director['active'] ? 'Активен' : 'Не активен' }}</td>
            </tr>
            <tr>
                <td>Награды</td>
                <td>
                    @foreach($director['awards'] as $award)
                        {{ $award }}@if(!$loop->last), @endif
                    @endforeach
                </td>
            </tr>
            <tr>
                <td colspan="2">
                    Известные фильмы:
                    <ul>
                        @foreach($director['famous_movies'] as $movie)
                            <li>{{ $movie }}</li>
                        @endforeach
                    </ul>
                </td>
            </tr>
        </tbody>
    </table>
@endsection