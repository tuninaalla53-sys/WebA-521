
@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="my-4">Список продуктов</h1>
    
    <div class="row">
        @foreach($products as $product)
        <div class="col-md-4 mb-4">
            <div class="card h-100">
                <!-- Задание 6: Изображение продукта -->
                <img src="{{ $product->image_url }}" 
                     class="card-img-top" 
                     alt="{{ $product->name }}"
                     style="height: 250px; object-fit: cover;">
                
                <div class="card-body">
                    <h5 class="card-title">{{ $product->name }}</h5>
                    <p class="card-text">{{ Str::limit($product->description, 100) }}</p>
                    <p class="text-success fs-4">{{ number_format($product->price, 0, ',', ' ') }} ₽</p>
                    
                    <!-- Задание 2: Ссылка на страницу продукта -->
                    <a href="{{ route('products.show', $product->id) }}" 
                       class="btn btn-primary">
                        Подробнее
                    </a>
                </div>
                
                <div class="card-footer">
                    <small class="text-muted">
                        Комментариев: {{ $product->comments->count() }}
                    </small>
                </div>
            </div>
        </div>
        @endforeach
    </div>

    <!-- Ссылка для добавления нового продукта -->
    <div class="mt-4">
        <a href="{{ route('products.create') }}" class="btn btn-success">
            + Добавить новый продукт
        </a>
    </div>
</div>
@endsection