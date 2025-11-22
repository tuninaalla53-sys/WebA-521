
@extends('layouts.app') {{-- или ваш основной layout --}}

@section('title', 'Кофейни в базе')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h1>Кофейни в базе</h1>
            <div class="image-container my-4">
                <img src="{{ asset('images/coffee/shops.jpg') }}" alt="Кофейни" class="img-fluid rounded">
            </div>
            <div class="description bg-light p-4 rounded">
                <p>В нашей базе данных собрана информация о 4 кофейнях города. Каждая кофейня имеет уникальные характеристики, включая расположение, ассортимент и специальные предложения.</p>
                <p>Мы тщательно отбираем кофейни для нашей базы, чтобы гарантировать качество обслуживания и вкусный кофе.</p>
            </div>
            <a href="{{ url('/') }}" class="btn btn-primary mt-3">← Назад на главную</a>
        </div>
    </div>
</div>
@endsection