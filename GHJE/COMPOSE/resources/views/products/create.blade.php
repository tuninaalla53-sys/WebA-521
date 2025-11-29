
@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="my-4">Добавить новый продукт</h1>
    
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        
                        <div class="mb-3">
                            <label for="name" class="form-label">Название продукта</label>
                            <input type="text" 
                                   class="form-control @error('name') is-invalid @enderror" 
                                   id="name" 
                                   name="name" 
                                   value="{{ old('name') }}"
                                   required>
                            @error('name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        
                        <div class="mb-3">
                            <label for="description" class="form-label">Описание</label>
                            <textarea class="form-control @error('description') is-invalid @enderror" 
                                      id="description" 
                                      name="description" 
                                      rows="4" 
                                      required>{{ old('description') }}</textarea>
                            @error('description')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        
                        <div class="mb-3">
                            <label for="price" class="form-label">Цена</label>
                            <input type="number" 
                                   class="form-control @error('price') is-invalid @enderror" 
                                   id="price" 
                                   name="price" 
                                   value="{{ old('price') }}"
                                   step="0.01"
                                   required>
                            @error('price')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        
                        <!-- Задание 6: Поле для загрузки изображения -->
                        <div class="mb-3">
                            <label for="image" class="form-label">Изображение продукта</label>
                            <input type="file" 
                                   class="form-control @error('image') is-invalid @enderror" 
                                   id="image" 
                                   name="image"
                                   accept="image/*"
                                   required>
                            @error('image')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                            <div class="form-text">
                                Поддерживаемые форматы: JPEG, PNG, JPG, GIF. Максимальный размер: 2MB.
                            </div>
                        </div>
                        
                        <div class="d-grid gap-2">
                            <button type="submit" class="btn btn-primary btn-lg">Добавить продукт</button>
                            <a href="{{ route('products.index') }}" class="btn btn-secondary">Отмена</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection