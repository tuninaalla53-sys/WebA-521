@extends('layouts.app')

@section('title', 'Главная')

@section('content')
    <!-- Герой секция -->
    <section class="hero-section text-center">
        <div class="container">
            <h1 class="display-4 mb-4">Откройте мир кофе</h1>
            <p class="lead mb-4">Найдите лучшие независимые кофейни вашего города</p>
            <a href="{{ url('/cafes') }}" class="btn btn-light btn-lg">Найти кофейни</a>
        </div>
    </section>

    <!-- Статистика -->
    <section class="py-5">
        <div class="container">
            <div class="row text-center">
                <!-- Кофеен в базе -->
                <div class="col-md-4 mb-4">
                    <a href="{{ url('/cafes') }}" class="card-link">
                        <div class="card coffee-card h-100">
                            <div class="card-body">
                                <i class="bi bi-shop display-4 text-primary"></i>
                                <h3 class="mt-3">4</h3>
                                <p class="text-muted">Кофеен в базе</p>
                            </div>
                        </div>
                    </a>
                </div>
                
                <!-- Сортов зерен -->
                <div class="col-md-4 mb-4">
                    <a href="{{ url('/beans') }}" class="card-link">
                        <div class="card coffee-card h-100">
                            <div class="card-body">
                                <i class="bi bi-cup display-4 text-success"></i>
                                <h3 class="mt-3">4</h3>
                                <p class="text-muted">Сортов зерен</p>
                            </div>
                        </div>
                    </a>
                </div>
                
                <!-- Популярные кофейни -->
                <div class="col-md-4 mb-4">
                    <a href="{{ url('/cafes') }}" class="card-link">
                        <div class="card coffee-card h-100">
                            <div class="card-body">
                                <i class="bi bi-star display-4 text-warning"></i>
                                <h3 class="mt-3">4</h3>
                                <p class="text-muted">Популярные кофейни</p>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- Популярные кофейни -->
    <section class="py-5 bg-light">
        <div class="container">
            <h2 class="text-center mb-5">Популярные кофейни</h2>
            <div class="row" id="popular-cafes">
                <!-- Кофейни будут загружены через JavaScript -->
                <div class="col-12 text-center">
                    <div class="spinner-border text-primary" role="status">
                        <span class="visually-hidden">Загрузка...</span>
                    </div>
                    <p class="mt-2">Загрузка кофеен...</p>
                </div>
            </div>
            <div class="text-center mt-4">
                <a href="{{ url('/cafes') }}" class="btn btn-outline-primary">Смотреть все кофейни</a>
            </div>
        </div>
    </section>

    <!-- О проекте -->
    <section class="py-5">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-6">
                    <h2>О нашем гиде</h2>
                    <p class="lead">Мы создали этот гид, чтобы помочь вам найти лучшие независимые кофейни города.</p>
                    <p>Узнайте о сортах зерен, методах заваривания и ценах в каждой кофейне.</p>
                    <a href="/register" class="btn btn-primary">Присоединиться</a>
                </div>
                <div class="col-md-6">
                    <div class="test-image">
                        <img src="/images/coffee-shops/bushido.jpg" alt="Тестовое фото" class="img-fluid rounded" style="max-height: 300px; object-fit: cover;">
                        <small class="text-muted d-block mt-2">Тест: /images/coffee-shops/bushido.jpg</small>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('styles')
<style>
    .hero-section {
        background: linear-gradient(135deg, #6f4e37 0%, #8b6b4d 100%);
        color: white;
        padding: 100px 0;
    }

    
    .card-link {
        display: block;
        color: inherit;
        text-decoration: none !important;
        transition: transform 0.3s ease;
    }

    .card-link:hover {
        color: inherit;
        text-decoration: none !important;
        transform: translateY(-5px);
    }

    .coffee-card {
        transition: all 0.3s ease;
        border: none;
        box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        height: 100%;
    }

    .card-link:hover .coffee-card {
        box-shadow: 0 8px 25px rgba(0,0,0,0.15);
        background-color: #f8f9fa;
    }

    .coffee-card .card-body {
        padding: 2rem 1rem;
    }

    .coffee-card h3 {
        font-weight: bold;
        color: #333;
    }

    .coffee-card .text-muted {
        font-size: 1.1rem;
    }

    .cafe-card {
        transition: all 0.3s ease;
        border: none;
        box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        height: 100%;
        text-decoration: none !important;
    }

    .cafe-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 8px 25px rgba(0,0,0,0.15);
        text-decoration: none !important;
    }

    .cafe-image {
        height: 150px;
        object-fit: cover;
        border-radius: 8px 8px 0 0;
        width: 60%;
        background: #f8f9fa;
    }

    .cafe-address {
        color: #666;
        font-size: 0.95em;
        margin-bottom: 8px;
    }

    .cafe-district {
        color: #888;
        font-size: 0.9em;
        margin-bottom: 8px;
    }

    .cafe-coordinates {
        color: #999;
        font-size: 0.8em;
        font-family: monospace;
        margin-bottom: 15px;
    }

    .beans-section {
        margin-top: 15px;
    }

    .bean-item {
        display: flex;
        align-items: center;
        margin-bottom: 4px;
        padding: 4px 6px;
        background: #f8f9fa;
        border-radius: 4px;
        min-height: 28px;
    }

    /* ОЧЕНЬ МАЛЕНЬКИЕ КАРТИНКИ ДЛЯ СОРТОВ КОФЕ */
    .bean-image {
        width: 20px !important;        /* Принудительно маленький размер */
        height: 20px !important;       /* Принудительно маленький размер */
        object-fit: cover !important;
        border-radius: 3px !important;
        margin-right: 6px !important;
        background: #e9ecef;
        flex-shrink: 0;
        display: block !important;
        max-width: 20px !important;    /* Ограничение максимальной ширины */
        max-height: 20px !important;   /* Ограничение максимальной высоты */
    }

    /* Принудительно переопределяем любые другие стили */
    .bean-image[style] {
        width: 20px !important;
        height: 20px !important;
        max-width: 20px !important;
        max-height: 20px !important;
    }

    .bean-name {
        font-weight: 500;
        font-size: 0.75em;
        line-height: 1.2;
        flex-grow: 1;
    }

    a, .card-link, .btn-link {
        text-decoration: none !important;
    }

    .card-link .coffee-card,
    .card-link .cafe-card {
        text-decoration: none !important;
    }

    .beans-title {
        font-weight: 600;
        margin-bottom: 6px;
        color: #333;
        font-size: 0.85em;
    }

    .more-beans {
        background: #e9ecef !important;
        color: #6c757d;
        font-style: italic;
        font-size: 0.75em;
    }

    .fallback-image {
        background: linear-gradient(135deg, #6f4e37, #8b6b4d);
        display: flex;
        align-items: center;
        justify-content: center;
        color: white;
        font-weight: bold;
        font-size: 0.6em;
    }

    .test-image {
        text-align: center;
        padding: 20px;
        border: 2px dashed #ccc;
        border-radius: 8px;
    }

    .image-debug {
        font-size: 0.5em;
        color: #888;
        margin-left: auto;
        display: none; /* Скрываем отладочную информацию */
    }

    .debug-info {
        font-size: 0.7em;
        color: #666;
        background: #f8f9fa;
        padding: 4px;
        border-radius: 3px;
        margin-top: 5px;
        display: none; /* Скрываем отладочную информацию */
    }

    /* Компактное отображение для мобильных */
    @media (max-width: 768px) {
        .bean-item {
            padding: 3px 4px;
            margin-bottom: 3px;
        }
        
        .bean-image {
            width: 18px !important;
            height: 18px !important;
            max-width: 18px !important;
            max-height: 18px !important;
            margin-right: 4px !important;
        }
        
        .bean-name {
            font-size: 0.7em;
        }
    }

    /* Гарантируем, что картинки не растягиваются */
    img.bean-image {
        width: 20px !important;
        height: 20px !important;
        object-fit: cover !important;
    }
</style>
@endsection

@section('scripts')
<script>
    // Загружаем популярные кофейни при загрузке страницы
    document.addEventListener('DOMContentLoaded', function() {
        console.log('=== НАЧАЛО ЗАГРУЗКИ КОФЕЕН ===');
        loadPopularCafes();
    });

    function loadPopularCafes() {
        const cafesFromDb = [
            {
                id: 1,
                name: "Бушидо",
                address: "ул. Центральная, 1",
                district: "Центральный",
                latitude: "55.7580000",
                longitude: "37.61730000",
                image: "/images/cafes/bushido.jpg",
                beans: [
                    {
                        name: "Арабика",
                        image: "/images/beans/arabica.webp"
                    },
                    {
                        name: "Робуста", 
                        image: "/images/beans/robusta.webp"
                    },
                    {
                        name: "Эфиопия Иргачефф",
                        image: "/images/beans/ethiopia.jpg"
                    }
                ]
            },
            {
                id: 2,
                name: "Кофе и Книги", 
                address: "пер. Старый, 5",
                district: "Старый город",
                latitude: "55.7500000",
                longitude: "37.61500000",
                image: "/images/cafes/coffee-books.jpg",
                beans: [
                    {
                        name: "Колумбия Супремо",
                        image: "/images/beans/Coffe4.jpg"
                    },
                    {
                        name: "Гватемала Антигуа",
                        image: "/images/beans/ethiopia.jpg"
                    }
                ]
            },
            {
                id: 3,
                name: "Зерно",
                address: "ул. Заречная, 25", 
                district: "Заречный",
                latitude: "55.7600000",
                longitude: "37.62000000",
                image: "/images/cafes/zermo.jpg",
                beans: [
                    {
                        name: "Бразилия Сантос",
                        image: "/images/beans/Coffe4.jpg"
                    },
                    {
                        name: "Кения AA",
                        image: "/images/beans/arabica.webp"
                    },
                    {
                        name: "Коста-Рика Тарразу",
                        image: "/images/beans/robusta.webp"
                    }
                ]
            },
            {
                id: 4,
                name: "Флагман",
                address: "пр. Главный, 10",
                district: "Центральный", 
                latitude: "55.7578000",
                longitude: "37.61750000",
                image: "/images/cafes/flagman.jpg",
                beans: [
                    {
                        name: "Йемен Мокка",
                        image: "/images/beans/ethiopia.jpg"
                    },
                    {
                        name: "Танзания Килиманджаро",
                        image: "/images/beans/arabica.webp"
                    },
                    {
                        name: "Ямайка Блю Маунтин",
                        image: "/images/beans/Coffe4.jpg"
                    }
                ]
            }
        ];

        console.log('Данные кофеен загружены:', cafesFromDb);
        displayCafes(cafesFromDb);
    }

    function displayCafes(cafes) {
        const cafesContainer = document.getElementById('popular-cafes');
        
        if (!cafesContainer) {
            console.error('❌ Контейнер popular-cafes не найден!');
            return;
        }

        if (cafes.length === 0) {
            cafesContainer.innerHTML = `
                <div class="col-12 text-center">
                    <p>Популярные кофейни появятся здесь скоро!</p>
                </div>
            `;
            return;
        }

        cafesContainer.innerHTML = cafes.map(cafe => {
            return `
            <div class="col-md-6 col-lg-3 mb-4">
                <a href="/cafes/${cafe.id}" class="card-link">
                    <div class="card cafe-card h-100">
                        <img src="${cafe.image}" class="cafe-image" alt="${cafe.name}" 
                             onerror="this.src='data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iNDAwIiBoZWlnaHQ9IjMwMCIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj48cmVjdCB3aWR0aD0iMTAwJSIgaGVpZ2h0PSIxMDAlIiBmaWxsPSIjNmY0ZTM3Ii8+PHRleHQgeD0iNTAlIiB5PSI1MCUiIGZvbnQtZmFtaWx5PSJBcmlhbCIgZm9udC1zaXplPSIxOCIgZmlsbD0id2hpdGUiIHRleHQtYW5jaG9yPSJtaWRkbGUiIGR5PSIuM2VtIj5bJEZBTExCQUNLXSDQkdGD0LTRi9C00LjQuiDQutC+0YTQtdC50L3QuNGPPC90ZXh0Pjwvc3ZnPg=='">
                        <div class="card-body">
                            <h5 class="card-title">${cafe.name}</h5>
                            <p class="cafe-address"><strong>${cafe.address}</strong></p>
                            <p class="cafe-district">${cafe.district}</p>
                            <p class="cafe-coordinates">Ш: ${cafe.latitude}, Д: ${cafe.longitude}</p>
                            
                            <div class="beans-section">
                                <div class="beans-title">Сорта зерен:</div>
                                ${cafe.beans.map(bean => `
                                    <div class="bean-item">
                                        <img src="${bean.image}" class="bean-image" alt="${bean.name}" 
                                             style="width: 20px; height: 20px; object-fit: cover;"
                                             onerror="this.src='data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iMTAwIiBoZWlnaHQ9IjEwMCIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj48cmVjdCB3aWR0aD0iMTAwJSIgaGVpZ2h0PSIxMDAlIiBmaWxsPSIjOGI2YjRkIi8+PHRleHQgeD0iNTAlIiB5PSI1MCUiIGZvbnQtZmFtaWx5PSJBcmlhbCIgZm9udC1zaXplPSIxMiIgZmlsbD0id2hpdGUiIHRleHQtYW5jaG9yPSJtaWRkbGUiIGR5PSIuM2VtIj5bJEZBTExCQUNLXSDQodC+0YDQs9Cw0L3QuNC4PC90ZXh0Pjwvc3ZnPg=='">
                                        <span class="bean-name">${bean.name}</span>
                                    </div>
                                `).join('')}
                            </div>
                            
                            <div class="text-center mt-3">
                                <span class="btn btn-primary btn-sm">Подробнее</span>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            `;
        }).join('');

        console.log('✅ Карточки кофеен отображены');
    }
</script>
@endsection