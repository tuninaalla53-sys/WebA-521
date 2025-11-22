
@extends('layouts.app')

@section('title', 'Районов города')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h1>Районов города</h1>
            <div class="image-container my-4">
                <img src="{{ asset('images/coffee/districts.jpg') }}" alt="Районы города" class="img-fluid rounded">
            </div>
            <div class="description bg-light p-4 rounded">
                <p>Наши кофейни расположены в 4 различных районах города, что позволяет жителям каждого района наслаждаться качественным кофе в удобном для них месте.</p>
                <p>Мы охватываем центральный район, спальные районы, деловую часть города и студенческий квартал.</p>
            </div>
            <a href="{{ url('/') }}" class="btn btn-primary mt-3">← Назад на главную</a>
        </div>
    </div>
</div>
@endsection