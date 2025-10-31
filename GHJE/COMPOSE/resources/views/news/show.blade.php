@extends('layouts1.app')

@section('title', $newsItem->title)

@section('content')
<div class="row justify-content-center">
    <div class="col-lg-8">
        <div class="card shadow">
            <!-- Image -->
            @if($newsItem->image_url)
                <img src="{{ $newsItem->image_url }}" class="card-img-top" alt="{{ $newsItem->title }}" style="max-height: 400px; object-fit: cover;">
            @endif
            
            <div class="card-body">
                <!-- Navigation -->
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <a href="{{ route('news.index') }}" class="btn btn-outline-secondary">Back to News</a>
                    <a href="{{ route('news.edit', $newsItem->id) }}" class="btn btn-warning">Edit News</a>
                </div>

                <!-- Content -->
                <h1 class="card-title mb-3">{{ $newsItem->title }}</h1>
                
                <div class="text-muted mb-4">
                    <i>{{ $newsItem->short_text }}</i>
                </div>

                <div class="card-text fs-5" style="line-height: 1.8;">
                    {!! nl2br(e($newsItem->article)) !!}
                </div>

                <!-- Date -->
                <div class="mt-4 pt-3 border-top">
                    <small class="text-muted">
                        Published: {{ $newsItem->created_at->format('F d, Y') }}
                    </small>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection