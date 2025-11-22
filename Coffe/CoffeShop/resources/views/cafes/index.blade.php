
@extends('layouts.app')

@section('title', 'Кофейни города')

@section('content')
<div class="container py-5">
    <div class="row">
        <div class="col-md-12">
            <h1 class="text-center mb-5">Кофейни города</h1>
            
            <!-- Поиск -->
            <div class="card mb-4">
                <div class="card-body">
                    <h5 class="card-title">Поиск по названию</h5>
                    <input type="text" class="form-control" id="search-input" placeholder="Введите название кофейни...">
                </div>
            </div>

            <!-- Список кофеен -->
            <div class="row" id="cafes-list">
                <div class="col-12 text-center">
                    <p>Загрузка кофеен...</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        loadCafes();
    });

    function loadCafes(search = '') {
        let url = '/api/cafes';
        if (search) {
            url += '?search=' + encodeURIComponent(search);
        }

        fetch(url)
            .then(response => response.json())
            .then(data => {
                const cafes = data.data || data;
                const container = document.getElementById('cafes-list');
                
                if (!cafes || cafes.length === 0) {
                    container.innerHTML = '<div class="col-12 text-center"><p>Кофейни не найдены</p></div>';
                    return;
                }

                container.innerHTML = cafes.map(cafe => `
                    <div class="col-md-6 mb-4">
                        <div class="card h-100 shadow-sm">
                            <div class="card-body">
                                <h5 class="card-title text-primary">${cafe.name}</h5>
                                <p class="card-text">
                                    <i class="bi bi-geo-fill"></i> ${cafe.address}
                                </p>
                                <p class="text-muted">
                                    <i class="bi bi-building"></i> ${cafe.neighborhood?.name || 'Район не указан'}
                                </p>
                                <p class="small text-muted">
                                    <i class="bi bi-geo-alt"></i> Ш: ${cafe.latitude}, Д: ${cafe.longitude}
                                </p>
                                <div class="text-center mt-3">
                                    <a href="/cafes/${cafe.id}" class="btn btn-primary btn-sm">Подробнее</a>
                                </div>
                            </div>
                        </div>
                    </div>
                `).join('');
            })
            .catch(error => {
                console.error('Ошибка загрузки кофеен:', error);
                document.getElementById('cafes-list').innerHTML = '<div class="col-12 text-center"><p>Ошибка загрузки кофеен</p></div>';
            });
    }

    // Поиск при вводе
    document.getElementById('search-input').addEventListener('input', function(e) {
        const search = e.target.value;
        loadCafes(search);
    });
</script>
@endsection