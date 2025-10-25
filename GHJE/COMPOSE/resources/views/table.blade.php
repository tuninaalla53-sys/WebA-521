
{{-- Наследуем основной layout --}}
@extends('layouts.app')

{{-- Устанавливаем заголовок страницы --}}
@section('title', 'Таблица с фиксированным заголовком и столбцом')

{{-- Подключаем CSS стили для таблицы --}}
@section('styles')
    <link rel="stylesheet" href="{{ asset('css/table.css') }}">
@endsection

{{-- Основное содержимое страницы --}}
@section('content')
<div class="table-container">
    <table>
        <thead>
            <tr>
                {{-- Цикл для  заголовков таблицы --}}
                @foreach($headers as $header)
                    <th>{{ $header }}</th>
                @endforeach
            </tr>
        </thead>
        <tbody>
            {{-- Цикл для  строк таблицы --}}
            @foreach($tableData as $row)
                <tr>
                    {{-- Цикл для  ячеек в строке --}}
                    @foreach($row as $cell)
                        {{-- Если это первая ячейка (заголовок строки) --}}
                        @if($loop->first)
                            <th>{{ $cell }}</th>
                        @else
                            <td>{{ $cell }}</td>
                        @endif
                    @endforeach
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection