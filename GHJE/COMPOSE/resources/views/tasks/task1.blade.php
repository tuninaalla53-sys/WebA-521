@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-12">
        <h2>Задание 1: Подсветка отрицательных чисел</h2>
        
        <div class="card mt-4">
            <div class="card-header">
                <h5>Исходный массив:</h5>
                <code>[10, -5, 3, -8, 15, 0, -1, 7]</code>
            </div>
            <div class="card-body">
                <h5>Результат с подсветкой:</h5>
                <div class="result">{!! $displayArray !!}</div>
                
                <h5 class="mt-3">Статус выполнения функции:</h5>
                <code>{{ $result ? 'true' : 'false' }}</code>
                
                <div class="mt-4">
                    <a href="{{ route('tasks.index') }}" class="btn btn-primary">← Назад к списку заданий</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection