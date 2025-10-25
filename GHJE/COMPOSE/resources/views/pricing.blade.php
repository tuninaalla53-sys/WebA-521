
@extends('layouts.app')

@section('title', 'Выбор подписки')

@section('styles')
    <link rel="stylesheet" href="{{ asset('css/pricing.css') }}">
@endsection

@section('content')
<!-- Контейнер для всех карточек подписки -->
<div class="pricing-container">
    {{-- Цикл для  карточек подписки --}}
    @foreach($pricingPlans as $plan)
        <div class="pricing-card {{ $plan['class'] }}">
            <h3>{{ $plan['title'] }}</h3> <!-- Заголовок плана -->
            <p class="price">{{ $plan['price'] }}</p> <!-- Цена -->
            
            {{-- Цикл для  характеристик тарифа --}}
            @foreach($plan['features'] as $feature)
                <p>{{ $feature }}</p> <!-- Характеристика -->
            @endforeach
            
            <button class="buy-btn">КУПИТЬ</button> <!-- Кнопка покупки -->
        </div>
    @endforeach
</div>
@endsection