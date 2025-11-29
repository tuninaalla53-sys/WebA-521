@extends('layouts.app')

@section('title', 'Все продукты')

@section('content')
<h1 class="mb-4">Все продукты</h1>

<div class="row">
    @foreach($products as $product)
    <div class="col-md-4 mb-4">
        <div class="card h-100 shadow-sm">
            <!-- Контейнер для изображения с фиксированной высотой -->
            <div class="image-container" style="height: 250px;">
                @if($product->image_url)
                    <img src="{{ $product->image_url }}" 
                         class="product-card-image" 
                         alt="{{ $product->name }}"
                         loading="lazy"> <!-- lazy loading для оптимизации -->
                @else
                    <div class="d-flex align-items-center justify-content-center h-100 bg-light">
                        <span class="text-muted">Нет изображения</span>
                    </div>
                @endif
            </div>
            
            <div class="card-body d-flex flex-column">
                <h5 class="card-title">{{ $product->name }}</h5>
                <p class="card-text flex-grow-1">{{ Str::limit($product->description, 100) }}</p>
                <p class="card-text"><strong class="text-primary">Цена: ${{ $product->price }}</strong></p>
            </div>
            <div class="card-footer bg-transparent">
                <a href="{{ route('products.show', $product->id) }}" class="btn btn-primary w-100">Подробнее</a>
            </div>
        </div>
    </div>
    @endforeach
</div>

@if($products->isEmpty())
<div class="alert alert-info text-center">
    Продуктов пока нет. <a href="{{ route('products.create') }}">Добавить первый продукт</a>
</div>
@endif

<!-- Пагинация (если нужно в будущем) -->
<div class="d-flex justify-content-center mt-4">
    <!-- {{-- $products->links() --}} -->
</div>
@endsection