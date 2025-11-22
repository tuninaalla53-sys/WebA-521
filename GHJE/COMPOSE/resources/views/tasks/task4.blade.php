@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-12">
        <h2>Задание 4: Карточки товаров</h2>
        <p class="lead">Карточки телефонов с кнопкой "Купить"</p>
        
        <div class="row mt-4">
            @foreach($phones as $phone)
            <div class="col-md-4 mb-4">
                <div class="card h-100">
                    <img src="{{ $phone['image'] }}" 
                         class="card-img-top" 
                         alt="{{ $phone['name'] }}"
                         onerror="this.src='https://via.placeholder.com/300x200/007bff/ffffff?text=Phone+Image'">
                    
                    <div class="card-body d-flex flex-column">
                        <h5 class="card-title">{{ $phone['name'] }}</h5>
                        
                        <p class="card-text flex-grow-1">
                            <strong>Цена: {{ number_format($phone['price'], 0, ',', ' ') }} ₽</strong>
                        </p>
                        
                        <button class="btn btn-primary buy-btn" 
                                data-name="{{ $phone['name'] }}"
                                data-price="{{ $phone['price'] }}">
                            Купить
                        </button>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        
        <div class="mt-4">
            <a href="{{ route('tasks.index') }}" class="btn btn-primary">← Назад к списку заданий</a>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    const buyButtons = document.querySelectorAll('.buy-btn');
    
    buyButtons.forEach(button => {
        button.addEventListener('click', function() {
            const phoneName = this.getAttribute('data-name');
            const phonePrice = this.getAttribute('data-price');
            
            alert(`Товар "${phoneName}" добавлен в корзину!\nЦена: ${phonePrice} ₽`);
        });
    });
});
</script>
@endsection