@extends('layouts.app')

@section('title', 'Кофейни')

@section('content')
<div class="container mt-4">
    <h1 class="mb-4">Кофейни города</h1>
    
    <!-- Поиск и фильтры -->
    <div class="card mb-4">
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <label for="search" class="form-label">Поиск по названию</label>
                    <input type="text" class="form-control" id="search" placeholder="Введите название кофейни...">
                </div>
                <div class="col-md-4">
                    <label for="neighborhood" class="form-label">Район</label>
                    <select class="form-select" id="neighborhood">
                        <option value="">Все районы</option>
                        <!-- Районы загружаются через JavaScript -->
                    </select>
                </div>
                <div class="col-md-2 d-flex align-items-end">
                    <button class="btn btn-primary w-100" onclick="loadCafes()">Поиск</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Результаты -->
    <div class="row" id="cafes-results">
        <div class="col-12 text-center">
            <p>Загрузка кофеен...</p>
        </div>
    </div>

    <!-- Пагинация -->
    <div class="row mt-4">
        <div class="col-12">
            <nav id="pagination">
                <!-- Пагинация загружается через JavaScript -->
            </nav>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
    let currentPage = 1;
    let totalPages = 1;

    document.addEventListener('DOMContentLoaded', function() {
        loadNeighborhoods();
        loadCafes();
    });

    // Загружаем список районов для фильтра
    function loadNeighborhoods() {
        fetch('/api/metadata/table-structure/neighborhoods')
            .then(response => response.json())
            .then(() => {
                // Загружаем данные районов
                return fetch('/api/stats/cafes-by-neighborhood');
            })
            .then(response => response.json())
            .then(neighborhoods => {
                const select = document.getElementById('neighborhood');
                neighborhoods.forEach(neighborhood => {
                    const option = document.createElement('option');
                    option.value = neighborhood.name;
                    option.textContent = `${neighborhood.name} (${neighborhood.cafes_count})`;
                    select.appendChild(option);
                });
            })
            .catch(error => {
                console.error('Ошибка загрузки районов:', error);
            });
    }

    // Загружаем кофейни
    function loadCafes(page = 1) {
        currentPage = page;
        const search = document.getElementById('search').value;
        const neighborhood = document.getElementById('neighborhood').value;

        let url = `/api/cafes?page=${page}`;
        if (search) url += `&search=${encodeURIComponent(search)}`;
        if (neighborhood) url += `&neighborhood=${encodeURIComponent(neighborhood)}`;

        fetch(url)
            .then(response => response.json())
            .then(data => {
                displayCafes(data.data);
                setupPagination(data);
            })
            .catch(error => {
                console.error('Ошибка загрузки кофеен:', error);
                document.getElementById('cafes-results').innerHTML = `
                    <div class="col-12 text-center">
                        <p class="text-danger">Ошибка загрузки кофеен. Попробуйте обновить страницу.</p>
                    </div>
                `;
            });
    }

    // Отображаем кофейни
    function displayCafes(cafes) {
        const container = document.getElementById('cafes-results');
        
        if (cafes.length === 0) {
            container.innerHTML = `
                <div class="col-12 text-center">
                    <p>Кофейни не найдены. Попробуйте изменить параметры поиска.</p>
                </div>
            `;
            return;
        }

        container.innerHTML = cafes.map(cafe => `
            <div class="col-md-6 mb-4">
                <div class="card coffee-card h-100">
                    <div class="card-body">
                        <h5 class="card-title">${cafe.name}</h5>
                        <p class="card-text">
                            <i class="bi bi-geo-alt"></i> ${cafe.address}<br>
                            <small class="text-muted">${cafe.neighborhood?.name || 'Район не указан'}</small>
                        </p>
                        ${cafe.latitude && cafe.longitude ? `
                            <p class="card-text">
                                <small>
                                    <i class="bi bi-geo"></i> 
                                    Ш: ${cafe.latitude}, Д: ${cafe.longitude}
                                </small>
                            </p>
                        ` : ''}
                        <div class="mt-3">
                            <a href="/api/cafes/${cafe.id}" class="btn btn-outline-primary btn-sm" target="_blank">
                                Подробнее (API)
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        `).join('');
    }

    // Настраиваем пагинацию
    function setupPagination(data) {
        const pagination = document.getElementById('pagination');
        
        if (data.last_page <= 1) {
            pagination.innerHTML = '';
            return;
        }

        let html = '<ul class="pagination justify-content-center">';
        
        // Предыдущая страница
        if (data.current_page > 1) {
            html += `<li class="page-item">
                <a class="page-link" href="#" onclick="loadCafes(${data.current_page - 1})">Назад</a>
            </li>`;
        }

        // Страницы
        for (let i = 1; i <= data.last_page; i++) {
            html += `<li class="page-item ${i === data.current_page ? 'active' : ''}">
                <a class="page-link" href="#" onclick="loadCafes(${i})">${i}</a>
            </li>`;
        }

        // Следующая страница
        if (data.current_page < data.last_page) {
            html += `<li class="page-item">
                <a class="page-link" href="#" onclick="loadCafes(${data.current_page + 1})">Вперед</a>
            </li>`;
        }

        html += '</ul>';
        pagination.innerHTML = html;
    }
</script>
@endsection