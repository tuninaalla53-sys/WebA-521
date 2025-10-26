<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\PageController;



/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });






// Главная страница с навигацией
Route::get('/', [PageController::class, 'showHome']);

// Маршрут для таблицы
Route::get('/table', [PageController::class, 'showTable']);

// Маршрут для бокового меню
Route::get('/sidebar', [PageController::class, 'showSidebar']);

// Маршрут для карточек подписки
Route::get('/pricing', [PageController::class, 'showPricing']);