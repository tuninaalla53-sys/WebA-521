@extends('layouts.app')

@section('title', 'Детали кофейни')

@section('content')
<div class="container py-5">
    <div class="row">
        <div class="col-md-8 mx-auto">
            <!-- Заголовок -->
            <div class="text-center mb-5">
                <h1 class="display-4" id="cafe-name">Загрузка...</h1>
                <p class="lead text-muted" id="cafe-address">Загрузка...</p>
            </div>

            <!-- Основная информация -->
            <div class="card shadow-sm mb-4">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <h5 class="text-primary">📍 Местоположение</h5>
                            <p class="mb-1" id="cafe-neighborhood"></p>
                            <p class="text-muted small" id="cafe-coordinates"></p>
                        </div>
                        <div class="col-md-6">
                            <h5 class="text-primary">🏷️ Район</h5>
                            <p class="mb-1" id="cafe-district"></p>
                            <p class="text-muted small">Обновлено: <span id="cafe-updated"></span></p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Кофейные предложения -->
            <div class="card shadow-sm mb-4">
                <div class="card-header bg-white">
                    <h4 class="mb-0 text-primary">☕ Кофейные предложения</h4>
                </div>
                <div class="card-body">
                    <div id="offers-container">
                        <p class="text-center">Загрузка предложений...</p>
                    </div>
                </div>
            </div>

            <!-- Кнопка назад -->
            <div class="text-center mt-5">
                <a href="{{ url('/cafes') }}" class="btn btn-primary">
                    ← Назад к списку кофеен
                </a>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const pathArray = window.location.pathname.split('/');
        const cafeId = pathArray[pathArray.length - 1];
        loadCafeDetails(cafeId);
    });

    function loadCafeDetails(cafeId) {
        fetch(`/api/cafes/${cafeId}`)
            .then(response => {
                if (!response.ok) {
                    throw new Error('Кофейня не найдена');
                }
                return response.json();
            })
            .then(cafe => {
                // Обновляем основную информацию
                document.getElementById('cafe-name').textContent = cafe.name;
                document.getElementById('cafe-address').textContent = cafe.address;
                document.getElementById('cafe-neighborhood').textContent = cafe.neighborhood.name;
                document.getElementById('cafe-district').textContent = cafe.neighborhood.name;
                document.getElementById('cafe-coordinates').textContent = `Ш: ${cafe.latitude}, Д: ${cafe.longitude}`;
                
                // Форматируем дату
                const date = new Date(cafe.updated_at);
                document.getElementById('cafe-updated').textContent = date.toLocaleDateString('ru-RU');

                // Отображаем предложения
                displayOffers(cafe.offers);
            })
            .catch(error => {
                console.error('Ошибка загрузки данных:', error);
                document.getElementById('cafe-name').textContent = 'Ошибка загрузки';
                document.getElementById('cafe-address').textContent = 'Не удалось загрузить информацию о кофейне';
            });
    }

    function displayOffers(offers) {
        const container = document.getElementById('offers-container');
        
        if (!offers || offers.length === 0) {
            container.innerHTML = '<p class="text-center text-muted">Нет доступных предложений</p>';
            return;
        }

        container.innerHTML = offers.map(offer => `
            <div class="card mb-3">
                <div class="card-body">
                    <h5 class="text-success">${offer.bean?.name || 'Неизвестный сорт'}</h5>
                    <p class="mb-1"><strong>Метод заваривания:</strong> ${offer.brew_method || 'Не указан'}</p>
                    <p class="mb-1"><strong>Цена:</strong> ${offer.price || 'Не указана'} руб.</p>
                    ${offer.bean ? `
                    <div class="bg-light p-3 mt-2 rounded">
                        <h6>Информация о зернах:</h6>
                        <p class="mb-1"><strong>Происхождение:</strong> ${offer.bean.origin || 'Не указано'}</p>
                        <p class="mb-1"><strong>Обработка:</strong> ${offer.bean.process || 'Не указана'}</p>
                        <p class="mb-1"><strong>Обжарка:</strong> ${offer.bean.roast_level || 'Не указана'}</p>
                        ${offer.bean.description ? `<p class="mb-0"><strong>Описание:</strong> ${offer.bean.description}</p>` : ''}
                    </div>
                    ` : ''}
                </div>
            </div>
        `).join('');
    }
</script>
@endsection