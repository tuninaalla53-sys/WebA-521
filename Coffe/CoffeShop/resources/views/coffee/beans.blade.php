
@extends('layouts.app')

@section('title', 'Сортов зерен')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h1>Сортов зерен</h1>
            <div class="image-container my-4">
                <img src="{{ asset('images/coffee/beans.jpg') }}" alt="Сорта зерен" class="img-fluid rounded">
            </div>
            <div class="description bg-light p-4 rounded">
                <p>Мы предлагаем 4 различных сорта кофейных зерен из разных регионов мира. Каждый сорт обладает уникальным вкусовым профилем и ароматом.</p>
                <ul>
                    <li>Арабика - мягкий и ароматный</li>
                    <li>Робуста - крепкий и насыщенный</li>
                    <li>Эфиопский - цветочные ноты</li>
                    <li>Колумбийский - сбалансированный вкус</li>
                </ul>
            </div>
            <a href="{{ url('/') }}" class="btn btn-primary mt-3">← Назад на главную</a>
        </div>
    </div>
</div>
@endsection