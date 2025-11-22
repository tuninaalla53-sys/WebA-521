@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-12">
        <h2>Задание 2: Конвертер чисел в текст</h2>
        
        <div class="card mt-4">
            <div class="card-body">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Число</th>
                            <th>Текстовое представление</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($convertedNumbers as $number => $text)
                        <tr>
                            <td><strong>{{ $number }}</strong></td>
                            <td>{{ ucfirst($text) }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                
                <div class="mt-4">
                    <a href="{{ route('tasks.index') }}" class="btn btn-primary">← Назад к списку заданий</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection