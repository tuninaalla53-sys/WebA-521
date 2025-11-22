@extends('layouts.app')

@section('title', 'Сорта зерен')

@section('content')
<div class="container mt-4">
    <h1 class="mb-4">Сорта кофейных зерен</h1>
    
    <!-- Фильтры -->
    <div class="card mb-4">
        <div class="card-body">
            <div class="row">
                <div class="col-md-3">
                    <label for="origin" class="form-label">Страна происхождения</label>
                    <input type="text" class="form-control" id="origin" placeholder="Эфиопия, Бразилия...">
                </div>
                <div class="col-md-3">
                    <label for="process" class="form-label">Метод обработки</label>
                    <input type="text" class="form-control" id="process" placeholder="натуральная, мытая...">
                </div>
                <div class="col-md-3">
                    <label for="roast_level" class="form-label">Уровень обжарки</label>
                    <select class="form-select" id="roast_level">
                        <option value="">Все уровни</option>
                        <option value="light">Светлая</option>
                        <option value="medium">Средняя</option>
                        <option value="dark">Темная</option>
                    </select>
                </div>
                <div class="col-md-3">
                    <label for="sort_by" class="form-label">Сортировка</label>
                    <select class="form-select" id="sort_by">
                        <option value="name">По названию</option>
                        <option value="origin">По стране</option>
                        <option value="roast_level">По обжарке</option>
                    </select>
                </div>
            </div>
            <div class="row mt-3">
                <div class="col-12">
                    <button class="btn btn-primary" onclick="loadBeans()">Применить фильтры</button>
                    <button class="btn btn-outline-secondary" onclick="resetFilters()">Сбросить</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Результаты -->
    <div class="row" id="beans-results">
        <div class="col-12 text-center">
            <p>Загрузка сортов зерен...</p>
        </div>
    </div>

    <!-- Пагинация -->
    <div class="row mt-4">
        <div class="col-12">
            <nav id="beans-pagination">
                <!-- Пагинация загружается через JavaScript -->
            </nav>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
    let beansCurrentPage = 1;

    document.addEventListener('DOMContentLoaded', function() {
        loadBeans();
    });

    // Загружаем зерна с фильтрами
    function loadBeans(page = 1) {
        beansCurrentPage = page;
        
        const origin = document.getElementById('origin').value;
        const process = document.getElementById('process').value;
        const roast_level = document.getElementById('roast_level').value;
        const sort_by = document.getElementById('sort_by').value;

        let url = `/api/beans/search?page=${page}&sort_by=${sort_by}`;
        if (origin) url += `&origin=${encodeURIComponent(origin)}`;
        if (process) url += `&process=${encodeURIComponent(process)}`;
        if (roast_level) url += `&roast_level=${encodeURIComponent(roast_level)}`;

        fetch(url)
            .then(response => response.json())
            .then(data => {
                displayBeans(data.data);
                setupBeansPagination(data);
            })
            .catch(error => {
                console.error('Ошибка загрузки зерен:', error);
                document.getElementById('beans-results').innerHTML = `
                    <div class="col-12 text-center">
                        <p class="text-danger">Ошибка загрузки сортов зерен.</p>
                    </div>
                `;
            });
    }

    // Отображаем зерна
    function displayBeans(beans) {
        const container = document.getElementById('beans-results');
        
        if (beans.length === 0) {
            container.innerHTML = `
                <div class="col-12 text-center">
                    <p>Сорта зерен не найдены. Попробуйте изменить фильтры.</p>
                </div>
            `;
            return;
        }

        container.innerHTML = beans.map(bean => `
            <div class="col-md-4 mb-4">
                <div class="card coffee-card h-100">
                    <div class="card-body">
                        <h5 class="card-title">${bean.name}</h5>
                        <p class="card-text">
                            <strong>Обжарщик:</strong> ${bean.roaster?.name || 'Не указан'}<br>
                            <strong>Страна:</strong> ${bean.origin}<br>
                            <strong>Обработка:</strong> ${bean.process}<br>
                            <strong>Обжарка:</strong> 
                            <span class="badge ${getRoastLevelBadge(bean.roast_level)}">
                                ${getRoastLevelText(bean.roast_level)}
                            </span>
                        </p>
                        ${bean.description ? `<p class="card-text"><small>${bean.description}</small></p>` : ''}
                    </div>
                </div>
            </div>
        `).join('');
    }

    // Получаем текст для уровня обжарки
    function getRoastLevelText(level) {
        const levels = {
            'light': 'Светлая',
            'medium': 'Средняя', 
            'dark': 'Темная'
        };
        return levels[level] || level;
    }

    // Получаем класс для бейджа уровня обжарки
    function getRoastLevelBadge(level) {
        const badges = {
            'light': 'bg-warning',
            'medium': 'bg-success',
            'dark': 'bg-dark'
        };
        return badges[level] || 'bg-secondary';
    }

    // Настраиваем пагинацию для зерен
    function setupBeansPagination(data) {
        const pagination = document.getElementById('beans-pagination');
        
        if (data.last_page <= 1) {
            pagination.innerHTML = '';
            return;
        }

        let html = '<ul class="pagination justify-content-center">';
        
        if (data.current_page > 1) {
            html += `<li class="page-item">
                <a class="page-link" href="#" onclick="loadBeans(${data.current_page - 1})">Назад</a>
            </li>`;
        }

        for (let i = 1; i <= data.last_page; i++) {
            html += `<li class="page-item ${i === data.current_page ? 'active' : ''}">
                <a class="page-link" href="#" onclick="loadBeans(${i})">${i}</a>
            </li>`;
        }

        if (data.current_page < data.last_page) {
            html += `<li class="page-item">
                <a class="page-link" href="#" onclick="loadBeans(${data.current_page + 1})">Вперед</a>
            </li>`;
        }

        html += '</ul>';
        pagination.innerHTML = html;
    }

    // Сброс фильтров
    function resetFilters() {
        document.getElementById('origin').value = '';
        document.getElementById('process').value = '';
        document.getElementById('roast_level').value = '';
        document.getElementById('sort_by').value = 'name';
        loadBeans(1);
    }
</script>
@endsection