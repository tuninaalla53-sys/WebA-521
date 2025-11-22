@extends('layouts.app')

@section('title', 'Сорта кофейных зерен')

@section('content')
<div class="container py-5">
    <div class="row">
        <div class="col-md-12">
            <h1 class="text-center mb-5">Сорта кофейных зерен</h1>
            
            <!-- Фильтры -->
            <div class="card mb-4">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-3">
                            <label class="form-label">Страна происхождения</label>
                            <select class="form-select" id="origin-filter">
                                <option value="">Все страны</option>
                                <option value="Эфиопия">Эфиопия</option>
                                <option value="Бразилия">Бразилия</option>
                                <option value="Гватемала">Гватемала</option>
                                <option value="Йемен">Йемен</option>
                                <option value="Колумбия">Колумбия</option>
                            </select>
                        </div>
                        <div class="col-md-3">
                            <label class="form-label">Метод обработки</label>
                            <select class="form-select" id="process-filter">
                                <option value="">Все методы</option>
                                <option value="натуральная">Натуральная</option>
                                <option value="мытая">Мытая</option>
                                <option value="медовая">Медовая</option>
                            </select>
                        </div>
                        <div class="col-md-3">
                            <label class="form-label">Уровень обжарки</label>
                            <select class="form-select" id="roast-filter">
                                <option value="">Все уровни</option>
                                <option value="светлая">Светлая</option>
                                <option value="средняя">Средняя</option>
                                <option value="темная">Темная</option>
                            </select>
                        </div>
                        <div class="col-md-3">
                            <label class="form-label">Сортировка</label>
                            <select class="form-select" id="sort-filter">
                                <option value="name">По названию</option>
                                <option value="origin">По стране</option>
                            </select>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-md-12">
                            <button class="btn btn-success" onclick="applyFilters()">Применить фильтры</button>
                            <button class="btn btn-outline-secondary" onclick="resetFilters()">Сбросить</button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Список сортов зерен -->
            <div class="row" id="beans-list">
                <div class="col-12 text-center">
                    <p>Загрузка сортов зерен...</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('styles')
<style>
    .bean-card {
        transition: all 0.3s ease;
        border-left: 4px solid #28a745;
    }
    
    .bean-card:hover {
        transform: translateY(-3px);
        box-shadow: 0 5px 15px rgba(0,0,0,0.1);
    }
</style>
@endsection

@section('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        loadBeans();
    });

    function loadBeans(filters = {}) {
        let url = '/api/beans';
        const params = new URLSearchParams();
        
        if (filters.origin) params.append('origin', filters.origin);
        if (filters.process) params.append('process', filters.process);
        if (filters.sort) params.append('sort_by', filters.sort);
        
        if (params.toString()) url += '?' + params.toString();

        fetch(url)
            .then(response => response.json())
            .then(beans => {
                const container = document.getElementById('beans-list');
                
                if (!beans || beans.length === 0) {
                    container.innerHTML = `
                        <div class="col-12 text-center">
                            <p class="text-muted">Сорта зерен не найдены</p>
                            <button class="btn btn-outline-success" onclick="resetFilters()">Показать все</button>
                        </div>`;
                    return;
                }

                container.innerHTML = beans.map(bean => `
                    <div class="col-md-6 mb-4">
                        <div class="card bean-card h-100">
                            <div class="card-body">
                                <h5 class="card-title text-success">${bean.name}</h5>
                                <p class="card-text">
                                    <strong><i class="bi bi-building"></i> Обжарщик:</strong> ${bean.roaster?.name || 'Не указан'}
                                </p>
                                <p class="card-text">
                                    <strong><i class="bi bi-globe"></i> Страна:</strong> ${bean.origin || 'Не указана'}
                                </p>
                                <p class="card-text">
                                    <strong><i class="bi bi-gear"></i> Обработка:</strong> ${bean.process || 'Не указана'}
                                </p>
                                <p class="card-text">
                                    <strong><i class="bi bi-fire"></i> Обжарка:</strong> ${bean.roast_level || 'Не указана'}
                                </p>
                                ${bean.description ? `
                                <div class="bg-light p-3 rounded mt-2">
                                    <p class="mb-0"><strong>Описание вкуса:</strong> ${bean.description}</p>
                                </div>
                                ` : ''}
                                <div class="text-center mt-3">
                                    <a href="/beans/${bean.id}" class="btn btn-success btn-sm">Подробнее о сорте</a>
                                </div>
                            </div>
                        </div>
                    </div>
                `).join('');
            })
            .catch(error => {
                console.error('Ошибка загрузки сортов зерен:', error);
                document.getElementById('beans-list').innerHTML = `
                    <div class="col-12 text-center">
                        <p class="text-danger">Ошибка загрузки сортов зерен</p>
                        <button class="btn btn-outline-success" onclick="loadBeans()">Попробовать снова</button>
                    </div>`;
            });
    }

    function applyFilters() {
        const filters = {
            origin: document.getElementById('origin-filter').value,
            process: document.getElementById('process-filter').value,
            roast: document.getElementById('roast-filter').value,
            sort: document.getElementById('sort-filter').value
        };
        loadBeans(filters);
    }

    function resetFilters() {
        document.getElementById('origin-filter').value = '';
        document.getElementById('process-filter').value = '';
        document.getElementById('roast-filter').value = '';
        document.getElementById('sort-filter').value = 'name';
        loadBeans();
    }
</script>
@endsection