@extends('layouts1.app')

@section('title', 'News Portal')

@section('content')
<div class="row mb-4">
    <div class="col-12">
        <div class="d-flex justify-content-between align-items-center">
            <h1>Latest News</h1>
            <a href="{{ route('news.create') }}" class="btn btn-primary">Add News</a>
        </div>
    </div>
</div>

@if($news->count() > 0)
    <div class="row">
        @foreach($news as $item)
            <div class="col-md-6 col-lg-4 mb-4">
                <div class="card news-card h-100">
                    @if($item->image_url)
                        <img src="{{ $item->image_url }}" class="card-img-top news-image" alt="{{ $item->title }}">
                    @else
                        <div class="card-img-top news-image bg-light d-flex align-items-center justify-content-center">
                            <span class="text-muted">No Image</span>
                        </div>
                    @endif
                    
                    <div class="card-body">
                        <h5 class="card-title">{{ $item->title }}</h5>
                        <p class="card-text text-muted">{{ $item->short_text }}</p>
                        <div class="d-flex justify-content-between align-items-center">
                            <small class="text-muted">{{ $item->created_at->format('M d, Y') }}</small>
                            <a href="{{ route('news.show', $item->id) }}" class="btn btn-outline-primary btn-sm">Read More</a>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@else
    <div class="text-center py-5">
        <h3 class="text-muted">No news available</h3>
        <p class="text-muted">Be the first to add news!</p>
        <a href="{{ route('news.create') }}" class="btn btn-primary">Add First News</a>
    </div>
@endif
@endsection