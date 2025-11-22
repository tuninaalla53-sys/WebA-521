@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-12">
        <h2>Задание 5: Корзина товаров</h2>
        <p class="lead">Товары в корзине с подсчетом количества и общей стоимости</p>
        
        <div class="card mt-4">
            <div class="card-body">
                @if(empty($cart))
                    <div class="text-center">
                        <h4>Корзина пуста</h4>
                        <p>Добавьте товары из задания 4</p>
                    </div>
                @else
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Изображение</th>
                                    <th>Название</th>
                                    <th>Цена за шт.</th>
                                    <th>Количество</th>
                                    <th>Общая стоимость</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $cartService = new App\Services\CartService();
                                    $totalCartPrice = $cartService->calculateTotal($cart);
                                @endphp
                                
                                @foreach($cart as $item)
                                <tr>
                                    <td>
                                        <img src="{{ $item['image'] }}" 
                                             alt="{{ $item['name'] }}" 
                                             style="width: 50px; height: 50px; object-fit: cover;"
                                             onerror="this.src='https://via.placeholder.com/50x50/007bff/ffffff?text=Phone'">
                                    </td>
                                    <td>{{ $item['name'] }}</td>
                                    <td>{{ number_format($item['price'], 0, ',', ' ') }} ₽</td>
                                    <td>
                                        <span class="badge bg-primary">{{ $item['count'] }} шт.</span>
                                    </td>
                                    <td><strong>{{ number_format($item['total_price'], 0, ',', ' ') }} ₽</strong></td>
                                </tr>
                                @endforeach
                                
                                <tr class="table-success">
                                    <td colspan="4" class="text-end"><strong>Итого:</strong></td>
                                    <td><strong>{{ number_format($totalCartPrice, 0, ',', ' ') }} ₽</strong></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    
                    <div class="text-end mt-3">
                        <button class="btn btn-success btn-lg">Оформить заказ</button>
                    </div>
                @endif
                
                <div class="mt-4">
                    <a href="{{ route('tasks.index') }}" class="btn btn-primary">← Назад к списку заданий</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection