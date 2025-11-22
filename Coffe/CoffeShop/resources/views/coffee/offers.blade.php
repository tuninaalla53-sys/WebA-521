
@extends('layouts.app')

@section('title', 'Кофейных предложений')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h1>Кофейных предложений</h1>
            <div class="image-container my-4">
                <img src="{{ asset('images/coffee/offers.jpg') }}" alt="Кофейные предложения" class="img-fluid rounded">
            </div>
            <div class="description bg-light p-4 rounded">
                <p>В нашем ассортименте представлено 7 различных кофейных предложений, включая классический эспрессо, капучино, латте и специальные авторские напитки, созданные нашими бариста.</p>
                <p>Каждый день мы предлагаем новые сезонные напитки и специальные предложения для наших постоянных клиентов.</p>
            </div>
            <a href="{{ url('/') }}" class="btn btn-primary mt-3">← Назад на главную</a>
        </div>
    </div>
</div>
@endsection