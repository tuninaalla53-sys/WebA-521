@extends('layouts1.app')

@section('title', isset($newsItem) ? 'Edit News' : 'Add News')

@section('content')
<div class="form-container">
    <div class="card shadow">
        <div class="card-header bg-white border-bottom">
            <h4 class="mb-0">{{ isset($newsItem) ? 'Edit News' : 'Add New News' }}</h4>
        </div>
        
        <div class="card-body">
            <form action="{{ isset($newsItem) ? route('news.update', $newsItem->id) : route('news.store') }}" 
                  method="POST" enctype="multipart/form-data">
                @csrf
                @if(isset($newsItem))
                    @method('PUT')
                @endif

                <!-- Header -->
                <div class="mb-4">
                    <label for="title" class="form-label fw-bold">Header</label>
                    <input type="text" class="form-control" id="title" name="title" 
                           value="{{ old('title', $newsItem->title ?? '') }}" 
                           placeholder="Enter news header" required>
                    @error('title')
                        <div class="text-danger small mt-1">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Short text -->
                <div class="mb-4">
                    <label for="short_text" class="form-label fw-bold">Short text</label>
                    <textarea class="form-control" id="short_text" name="short_text" rows="3" 
                              placeholder="Enter short description" required>{{ old('short_text', $newsItem->short_text ?? '') }}</textarea>
                    @error('short_text')
                        <div class="text-danger small mt-1">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Article -->
                <div class="mb-4">
                    <label for="article" class="form-label fw-bold">Article</label>
                    <textarea class="form-control" id="article" name="article" rows="6" 
                              placeholder="Enter full article text" required>{{ old('article', $newsItem->article ?? '') }}</textarea>
                    @error('article')
                        <div class="text-danger small mt-1">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Upload Image -->
                <div class="mb-4">
                    <label for="image" class="form-label fw-bold">Upload Image</label>
                    <input type="file" class="form-control" id="image" name="image" 
                           accept="image/jpeg,image/png,image/jpg,image/gif"
                           @if(!isset($newsItem)) required @endif>
                    <div class="form-text">Supported formats: JPEG, PNG, JPG, GIF. Max size: 2MB</div>
                    @error('image')
                        <div class="text-danger small mt-1">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Current Image (when editing) -->
                @if(isset($newsItem) && $newsItem->image_url)
                    <div class="mb-4">
                        <label class="form-label fw-bold">Current Image:</label>
                        <div>
                            <img src="{{ $newsItem->image_url }}" alt="Current image" 
                                 class="img-thumbnail" style="max-height: 200px;">
                        </div>
                    </div>
                @endif

                <!-- Buttons -->
                <div class="d-flex gap-2 justify-content-end">
                    <a href="{{ route('news.index') }}" class="btn btn-secondary">Cancel</a>
                    <button type="submit" class="btn btn-primary">
                        {{ isset($newsItem) ? 'Update' : 'Add' }}
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<style>
.form-control {
    border-radius: 6px;
    border: 1px solid #ddd;
    padding: 10px;
}
.form-control:focus {
    border-color: #007bff;
    box-shadow: 0 0 0 0.2rem rgba(0,123,255,.25);
}
.btn {
    border-radius: 6px;
    padding: 8px 20px;
}
.card {
    border-radius: 10px;
}
</style>
@endsection