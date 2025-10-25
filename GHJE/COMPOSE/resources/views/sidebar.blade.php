
@extends('layouts.app')

@section('title', 'Раскрывающееся меню')

@section('styles')
    <link rel="stylesheet" href="{{ asset('css/sidebar.css') }}">
@endsection

@section('content')
    {{-- Боковое меню --}}
    <div class="sidebar">
        <div class="menu-icon">☰</div>
        <ul class="menu">
            {{-- Цикл для  пунктов меню --}}
            @foreach($menuItems as $item)
                <li>
                    {{-- Используем функцию asset для правильного пути к иконкам --}}
                    <img src="{{ asset('icons/' . $item['icon']) }}" alt="{{ $item['alt'] }}">
                </li>
            @endforeach
        </ul>
    </div>

    {{-- Контент страницы --}}
    <div class="content">
        <h1>Что такое Lorem Ipsum?</h1>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Reiciendis est molestiae, veniam aliquam culpa dolor, modi aut sapiente labore quod cum consectetur excepturi minus laboriosam odit reprehenderit ipsam facere eum!</p>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Expedita iure corporis sint dicta nobis, veniam reprehenderit error nesciunt, at tenetur, mollitia aliquam animi accusantium? Consequuntur non eligendi cumque ratione esse.</p>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Magni ducimus illum assumenda molestiae, nesciunt optio cumque a veniam! Sit fugit doloremque incidunt odit saepe aperiam officiis recusandae at eos quos.</p>
    </div>

    <div class="content">
        <h1>Что такое Lorem Ipsum?</h1>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Reiciendis est molestiae, veniam aliquam culpa dolor, modi aut sapiente labore quod cum consectetur excepturi minus laboriosam odit reprehenderit ipsam facere eum!</p>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Expedita iure corporis sint dicta nobis, veniam reprehenderit error nesciunt, at tenetur, mollitia aliquam animi accusantium? Consequuntur non eligendi cumque ratione esse.</p>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Magni ducimus illum assumenda molestiae, nesciunt optio cumque a veniam! Sit fugit doloremque incidunt odit saepe aperiam officiis recusandae at eos quos.</p>
    </div>

    <div class="content">
        <h1>Что такое Lorem Ipsum?</h1>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Reiciendis est molestiae, veniam aliquam culpa dolor, modi aut sapiente labore quod cum consectetur excepturi minus laboriosam odit reprehenderit ipsam facere eum!</p>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Expedita iure corporis sint dicta nobis, veniam reprehenderit error nesciunt, at tenetur, mollitia aliquam animi accusantium? Consequuntur non eligendi cumque ratione esse.</p>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Magni ducimus illum assumenda molestiae, nesciunt optio cumque a veniam! Sit fugit doloremque incidunt odit saepe aperiam officiis recusandae at eos quos.</p>
    </div>
@endsection