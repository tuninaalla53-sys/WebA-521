@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-12">
        <h2>Задание 3: Генерация div элементов</h2>
        <p class="lead">Рекурсивная генерация 10 div элементов со случайными координатами</p>
        
        <div class="card mt-4">
            <div class="card-body">
                <div id="divContainer"></div>
                
                <button id="generateBtn" class="btn btn-success mt-3">Сгенерировать div элементы</button>
                <button id="resetBtn" class="btn btn-secondary mt-3">Очистить</button>
                
                <div class="mt-4">
                    <a href="{{ route('tasks.index') }}" class="btn btn-primary">← Назад к списку заданий</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    const container = document.getElementById('divContainer');
    const generateBtn = document.getElementById('generateBtn');
    const resetBtn = document.getElementById('resetBtn');
    
    function generateDivs(count, total) {
        if (count <= 0) {
            return;
        }
        
        const div = document.createElement('div');
        const randomX = Math.floor(Math.random() * (container.offsetWidth - 100));
        const randomY = Math.floor(Math.random() * (container.offsetHeight - 100));
        const randomColor = '#' + Math.floor(Math.random()*16777215).toString(16);
        
        div.style.left = randomX + 'px';
        div.style.top = randomY + 'px';
        div.style.backgroundColor = randomColor;
        div.textContent = total - count + 1;
        
        div.addEventListener('click', function() {
            alert(`Вы кликнули на div #${this.textContent}\nКоординаты: (${randomX}, ${randomY})`);
        });
        
        container.appendChild(div);
        
        setTimeout(() => {
            generateDivs(count - 1, total);
        }, 200);
    }
    
    generateBtn.addEventListener('click', function() {
        container.innerHTML = '';
        generateDivs(10, 10);
    });
    
    resetBtn.addEventListener('click', function() {
        container.innerHTML = '';
    });
});
</script>
@endsection