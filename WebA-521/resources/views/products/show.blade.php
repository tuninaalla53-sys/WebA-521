@extends('layouts.app')

@section('title', $product->name)

@section('content')
<div class="row">
    <!-- Информация о продукте -->
    <div class="col-md-6">
        <div class="card shadow-sm">
            <!-- Контейнер для основного изображения продукта -->
            <div class="image-container" style="max-height: 500px;">
                @if($product->image_url)
                    <img src="{{ $product->image_url }}" 
                         class="product-detail-image" 
                         alt="{{ $product->name }}"
                         style="width: 100%; height: 100%; object-fit: cover;">
                @else
                    <div class="d-flex align-items-center justify-content-center h-100 bg-light">
                        <span class="text-muted">Нет изображения</span>
                    </div>
                @endif
            </div>
            <div class="card-body">
                <h1 class="card-title display-6">{{ $product->name }}</h1>
                <p class="card-text lead">{{ $product->description }}</p>
                <p class="card-text">
                    <strong class="text-success" style="font-size: 1.5rem;">Цена: ${{ $product->price }}</strong>
                </p>
                <div class="d-flex gap-2">
                    <a href="{{ route('products.index') }}" class="btn btn-secondary">
                        ← Назад к списку
                    </a>
                    <!-- Кнопка редактирования (опционально) -->
                    @auth
                    <a href="{{ route('products.edit', $product->id) }}" class="btn btn-outline-primary">
                        Редактировать
                    </a>
                    @endauth
                </div>
            </div>
        </div>
    </div>

    <!-- Секция комментариев -->
    <div class="col-md-6">
        <div class="comment-section shadow-sm">
            <h3 class="border-bottom pb-2">💬 Комментарии</h3>

            <!-- Форма добавления комментария -->
            @auth
            <form action="{{ route('comments.store') }}" method="POST" class="mb-4">
                @csrf
                <input type="hidden" name="product_id" value="{{ $product->id }}">
                
                <div class="mb-3">
                    <label for="comment" class="form-label fw-bold">Ваш комментарий:</label>
                    <textarea name="comment" id="comment" class="form-control" rows="3" 
                              placeholder="Поделитесь вашим мнением о продукте..." required></textarea>
                </div>
                
                <button type="submit" class="btn btn-success">
                    📝 Добавить комментарий
                </button>
            </form>
            @else
            <div class="alert alert-info text-center">
                <a href="{{ route('login') }}" class="fw-bold">Войдите</a>, чтобы оставить комментарий.
            </div>
            @endauth

            <!-- Список комментариев -->
            <div class="comments-list">
                <h5 class="mb-3">Всего комментариев: {{ $product->comments->count() }}</h5>
                
                @foreach($product->comments as $comment)
                <div class="card mb-3 border-0 shadow-sm">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-start">
                            <div class="flex-grow-1">
                                <!-- Имя пользователя и комментарий -->
                                <div class="d-flex align-items-center mb-2">
                                    <h6 class="card-subtitle text-muted mb-0 fw-bold">
                                        👤 {{ $comment->user->name }}
                                    </h6>
                                    <small class="text-muted ms-2">
                                        {{ $comment->created_at->format('d.m.Y H:i') }}
                                    </small>
                                </div>
                                <p class="card-text mb-0">{{ $comment->comment }}</p>
                            </div>
                            
                            <!-- Кнопка удаления для своих комментариев -->
                            @auth
                            @if(Auth::id() == $comment->user_id)
                            <form action="{{ route('comments.destroy', $comment->id) }}" method="POST" class="ms-2">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" 
                                        onclick="return confirm('Удалить комментарий?')"
                                        title="Удалить комментарий">
                                    🗑️
                                </button>
                            </form>
                            @endif
                            @endauth
                        </div>
                    </div>
                </div>
                @endforeach

                @if($product->comments->isEmpty())
                <div class="alert alert-warning text-center">
                    📝 Комментариев пока нет. Будьте первым!
                </div>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection