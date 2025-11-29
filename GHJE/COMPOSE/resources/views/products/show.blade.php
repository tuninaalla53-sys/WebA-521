

@extends('layouts.app')

@section('content')
<div class="container">
    <!-- Хлебные крошки -->
    <nav aria-label="breadcrumb" class="my-4">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('products.index') }}">Продукты</a></li>
            <li class="breadcrumb-item active">{{ $product->name }}</li>
        </ol>
    </nav>

    <div class="row">
        <!-- Информация о продукте -->
        <div class="col-md-6">
            <!-- Задание 6: Изображение продукта -->
            <img src="{{ $product->image_url }}" 
                 class="img-fluid rounded" 
                 alt="{{ $product->name }}"
                 style="max-height: 400px; width: 100%; object-fit: cover;">
        </div>
        
        <div class="col-md-6">
            <h1>{{ $product->name }}</h1>
            <p class="lead">{{ $product->description }}</p>
            <h3 class="text-success">{{ number_format($product->price, 0, ',', ' ') }} ₽</h3>
            
            <div class="mt-4">
                <button class="btn btn-primary btn-lg">Добавить в корзину</button>
            </div>
        </div>
    </div>

    <!-- Задание 3: Раздел комментариев -->
    <div class="row mt-5">
        <div class="col-12">
            <h3>Отзывы о товаре</h3>
            
            <!-- Форма для добавления комментария -->
            @auth
            <div class="card mb-4">
                <div class="card-body">
                    <h5 class="card-title">Оставить отзыв</h5>
                    <form action="{{ route('comments.store') }}" method="POST">
                        @csrf
                        <input type="hidden" name="product_id" value="{{ $product->id }}">
                        
                        <div class="mb-3">
                            <textarea name="comment" 
                                      class="form-control @error('comment') is-invalid @enderror" 
                                      rows="4" 
                                      placeholder="Напишите ваш отзыв..."
                                      required></textarea>
                            @error('comment')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        
                        <button type="submit" class="btn btn-primary">Отправить отзыв</button>
                    </form>
                </div>
            </div>
            @else
            <div class="alert alert-info">
                <a href="{{ route('login') }}">Войдите</a>, чтобы оставить комментарий.
            </div>
            @endauth

            <!-- Задание 4: Список комментариев -->
            <div class="comments-section">
                <h5>Комментарии ({{ $product->comments->count() }})</h5>
                
                @if($product->comments->count() > 0)
                    @foreach($product->comments as $comment)
                    <div class="card mb-3">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-start">
                                <div>
                                    <!-- Имя пользователя и комментарий -->
                                    <h6 class="card-subtitle mb-2 text-muted">
                                        {{ $comment->user->name }}
                                    </h6>
                                    <p class="card-text">{{ $comment->comment }}</p>
                                    <small class="text-muted">
                                        {{ $comment->created_at->format('d.m.Y H:i') }}
                                    </small>
                                </div>
                                
                                <!-- Задание 5: Кнопка удаления для своих комментариев -->
                                @auth
                                    @if(Auth::id() == $comment->user_id)
                                    <form action="{{ route('comments.destroy', $comment->id) }}" 
                                          method="POST" 
                                          class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" 
                                                class="btn btn-sm btn-outline-danger"
                                                onclick="return confirm('Удалить комментарий?')">
                                            ✕ Удалить
                                        </button>
                                    </form>
                                    @endif
                                @endauth
                            </div>
                        </div>
                    </div>
                    @endforeach
                @else
                    <div class="alert alert-secondary">
                        Пока нет комментариев. Будьте первым!
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection