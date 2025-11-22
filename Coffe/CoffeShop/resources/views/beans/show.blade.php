@extends('layouts.app')

@section('title', 'Детали сорта зерен')

@section('content')
<div class="container py-5">
    <div class="row">
        <div class="col-md-8 mx-auto">
            <!-- Заголовок -->
            <div class="text-center mb-5">
                <h1 class="display-4 text-success" id="bean-name">Загрузка...</h1>
                <p class="lead text-muted" id="bean-roaster">Загрузка...</p>
            </div>

            <!-- Основная информация -->
            <div class="card shadow-sm mb-4">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <h5 class="text-success">🌍 Происхождение</h5>
                            <p class="mb-2"><strong>Страна:</strong> <span id="bean-origin">Загрузка...</span></p>
                            <p class="mb-2"><strong>Обработка:</strong> <span id="bean-process">Загрузка...</span></p>
                            <p class="mb-2"><strong>Уровень обжарки:</strong> <span id="bean-roast-level">Загрузка...</span></p>
                        </div>
                        <div class="col-md-6">
                            <h5 class="text-success">🏭 Обжарщик</h5>
                            <p class="mb-2"><strong>Название:</strong> <span id="roaster-name">Загрузка...</span></p>
                            <p class="mb-0"><strong>Описание:</strong> <span id="roaster-description">Загрузка...</span></p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Описание вкуса -->
            <div class="card shadow-sm mb-4">
                <div class="card-header bg-white">
                    <h4 class="mb-0 text-success">👅 Описание вкуса</h4>
                </div>
                <div class="card-body">
                    <p id="bean-description" class="lead mb-0">Загрузка...</p>
                </div>
            </div>

            <!-- Где попробовать -->
            <div class="card shadow-sm">
                <div class="card-header bg-white">
                    <h4 class="mb-0 text-success">☕ Где попробовать этот сорт</h4>
                </div>
                <div class="card-body">
                    <div id="cafes-container">
                        <p class="text-center">Загрузка кофеен...</p>
                    </div>
                </div>
            </div>

            <!-- Кнопки навигации -->
            <div class="text-center mt-5">
                <a href="{{ url('/beans') }}" class="btn btn-success">
                    ← Назад к списку сортов
                </a>
                <a href="{{ url('/') }}" class="btn btn-outline-secondary ms-2">
                    На главную
                </a>
            </div>
        </div>
    </div>
</div>
@endsection

@section('styles')
<style>
    .cafe-card {
        border-left: 3px solid #28a745;
        transition: all 0.3s ease;
    }
    
    .cafe-card:hover {
        transform: translateX(5px);
    }
</style>
@endsection

@section('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const pathArray = window.location.pathname.split('/');
        const beanId = pathArray[pathArray.length - 1];
        loadBeanDetails(beanId);
    });

    function loadBeanDetails(beanId) {
        fetch(`/api/beans/${beanId}`)
            .then(response => {
                if (!response.ok) {
                    throw new Error('Сорт зерен не найден');
                }
                return response.json();
            })
            .then(bean => {
                console.log('Данные сорта зерен:', bean);
                
                // Обновляем основную информацию
                document.getElementById('bean-name').textContent = bean.name;
                document.getElementById('bean-roaster').textContent = `Обжарщик: ${bean.roaster?.name || 'Не указан'}`;
                document.getElementById('bean-origin').textContent = bean.origin || 'Не указана';
                document.getElementById('bean-process').textContent = bean.process || 'Не указана';
                document.getElementById('bean-roast-level').textContent = bean.roast_level || 'Не указана';
                document.getElementById('bean-description').textContent = bean.description || 'Описание отсутствует';
                
                // Информация об обжарщике
                document.getElementById('roaster-name').textContent = bean.roaster?.name || 'Не указан';
                document.getElementById('roaster-description').textContent = bean.roaster?.description || 'Описание отсутствует';

                // Загружаем кофейни где есть этот сорт
                loadCafesWithBean(bean.name);
            })
            .catch(error => {
                console.error('Ошибка загрузки данных:', error);
                document.getElementById('bean-name').textContent = 'Ошибка загрузки';
                document.getElementById('bean-description').textContent = 'Не удалось загрузить информацию о сорте зерен';
            });
    }

    function loadCafesWithBean(beanName) {
        // Загружаем все кофейны и фильтруем те, у которых есть этот сорт
        fetch('/api/cafes')
            .then(response => response.json())
            .then(cafes => {
                const container = document.getElementById('cafes-container');
                
                // Фильтруем кофейни, у которых есть предложения с этим сортом
                const cafesWithBean = cafes.filter(cafe => 
                    cafe.offers && cafe.offers.some(offer => 
                        offer.bean && offer.bean.name === beanName
                    )
                );

                if (!cafesWithBean || cafesWithBean.length === 0) {
                    container.innerHTML = `
                        <div class="text-center text-muted">
                            <p>Этот сорт зерен пока не представлен в кофейнях</p>
                            <a href="/cafes" class="btn btn-outline-success btn-sm">Посмотреть все кофейни</a>
                        </div>`;
                    return;
                }

                container.innerHTML = cafesWithBean.map(cafe => `
                    <div class="card cafe-card mb-3">
                        <div class="card-body">
                            <h5 class="card-title">${cafe.name}</h5>
                            <p class="card-text mb-1">
                                <i class="bi bi-geo-fill"></i> ${cafe.address}
                            </p>
                            <p class="text-muted mb-2">
                                <i class="bi bi-building"></i> ${cafe.neighborhood?.name || 'Район не указан'}
                            </p>
                            <a href="/cafes/${cafe.id}" class="btn btn-outline-success btn-sm">
                                Посмотреть кофейню
                            </a>
                        </div>
                    </div>
                `).join('');
            })
            .catch(error => {
                console.error('Ошибка загрузки кофеен:', error);
                document.getElementById('cafes-container').innerHTML = `
                    <div class="text-center text-muted">
                        <p>Не удалось загрузить информацию о кофейнях</p>
                    </div>`;
            });
    }
</script>
@endsection