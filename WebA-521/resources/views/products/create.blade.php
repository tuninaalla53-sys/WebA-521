@extends('layouts.app')

@section('title', 'Добавить продукт')

@section('content')
<h1 class="mb-4">Добавить новый продукт</h1>

<form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    
    <div class="row">
        <div class="col-md-8">
            <div class="mb-3">
                <label for="name" class="form-label">Название продукта:</label>
                <input type="text" name="name" id="name" class="form-control form-control-lg" required>
            </div>

            <div class="mb-3">
                <label for="description" class="form-label">Описание:</label>
                <textarea name="description" id="description" class="form-control" rows="5" required></textarea>
            </div>

            <div class="mb-3">
                <label for="price" class="form-label">Цена:</label>
                <input type="number" name="price" id="price" class="form-control" step="0.01" required>
            </div>

            <!-- Поле для загрузки изображения -->
            <div class="mb-3">
                <label for="image" class="form-label">Изображение продукта:</label>
                <input type="file" name="image" id="image" class="form-control" accept="image/*" required
                       onchange="previewImage(this)">
                <div class="form-text">
                    Поддерживаемые форматы: JPEG, PNG, JPG, GIF, WEBP. Максимальный размер: 2MB.
                    Рекомендуемое соотношение: 4:3 (например, 800x600px)
                </div>
            </div>
        </div>
        
        <div class="col-md-4">
            <!-- Предпросмотр изображения -->
            <div class="card">
                <div class="card-header">
                    <strong>Предпросмотр изображения</strong>
                </div>
                <div class="card-body text-center">
                    <div id="imagePreview" class="image-container" style="height: 200px; background: #f8f9fa;">
                        <span class="text-muted">Изображение появится здесь</span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="mt-4">
        <button type="submit" class="btn btn-success btn-lg">📦 Создать продукт</button>
        <a href="{{ route('products.index') }}" class="btn btn-secondary btn-lg">Отмена</a>
    </div>
</form>

<script>
// Функция для предпросмотра изображения
function previewImage(input) {
    const preview = document.getElementById('imagePreview');
    
    if (input.files && input.files[0]) {
        const reader = new FileReader();
        
        reader.onload = function(e) {
            preview.innerHTML = `<img src="${e.target.result}" class="product-card-image" alt="Preview">`;
        }
        
        reader.readAsDataURL(input.files[0]);
    } else {
        preview.innerHTML = '<span class="text-muted">Изображение появится здесь</span>';
    }
}
</script>
@endsection